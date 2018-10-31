<?php
namespace Admin\Controller;
class NavController extends CommonController {

    public function lst(){
        $nav=D('nav');
        $count= $nav->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count,6);// 
        $show = $Page->show();// 分页显示输出
        $list = $nav->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display();

    }

    public function add(){
        $nav=D('nav');
        if(IS_POST){
            if($nav->create()){
                if($nav->add()){
                    $this->success('添加导航成功！',U('lst'));
                }else{
                    $this->error('添加导航失败！');
                }
            }else{
                $this->error($nav->getError());
            }
            return;
        }

        $this->display();
    }

    public function edit(){
        $nav=D('nav');
        if(IS_POST){
            if($nav->create()){
                if($nav->save()){
                    $this->success('修改导航成功！',U('lst'));
                }else{
                    $this->error('修改导航失败！');
                }
            }else{
                $this->error($nav->getError());
            }
            return;
        }
        $navs=$nav->find(I('id'));
        $this->assign('navs',$navs);
        $this->display();
    }


    public function del(){
        if(D('nav')->delete(I('id'))){
            $this->success('删除导航成功！',U('lst'));
        }else{
            $this->error('删除导航失败！');
        }
    }

    

    


















}