<?php
namespace Admin\Controller;
class GoodsController extends CommonController {

    public function lst(){
        $goods=D('GoodsView');
        $count= $goods->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count,8);// 
        $show = $Page->show();// 分页显示输出
        $list = $goods->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display();

    }

    public function add(){
        $goods=D('goods');
        if(IS_POST){
            // dump($_POST); die;
            if($goods->create()){
                $goods->addtime=time();
                $goods->updatetime=time();
                if($goods->add()){
                    $this->success('添加商品成功！',U('lst'));
                }else{
                    $this->error('添加商品失败！');
                }
            }else{
                $this->error($goods->getError());
            }
            return;
        }
        $cateres=D('cate')->catetree();
        $brandres=D('brand')->select();
        $levres=D('memberLevel')->select();
        $typeres=D('type')->select();
        $recposres=D('recpos')->where(array('rectype'=>1))->select();
        $this->assign(array(
            'cateres'=>$cateres,
            'brandres'=>$brandres,
            'levres'=>$levres,
            'typeres'=>$typeres,
            'recposres'=>$recposres,
            ));
        $this->display();
    }

    public function edit(){
        $goods=D('goods');
        if(IS_POST){
            // dump($_POST); die;
            if($goods->create()){
                $goods->updatetime=time();
                if($goods->save() !== false){
                    $this->success('修改商品成功！',U('lst'));
                }else{
                    $this->error('修改商品失败！');
                }
            }else{
                $this->error($goods->getError());
            }
            return;
        }
        $id=I('id');
        $goods=$goods->find($id);
        $cateres=D('cate')->catetree();
        $brandres=D('brand')->select();
        $levres=D('MemberLevel')->select();
        $mpres=D('MemberPrice')->where(array('goods_id'=>$id))->select();
        $picres=D('GoodsPic')->where(array('goods_id'=>$id))->select();
        $typeres=D('type')->select();
        $attrres=D('attr')->where(array('type_id'=>$goods['type_id']))->select();
        $_gattrres=D('GoodsAttr')->where(array('goods_id'=>$id))->select();
        $recposres=D('recpos')->where(array('rectype'=>1))->select();
        $_recids=D('recvalue')->field('recid')->where(array('valueid'=>$id,'rectype'=>1))->select();
        $recids=array();
        foreach ($_recids as $k => $v) {
            $recids[]=$v['recid'];
        }
        $gattrres=array();
        foreach ($_gattrres as $k => $v) {
            $gattrres[$v['attr_id']][]=$v;
        }
        // dump($gattrres); die;
        $this->assign(array(
            'goods'=>$goods,
            'cateres'=>$cateres,
            'brandres'=>$brandres,
            'levres'=>$levres,
            'mpres'=>$mpres,
            'picres'=>$picres,
            'typeres'=>$typeres,
            'attrres'=>$attrres, //当前类型的所有属性
            'recposres'=>$recposres,
            'recids'=>$recids,//当前商品所属推荐位的id组成的数组
            'gattrres'=>$gattrres//当前商品的所有属性
            ));
        // dump($recids); die;
        $this->display();
    }

    //处理异步删除商品图片

    public function ajaxdelpic($picid){
        $goodspic=D('GoodsPic');
        $goodspic->find($picid);
        @unlink($goodspic->original);
        @unlink($goodspic->max_thumb);
        @unlink($goodspic->sm_thumb);
        $goodspic->delete();
    }

    //异步删除商品属性
    public function ajaxdelga($gaid){
        D('GoodsAttr')->delete($gaid);
    }

    public function product($id){
        $pro=D('product');
        if(IS_POST){
            $goods_num=I('goods_num');
            $goods_attr=I('goods_attr');
            $pro->where(array('goods_id'=>$id))->delete();
            foreach ($goods_num as $k=>$v) {
                $_attr=array();
                foreach ($goods_attr as $k1=>$v1) {
                    if((int)$v1[$k]<=0){
                        continue 2;
                    }
                    $_attr[]=$v1[$k];
                }
                sort($_attr);
                $goodsAttrStr=implode(',',$_attr);
                $pro->add(array(
                    'goods_id'=>$id,
                    'goods_number'=>$v,
                    'goods_attr'=>$goodsAttrStr
                    ));
            }
            $this->success('添加库存成功！');
            return;
        }
        $goods=D('goods');
        $_radioAttr=$goods->getRadioAttr($id);
        $radioAttr=array();
        foreach ($_radioAttr as $k=>$v) {
            $radioAttr[$v['attr_id']][]=$v;
        }
        $prores=$pro->where(array('goods_id'=>$id))->order('id desc')->select();
        $this->assign(array(
            'radioAttr'=>$radioAttr,
            'prores'=>$prores
            ));
        $this->display();
    }



    public function del(){
        if(D('goods')->delete(I('id'))){
            $this->success('删除商品成功！',U('lst'));
        }else{
            $this->error('删除商品失败！');
        }
    }

    public function ajaxgetattr($typeid){
        $data=D('attr')->where(array('type_id'=>$typeid))->select();
        echo json_encode($data);
    }

    

    


















}