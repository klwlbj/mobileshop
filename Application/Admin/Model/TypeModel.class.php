<?php
namespace Admin\Model;
use Think\Model;
class TypeModel extends Model {

    protected $_validate = array(
      array('type_name','require','类型名称不得为空！',1), 
      array('type_name','','类型名称不得重复！',1,'unique'), 
    );

    public function _before_delete($option){
    	
    	$this->execute('DELETE FROM sp_attr WHERE type_id='.$option['where']['id']);
    }

    

    



    
}