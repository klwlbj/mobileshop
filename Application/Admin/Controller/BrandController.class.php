<?php
namespace Admin\Controller;
class BrandController extends CommonController {

    public function lst(){
        $brand=D('brand');
        $count= $brand->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count,20);// 
        $show = $Page->show();// 分页显示输出
        $list = $brand->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display();

    }

    public function add(){
        $brand=D('brand');
        if(IS_POST){
            if($brand->create()){
                if($brand->add()){
                    $this->success('添加品牌成功！',U('lst'));
                }else{
                    $this->error('添加品牌失败！');
                }
            }else{
                $this->error($brand->getError());
            }
            return;
        }

        $this->display();
    }

    public function edit(){
        $brand=D('brand');
        if(IS_POST){
            if($brand->create()){
                if($brand->save()){
                    $this->success('修改品牌成功！',U('lst'));
                }else{
                    $this->error('修改品牌失败！');
                }
            }else{
                $this->error($brand->getError());
            }
            return;
        }
        $brands=$brand->find(I('id'));
        $this->assign('brands',$brands);
        $this->display();
    }


    public function del(){
        if(D('brand')->delete(I('id'))){
            $this->success('删除品牌成功！',U('lst'));
        }else{
            $this->error('删除品牌失败！');
        }
    }

    

    


















}