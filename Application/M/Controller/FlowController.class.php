<?php
namespace Home\Controller;
class FlowController extends CommonController {
    
    public function addToCar(){
        $goodsId=I('goods_id');
        $goodsNum=I('number');
        $goodsAttr=I('goods_attr');
        sort($goodsAttr);
        $goodsAttr=implode(',', $goodsAttr);
        $car=D('Car');
        $car->addToCar($goodsId,$goodsAttr,$goodsNum);
        $this->success('加入购物车成功！正在为您跳转...',U('flow1'));
    }

    public function flow1(){
        $car=D('Car');
        // dump(unserialize($_COOKIE['car']));
        $goodsInfo=$car->getGoodsInfo();
        $this->assign('goodsInfo',$goodsInfo);
        dump($goodsInfo);
        $this->display();
    }

    public function flow2(){
        if(!session('id')){
            session('returnUrl','./home/flow/flow2');
            $this->error('请先登录！',U('User/login'));
        }
        $car=D('Car');
        $goodsInfo=$car->getGoodsInfo();
        $mid=session('id');
        $shrInfos=D('shrinfo')->where(array('mid'=>$mid))->find();
        $this->assign(array(
            'goodsInfo'=>$goodsInfo,
            'shrInfos'=>$shrInfos,
            ));
        $this->display();
    }

    //处理下订单的数据
    public function flow3(){
        if(!session('id')){
            session('returnUrl','./home/flow/flow2');
            $this->error('请先登录！',U('User/login'));
        }
        //检查购物车是否有商品
        $car=D('Car');
        $cardata=$car->getGoodsInfo();
        if(!count($cardata)){
            $this->error('购物车没有商品数据！');
        }
        //php文件锁
        $fp=fopen('./order.lock', 'r');
        flock($fp,LOCK_EX);//排他锁
        //检查商品库存量
        $tweight=0;
        foreach ($cardata as $k => $v) {
            $tweight+=$v['goods_weight'];
            $gn=D('goods')->getGoodsNum($v['goods_id'],$v['goods_attr_ids']);
            if($v['number']>$gn){
                $this->error('商品名为：'.$v['goodsName'].'商品属性为：'.$v['attrStr'].'库存不足！请减少购买数量！');
            }
        }

        //处理订单
        //1、收货地址
        $data=I('post.');
        //快递运费
        $yunfei=yfjs($tweight,$data['peisong'],$data['province'],$data['city'],$data['county']);
        //余额支付
        //订单总费用（含运费）
        $pay_status=0;
        $torder=$data['gtprice']+$yunfei;
        if($data['pay']=='余额'){
            D('member')->field('money')->find(session('id'));
            $yue=D('member')->money;
            if($yue>=$torder){
                 D('member')->where(array('id'=>session('id')))->setDec('money',$torder);
                 $pay_status=1;
            }else{
                $this->error('余额不足，请充值！');
            }
        }
        //支付宝支付。。。
        $shrInfo=D('shrinfo');
        $mid=session('id');
        $shrInfos=$shrInfo->where(array('mid'=>$mid))->find();
        if(!$shrInfos){
            $shrInfo->add(array(
                'shr'=>$data['shr'],
                'province'=>$data['province'],
                'city'=>$data['city'],
                'county'=>$data['county'],
                'adress'=>$data['adress'],
                'phone'=>$data['phone'],
                'mid'=>$mid
                ));
        }else{
            $shrInfo->where(array('mid'=>$mid))->save(array(
                'shr'=>$data['shr'],
                'province'=>$data['province'],
                'city'=>$data['city'],
                'county'=>$data['county'],
                'adress'=>$data['adress'],
                'phone'=>$data['phone'],
                ));
        }
        //2、订单基本信息
        $order=D('order');
        $order_id=$order->add(array(
            'sn'=>time().rand(111111,999999),
            'addtime'=>time(),
            'shr'=>$data['shr'],
            'province'=>$data['province'],
            'city'=>$data['city'],
            'county'=>$data['county'],
            'adress'=>$data['adress'],
            'phone'=>$data['phone'],
            'mid'=>$mid,
            'peisong'=>$data['peisong'],
            'pay'=>$data['pay'],
            'pay_status'=>$pay_status,
            'gtprice'=>$data['gtprice'],//商品总价格
            'yprice'=>$yunfei,//运费价格
            'tprice'=>$torder,//商品和运费总和
            ));

        //3、订单的商品信息
        // array(
        //     ["38-200,190"] => array(8) {
        //     ["goodsName"] => string(27) "测试商品内容页女装"
        //     ["midThumb"] => string(55) "./Public/Uploads/Goods/2016-12-25/mid_585fd7c5d46a8.jpg"
        //     ["marketPrice"] => float(490)
        //     ["mprice"] => float(340)
        //     ["number"] => int(1)
        //     ["goods_id"] => string(2) "38"
        //     ["goods_attr_ids"] => string(7) "200,190"
        //     ["attrStr"] => string(62) "衬衫颜色:黑色【￥0.00】<br />尺寸:XL【￥-10.00】"
        //   }
        //     );
        if($order_id){
            // $car=D('Car');
            // $cardata=$car->getGoodsInfo();
            $orderGoods=D('orderGoods');
            foreach ($cardata as $k => $v) {
              $orderGoods->add(array(
                'goods_id'=>$v['goods_id'],
                'goods_name'=>$v['goodsName'],
                'goods_attr_id'=>$v['goods_attr_ids'],
                'goods_attr_str'=>$v['attrStr'],
                'goods_price'=>$v['mprice'],
                'goods_marktprice'=>$v['marketPrice'],
                'goods_num'=>$v['number'],
                'order_id'=>$order_id,
                ));
            }

            $car=D('car');
            $car->clearCar();
        }
        //减少商品库存量
        if($this->config['delpro']=='下单时'){
            foreach ($cardata as $k => $v) {
                D('product')->where(array('goods_id'=>$v['goods_id'],'goods_attr'=>$v['goods_attr_ids']))->setDec('goods_number',$v['number']);
            }  
        }
        
        //释放锁
        flock($fp,LOCK_UN);
        fclose($fp);
        $this->success('下单成功！',U('flow4',array('order_id'=>$order_id,'torder'=>$torder)));
    }

    public function flow4($order_id,$torder){
        if(!session('id')){
            $this->error('请先登录！',U('User/login'));
        }
        $order=D('order')->field('pay,pay_status')->find($order_id);
        if($order['pay'] == '支付宝' && $order['pay_status'] == 0){
            include("./alipay/alipayapi.php");
            $this->assign('alipaybotton',$html_text);
        }
        $this->display();
    }

    //支付成功接收支付宝反馈信息
    public function payok(){
        $order=D('order');
        include("./alipy/notify_url.php");
    }


    public function ajaxupdateGN($gi,$gattr='',$gn=0){
        $car=D('Car');
        if($gn==0){
            $car->delGoods($gi,$gattr);
        }else{
            $car->uploadGoodsNum($gi,$gattr,$gn);  
        }
        
    }

    public function clearCart(){
        $car=D('car');
        $car->clearCar();
    }













}