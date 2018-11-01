<?php
namespace M\Controller;
class IndexController extends CommonController {

    public function index(){
//        for($cateid=14;$cateid<21;$cateid++){
//        // dump(session('user'));
//        $cate=D('cate');
//        $cate1=$cate->where(array('pid'=>$cateid))->select();
//        $this->assign('cate1',$cate1);
//
//        //查询每个分类下面的商品
//            $goods=D('goods');
//            $gd1=$goods->where(array('pid'=>$cateid))->select();
//            $this->assign('gd1',$gd1);
//    }
//        $this->assign('g_res',$g_res);

        $ip = get_client_ip();
        $url='https://sp0.baidu.com/8aQDcjqpAAV3otqbppnN2DJv/api.php?query='.$ip.'&co=&resource_id=6006&t=1488163851795&ie=utf8&oe=gbk&cb=op_aladdin_callback&format=json&tn=baidu&cb=jQuery1102007553074611919763_1488163568327&_=1488163568331';
        $html = file_get_contents($url);
        $html=iconv('GB2312', 'UTF-8//IGNORE', $html); //将字符串的编码从GB2312转到UTF-8
        // dump($html);exit();
        $t1 = mb_strpos($html,'location":"')+11;
        $t2 = mb_strpos($html,'","titlecont');

        $data['ip'] = $ip;
        $data['area'] = mb_substr($html,$t1,$t2-$t1);
        $data['url'] = 'm_index';

        $qx=M("ip");
        //ip url area 相同时，不添加进数据库
        $find=$qx->order("id desc")->where($data)->find();
        //没有查询到该ip时，添加进数据库
        if(empty($find)){
            $data['time'] = time();
            $qx=$qx->add($data);
        }else{
            $data['btime'] = time();
            $data['count'] = $find['count']+1;
            $qx=$qx->where(array('ip'=>$data['ip']))->save($data);
            // $qx=$qx->where(array('ip'=>$data['ip']))->setInc('count',1);
        }
        $cate=D('cate');
        $cate1=$cate->where(array('pid'=>'14'))->select();
        $this->assign('cate1',$cate1);

        //查询每个分类下面的商品
//        $goods=D('goods');
//        foreach ($cate1 as $key => &$value) {
//            $cate2=$cate->where(array('pid'=>$value['id']))->select();
//
//            foreach ($cate2 as $kk => $vv) {
//
//                $good=$goods->where(array('cate_id'=>$vv['id']))->select();
//                // dump($good);
//                if(!empty($good)){
//
//                    //数组合并
//                    $arr = array();
//                    foreach($good as $k=>$v){
//                        $arr1= array_merge($arr,$v);
//                        $g_res[]=$arr1;
//                    }
//                }
//            }
//        }
//        $this->assign('g_res',$g_res);



//        $cat= D("cate");
//        $total=$cat->where(array('pid'=>0))->select();
////        dump($total);die;
//        foreach($total as $k => $v)
//        {
//            $total[$k]['new'] =D("goods") -> where(array('cat_title' => $v['cat_title'])) -> limit(4) -> select();
//        }
//        $this -> assign('total',$total);

        $cate=D('cate');

        $cate1=$cate->where(array('pid'=>0))->select();
        //dump($cate1);die;
        $goods=D('goods');
        foreach($cate1 as $kx=>$vx){
            $cate2=$cate->field('id')->where(array('pid'=>$vx['id']))->select();

        foreach ($cate2 as $key => $value) {
            $cate3=$cate->field('id')->where(array('pid'=>$value['id']))->select();
            //dump($cate3);//die;
            foreach ($cate3 as $kk => $vv) {
                $good=$goods->where(array('cate_id'=>$vv['id']))->select();
               //dump($good);die;
                if(!empty($good)){

                    //数组合并
                    $arr = array();
                    foreach($good as $k=>$v){
                        $arr1= array_merge($arr,$v);
                        $g_res[]=$arr1;
                    }

                }
            }//dump($g_res);die;
        }
        }
            //dump($good);die;
            $lm[$key]['cate']=$cate1;
            $lm[$key]['name']=$vx['catename'];
            $lm[$key]['cid']=$vx['id'];
        $this->assign('cate1',$cate1);
        $this->assign('lm',$lm);
        $this->assign('g_res',$g_res);

        // dump($lm);


        //猜你喜欢
        $goods=D('goods');
        $gd=$goods->select();
        $this->assign('gd',$gd);
        // dump($gd);

       // $this->assign(array('left1'=>$left1,'big1'=>$big1,'good1'=>$good1));
       $this->display();
    }


