<?php
namespace Admin\Controller;
class RecposController extends CommonController {

    public function lst(){
        $recpos=D('recpos');
        $count= $recpos->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count,6);// 
        $show = $Page->show();// 分页显示输出
        $list = $recpos->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display();

    }

    public function add(){
        $recpos=D('recpos');
        if(IS_POST){
            if($recpos->create()){
                if($recpos->add()){
                    $this->success('添加推荐位成功！',U('lst'));
                }else{
                    $this->error('添加推荐位失败！');
                }
            }else{
                $this->error($recpos->getError());
            }
            return;
        }

        $this->display();
    }

    public function edit(){
        $recpos=D('recpos');
        if(IS_POST){
            if($recpos->create()){
                if($recpos->save() !== false){
                    $this->success('修改推荐位成功！',U('lst'));
                }else{
                    $this->error('修改推荐位失败！');
                }
            }else{
                $this->error($recpos->getError());
            }
            return;
        }
        $recpos=$recpos->find(I('id'));
        $this->assign('recpos',$recpos);
        $this->display();
    }


    public function del(){
        if(D('recpos')->delete(I('id'))){
            $this->success('删除推荐位成功！',U('lst'));
        }else{
            $this->error('删除推荐位失败！');
        }
    }

    

    


















}