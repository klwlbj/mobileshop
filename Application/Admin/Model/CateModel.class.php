<?php
namespace Admin\Model;
use Think\Model;
class CateModel extends Model {

    protected $_validate = array(
      array('catename','require','栏目名称不得为空！',1), 
      array('catename','','栏目名称已经存在！',1,'unique',3),
    );

    public function catetree(){
        $data=$this->order('id desc')->select();
        return $this->resort($data);
    }

    public function resort($data,$pid=0,$level=0){
        static $arr=array();
        foreach ($data as $k => $v) {
            if($v['pid']==$pid){
                $v['level']=$level;
                $arr[]=$v;
                $this->resort($data,$v['id'],$level+1);
            }
        }

        return $arr;

    }

    public function getchild($cateid){
        $data=$this->select();
        return $this->getchildids($data,$cateid);
    }

    public function getchildids($data,$cateid){
        static $ret=array();
        $ret[]=$cateid;
        foreach ($data as $k => $v) {
            if($v['pid']==$cateid){
                $ret[]=$v['id'];
                $this->getchildids($data,$v['id']);
            }
        }
        return array_unique($ret);
    }

    public function _after_insert($data,$option){
        //处理商品推荐位
        $recid=I('recid');
        if($recid){
            foreach ($recid as $k => $v) {
                D('recvalue')->add(array(
                    'valueid'=>$data['id'],
                    'recid'=>$v,
                    'rectype'=>2,
                    ));
            }
        }
    }

    public function _before_insert(&$data,$option){
        $attrIds=I('attr_id');
        foreach ($attrIds as $k => $v) {
            if(empty($v)){
                unset($attrIds[$k]);
            }
            
        }
        if($attrIds){
                $attrIds=implode(',',$attrIds);
            }
        $data['search_attr_id']=$attrIds;
    }

    public function _before_update(&$data,$option){
        //处理商品推荐位
        D('recvalue')->where(array('valueid'=>$option['where']['id'],'rectype'=>2))->delete();
        $recid=I('recid');
        if($recid){
            foreach ($recid as $k => $v) {
                D('recvalue')->add(array(
                    'valueid'=>$option['where']['id'],
                    'recid'=>$v,
                    'rectype'=>2,
                    ));
            }
        }
        //关联属性处理
        $attrIds=I('attr_id');
        foreach ($attrIds as $k => $v) {
            if(empty($v)){
                unset($attrIds[$k]);
            }
            
        }
        if($attrIds){
                $attrIds=implode(',',$attrIds);
            }
        $data['search_attr_id']=$attrIds;
    }


    



    
}