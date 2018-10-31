<?php
namespace Admin\Model;
use Think\Model;
class AdminModel extends Model {

    protected $_validate = array(
      array('username','require','管理员名称不得为空！',1), 
      array('password','require','管理员密码不得为空！',1,regex,1), 
      array('username','','管理员名称已经存在！',1,'unique',1), 
      array('username','','管理员名称已经存在！',1,'unique',2), 
      array('verify','verify','验证码不正确！',1,'callback',4), 
    );

    public function login(){
    	$password=$this->password;
    	$info=$this->where("username='$this->username'")->find();
    	if($info){
    		if($info['password']==md5($password)){
    			session('uid',$info['id']);
    			session('uname',$info['username']);
    			return true;
    		}else{
    			return false;
    		}
    	}else{
    		return false;
    	}
    }

    public function verify($code){
    	$verify = new \Think\Verify();
    	return $verify->check($code, '');
    }



    
}