<?php
namespace Home\Model;
use Think\Model;
class CarModel extends Model{
    
    protected $autoCheckFields=false;

    public function addToCar($goodsID,$goodsAttrID,$goodsNum){
        $car=isset($_COOKIE['car']) ? unserialize($_COOKIE['car']) : array();
        $key=$goodsID.'-'.$goodsAttrID;
        $car[$key]+=$goodsNum;
        $week=time()+7*24*3600;
        setcookie('car',serialize($car),$week,'/');
    }

    public function clearCar(){
        setcookie('car','',1,'/');
    }


    public function uploadGoodsNum($goodsID,$goodsAttrID,$goodsNum){
        $car=unserialize($_COOKIE['car']);
        $key=$goodsID.'-'.$goodsAttrID;
        $car[$key]=$goodsNum;
        $week=time()+7*24*3600;
        setcookie('car',serialize($car),$week,'/');
    }

    public function delGoods($goodsID,$goodsAttrID){
        $car=unserialize($_COOKIE['car']);
        $key=$goodsID.'-'.$goodsAttrID;
        unset($car[$key]);
        $week=time()+7*24*3600;
        setcookie('car',serialize($car),$week,'/');
    }

    public function getGoodsInfo(){
        $goods=D('goods');
        // array('38-3,6'=>12,'36-6,9,4'=>15);
        $car=isset($_COOKIE['car']) ? unserialize($_COOKIE['car']) : array();
        $cart=array();
        foreach ($car as $k => $v) {
            $arr=explode('-', $k);
            $goodsId=$arr[0];
            $goods->field('goods_name,mid_thumb,market_price,goods_weight,weight_unit')->find($goodsId);
            $cart[$k]['goodsName']=$goods->goods_name;
            $cart[$k]['midThumb']=$goods->mid_thumb;
            $cart[$k]['marketPrice']=$goods->market_price;
            $cart[$k]['goods_weight']=$goods->weight_unit=='g' ?  ($goods->goods_weight)/1000 : $goods->goods_weight;
            $cart[$k]['mprice']=$goods->getMemberPrice($goodsId);
            $cart[$k]['number']=$v;
            $cart[$k]['goods_id']=$goodsId;
            $_arr=explode(',', $arr[1]);
            sort($_arr);
            $_arr=implode(',', $_arr);
            $cart[$k]['goods_attr_ids']=$_arr;
            $arrPrice=0;
            $goodsAttrStr=array();
            if($arr[1]){
                $map['a.id']=array('IN',$arr[1]);
                $goodsAttr=D('goodsAttr')->field('b.attr_name,a.attr_value,a.attr_price')->alias('a')->join('LEFT JOIN sp_attr b ON a.attr_id = b.id')->where($map)->select();
                foreach ($goodsAttr as $k1 => $v1) {
                    $goodsAttrStr[]=$v1['attr_name'].':'.$v1['attr_value'].'【￥'.$v1['attr_price'].'】';
                    $arrPrice+=$v1['attr_price'];
                }
                $cart[$k]['mprice']+=$arrPrice;
                $cart[$k]['marketPrice']+=$arrPrice;
                // 颜色：白色,内存：32G 
            }
            $goodsAttrStr=implode('<br />', $goodsAttrStr);
            $cart[$k]['attrStr']=$goodsAttrStr;
        }

        return $cart;
    }















}