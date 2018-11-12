<?php
namespace M\Controller;
class IndexController extends CommonController {
    public function cates()
    {
        $cate=D('cate');
        $cate1=$cate->where(array('pid'=>'0'))->select();
//        dump($cate1);die;
        $this->assign('cate1',$cate1);
        $id=I("get.id");
        $gres=$this->gres($id);
        foreach ($gres as $key => $value) {
            $value['goods_name']=mb_substr($value['goods_name'],0,12,'utf-8').'...';

        }
        $this->assign('g_res1',$gres);
//        dump($this->gres($id));
//        die;
        $this->display();

    }

    public function index(){
//        for($cateid=14;$cateid<21;$cateid++){
//        // dump(session('user'));
//        $cate=D('cate');
//        $cate1=$cate->where(array('pid'=>$cateid))->select();
//        $this->assign('cate1',$cate1);
//
//        //查询每个分类下面的商品
//            $goods=D('goods');
//            $gd1=$goods->where(array('pid'=>$cateid))->select();
//            $this->assign('gd1',$gd1);
//    }
//        $this->assign('g_res',$g_res);

        $ip = get_client_ip();
        $url='https://sp0.baidu.com/8aQDcjqpAAV3otqbppnN2DJv/api.php?query='.$ip.'&co=&resource_id=6006&t=1488163851795&ie=utf8&oe=gbk&cb=op_aladdin_callback&format=json&tn=baidu&cb=jQuery1102007553074611919763_1488163568327&_=1488163568331';
        $html = file_get_contents($url);
        $html=iconv('GB2312', 'UTF-8//IGNORE', $html); //将字符串的编码从GB2312转到UTF-8
        // dump($html);exit();
        $t1 = mb_strpos($html,'location":"')+11;
        $t2 = mb_strpos($html,'","titlecont');

        $data['ip'] = $ip;
        $data['area'] = mb_substr($html,$t1,$t2-$t1);
        $data['url'] = 'm_index';

        $qx=M("ip");
        //ip url area 相同时，不添加进数据库
        $find=$qx->order("id desc")->where($data)->find();
        //没有查询到该ip时，添加进数据库
        if(empty($find)){
            $data['time'] = time();
            $qx=$qx->add($data);
        }else{
            $data['btime'] = time();
            $data['count'] = $find['count']+1;
            $qx=$qx->where(array('ip'=>$data['ip']))->save($data);
            // $qx=$qx->where(array('ip'=>$data['ip']))->setInc('count',1);
        }
        $cate=D('cate');
        $cate1=$cate->where(array('pid'=>'14'))->select();
        $this->assign('cate1',$cate1);

        //查询每个分类下面的商品
//        $goods=D('goods');
//        foreach ($cate1 as $key => &$value) {
//            $cate2=$cate->where(array('pid'=>$value['id']))->select();
//
//            foreach ($cate2 as $kk => $vv) {
//
//                $good=$goods->where(array('cate_id'=>$vv['id']))->select();
//                // dump($good);
//                if(!empty($good)){
//
//                    //数组合并
//                    $arr = array();
//                    foreach($good as $k=>$v){
//                        $arr1= array_merge($arr,$v);
//                        $g_res[]=$arr1;
//                    }
//                }
//            }
//        }
//        $this->assign('g_res',$g_res);



//        $cat= D("cate");
//        $total=$cat->where(array('pid'=>0))->select();
////        dump($total);die;
//        foreach($total as $k => $v)
//        {
//            $total[$k]['new'] =D("goods") -> where(array('cat_title' => $v['cat_title'])) -> limit(4) -> select();
//        }
//        $this -> assign('total',$total);

        $cate=D('cate');

        $cate1=$cate->where(array('pid'=>0))->select();
        //dump($cate1);die;
//        $goods=D('goods');

            //dump($good);die;
            $lm[$key]['cate']=$cate1;
            $lm[$key]['name']=$vx['catename'];
            $lm[$key]['cid']=$vx['id'];
        $this->assign('cate1',$cate1);
        $this->assign('lm',$lm);
        $this->assign('g_res1',array_slice($this->gres(14),0,4));/*八个分类的商品*/
        $this->assign('g_res2',array_slice($this->gres(15),0,4));
        $this->assign('g_res3',array_slice($this->gres(16),0,4));
        $this->assign('g_res4',array_slice($this->gres(17),0,4));
        $this->assign('g_res5',array_slice($this->gres(18),0,4));
        $this->assign('g_res6',array_slice($this->gres(19),0,4));
        $this->assign('g_res7',array_slice($this->gres(20),0,4));
        $this->assign('g_res8',array_slice($this->gres(21),0,4));
        // dump($lm);


        //猜你喜欢
        $goods=D('goods');
        $gd=$goods->select();
        $this->assign('gd',$gd);
        // dump($gd);

       // $this->assign(array('left1'=>$left1,'big1'=>$big1,'good1'=>$good1));
       $this->display();
    }
    public function gres($id){  /*各分类商品*/
        $cate2=D('cate')->field('id')->where(array('pid'=>$id))->select();

        foreach ($cate2 as $key => $value) {
            $cate3=D('cate')->field('id')->where(array('pid'=>$value['id']))->select();
            //dump($cate3);//die;
            foreach ($cate3 as $kk => $vv) {
                $good=D('goods')->where(array('cate_id'=>$vv['id']))->select();

                if(!empty($good)){

                    //数组合并
                    $arr = array();
                    foreach($good as $k=>$v){
                        foreach ($good as $k1=>$v1){
                    if(session('user.vip')=='2'){
                        $v['shop_price']=$v['vip2_price'];
                    }
                    if(session('user.vip')=='3'){
                        $v['shop_price']=$v['vip3_price'];
                    }
                    if(session('user.vip')=='4'){
                        $v['shop_price']=$v['vip4_price'];
                    }
                }
                        //$v['shop_price']=$v['vip2_price'];
                        $arr1= array_merge($arr,$v);

                        $g_res[]=$arr1;
                    }

                }
            }//dump($g_res);die;
        }
        return $g_res;
    }

