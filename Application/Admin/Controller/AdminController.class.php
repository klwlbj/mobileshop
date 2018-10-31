<?php
namespace Admin\Controller;
class AdminController extends CommonController {

    public function lst(){
        $admin=D('admin');
        $count=$admin->count();// 查询满足要求的总记录数
        $Page= new \Think\Page($count,3);// 实例化分页类 传入总记录数和每页显示的
        $Page->setConfig('prev','上一页');
        $Page->setConfig('next','下一页');
        $Page->setConfig('first','首页');
        $Page->setConfig('last','共%TOTAL_PAGE%页');
        $show= $Page->show();// 分页显示输出
        $adminres = $admin->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('page',$show);// 赋值分页输出
        $this->assign('adminres',$adminres);
        $this->display();
    }

    

    public function add(){
    	$admin=D('admin');
        if(IS_POST){
            if($admin->create()){
    			$admin->password=md5($admin->password);
    			if($admin->add()){
    				$this->success('管理员添加成功！',U('lst'));
    			}else{
    				$this->error('管理员添加失败！');
    			}
    		}else{
    			$this->error($admin->getError());
    		}
    		return;
    	}
        $this->display();
    }

    public function edit(){
        $admin=D('admin');
        $admins=$admin->find(I('id'));
        if(IS_POST){
            if($admin->create()){
                if(I('password')){
                    $admin->password=md5(I('password'));
                }else{
                    $admin->password=$admins['password'];     
                }
                if($admin->save() !== false){
                    $this->success('修改管理员成功！',U('lst'));
                }else{
                    $this->error('修改管理员失败！');
                }
            }else{
                $this->error($admin->getError());
            }
            return;
        }
        $this->assign('admins',$admins);
        $this->display();
    }

    public function del(){
        $admin=D('admin');
        if($admin->delete(I('id'))){
            $this->success('删除管理员成功！');
        }else{
            $this->error('删除管理员失败！');
        }
    }

    public function logout(){
        session(null);
        $this->success('退出成功！',U('Login/index'));

    }















}