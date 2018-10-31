<?php
namespace Admin\Model;
use Think\Model;
class BrandModel extends Model {

    protected $_validate = array(
      array('brand_name','require','品牌名称不得为空！',1), 
    );

    public function _before_insert(&$data,$option){
        if($_FILES['brand_logo']['tmp_name']){
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     3145728 ;// 设置附件上传大小
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->autoSub = false;
            $upload->savePath  =      './Public/Uploads/Brand/'; // 设置附件上传目录
            $upload->rootPath  =      './'; 
            $info   =   $upload->uploadOne($_FILES['brand_logo']);
            $logo=$info['savepath'].$info['savename'];
            $image = new \Think\Image(); 
            $image->open($logo);
            $image->thumb(100, 30)->save($logo);
            $data['brand_logo']=$logo;
        }
    }

    public function _before_update(&$data,$option){
        if($_FILES['brand_logo']['tmp_name']){
            if(I('oldlogo')){
                if(file_exists(I('oldlogo'))){
                @unlink(I('oldlogo'));
                }
            }
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     3145728 ;// 设置附件上传大小
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->autoSub = false;
            $upload->savePath  =      './Public/Uploads/Brand/'; // 设置附件上传目录
            $upload->rootPath  =      './'; 
            $info   =   $upload->uploadOne($_FILES['brand_logo']);
            $logo=$info['savepath'].$info['savename'];
            $image = new \Think\Image(); 
            $image->open($logo);
            $image->thumb(100, 30)->save($logo);
            $data['brand_logo']=$logo;
        }
    }

    public function _before_delete($option){
        $id=$option['where']['id'];
        $this->field('brand_logo')->find($id);
        if($this->brand_logo){
            if(file_exists($this->brand_logo)){
                @unlink($this->brand_logo);
            }

        }

    }

    



    
}