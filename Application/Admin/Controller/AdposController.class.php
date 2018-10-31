<?php
namespace Admin\Controller;
class AdposController extends CommonController {

    public function lst(){
        $adpos=D('adpos');
        $count= $adpos->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count,2);// 
        $show = $Page->show();// 分页显示输出
        $list = $adpos->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display();

    }

    public function add(){
        $adpos=D('adpos');
        if(IS_POST){
            if($adpos->create()){
                if($adpos->add()){
                    $this->success('添加广告位成功！',U('lst'));
                }else{
                    $this->error('添加广告位失败！');
                }
            }else{
                $this->error($adpos->getError());
            }
            return;
        }

        $this->display();
    }

    public function edit(){
        $adpos=D('adpos');
        if(IS_POST){
            if($adpos->create()){
                if($adpos->save() !== false){
                    $this->success('修改广告位成功！',U('lst'));
                }else{
                    $this->error('修改广告位失败！');
                }
            }else{
                $this->error($adpos->getError());
            }
            return;
        }
        $adpos=$adpos->find(I('id'));
        $this->assign('adpos',$adpos);
        $this->display();
    }


    public function del(){
        if(D('adpos')->delete(I('id'))){
            $this->success('删除广告位成功！',U('lst'));
        }else{
            $this->error('删除广告位失败！');
        }
    }

    

    


















}