<?php
namespace Home\Model;
use Think\Model;
class GoodsModel extends Model{
    
    public function getrecgoods($recid,$limit){
    	$goodsid=D('recvalue')->field('valueid')->where(array('recid'=>$recid))->limit($limit)->select();
    	$recgoods=array();
    	foreach ($goodsid as $k => $v) {
    		$recgoods[]=D('goods')->find($v['valueid']);
    	}
    	return $recgoods;

    }
    //商品会员价格
    public function levelPrice($goodsId){
    	$memberLevel=D('memberLevel')->select();
    	$goods=$this->field('shop_price')->find($goodsId);
    	$shopPrice=$goods['shop_price'];
    	$levelPrice=array();
    	foreach ($memberLevel as $k => $v) {
    		$rate=$v['rate'];
    		$memberPrice=D('memberPrice')->field('price')->where(array('goods_id'=>$goodsId,'level_id'=>$v['id']))->find();
    		$memberPrice=$memberPrice['price'];
    		if($memberPrice){
	    		$levelPrice[$k]['price']=$memberPrice;
	    		$levelPrice[$k]['levelname']=$v['level_name'];
    		}else{
    			$levelPrice[$k]['price']=($shopPrice*$rate)/100;
	    		$levelPrice[$k]['levelname']=$v['level_name'];
    		}
    	}
    	return $levelPrice;
    }

    //计算会员价格
    public function getMemberPrice($goodsId){
        $rate=session('rate');
        $levelId=session('levelId');
        if($levelId){
            $mprice=D('memberPrice')->field('price')->where(array('level_id'=>$levelId,'goods_id'=>$goodsId))->find();
            if($mprice){
                $mprice=$mprice['price'];
            }else{
                $shopPrice=$this->field('shop_price')->find($goodsId);
                $shopPrice=$shopPrice['shop_price'];
                $mprice=($shopPrice*$rate)/100;
            }
        }else{
            $shopPrice=$this->field('shop_price')->find($goodsId);
            $mprice=$shopPrice['shop_price'];
        }

        return $mprice;
    }

    //获取商品库存数量
    public function getGoodsNum($gid,$gaid){
        $product=D('product');
        $product->field('goods_number')->where(array('goods_id'=>$gid,'goods_attr'=>$gaid))->find();
        return $product->goods_number;
    }

    //商品筛选属性
    public function getSearchAttr($cateId){
        $cate=D('cate');
        $cateIds=$cate->getchild($cateId);
        $cateIds=implode(',', $cateIds);
        $brandRes=$this->field('DISTINCT(b.id),b.brand_name')->alias('a')->join('sp_brand b ON a.brand_id = b.id')->where("cate_id IN ($cateIds)")->select();
        //计算价格区间
        $price=$this->field('MAX(shop_price) max_price,MIN(shop_price) min_price')->where("cate_id IN ($cateIds)")->find();
        $price_section=[];
        $minPrice=intval($price['min_price']);
        $maxPrice=intval($price['max_price']);
        $cha=intval(ceil(($maxPrice-$minPrice)/5));
        for ($i=0; $i < 5 ; $i++) { 
            if($i==4){
               $price_section[]=$minPrice.'-'.$maxPrice; 
            }else{
            $price_section[]=$minPrice.'-'.($minPrice+$cha);
            $minPrice+=$cha;
            }
        }
        //获取自定义筛选属性
        $sai=$cate->field('search_attr_id')->find($cateId);
        $sai=$sai['search_attr_id']; //1,2,3
        $attrRes=D('attr')->field('id,attr_name')->where(array('id'=>array('in',$sai),'attr_type'=>'1'))->select();
        $goodsAttr=D('goodsAttr');
        $arrser=D('attrser');
        foreach ($attrRes as $k => $v) {
            $attrvalRes=$goodsAttr->field('DISTINCT attr_value')->where(array('attr_id'=>array('eq',$v['id'])))->select();
            //
            foreach ($attrvalRes as $k1 => $v1) {
                $attrsers=$arrser->where(array('attr_id'=>$v['id'],'attr_value'=>$v1['attr_value']))->find();
                $attrserid=$attrsers['id'];
                $attrvalRes[$k1]['attrserid']=$attrserid;
            }
            //
            if(!$attrvalRes){
                unset($attrRes[$k]);
            }else{
                $attrRes[$k]['attr_vals']=$attrvalRes;
                
            }
        }
        // print_r($attrRes);
        return [
            'brandRes'=>$brandRes,
            'price_section'=>$price_section,
            'searchAttr'=>$attrRes
        ];
    }














}