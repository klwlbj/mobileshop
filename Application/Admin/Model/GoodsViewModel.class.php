<?php
namespace Admin\Model;
use Think\Model\ViewModel;
class GoodsViewModel extends ViewModel {

    protected $viewFields = array(
        'Goods'=>array('id','goods_name','sm_thumb','market_price','shop_price','vip2_price','vip3_price','vip4_price','onsale','cate_id','brand_id'),
        'Cate'=>array('catename', '_on'=>'goods.cate_id=Cate.id','_type'=>'LEFT'),
        'Brand'=>array('brand_name', '_on'=>'goods.brand_id=brand.id'),
    );

    

    



    
}