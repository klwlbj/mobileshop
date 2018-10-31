<?php
namespace Admin\Model;
use Think\Model;
class RecposModel extends Model {

    protected $_validate = array(
      array('recname','require','推荐位名称不得为空！',1), 
      array('rectype','require','推荐位类型不得为空！',1), 
      array('recname','','推荐位名称已经存在！',1,'unique',3),
    );
    
    public function _before_delete($option){
        $id=$option['where']['id'];
        D('recvalue')->where(array('recid'=>$id))->delete();

    }



    
}