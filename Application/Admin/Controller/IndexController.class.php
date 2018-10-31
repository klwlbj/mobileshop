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


    public function dds(){

        $dingdan=D('dingdans')->select();
        $goods=D("goods");
        foreach ($dingdan as $key => &$value) {
            $good=$goods->find($value['sid']);
            $value['goods_name']=$good['goods_name'];
        }

        $this->assign('dingdan',$dingdan);
        $this->display();
    }



}