    //一级分类下面的页面
    public function index1(){

        $id=I("get.aid"); //get过来的aid

        $cate=D('cate');
        $cate1=$cate->where(array('pid'=>$id))->select();
        $this->assign('cate1',$cate1);

        //查询每个分类下面的商品
        $goods=D('goods');
        foreach ($cate1 as $key => &$value) {
            $cate2=$cate->where(array('pid'=>$value['id']))->select();

            foreach ($cate2 as $kk => $vv) {

                $good=$goods->where(array('cate_id'=>$vv['id']))->select();
                // dump($good);
                if(!empty($good)){

                    //数组合并
                    $arr = array();
                    foreach($good as $k=>$v){
                        foreach ($good as $k1=>$v1){
                            if(session('user.vip')=='2'){
                                $v['shop_price']=$v['vip2_price'];
                            }
                            if(session('user.vip')=='3'){
                                $v['shop_price']=$v['vip3_price'];
                            }
                            if(session('user.vip')=='4'){
                                $v['shop_price']=$v['vip4_price'];
                            }
                        }
                       $arr1= array_merge($arr,$v);
                       $g_res[]=$arr1;
                    }
                }
            }
        }
        $this->assign('g_res',$g_res);

        //底部 猜你喜欢
        $cnxh=$goods->select();
        $this->assign('cnxh',$cnxh);
        $this->display();
    }

    public function vip(){
        $this->display();
    }

    public function index2(){

        $id=I("get.id");

        $cate=D('cate');
        $cate1=$cate->where(array('pid'=>$id))->select();

        //查询每个分类下面的商品
        $goods=D('goods');
        foreach ($cate1 as $key => &$value) {

            //判断分类图片能不能打开
            $c_pic=SITE_URL."public/c2/c".$value['id'].".jpg";
            if ($file_content = file_get_contents($c_pic) ) {
            //  能打开
                $value['c_pic']=$c_pic;
            } else {
            // 不能打开
                $value['c_pic']='';
            }

            $value['good']=$goods->where(array('cate_id'=>$value['id']))->select();
        }

        $this->assign('cate1',$cate1);

        //底部 猜你喜欢
        $cnxh=$goods->select();
        $this->assign('cnxh',$cnxh);

        // dump($cate1);

        $this->display();
    }


