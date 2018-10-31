<?php
namespace Admin\Model;
use Think\Model;
class AdposModel extends Model {

    protected $_validate = array(
      array('pname','require','广告位名称不得为空！',1), 
      array('width','require','广告位宽度不得为空！',1), 
      array('height','require','广告位高度不得为空！',1), 
      array('pname','','广告位名称不得重复！',1,'unique',3),
    );

    

    public function _before_delete($option){
        $id=$option['where']['id'];
        $adres=D('ad')->where(array('posid'=>$id))->select();
        if($adres){
          $adpic=D('adpic');
          $ad=D('ad');
          foreach ($adres as $k=>$v) {
            if($v['type']==1){  //图片类型
              if(file_exists($v['picurl'])){
                 @unlink($v['picurl']);
              }
            }else{
              $imgres=$adpic->where(array('adid'=>$v['id']))->select();
              if($imgres){
                foreach ($imgres as $k1 => $v1) {
                  if(file_exists($v1['imgurl'])){
                   @unlink($v1['imgurl']);
                  }
                  $adpic->where(array('adid'=>$v['id']))->delete();
                }
              }
            }
            $ad->where(array('posid'=>$id))->delete();
          }
        }
        // if($this->brand_logo){
        //     if(file_exists($this->brand_logo)){
        //         @unlink($this->brand_logo);
        //     }

        // }

    }

    



    
}