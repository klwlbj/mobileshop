<?php
namespace Admin\Controller;
class AttrController extends CommonController {

    public function lst(){
        $attr=D('attr');
        $count= $attr->where(array('type_id'=>I('typeid')))->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count,2);// 
        $show = $Page->show();// 分页显示输出
        $list = $attr->order('id desc')->where(array('type_id'=>I('typeid')))->limit($Page->firstRow.','.$Page->listRows)->select();
        $typeres=D('type')->select();
        $typeid=I('typeid'); //属性所属类型的id
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->assign('typeres',$typeres);// 分配类型
        $this->assign('typeid',$typeid);// 分配类型
        $this->display();

    }

    public function add($typeid){
        $attr=D('attr');
        if(IS_POST){
            if($attr->create()){
                if($attr->add()){
                    $this->success('添加属性成功！',U('lst',array('typeid'=>$typeid)));
                }else{
                    $this->error('添加属性失败！');
                }
            }else{
                $this->error($attr->getError());
            }
            return;
        }
        $typeres=D('type')->select();
        $typeid=I('typeid'); //属性所属类型的id
        $this->assign('typeres',$typeres);// 分配类型
        $this->assign('typeid',$typeid);// 分配类型
        $this->display();
    }

    public function edit($typeid){
        $attr=D('attr');
        if(IS_POST){
            if($attr->create()){
                $save=$attr->save();
                if($save !== false){
                    $this->success('修改属性成功！',U('lst',array('typeid'=>$typeid)));
                }else{
                    $this->error('修改属性失败！');
                }
            }else{
                $this->error($attr->getError());
            }
            return;
        }
        $attrs=$attr->find(I('id'));
        $typeres=D('type')->select();
        $typeid=I('typeid'); //属性所属类型的id
        $this->assign('typeres',$typeres);// 分配类型
        $this->assign('typeid',$typeid);// 分配类型
        $this->assign('attrs',$attrs);
        $this->display();
    }


    public function del($typeid){
        if(D('attr')->delete(I('id'))){
            $this->success('删除属性成功！',U('lst',array('typeid'=>$typeid)));
        }else{
            $this->error('删除属性失败！');
        }
    }

    

    


















}