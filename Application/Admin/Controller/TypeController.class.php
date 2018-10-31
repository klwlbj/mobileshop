<?php
namespace Admin\Controller;
class TypeController extends CommonController {

    public function lst(){
        $type=D('type');
        $count= $type->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count,2);// 
        $show = $Page->show();// 分页显示输出
        $list = $type->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display();

    }

    public function add(){
        $type=D('type');
        if(IS_POST){
            if($type->create()){
                if($type->add()){
                    $this->success('添加类型成功！',U('lst'));
                }else{
                    $this->error('添加类型失败！');
                }
            }else{
                $this->error($type->getError());
            }
            return;
        }

        $this->display();
    }

    public function edit(){
        $type=D('type');
        if(IS_POST){
            if($type->create()){
                if($type->save()){
                    $this->success('修改类型成功！',U('lst'));
                }else{
                    $this->error('修改类型失败！');
                }
            }else{
                $this->error($type->getErro());
            }
            return;
        }
        $types=$type->find(I('id'));
        $this->assign('types',$types);
        $this->display();
    }


    public function del(){
        if(D('type')->delete(I('id'))){
            $this->success('删除类型成功！',U('lst'));
        }else{
            $this->error('删除类型失败！');
        }
    }

    

    


















}