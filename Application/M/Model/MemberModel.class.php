<?php
namespace Home\Model;
use Think\Model;
use Think\Crypt;
class MemberModel extends Model{
    
	protected $_validate = array(
      array('username','/^[\w\x80-\xff]{3,15}$/','用户名格式不正确！',1), 
      array('isreg','require','必须同意协议才能注册！',1,'regex',1), 
      //array('email','email','邮箱格式不正确！',1,'regex',1), 
      array('password','/^[\w]{6,15}$/','密码格式不正确！',1), 
      //array('confirm_password','password','两次密码输入不一致！',1,'confirm',1), 
      array('username','','用户名已经存在！',1,'unique',1), 
      //array('email','','邮箱已经存在！',1,'unique',1), 
      array('imgcode','verify','验证码不正确！',1,'callback'), 
            
            
      //array('user','/^[\w\x80-\xff]{3,15}$/','用户名格式不正确！',1), 
    );


    public function verify($code){
    	$verify = new \Think\Verify();
    	return $verify->check($code, '');
    }

    public function _before_insert(&$data,$option){
    	$data['regtime']=time();
    	$data['password']=md5($data['password']);
    	$data['mail_str']=md5(uniqid());
    }

    public function _after_insert($data,$option){
    	$content="复制以下链接到浏览器，完整账号邮箱验证：http://127.0.0.1/shop/index.php/Home/User/check_email/es/".$data['mail_str'];
    	SendMail($data['email'],'美丽说商城账号验证',$content);
    }

    public function login(){
    	$password=$this->password;
    	$username=$this->username;
    	$user=$this->where(array('username'=>$username))->find();
    	if($user){
    		if($user['password']==md5($password)){
    			session('id',$user['id']);
    			session('username',$user['username']);
          if(I('remember')){
             $amoth=time()+30*24*3600;
             $des_key=C('DES_KEY');   
             $cusername=Crypt::encrypt($username,$des_key);  
             $cpassword=Crypt::encrypt($password,$des_key);
             setcookie('username',$cusername,$amoth,'/');
             setcookie('password',$cpassword,$amoth,'/');     
          }
          $memberLevel=D('memberLevel');
          $memberLevel->where("{$user['points']} BETWEEN points_min AND points_max")->find();
          session('rate',$memberLevel->rate);
          session('levelId',$memberLevel->id);
    			return true;
    		}
    	}

    	return false;
    }

    public function logout(){
    	session(null);
      setcookie('username','',1,'/');
      setcookie('password','',1,'/');
    }















}