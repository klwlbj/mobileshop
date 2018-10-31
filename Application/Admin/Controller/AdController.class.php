<?php
namespace Admin\Controller;
class AdController extends CommonController {

    public function lst(){
        $ad=D('ad');
        $count= $ad->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count,2);// 
        $show = $Page->show();// 分页显示输出
        $list = $ad->field('a.*,b.pname')->alias('a')->join('LEFT JOIN sp_adpos b ON a.posid=b.id')->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display();

    }

    public function add(){
        $ad=D('ad');
        if(IS_POST){
            if($ad->create()){
                if($ad->add()){
                    $this->success('添加广告成功！',U('lst'));
                }else{
                    $this->error('添加广告失败！');
                }
            }else{
                $this->error($ad->getError());
            }
            return;
        }

        $adposres=D('adpos')->select();
        $this->assign('adposres',$adposres);
        $this->display();
    }



    public function edit(){
        $ad=D('ad');
        if(IS_POST){
            if($ad->create()){
                if(!$ad->ison){
                    $ad->ison=0;
                }
                if($ad->save() !== false){
                    $this->success('修改广告成功！',U('lst'));
                }else{
                    $this->error('修改广告失败！');
                }
            }else{
                $this->error($ad->getError());
            }
            return;
        }
        $id=I('id');
        $ads=$ad->find($id);
        if($ads['type']==2){
            $adpicres=D('adpic')->where(array('adid'=>$id))->select();
            $this->assign('adpicres',$adpicres);
        }
        $adposres=D('adpos')->select();
        $this->assign(array(
            'adposres'=>$adposres,
            'ads'=>$ads,
            ));
        $this->display();
    }


    public function del(){
        if(D('ad')->delete(I('id'))){
            $this->success('删除广告成功！',U('lst'));
        }else{
            $this->error('删除广告失败！');
        }
    }

 
    public function ajaxdeladpic($id){
        $adpic=D('adpic');
        $adpics=$adpic->find($id);
        if(file_exists($adpics['imgurl'])){
                @unlink($adpics['imgurl']);
        }
        $adpic->delete($id);

    }

    

    


















}