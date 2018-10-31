<?php
namespace Admin\Controller;
class MemberLevelController extends CommonController {

    public function lst(){
        $memberLevel=D('memberLevel');
        $count= $memberLevel->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count,6);// 
        $show = $Page->show();// 分页显示输出
        $list = $memberLevel->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display();

    }

    public function add(){
        $memberLevel=D('memberLevel');
        if(IS_POST){
            if($memberLevel->create()){
                if($memberLevel->add()){
                    $this->success('添加会员等级成功！',U('lst'));
                }else{
                    $this->error('添加会员等级失败！');
                }
            }else{
                $this->error($memberLevel->getError());
            }
            return;
        }

        $this->display();
    }

    public function edit(){
        $memberLevel=D('memberLevel');
        if(IS_POST){
            if($memberLevel->create()){
                $save=$memberLevel->save();
                if($save !== false){
                    $this->success('修改会员等级成功！',U('lst'));
                }else{
                    $this->error('修改会员等级失败！');
                }
            }else{
                $this->error($memberLevel->getError());
            }
            return;
        }
        $memberLevels=$memberLevel->find(I('id'));
        $this->assign('memberLevels',$memberLevels);
        $this->display();
    }


    public function del(){
        if(D('memberLevel')->delete(I('id'))){
            $this->success('删除会员等级成功！',U('lst'));
        }else{
            $this->error('删除会员等级失败！');
        }
    }

    

    


















}