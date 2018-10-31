<?php
namespace Home\Controller;
use Think\Crypt;
class RegisterController extends CommonController {

    public function index(){
        // if(session('id')||session('username')){
        //     $this->error('您已经处于登录状态！');
        // }
        
        //dump(I("post."));
        
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
    
    public function sendmail(){
        $data=rand(1111,9999);

        $send=SendMail('1358571698@qq.com','测试邮件','欢迎光临商城，您的验证码是：'.$data.'。请输入到网站的验证码输入框中！');
        dump($send);
    }
    


    public function regcode(){
        $Verify = new \Think\Verify();
        $Verify->length=4;
        $Verify->fontSize = 20;
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

   

}