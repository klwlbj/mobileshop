<?php
namespace Admin\Model;
use Think\Model;
class MemberLevelModel extends Model {

    protected $_validate = array(
      array('level_name','require','会员等级名称不得为空！',1), 
      array('points_min','require','积分下限不得为空！',1), 
      array('points_max','require','积分上限不得为空！',1), 
      array('rate','require','折扣率不得为空！',1), 
      array('level_name','','会员等级名称不得重复！',1,unique), 
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


    



    
}