    //一级分类下面的页面
    public function index1(){

        $id=I("get.aid"); //get过来的aid

        $cate=D('cate');
        $cate1=$cate->where(array('pid'=>$id))->select();
        $this->assign('cate1',$cate1);

        //查询每个分类下面的商品
        $goods=D('goods');
        foreach ($cate1 as $key => &$value) {
            $cate2=$cate->where(array('pid'=>$value['id']))->select();

            foreach ($cate2 as $kk => $vv) {

                $good=$goods->where(array('cate_id'=>$vv['id']))->select();
                // dump($good);
                if(!empty($good)){

                    //数组合并
                    $arr = array();
                    foreach($good as $k=>$v){
                       $arr1= array_merge($arr,$v);
                       $g_res[]=$arr1;
                    }
                }
            }
        }
        $this->assign('g_res',$g_res);

        //底部 猜你喜欢
        $cnxh=$goods->select();
        $this->assign('cnxh',$cnxh);
        $this->display();
    }



    public function index2(){

        $id=I("get.id");

        $cate=D('cate');
        $cate1=$cate->where(array('pid'=>$id))->select();

        //查询每个分类下面的商品
        $goods=D('goods');
        foreach ($cate1 as $key => &$value) {

            //判断分类图片能不能打开
            $c_pic=SITE_URL."public/c2/c".$value['id'].".jpg";
            if ($file_content = file_get_contents($c_pic) ) {
            //  能打开
                $value['c_pic']=$c_pic;
            } else {
            // 不能打开
                $value['c_pic']='';
            }

            $value['good']=$goods->where(array('cate_id'=>$value['id']))->select();
        }

        $this->assign('cate1',$cate1);

        //底部 猜你喜欢
        $cnxh=$goods->select();
        $this->assign('cnxh',$cnxh);

        // dump($cate1);

        $this->display();
    }


    //商品详情
    public function detail(){

        $id=I("get.id");

        //查询商品详情
        $goods=D('goods')->find($id);

        //优惠多少钱
        $goods['yh']=bcsub($goods['market_price'], $goods['shop_price'], 2);

        // dump($goods);exit();

        $this->assign('goods',$goods);
        $this->display();
    }


    //下单登记
    public function dj(){

        $sid=I("get.sid");

        if(IS_POST){

            $data=I("post.");

            $dj=D('dingdan')->add($data);
            if($dj){
                $this->success('登记成功！', U('Index/index'));
            }else{
                $this->error('登记失败！');
            }

        }else{
            $goods=D('goods')->find($sid);
            // dump($goods);
            $this->assign('goods',$goods);
            $this->display();
        }

    }


    //注册
    public function reg(){

        // dump(I("post."));
        if(IS_POST){
            $user=M('User');
            $data=I("post.");

            $data['ip']=get_client_ip();
            $data['ctime']=time();

            $find_one=$user->where(array('phone'=>$data['phone']))->find();
            if($find_one){
                $this->error('注册失败！该昵称已存在！');
            }else{
                $res=$user->add($data);
                if($res){

                   $da =array();
                   $da['phone'] = $data['phone'];
                   $da['nick'] = $data['nick'];
                   session("user",$da);

                   $this->success('注册成功！', U('Index/grzx'));
                }else{
                   $this->error('注册失败！');
                }
            }

        }else{
            $this->display();
        }

    }

    //注册协议
    public function zcxy(){
        $this->display();
    }

    public function login(){

        if(IS_POST){
            $user=M('User');
            $data=I("post.");

            $find_one=$user->where(array('phone'=>$data['phone']))->find();
            if($find_one){

                if($data['phone'] == $find_one['phone'] && $data['password'] == $find_one['password']){

                   $da['phone'] = $find_one['phone'];
                   $da['nick'] = $find_one['nick'];
                   session("user",$da);

                   $this->success('登录成功！', U('Index/grzx'));
                }else{
                   $this->error('登录失败！账号或者密码错误！');
                }

            }else{
                   $this->error('登录失败！该账号可能未注册！');
                }

        }else{
            $this->display();
        }

    }



    public function logout(){
       session("user",null);
       $this->success('退出成功！', U('Index/index'));
    }


    //个人中心
    public function grzx(){
        $this->display();
    }


    //下单
    public function order(){

        $user=session("user");
        if(empty($user)){
            $this->error('请先登录账号！', U('Index/login'));exit();
        }


        $post=I("post.");
        if(IS_POST){
            $goods=M("goods");
            $cate=array($post['id1'],$post['id2'],$post['id3'],$post['id4'],$post['id5'],$post['id6']);
            // $cate = ['78','79'];//$cate为一个数组
            $where['id'] = array('in',$cate);//cid在这个数组中，
            $res=$goods->where($where)->select();
            foreach ($res as $key => &$value) {
                $value['max_thumb']=substr($value['max_thumb'],1);
                $value['count']=$post['number'.($key+1)];
                $value['xj']=$value['shop_price']*$value['count'];

                $hj += $value['xj'];
            }
            /*dump($res);
            dump($hj);*/
            $dd_one=[$res,$hj];
            $dd=S('dd',$dd_one);

            $this->assign('res',$res);
            $this->assign('hj',$hj);
        }


        //查询该账号以前下过订单的地址
        $one=D("User")->where(array('phone'=>$user['phone'],'nick'=>$user['nick']))->find();
        $xinxi=D("dingdans")->where(array('userid'=>$one['id']))->order("id desc")->find();
        $this->assign('xinxi',$xinxi);

        // dump($xinxi);

        $this->display();
    }


