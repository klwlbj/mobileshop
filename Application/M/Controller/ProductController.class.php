<?php
namespace Home\Controller;
class ProductController extends CommonController {
    
    public function index(){
    	$goods=D('goods');
        $cate_id=I("get.cid");
        //默认  降序
        //如果没有接收到cid，查询全部数据
        if($cate_id){
            $map['cate_id']=I("get.cid");
        }else{
            $map['cate_id'] = array('in',array('1','2','3','4','5','6','7','8','9','10','11','12','13'));
        }
        
   
    $count=$goods->where($map)->count();// 查询满足要求的总记录数
    $Page=new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
    $show= $Page->show();// 分页显示输出
    $list = $goods->order('id desc')->where($map)->limit($Page->firstRow.','.$Page->listRows)->select();
    $this->assign('goodsA',$list);// 赋值数据集
    $this->assign('page',$show);// 赋值分页输出
    
    $totalPages=$Page->totalPages;//获取总页码
    $this->assign('totalPages',$totalPages);
    $p=$p?I("get.p"):1; //获取当前页，没获取到时 默认为1
    $this->assign('p',$p);
        
        //页面顶部，显示13个分类
        $cate=D("cate");
        $cate13=$cate->select();
        $this->assign('cate13',$cate13);
        
        //查询分类名称
        $catename=$cate->find(I("get.cid"));
        $this->assign('catename',$catename);
        
       	$this->display();
    }
    
    public function item(){
        $goods=D('goods');
        $id=I("get.id");
        $info=$goods->find($id);
        $this->assign('info',$info);
        
        //联表查询  根据cate_id查询出 产品分类
        $catename=$goods->alias('a')->field('a.*,b.*')->join('LEFT JOIN sp_cate b ON a.cate_id=b.id')->where(array('a.id'=>$id))->find();
        $this->assign('catename',$catename);
        //dump($catename);
        //联表查询  根据cate_id查询出 3张图片
        $pic3=$goods->alias('a')->field('a.*,b.*')->join('LEFT JOIN sp_goods_pic b ON a.id=b.goods_id')->where(array('a.id'=>$id))->select();
        $this->assign('pic3',$pic3);
        
        $big1=$goods->alias('a')->field('a.*,b.*')->join('LEFT JOIN sp_goods_pic b ON a.id=b.goods_id')->where(array('a.id'=>$id))->find();
        $this->assign('big1',$big1);
        //dump($big1);
        
        //右侧-2条 看了又看
        $recvalue=M('recvalue');
        $Look2=$recvalue->alias('a')->join('LEFT JOIN sp_goods b ON a.valueid=b.id')->where(array('a.recid'=>3))->limit(2)->select();
        $this->assign('Look2',$Look2);
        
        //右侧-热销商品
        $recvalue=M('recvalue');
        $hotR=$recvalue->alias('a')->join('LEFT JOIN sp_goods b ON a.valueid=b.id')->where(array('a.recid'=>2))->select();
        $this->assign('hotR',$hotR);
        
       	$this->display();
    }
    
    
    
    
}