    //商品详情
    public function detail(){

        $id=I("get.id");

        //查询商品详情
        $goods=D('goods')->find($id);
        if(session('user.vip')=='2'){
            $goods['shop_price']=$goods['vip2_price'];
        }
        if(session('user.vip')=='3'){
            $goods['shop_price']=$goods['vip3_price'];
        }
        if(session('user.vip')=='4'){
            $goods['shop_price']=$goods['vip4_price'];
        }
        //优惠多少钱
        $goods['yh']=bcsub($goods['market_price'], $goods['shop_price'], 2);

        // dump($goods);exit();

        $this->assign('goods',$goods);
        $this->display();
    }


    //下单登记
    public function dj(){

        $sid=I("get.sid");

        if(IS_POST){

            $data=I("post.");

            $dj=D('dingdan')->add($data);
            if($dj){
                $this->redirect('Index/index');
            }else{
                $this->error('登记失败！');
            }

        }else{
            $goods=D('goods')->find($sid);
            // dump($goods);
            $this->assign('goods',$goods);
            $this->display();
        }

    }


    //注册
    public function reg(){

        // dump(I("post."));
        if(IS_POST){
            $user=M('User');
            $data=I("post.");

            $data['ip']=get_client_ip();
            $data['ctime']=time();

            $find_one=$user->where(array('phone'=>$data['phone']))->find();
            if($find_one){
                $this->error('注册失败！该昵称已存在！');
            }else{
                $res=$user->add($data);
                if($res){

                   $da =array();
                   $da['phone'] = $data['phone'];
                   $da['id'] = $data['id'];
                   $da['nick'] = $data['nick'];
                    $da['vip'] = $data['vip'];
                   session("user",$da);

                   $this->redirect('Index/grzx');
                }else{
                   $this->error('注册失败！');
                }
            }

        }else{
            $this->display();
        }

    }

    //注册协议
    public function zcxy(){
        $this->display();
    }

    public function login(){

        if(IS_POST){
            $user=M('User');
            $data=I("post.");

            $find_one=$user->where(array('phone'=>$data['phone']))->find();
            if($find_one){

                if($data['phone'] == $find_one['phone'] && $data['password'] == $find_one['password']){

                   $da['phone'] = $find_one['phone'];
                    $da['id'] = $find_one['id'];
                   $da['nick'] = $find_one['nick'];
                   $da['vip'] = $find_one['vip'];
//                   dump($da);die;
                   session("user",$da);

                   $this->redirect('Index/grzx');
                }else{
                   $this->error('登录失败！账号或者密码错误！');
                }

            }else{
                   $this->error('登录失败！该账号可能未注册！');
                }

        }else{
            $this->display();
        }

    }



    public function logout(){
       session("user",null);
       $this->redirect('Index/index');
    }


    //个人中心
    public function grzx(){
        $this->display();
    }


    //下单
    public function order(){

        $user=session("user");
        if(empty($user)){
            $this->redirect('Index/login');exit();
        }


        $post=I("post.");
        if(IS_POST){
            $goods=M("goods");
            $cate=array($post['id1'],$post['id2'],$post['id3'],$post['id4'],$post['id5'],$post['id6']);
            // $cate = ['78','79'];//$cate为一个数组
            $where['id'] = array('in',$cate);//cid在这个数组中，
            $res=$goods->where($where)->select();
            foreach ($res as $key => &$value) {
                $value['max_thumb']=substr($value['max_thumb'],1);
                if(session('user.vip')=='2'){
                    $value['shop_price']=$value['vip2_price'];
                }
                if(session('user.vip')=='3'){
                    $value['shop_price']=$value['vip3_price'];
                }
                if(session('user.vip')=='4'){
                    $value['shop_price']=$value['vip4_price'];
                }
                $value['count']=$post['number'.($key+1)];
                $value['xj']=$value['shop_price']*$value['count'];

                $hj += $value['xj'];
            }
            /*dump($res);
            dump($hj);*/
            $dd_one=[$res,$hj];
            $dd=S('dd',$dd_one);

            $this->assign('res',$res);
            $this->assign('hj',$hj);
        }

        $res=D('address')->where(array('user_id'=>session('user.id')))->select();
        $this->assign('address',$res);
        //查询该账号以前下过订单的地址
//        $one=D("User")->where(array('phone'=>$user['phone'],'nick'=>$user['nick']))->find();
//        $xinxi=D("dingdans")->where(array('userid'=>$one['id']))->order("id desc")->find();
//        $this->assign('xinxi',$xinxi);

        // dump($xinxi);

        $this->display();
    }


