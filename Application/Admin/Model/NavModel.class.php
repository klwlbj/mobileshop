<?php
namespace Admin\Model;
use Think\Model;
class NavModel extends Model {

    protected $_validate = array(
      array('nav_name','require','导航名称不得为空！',1), 
      array('nav_url','require','导航地址不得为空！',1), 
      array('nav_pos','require','导航位置必选！',1), 
      array('nav_blank','require','导航新窗口必选！',1), 
      array('nav_name','','导航名称不得重复！',1,'unique'), 
    );

    

    



    
}