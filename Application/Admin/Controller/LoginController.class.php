<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index(){
    	$admin=D('admin');
    	if(IS_POST){
    		if($admin->create($_POST,4)){
    			if($admin->login()){
    				$this->success('登录成功，跳转中...',U('Index/index'));
    			}else{
    				$this->error('用户名或者密码错误！');
    			}
    		}else{
    			$this->error($admin->getError());
    		}

    		return;
    	}

        $this->display();
    }

    public function verify(){

        ob_clean();
    	$Verify = new \Think\Verify();
    	$Verify->length=4;
    	$Verify->entry();
    }














}