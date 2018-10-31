<?php
namespace Admin\Controller;
class CategoryController extends CommonController {

    public function lst(){
        $category=D('category');
        $list = $category->order('id desc')->select();
        $this->assign('list',$list);// 赋值数据集
        $this->display();

    }

    public function add(){
        $category=D('category');
        if(IS_POST){
            if($category->create()){
                if($category->type=='on'){
                    $category->type=1;
                }else{
                    $category->type=0;
                }
                if($category->add()){
                    $this->success('添加栏目成功！',U('lst'));
                }else{
                    $this->error('添加栏目失败！');
                }
            }else{
                $this->error($category->getError());
            }
            return;
        }

        $this->display();
    }

    public function edit(){
        $category=D('category');
        if(IS_POST){
            if($category->create()){
                if($category->type=='on'){
                    $category->type=1;
                }else{
                    $category->type=0;
                }
                if($category->save() !== false){
                    $this->success('修改栏目成功！',U('lst'));
                }else{
                    $this->error('修改栏目失败！');
                }
            }else{
                $this->error($category->getError());
            }
            return;
        }
        $categorys=$category->find(I('id'));
        $this->assign('categorys',$categorys);
        $this->display();
    }


    public function del(){
        if(D('category')->delete(I('id'))){
            $this->success('删除栏目成功！',U('lst'));
        }else{
            $this->error('删除栏目失败！');
        }
    }

    

    


















}