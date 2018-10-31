<?php
namespace M\Controller;
use Think\Controller;
class CommonController extends Controller {

    public $config;
    public function _initialize(){
       //底部帮助信息
        $this->gethelp();
        $this->getnav();
    	$this->getconfig();
    }

    public function gethelp(){
    	$hcres=D('category')->where(array('type'=>1))->select();
    	foreach ($hcres as $k => $v) {
    		$hcres[$k]['article']=D('article')->where(array('cateid'=>$v['id']))->select();
    	}
    	// $hares=D('article')->select();
    	// $this->assign(array(
    	// 	'hcres'=>$hcres,
    	// 	'hares'=>$hares,
    	// 	));
    	$this->assign('hcres',$hcres);
    }

    public function getnav(){
        $nav_res=D('nav')->select();
        $navres=array();
        foreach ($nav_res as $k=>$v) {
            $navres[$v['nav_pos']][]=$v;
        }
        $this->assign(array(
            'topnav'=>$navres['1'],
            'midnav'=>$navres['2'],
            'bottomnav'=>$navres['3'],
            ));
    }

    public function getconfig(){
        $_configres=D('config')->field('enname,value')->select();
        foreach ($_configres as $k => $v) {
            $configres[$v['enname']]=$v['value'];
        }
        $this->config=$configres;
        $this->assign('configres',$configres);
    }
}