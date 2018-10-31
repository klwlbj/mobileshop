<?php
namespace Home\Controller;
use Think\Controller;
class GoodsController extends CommonController {
    public function index($id){
    	$goods=D('goods');
        //商品会员价格
        $levelPrice=$goods->levelPrice($id);
        $mprice=$goods->getMemberPrice($id);
    	$goodsInfo=$goods->alias('a')->field('a.*,b.id,b.brand_name,b.brand_url')->join('LEFT JOIN sp_brand b ON a.brand_id=b.id')->where(array('a.id'=>$id))->find();
        $cate=D('cate');
        $topId=$cate->getparent($goodsInfo['cate_id']);
        $navRes=$cate->getnav($topId);
    	$gp=D('goodsPic');
    	$gpRes=$gp->where(array('goods_id'=>$id))->select();
    	$gattr=D('goodsAttr');
    	$attrRes = $gattr->alias('a')->field('a.*,b.attr_name,b.attr_type')->join('LEFT JOIN sp_attr b ON a.attr_id=b.id')->order('a.id desc')->where(array('goods_id'=>$id))->select();
    	$radioAttr=array();
    	$uniAttr=array();
    	foreach ($attrRes as $k => $v) {
    		if($v['attr_type'] == 1){
    			$radioAttr[$v['attr_id']][]=$v;
    		}else{
    			$uniAttr[]=$v;
    		}
    	}
        //当前位置
        $cate=D('cate');
        $cateid=$goodsInfo['cate_id'];
        $pos=$cate->getparents($cateid);
        $pos=array_reverse($pos);
        $pos[]=$cate->find($cateid);
    	$this->assign(array(
    		'goodsInfo'=>$goodsInfo,
    		'gpRes'=>$gpRes,
    		'radioAttr'=>$radioAttr,
    		'uniAttr'=>$uniAttr,
            'navRes'=>$navRes,
            'levelPrice'=>$levelPrice,
            'memberPrice'=>$memberPrice,
            'mprice'=>$mprice,
            'goodsId'=>$id,
            'pos'=>$pos,
    		));
       $this->display();
    }

    //获取商品库存量
    public function getgoodsnum($gid,$gaid=''){
        $goods=D('goods');
        echo $goods->getGoodsNum($gid,$gaid);
    }


    
}