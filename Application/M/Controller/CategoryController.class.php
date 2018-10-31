<?php
namespace Home\Controller;
class CategoryController extends CommonController {
    public function index(){
    	$cate=D('cate');
    	$navres=$cate->getnav();
    	$cateid=I('id');
        $dataSeaAttr=D('goods')->getSearchAttr($cateid);//所有的筛选属性
    	//商品列表分页信息
    	$goods=D('goods');
        $cateids=D('cate')->getchild($cateid);
        $cateids=implode(',', $cateids);
        $map['cate_id']=array('IN',$cateids);
    	$count=$goods->where($map)->count();
    	$Page=new \Think\Page($count,4);
    	$Page->setConfig('prev','上一页');
    	$Page->setConfig('next','下一页');
    	$Page->setConfig('first','首页');
    	$Page->setConfig('last','末页');
    	$show=$Page->show();
        $ob=I('ob');
        $ow=I('ow');
        if(!$ob){
            $ob='addtime';
        }
        if(!$ow){
            $ow='desc';
        }
        //筛选查询
        $filter=I('filter');
        $attrser=D('attrser');
        $goodsAttr=D('goodsAttr');
        if($filter){
            $filterArr=explode('.',$filter);
            $goodsIdsArr=null;
            foreach ($filterArr as $k => $v) {
                if($v!='0'){
                    $attrsers=$attrser->field('attr_id,attr_value')->find($v);
                    $_goods=$goodsAttr->field('GROUP_CONCAT(goods_id) goods_id')->where($attrsers)->find();
                    $goodsIds=explode(',', $_goods['goods_id']);
                    if($goodsIdsArr==null){
                        $goodsIdsArr=$goodsIds;
                    }else{
                        $goodsIdsArr=array_intersect($goodsIdsArr, $goodsIds);
                        if(empty($goodsIdsArr)){
                            break;
                        }
                    }
                }
            }
            if($goodsIdsArr){
                $map['id']=array('IN',$goodsIdsArr);
            }else{
                $map['id']=array('eq',0);
            }
        }
        //筛选查询
    	$list=$goods->where($map)->order($ob.' '.$ow)->limit($Page->firstRow.','.$Page->listRows)->select();
    	//当前位置
    	$pos=$cate->getparents($cateid);
    	$pos=array_reverse($pos);
    	$pos[]=$cate->find($cateid);
    	$this->assign(array(
    		'navres'=>$navres,
    		'pos'=>$pos,
    		'list'=>$list,
    		'Page'=>$show,
            'cateid'=>$cateid,
            'ob'=>$ob,
            'ow'=>$ow,
            'brandSeaAttr'=>$dataSeaAttr['brandRes'],
            'priceSeaAttr'=>$dataSeaAttr['price_section'],
            'diySeaAttr'=>$dataSeaAttr['searchAttr'],
    		));
       	$this->display();
    }
}