    public function dd(){

        $user=session("user");
        if(empty($user)){
            $this->redirect('Index/login');exit();
        }

        $post=I("post.");

        if(IS_POST){
            $data1=$post;
            $data1['data']=json_encode(S('dd'));
            $data1['time']=time();
            $data1['sn']=time().rand(100,999);

            $ip = get_client_ip();
            $url='https://sp0.baidu.com/8aQDcjqpAAV3otqbppnN2DJv/api.php?query='.$ip.'&co=&resource_id=6006&t=1488163851795&ie=utf8&oe=gbk&cb=op_aladdin_callback&format=json&tn=baidu&cb=jQuery1102007553074611919763_1488163568327&_=1488163568331';
            $html = file_get_contents($url);
            $html=iconv('GB2312', 'UTF-8//IGNORE', $html); //将字符串的编码从GB2312转到UTF-8
            // dump($html);exit();
            $t1 = mb_strpos($html,'location":"')+11;
            $t2 = mb_strpos($html,'","titlecont');

            $data1['ip'] = $ip;
            $data1['ipdz'] = mb_substr($html,$t1,$t2-$t1);
            $map['id']=array('eq',I('post.address'));
            $map['user_id']=array('eq',session('user.id'));
           dump($map);die;
            $res=M('address')->where($map)->find();
            $data1['address']=$res['address'];
            $data1['truename']=$res['username'];
            $data1['phone']=$res['phone'];
            $one=D("User")->where(array('phone'=>$user['phone'],'nick'=>$user['nick']))->find();
            $data1['userid'] = $one['id'];
            $data1['nick'] = $one['nick'];

            // dump($data1);
            $dingdans=M("dingdans")->add($data1);
            if($dingdans){

                //下单成功，把购物车清掉
                session("car1",null);
                //把订单数据写进缓存
                $dd=S('dds',$data1);

                $this->redirect('Index/olst');
            }else{
                $this->redirect('Index/car');
            }

            // $this->display();
        }
    }