    public function dd(){

        $user=session("user");
        if(empty($user)){
            $this->error('请先登录账号！', U('Index/login'));exit();
        }

        $post=I("post.");

        if(IS_POST){
            $data1=$post;
            $data1['data']=json_encode(S('dd'));
            $data1['time']=time();
            $data1['sn']=time().rand(100,999);

            $ip = get_client_ip();
            $url='https://sp0.baidu.com/8aQDcjqpAAV3otqbppnN2DJv/api.php?query='.$ip.'&co=&resource_id=6006&t=1488163851795&ie=utf8&oe=gbk&cb=op_aladdin_callback&format=json&tn=baidu&cb=jQuery1102007553074611919763_1488163568327&_=1488163568331';
            $html = file_get_contents($url);
            $html=iconv('GB2312', 'UTF-8//IGNORE', $html); //将字符串的编码从GB2312转到UTF-8
            // dump($html);exit();
            $t1 = mb_strpos($html,'location":"')+11;
            $t2 = mb_strpos($html,'","titlecont');

            $data1['ip'] = $ip;
            $data1['ipdz'] = mb_substr($html,$t1,$t2-$t1);


            $one=D("User")->where(array('phone'=>$user['phone'],'nick'=>$user['nick']))->find();
            $data1['userid'] = $one['id'];
            $data1['nick'] = $one['nick'];

            // dump($data1);
            $dingdans=M("dingdans")->add($data1);
            if($dingdans){

                //下单成功，把购物车清掉
                session("car1",null);
                //把订单数据写进缓存
                $dd=S('dds',$data1);

                $this->success('订单提交成功！', U('Index/olst'));
            }else{
                $this->error('订单提交失败！', U('Index/car'));
            }

            // $this->display();
        }
    }






    //购物车
    public function car(){

        // session("car1",null);exit();
        // dump(I("post."));

        $id=I("get.id");

        if($id){
           $goods=D('goods');

           $find_one=$goods->find($id);
           $da['id'] = $find_one['id'];
           $da['goods_name'] = $find_one['goods_name'];
           $da['shop_price'] = $find_one['shop_price'];
           $da['original'] = substr($find_one['original'],1);
           $da['num'] = 1;

          //查询出购物车中原来的产品
           $old=session("car1");
           $old[]=$da;
           $new = $this->er_array_unique($old);


           session("car1",$new);

        }


       $cars=session("car1");

       //根据字段id对数组$cars进行降序排列 【否则order方法中 in(ids) 会从小到大排序】
       $px = array_column($cars,'id');
       array_multisort($px,SORT_ASC,$cars);

       $this->assign('cars',$cars);
       $this->display();
    }




    //订单列表
    public function olst(){
       $user=session("user");
       if(empty($user)){
           $this->error('请先登录账号！', U('Index/login'));exit();
       }

       $one=D("User")->where(array('phone'=>$user['phone'],'nick'=>$user['nick']))->find();
       $where['userid'] = $one['id'];
       $where['nick'] = $one['nick'];

       $dds=M("dingdans");
       $oder_list=$dds->where($where)->order("id desc")->select();

       foreach ($oder_list as $key => &$value) {
           $va=json_decode($value['data']);
           $value['data']=$va[0][0]->max_thumb;
           /*["data"] => object(stdClass) {
                ["max_thumb"] => string(54) "/Public/Uploads/Goods/2018-09-27/max_5bacf42c83745.jpg"
           }*/
           $value['hj']=$va[1];
       }

       // dump($oder_list);

       $this->assign('oder_list',$oder_list);
       $this->display();
    }


    //某个订单详情
    public function odetail(){

       $user=session("user");
       if(empty($user)){
           $this->error('请先登录账号！', U('Index/login'));exit();
       }

       $one=D("User")->where(array('phone'=>$user['phone'],'nick'=>$user['nick']))->find();
       $where['userid'] = $one['id'];
       $where['nick'] = $one['nick'];

       $dds=M("dingdans");
       $oder_list=$dds->find(I("get.id"));
       $oder_list['data'] = json_decode($oder_list['data']);
       // dump($oder_list);

       $this->assign('oder_list',$oder_list);
       $this->display();
    }






        //二维数组简单去重
        function er_array_unique($arr){
          $newarr = array();
          if(is_array($arr)){
            foreach($arr as $v){
              if(!in_array($v,$newarr,true)){
                $newarr[] = $v;
              }
            }
          }else{
             return false;
          }
          return $newarr;
        }




}