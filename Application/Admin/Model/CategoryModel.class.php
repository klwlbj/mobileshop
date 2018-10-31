<?php
namespace Admin\Model;
use Think\Model;
class CategoryModel extends Model {

    protected $_validate = array(
      array('catename','require','栏目名称不得为空！',1), 
      array('catename','','栏目名称已经存在！',1,'unique',3),
    );

    

    public function _before_delete($option){
        $id=$option['where']['id'];
        D('article')->where(array('cateid'=>$id))->delete();

    }

    



    
}