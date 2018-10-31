<?php
namespace Admin\Model;
use Think\Model;
class GoodsModel extends Model {

    protected $_validate = array(
      array('goods_name','require','商品名称不得为空！',1),
      array('cate_id','require','商品分类不得为空！',1),
      array('market_price','require','市场价格不得为空！',1),
      array('shop_price','require','本店价格不得为空！',1),
      array('goods_name','','商品名称不得重复！',1,unique,3),
    );

    public function _before_insert(&$data,$option){
        if($_FILES['original']['tmp_name']){
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     3145728 ;// 设置附件上传大小
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            // $upload->autoSub = false;
            $upload->savePath  =      './Public/Uploads/Goods/'; // 设置附件上传目录
            $upload->rootPath  =      './';
            $info   =   $upload->uploadOne($_FILES['original']);
            $original=$info['savepath'].$info['savename'];
            $max_thumb=$info['savepath'].'max_'.$info['savename'];
            $mid_thumb=$info['savepath'].'mid_'.$info['savename'];
            $sm_thumb=$info['savepath'].'sm_'.$info['savename'];
            $image = new \Think\Image();
            $image->open($original);
            $image->thumb(362, 362)->save($max_thumb);
            $image->thumb(222, 222)->save($mid_thumb);
            $image->thumb(67, 67)->save($sm_thumb);
            $data['original']=$original;
            $data['max_thumb']=$max_thumb;
            $data['mid_thumb']=$mid_thumb;
            $data['sm_thumb']=$sm_thumb;
        }


        //说明书图片
        if($_FILES['s_pic']['tmp_name']){
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     3145728 ;// 设置附件上传大小
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            // $upload->autoSub = false;
            $upload->savePath  =      './Public/Uploads/Goods/'; // 设置附件上传目录
            $upload->rootPath  =      './';
            $info   =   $upload->uploadOne($_FILES['s_pic']);
            $original=$info['savepath'].$info['savename'];

            $data['s_pic']=$original;
        }



        $data['goods_sn']=time().rand(111111,999999);
        if($data['onsale']){
            $data['onsale']=1;
        }else{
            $data['onsale']=0;
        }
    }

