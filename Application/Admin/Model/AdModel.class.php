<?php
namespace Admin\Model;
use Think\Model;
class AdModel extends Model {

    // protected $_validate = array(
    //   array('pname','require','广告位名称不得为空！',1), 
    //   array('width','require','广告位宽度不得为空！',1), 
    //   array('height','require','广告位高度不得为空！',1), 
    //   array('pname','','广告位名称不得重复！',1,'unique',3),
    // );

    

    public function _before_delete($option){
        $id=$option['where']['id'];
        $ads=D('ad')->find($id);
        if($ads['type']==1){
            if(file_exists($ads['picurl'])){
                @unlink($ads['picurl']);
            }
        }else{
               $adpicres=D('adpic')->where(array('adid'=>$id))->select(); 
               if($adpicres){
                    foreach ($adpicres as $k=>$v) {
                       if(file_exists($v['imgurl'])){
                        @unlink($v['imgurl']);
                    } 
                }
                D('adpic')->where(array('adid'=>$id))->delete();
           }
        }
        // $this->field('brand_logo')->find($id);
        // if($this->brand_logo){
        //     if(file_exists($this->brand_logo)){
        //         @unlink($this->brand_logo);
        //     }

        // }

    }

  public function _before_insert(&$data,$option){

    if($data['type']==1){
      if($_FILES['picurl']['tmp_name']){
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     3145728 ;// 设置附件上传大小
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            // $upload->autoSub = false;
            $upload->savePath  =      './Public/Uploads/Ad/'; // 设置附件上传目录
            $upload->rootPath  =      './'; 
            $info   =   $upload->uploadOne($_FILES['picurl']);
            $picurl=$info['savepath'].$info['savename'];
            $data['picurl']=$picurl;
        }
    }
    //处理广告的启动状态
    if($data['ison']==1){
          $this->where(array('posid'=>$data['posid']))->setField('ison',0);
        }

  }


  public function _after_insert($data,$option){
    if($data['type']==2){
      if($this->hasimg($_FILES['imgurl']['tmp_name'])){
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     3145728 ;// 设置附件上传大小
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            // $upload->autoSub = false;
            $upload->savePath  =      './Public/Uploads/Ad/'; // 设置附件上传目录
            $upload->rootPath  =      './'; 
            $info   =   $upload->upload(array('imgurl'=>$_FILES['imgurl']));
            // dump($info); die;
            $adpic=D('adpic');
            $links=I('links');
            foreach ($info as $k=> $v) {
                $imgurl=$v['savepath'].$v['savename'];
                $adpic->add(array(
                    'adid'=>$data['id'],
                    'imgurl'=>$imgurl,
                    'links'=>$links[$k],
                    ));
            }
        }
    }
  }

  public function _before_update(&$data,$option){
        if($_FILES['picurl']['tmp_name']){
            if(I('oldpicurl')){
                if(file_exists(I('oldpicurl'))){
                @unlink(I('oldpicurl'));
                }
            }
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     3145728 ;// 设置附件上传大小
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->autoSub = false;
            $upload->savePath  =      './Public/Uploads/Ad/'; // 设置附件上传目录
            $upload->rootPath  =      './'; 
            $info   =   $upload->uploadOne($_FILES['picurl']);
            $picurl=$info['savepath'].$info['savename'];
            $data['picurl']=$picurl;
        }
        //处理广告的启动状态
        if($data['ison']==1){
          $this->where(array('posid'=>$data['posid']))->setField('ison',0);
        }
        
    }


    public function _after_update($data,$option){
        //动画广告修改新增图片的情况
        if($data['type']==2){
          if($this->hasimg($_FILES['imgurl']['tmp_name'])){
                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize   =     3145728 ;// 设置附件上传大小
                $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                // $upload->autoSub = false;
                $upload->savePath  =      './Public/Uploads/Ad/'; // 设置附件上传目录
                $upload->rootPath  =      './'; 
                $info   =   $upload->upload(array('imgurl'=>$_FILES['imgurl']));
                // dump($info); die;
                $adpic=D('adpic');
                $links=I('links');
                foreach ($info as $k=> $v) {
                    $imgurl=$v['savepath'].$v['savename'];
                    $adpic->add(array(
                        'adid'=>$data['id'],
                        'imgurl'=>$imgurl,
                        'links'=>$links[$k],
                        ));
                }
            }
        }

        //动画广告修改修改的情况
        if($data['type']==2){
          if($this->hasimg($_FILES['old_imgurl']['tmp_name'])){
                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize   =     3145728 ;// 设置附件上传大小
                $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                // $upload->autoSub = false;
                $upload->savePath  =      './Public/Uploads/Ad/'; // 设置附件上传目录
                $upload->rootPath  =      './'; 
                $info   =   $upload->upload(array('old_imgurl'=>$_FILES['old_imgurl']));
                // dump($info); die;
            }

            $adpic=D('adpic');
            $links=I('old_links');
            $i=0;
            foreach ($links as $k=> $v) {
                if($info[$i]){
                    $adpic->find($k);
                    @unlink($adpic->imgurl);
                    $imgurl=$info[$i]['savepath'].$info[$i]['savename'];
                    $adpic->where(array('id'=>$k))->save(array(
                            'links'=>$links[$k],
                            'imgurl'=>$imgurl,
                        ));
                }else{
                    
                $adpic->where(array('id'=>$k))->save(array(
                    'links'=>$links[$k],
                    ));
                }
                $i++;
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

    



    
}