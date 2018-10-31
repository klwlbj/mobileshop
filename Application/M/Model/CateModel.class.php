<?php
namespace Home\Model;
use Think\Model;
class CateModel extends Model{
    //$reccateid:首页大分类推荐位id,$recgoodsid:首页大分类商品推荐位id
    public function getreccates($reccateid,$recgoodsid,$limit){
    	$reccateids=D('recvalue')->field('valueid')->where(array('recid'=>$reccateid))->select();
    	$_recgoods=D('recvalue')->field('valueid')->where(array('recid'=>$recgoodsid))->select();
    	$recgoods=array();
    	foreach ($_recgoods as $k=>$v) {
    		$recgoods[]=$v['valueid'];
    	}
    	$reccatesres=array();
    	$cate=D('cate');
    	$goods=D('goods');
    	foreach ($reccateids as $k => $v) {
    		$reccatesres[$k]=$cate->field('id,catename')->find($v['valueid']);
    		$_cateids=$this->getchild($v['valueid']);
    		$cateids=implode(',', $_cateids);
    		$goodsids=D('goods')->field('id')->where("cate_id IN ($cateids)")->order('id desc')->select();
    		foreach ($goodsids as $k1 => $v1) {
    			if(in_array($v1['id'], $recgoods)){
    				if(count($reccatesres[$k]['recgoods'])>=$limit){
    					break;
    				}
    				$reccatesres[$k]['recgoods'][]=$goods->field('id,mid_thumb,market_price,shop_price')->find($v1['id']);
    			}
    		}
    	}
    	return $reccatesres;
    	
    }


    public function getchild($cateid){
        $data=$this->select();
        return $this->getchildids($data,$cateid,True);
    }

    public function getchildids($data,$cateid,$clear=False){
        static $ret=array();
        if($clear){
        	$ret=array();
        }
        $ret[]=$cateid;
        foreach ($data as $k => $v) {
            if($v['pid']==$cateid){
                $ret[]=$v['id'];
                $this->getchildids($data,$v['id']);
            }
        }
        return array_unique($ret);
    }

    //查找栏目的顶级栏目id
    public function getparent($cateid){
        $data=$this->select();
        return $this->getparentid($data,$cateid);
    }

    public function getparentid($data,$cateid){
        static $ret=array();
        $cates=$this->find($cateid);
        foreach ($data as $k => $v) {
            if($v['id']==$cateid && $v['pid']==0){
                return $cateid;
            }
            if($v['id']==$cates['pid']){
                $ret[]=$v['id'];
                $this->getparentid($data,$v['id']);
            }
        }
        foreach ($ret as $k => $v) {
            $retid=$v;
        }
        return $retid;
    }

    //查找栏目所有上级栏目的信息
    public function getparents($cateid){
        $data=$this->select();
        $pid=D('cate')->where(['id'=>$cateid])->getField('pid');
        return $this->_getparents($data,$pid);
    }

    private function _getparents($data,$pid){
        static $arr=array();
        foreach ($data as $k => $v) {
            if($v['id']==$pid){
                $arr[]=$v;
                $this->_getparents($data,$v['pid']);
            }
        }

        return $arr;
    }


    public function getnav($pid=0){
    	$navres=$this->where(array('pid'=>$pid))->select();
    	foreach ($navres as $k => $v) {
    		$navres[$k]['children']=$this->where(array('pid'=>$v['id']))->select();
    		foreach ($navres[$k]['children'] as $k1 => $v1) {
    			$navres[$k]['children'][$k1]['children']=$this->where(array('pid'=>$v1['id']))->select();
    		}
    	}
    	return $navres;
    }















}