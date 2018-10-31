<?php
namespace Admin\Controller;
class ConfigController extends CommonController {

    public function lst(){
        $config=D('config');
        $count= $config->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count,2);// 
        $show = $Page->show();// 分页显示输出
        $list = $config->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display();

    }

    public function add(){
        $config=D('config');
        if(IS_POST){
            if($config->create()){
                if($config->add()){
                    $this->success('添加配置项成功！',U('lst'));
                }else{
                    $this->error('添加配置项失败！');
                }
            }else{
                $this->error($config->getError());
            }
            return;
        }

        $this->display();
    }

    public function edit(){
        $config=D('config');
        if(IS_POST){
            if($config->create()){
                if($config->save()){
                    $this->success('修改配置项成功！',U('lst'));
                }else{
                    $this->error('修改配置项失败！');
                }
            }else{
                $this->error($config->getError());
            }
            return;
        }
        $configs=$config->find(I('id'));
        $this->assign('configs',$configs);
        $this->display();
    }


    public function del(){
        if(D('config')->delete(I('id'))){
            $this->success('删除配置项成功！',U('lst'));
        }else{
            $this->error('删除配置项失败！');
        }
    }

    public function config(){
        if(IS_POST){
            $_post=I('post.');
            foreach ($_post as $k => $v) {
               $post[]=$k;
            }
            $_ennameres=D('config')->field('enname')->select();
            foreach ($_ennameres as $k => $v) {
                $ennameres[]=$v['enname'];
            }
            foreach ($ennameres as $v) {
                if(!in_array($v, $post)){
                    $arr[]=$v;
                }
            }
            if($_post){
                foreach ($_post as $k => $v) {
                   D('config')->where(array('enname'=>$k))->save(array('value'=>$v));
                } 
                foreach ($arr as $k => $v) {
                    D('config')->where(array('enname'=>$v))->save(array('value'=>NULL));
                }
                $this->success('修改配置项成功！',U('config'));
            }else{
                $this->error('数据发送有误！');
            }
            return;
        }
        $configres=D('config')->select();
        $this->assign('configres',$configres);
        $this->display();
    }


    

    


















}