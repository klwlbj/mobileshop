<?php
namespace Home\Controller;
use Think\Crypt;
class UserController extends CommonController {

    public function reg(){
        // if(session('id')||session('username')){
        //     $this->error('您已经处于登录状态！');
        // }
        if(IS_POST){
            $member=D('member');
            if($member->create()){
                $username=$member->username;
                $password=$member->password;
                if($member->add()){
                    $member->username=$username;
                    $member->password=$password;
                    $member->login();
                    $this->success('注册会员成功！',U('index/index'));
                }else{
                    $this->error('注册会员失败！');
                }
            }else{
                $this->error($member->getError());
            }
            return;
        }
        $this->display();
    }


    public function verify(){
        $Verify = new \Think\Verify();
        $Verify->length=4;
        $Verify->entry();
    }

    public function check_email(){
        $member=D('member');
        $data=$member->where(array('mail_str'=>I('es')))->field('id')->find();
        if($data){
            $member->where(array('id'=>$data['id']))->setField('check_mail',1);
            $member->where(array('id'=>$data['id']))->setField('mail_str','');
            $this->success('验证邮箱成功！',u('index/index'));
        }else{
            $this->success('验证邮箱失败！',u('reg'));
        }
    }

    public function login(){
        // if(session('id')||session('username')){
        //     $this->error('您已经处于登录状态！');
        // }
        if(IS_POST){
            $member=D('member');
            if($member->create($_POST,4)){
                $res=$member->login();
                if($res){
                    $returnUrl=session('returnUrl');
                    if($returnUrl){
                        session('returnUrl',null);
                        $this->success('登录成功！',U($returnUrl));
                    }else{
                       $this->success('登录成功！',U('index/index')); 
                    }
                    exit;
                }else{
                    $this->error('用户名或者密码错误！');
                }
            }else{
                $this->error($member->getError());
            }
        }
        $this->display();
    }

    public function checklogin(){
        $userid=session('id');
        if($userid){
            echo json_encode(array(
                'userid'=>$userid,
                'username'=>session('username'),
                ));
        }else{
            if(isset($_COOKIE['username']) && isset($_COOKIE['password'])){
                $des_key=C('DES_KEY');
                $member=D('member');
                $member->username=trim(Crypt::decrypt($_COOKIE['username'],$des_key));
                $member->password=trim(Crypt::decrypt($_COOKIE['password'],$des_key));
                if($member->login()==true){
                    echo json_encode(array(
                    'userid'=>session('id'),
                    'username'=>$member->username,
                    ));
                }
            }else{
                echo 0;
            }
        }
    }

    public function logout(){
        // if(!session('id')){
        //     $this->error('您还没有登录！');
        // }
        $member=D('member');
        $member->logout();
        $this->success('退出成功！',U('login'));
    }

    public function ceshi(){
        $des_key=C('DES_KEY');
        $a='abcdefg';
        $b=Crypt::encrypt($a,$des_key);
        echo $b;
        $c=Crypt::decrypt($b,$des_key);
        echo "<br/>".$c;
    }

}