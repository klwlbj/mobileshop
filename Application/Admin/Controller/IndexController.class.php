<?php
namespace Admin\Controller;
class IndexController extends CommonController {
    public function index(){
        $this->display();
    }

    public function ip(){

        $ip=D('Ip')->order("id desc")->select();

        $this->assign('ip',$ip);
        $this->display();
    }


    public function dd(){
        $dingdan=D('dingdan')->select();
        $goods=D("goods");
        foreach ($dingdan as $key => &$value) {
            $good=$goods->find($value['sid']);
            $value['goods_name']=$good['goods_name'];
        }

        $this->assign('dingdan',$dingdan);
        $this->display();
    }
    public function del(){
        if(IS_GET){
            $id=I('get.id');
            $del=M('dingdans')->delete($id);
            if($del!==false){
                $this->redirect('Index/dds','',1, '<h1>删除成功...</h1>');
            }
            else{
                $this->redirect('Index/dds','',1, '<h1>删除失败...</h1>');
            }
        }
        else{
            $this->redirect('Index/dds','',1, '<h1>error</h1>...</h1>');
        }
    }
    public function edit(){
        if(IS_POST){
            $data=I('post.');
            $id=I('post.id');
            $oder_list=M("dingdans")->find($id);
            $oder_list['data'] = json_decode($oder_list['data']);
//            dump($oder_list['data']);die;
            $oder_list['data'][1]=$data['money'];
            //dump($oder_list['data'][1]);die;
            $data['data']=json_encode($oder_list['data']);
            //dump($data);die;
            $update=M("dingdans")->save($data);
            //dump($update);die;
            if($update!==false){
                $this->redirect('Index/dds','',1, '<h1>更新成功...</h1>');
            }
            else{
                $this->redirect('Index/dds','',1, '<h1>更新失败...</h1>');
            }
        }
        $dds=M("dingdans");
        $oder_list=$dds->find(I("get.id"));
        $oder_list['data'] = json_decode($oder_list['data']);
        // dump($oder_list);

        $this->assign('oder_list',$oder_list);
        $this->display();
    }
    public function editexp(){
        if(IS_POST){
            $data=I('post.');
            $id=I('post.id');
            $oder_list=M("dingdans")->find($id);
            $oder_list['data'] = json_decode($oder_list['data']);
//            dump($oder_list['data']);die;
            $oder_list['data'][1]=$data['money'];
            //dump($oder_list['data'][1]);die;
            $data['data']=json_encode($oder_list['data']);
            //dump($data);die;
            $update=M("dingdans")->save($data);
            //dump($update);die;
            if($update!==false){
                $this->redirect('Index/dds','',1, '<h1>更新成功...</h1>');
            }
            else{
                $this->redirect('Index/dds','',1, '<h1>更新失败...</h1>');
            }
        }
        $dds=M("dingdans");
        $oder_list=$dds->find(I("get.id"));
        $oder_list['data'] = json_decode($oder_list['data']);
        // dump($oder_list);

        $this->assign('oder_list',$oder_list);
        $this->display();
    }
    public function cancel(){
        $id=I('get.id');
        $data=array('cancel'=>2);
        $where=array('id'=>$id);
        $res=M('dingdans')->where($where)->save($data);
        if($res){
            $this->redirect('Index/dds');
        }
        else{
            $this->redirect('Index/dds','',1, '<h1>提交失败...</h1>');
        }

    }
    public function success(){
        $id=I('get.id');
        $data=array('success'=>1);
        $where=array('id'=>$id);
        $res=M('dingdans')->where($where)->save($data);
        if($res){
            $this->redirect('Index/dds');
        }
        else{
            $this->redirect('Index/dds','',1, '<h1>提交失败...</h1>');
        }

    }

    public function dds(){

        $dingdan=D('dingdans')->order('time desc')->select();
        $goods=D("goods");
        foreach ($dingdan as $key => &$value) {
            $good=$goods->find($value['sid']);
            $value['goods_name']=$good['goods_name'];

            $value['sid']=$good['id'];
            $value['data'] = json_decode($value['data']);
            if(count($value['data'][0])>=2){$value['goods_name']='多个商品';}
        }
        //dump($dingdan);die;

        $this->assign('dingdan',$dingdan);
        $this->display();
    }



}