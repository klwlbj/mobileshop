<?php
namespace Admin\Model;
use Think\Model;
class AttrModel extends Model {

    protected $_validate = array(
      array('attr_name','require','属性名称不得为空！',1), 
      array('attr_name','','属性名称不得重复！',1,'unique'), 
    );

    public function _before_insert(&$data,$option){
    	$data['attr_values']=str_replace('，', ',', $data['attr_values']);
    }

    public function _before_update(&$data,$option){
    	$data['attr_values']=str_replace('，', ',', $data['attr_values']);
    }

    

    



    
}