    public function _before_update(&$data,$option){
        //处理商品上架信息
        if($data['onsale'] == 'on'){
            $data['onsale']='1';
        }else{
            $data['onsale']='0';
        }
        //处理商品缩略图
        if($_FILES['original']['tmp_name']){
            // dump($data);  dump($option);  die;
            $pics=$this->field('original,max_thumb,mid_thumb,sm_thumb')->find($option['where']['id']);
            if($pics){
                foreach ($pics as $k=>$v) {
                    if(file_exists($v)){
                        @unlink($v);
                    }
                }
            }
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     3145728 ;// 设置附件上传大小
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            // $upload->autoSub = false;
            $upload->savePath  =      './Public/Uploads/Goods/'; // 设置附件上传目录
            $upload->rootPath  =      './';
            $info   =   $upload->uploadOne($_FILES['original']);
            $original=$info['savepath'].$info['savename'];
            $max_thumb=$info['savepath'].'max_'.$info['savename'];
            $mid_thumb=$info['savepath'].'mid_'.$info['savename'];
            $sm_thumb=$info['savepath'].'sm_'.$info['savename'];
            $image = new \Think\Image();
            $image->open($original);
            $image->thumb(362, 362)->save($max_thumb);
            $image->thumb(222, 222)->save($mid_thumb);
            $image->thumb(67, 67)->save($sm_thumb);
            $data['original']=$original;
            $data['max_thumb']=$max_thumb;
            $data['mid_thumb']=$mid_thumb;
            $data['sm_thumb']=$sm_thumb;
        }



        //处理说明书图片
        if($_FILES['s_pic']['tmp_name']){
            // dump($data);  dump($option);  die;

            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     3145728 ;// 设置附件上传大小
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            // $upload->autoSub = false;
            $upload->savePath  =      './Public/Uploads/Goods/'; // 设置附件上传目录
            $upload->rootPath  =      './';
            $info   =   $upload->uploadOne($_FILES['s_pic']);
            $original=$info['savepath'].$info['savename'];


            $data['s_pic']=$original;
        }




        //处理会员价格
        $mpres=I('mp');
        $mp=D('MemberPrice');
        if($mpres){
            $mp->where(array('goods_id'=>$option['where']['id']))->delete();
            foreach ($mpres as $k=> $v) {
                if(trim($v)!=''){
                    $mp->add(array(
                        'price'=>$v,
                        'level_id'=>$k,
                        'goods_id'=>$option['where']['id']
                        ));
                }
            }
        }

        // 处理商品图片
        if($this->hasimg($_FILES['goods_pics']['tmp_name'])){
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     3145728 ;// 设置附件上传大小
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            // $upload->autoSub = false;
            $upload->savePath  =      './Public/Uploads/Goods/'; // 设置附件上传目录
            $upload->rootPath  =      './';
            $info   =   $upload->upload(array('goods_pics'=>$_FILES['goods_pics']));
            $image = new \Think\Image();
            $goodspic=D('GoodsPic');
            foreach ($info as $k=> $v) {
                $original=$v['savepath'].$v['savename'];
                $image->open($original);
                $max_thumb=$v['savepath'].'max_'.$v['savename'];
                $sm_thumb=$v['savepath'].'sm_'.$v['savename'];
                $image->thumb(362, 362)->save($max_thumb);
                $image->thumb(67, 67)->save($sm_thumb);
                $goodspic->add(array(
                    'goods_id'=>$option['where']['id'],
                    'original'=>$original,
                    'max_thumb'=>$max_thumb,
                    'sm_thumb'=>$sm_thumb
                    ));
            }
        }

        //处理商品属性,新增
        $goods_attr=I('goods_attr');
        $goods_price=I('goods_price');
        if($goods_attr){
            $goodsattr=D('GoodsAttr');
            $i=0;
            foreach ($goods_attr as $k=>$v) {
                if(is_array($v)){
                    foreach ($v as $k1 => $v1) {
                       $goodsattr->add(array(
                        'goods_id'=>$option['where']['id'],
                        'attr_id'=>$k,
                        'attr_value'=>$v1,
                        'attr_price'=>$goods_price[$i],
                    ));
                       $i++;
                    }
                }else{
                    $goodsattr->add(array(
                        'goods_id'=>$option['where']['id'],
                        'attr_id'=>$k,
                        'attr_value'=>$v,
                        'attr_price'=>$goods_price[$i],
                    ));
                    $i++;
                }
            }
        }

        //处理商品属性,修改
        $goods_attr=I('old_goods_attr');
        $goods_price=I('old_goods_price');
        if($goods_attr){
            $ids=array_keys($goods_price);
            $prices=array_values($goods_price);
            // dump($ids); dump($prices); die;
            $goodsattr=D('GoodsAttr');
            $i=0;
            foreach ($goods_attr as $k=>$v) {
                if(is_array($v)){
                    foreach ($v as $k1 => $v1) {
                       $goodsattr->where(array('id'=>$ids[$i]))->save(array(
                        'attr_value'=>$v1,
                        'attr_price'=>$prices[$i],
                    ));
                       $i++;
                    }
                }else{
                   $goodsattr->where(array('id'=>$ids[$i]))->save(array(
                        'attr_value'=>$v,
                        'attr_price'=>$prices[$i],
                    ));
                    $i++;
                }
            }
        }

        //处理商品推荐位
        D('recvalue')->where(array('valueid'=>$option['where']['id'],'rectype'=>1))->delete();
        $recid=I('recid');
        if($recid){
            foreach ($recid as $k => $v) {
                D('recvalue')->add(array(
                    'valueid'=>$option['where']['id'],
                    'recid'=>$v,
                    'rectype'=>1,
                    ));
            }
        }

    }

