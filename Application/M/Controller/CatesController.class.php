<?php
namespace M\Controller;
//use Think\Controller;
class CatesController extends CommonController {
    public function index()
    {
        $cate=D('cate');
        $cate1=$cate->where(array('pid'=>'0'))->select();
        dump($cate1);die;
        $this->assign('cate1',$cate1);
        $this->display();

    }
}