    //购物车
    public function car(){

        // session("car1",null);exit();
        // dump(I("post."));

        $id=I("get.id");

        if($id){
           $goods=D('goods');

           $find_one=$goods->find($id);
           $da['id'] = $find_one['id'];
           $da['goods_name'] = $find_one['goods_name'];
           $da['shop_price'] = $find_one['shop_price'];
           //dump(session('user.vip'));die;
            if(session('user.vip')=='2'){
                $da['shop_price']=$find_one['vip2_price'];
            }
            if(session('user.vip')=='3'){
                $da['shop_price']=$find_one['vip3_price'];
            }
            if(session('user.vip')=='4'){
                $da['shop_price']=$find_one['vip4_price'];
            }
           $da['original'] = substr($find_one['original'],1);
           $da['num'] = 1;

          //查询出购物车中原来的产品
           $old=session("car1");
           $old[]=$da;
           $new = $this->er_array_unique($old);


           session("car1",$new);
        }


       $cars=session("car1");

       //根据字段id对数组$cars进行降序排列 【否则order方法中 in(ids) 会从小到大排序】
       $px = array_column($cars,'id');
       array_multisort($px,SORT_ASC,$cars);

       $this->assign('cars',$cars);
       $this->display();
    }
    public function upadd(){
        if(IS_POST){
            $id=I('post.id');
            //dump($id);die;
            $data = I('post.');
            $set=M('address')->where('id='.$id)->save($data);
            if($set){
                $this->redirect('Index/address');
            }
            else{
                $this->redirect('Index/address', '',3, '更新失败...');
            }
        }
        $map['id']=array('eq',I('get.id'));
            $map['user_id']=array('eq',session('user.id'));
//            dump($map);die;
            $res=M('address')->where($map)->find();
            //dump($res);die;
            $this->assign('vo',$res);
            $this->display();

    }
    public function set(){
        if(IS_GET){
            $map['id']=array('eq',I('get.id'));
            $map['user_id']=array('eq',session('user.id'));
//            dump($map);die;
            $res=M('address')->where($map)->select();
//            dump($res);die;
            if($res){
                $id=I('get.id');
                $data['set'] = '0';
                M('address')->where('id!='.$id)->save($data);
                $data['set'] = '1';
                $set=M('address')->where('id='.$id)->save($data);
                if($set){
                    $this->redirect('Index/address');
                }
                else{
                    $this->redirect('Index/address', '',3, '<h1>设置失败...</h1>');
                }
            }
            else{
                $this->redirect('Index/address','',3, '<h1>设置失败...</h1>');
            }
        }
    }
    public  function  deladd(){
        if(IS_GET){
            $map['id']=array('eq',I('get.id'));
            $map['user_id']=array('eq',session('user.id'));
//            dump($map);die;
            $res=M('address')->where($map)->select();
//            dump($res);die;
        if($res){
            $del=M('address')->delete(I('get.id'));
            if($del){
            $this->redirect('Index/address', '',3, '<h1>删除成功...</h1>');
                }
                else{
                $this->redirect('Index/address', '',3, '删除失败...');
            }
        }
        else{
            $this->redirect('Index/address','',3, '删除失败...');
        }
        }
    }
    public function address(){
        $res=D('address')->where(array('user_id'=>session('user.id')))->select();
        $this->assign('address',$res);
        $this->display();
    }
    public function addaddress(){
       // echo session('user.id');die;
        if(IS_POST){
            $data1=I('post.');
            $data1['user_id']=session('user.id');
            // dump($data1);
            $dingdans=M("address")->add($data1);
            if($dingdans){

                //add 地址成功


                $this->redirect('Index/address');
            }else{
                $this->redirect('Index/address');
            }
        }
        $this->display();
    }


    //订单列表
    public function olst(){
       $user=session("user");
       if(empty($user)){
           $this->redirect('Index/login');exit();
       }

       $one=D("User")->where(array('phone'=>$user['phone'],'nick'=>$user['nick']))->find();
       $where['userid'] = $one['id'];
       $where['nick'] = $one['nick'];

       $dds=M("dingdans");
       $oder_list=$dds->where($where)->order("id desc")->select();

       foreach ($oder_list as $key => &$value) {
           $va=json_decode($value['data']);
           $value['data']=$va[0][0]->max_thumb;
           /*["data"] => object(stdClass) {
                ["max_thumb"] => string(54) "/Public/Uploads/Goods/2018-09-27/max_5bacf42c83745.jpg"
           }*/
           $value['hj']=$va[1];
       }

       // dump($oder_list);

       $this->assign('oder_list',$oder_list);
       $this->display();
    }


    //某个订单详情
    public function odetail(){

       $user=session("user");
       if(empty($user)){
           $this->redirect('Index/login');exit();
       }

       $one=D("User")->where(array('phone'=>$user['phone'],'nick'=>$user['nick']))->find();
       $where['userid'] = $one['id'];
       $where['nick'] = $one['nick'];

       $dds=M("dingdans");
       $oder_list=$dds->find(I("get.id"));
       $oder_list['data'] = json_decode($oder_list['data']);
       // dump($oder_list);

       $this->assign('oder_list',$oder_list);
       $this->display();
    }






        //二维数组简单去重
        function er_array_unique($arr){
          $newarr = array();
          if(is_array($arr)){
            foreach($arr as $v){
              if(!in_array($v,$newarr,true)){
                $newarr[] = $v;
              }
            }
          }else{
             return false;
          }
          return $newarr;
        }




}