    public function _before_delete($option){
        $id=$option['where']['id'];
        $this->field('original,max_thumb,mid_thumb,sm_thumb')->find($id);
        //处理主图缩略图
        @unlink($this->original);
        @unlink($this->max_thumb);
        @unlink($this->mid_thumb);
        @unlink($this->sm_thumb);
        //删除会员价格
        D('MemberPrice')->where(array('goods_id'=>$id))->delete();
        //删除商品属性
        D('GoodsAttr')->where(array('goods_id'=>$id))->delete();
        //删除商品图片
        $goodspicres=D('GoodsPic')->where(array('goods_id'=>$id))->select();
        foreach ($goodspicres as $k => $v) {
            @unlink($v['original']);
            @unlink($v['max_thumb']);
            @unlink($v['sm_thumb']);
        }
        D('GoodsPic')->where(array('goods_id'=>$id))->delete();
        //处理商品推荐删除
        D('recvalue')->where(array('rectype'=>1,'valueid'=>$id))->delete();

    }


    public function _after_insert($data,$option){
        //处理会员价格
        $mpres=I('mp');
        if($mpres){
            $mp=D('MemberPrice');
            foreach ($mpres as $k=> $v) {
                if(trim($v)!=''){
                    $mp->add(array(
                        'price'=>$v,
                        'level_id'=>$k,
                        'goods_id'=>$data['id']
                        ));
                }
            }
        }
        // 处理商品图片
        if($this->hasimg($_FILES['goods_pics']['tmp_name'])){
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     3145728 ;// 设置附件上传大小
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            // $upload->autoSub = false;
            $upload->savePath  =      './Public/Uploads/Goods/'; // 设置附件上传目录
            $upload->rootPath  =      './';
            $info   =   $upload->upload(array('goods_pics'=>$_FILES['goods_pics']));
            $image = new \Think\Image();
            $goodspic=D('GoodsPic');
            foreach ($info as $k=> $v) {
                $original=$v['savepath'].$v['savename'];
                $image->open($original);
                $max_thumb=$v['savepath'].'max_'.$v['savename'];
                $sm_thumb=$v['savepath'].'sm_'.$v['savename'];
                $image->thumb(362, 362)->save($max_thumb);
                $image->thumb(67, 67)->save($sm_thumb);
                $goodspic->add(array(
                    'goods_id'=>$data['id'],
                    'original'=>$original,
                    'max_thumb'=>$max_thumb,
                    'sm_thumb'=>$sm_thumb
                    ));
            }
        }

        //处理商品属性
        $goods_attr=I('goods_attr');
        $goods_price=I('goods_price');
        if($goods_attr){
            $goodsattr=D('GoodsAttr');
            $i=0;
            foreach ($goods_attr as $k=>$v) {
                if(is_array($v)){
                    foreach ($v as $k1 => $v1) {
                       $goodsattr->add(array(
                        'goods_id'=>$data['id'],
                        'attr_id'=>$k,
                        'attr_value'=>$v1,
                        'attr_price'=>$goods_price[$i],
                    ));
                       $i++;
                    }
                }else{
                    $goodsattr->add(array(
                        'goods_id'=>$data['id'],
                        'attr_id'=>$k,
                        'attr_value'=>$v,
                        'attr_price'=>$goods_price[$i],
                    ));
                    $i++;
                }
            }
        }

        //处理商品推荐位
        $recid=I('recid');
        if($recid){
            foreach ($recid as $k => $v) {
                D('recvalue')->add(array(
                    'valueid'=>$data['id'],
                    'recid'=>$v,
                    'rectype'=>1,
                    ));
            }
        }
    }

    public function hasimg($files){
        foreach ($files as $k => $v) {
            if($v){
                return true;
            }
        }

        return false;
    }

    public function getRadioAttr($goods_id){
        $sql="
            SELECT a.id,a.attr_id,a.attr_value,b.attr_name
            FROM  sp_goods_attr a LEFT JOIN sp_attr b ON a.attr_id=b.id
            WHERE a.goods_id = $goods_id AND b.attr_type='1'";

        return $this->query($sql);
    }





}