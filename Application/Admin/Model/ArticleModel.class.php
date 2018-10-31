<?php
namespace Admin\Model;
use Think\Model;
class ArticleModel extends Model {

    protected $_validate = array(
      array('title','require','文章标题不得为空！',1), 
      array('content','require','文章内容不得为空！',1), 
      array('cateid','require','所属栏目不得为空！',1), 
      array('title','','文章标题已经存在！',1,'unique',3),
    );

    



    



    
}