<?php
namespace Admin\Controller;
class ArticleController extends CommonController {

    public function lst(){
        $article=D('article');
        $count= $article->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count,2);// 
        $show = $Page->show();// 分页显示输出
        $list = $article->field('a.id,a.title,b.catename')->alias('a')->join('LEFT JOIN sp_category b ON a.cateid=b.id')->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display();

    }

    public function add(){
        $article=D('article');
        if(IS_POST){
            if($article->create()){
                if($article->add()){
                    $this->success('添加文章成功！',U('lst'));
                }else{
                    $this->error('添加文章失败！');
                }
            }else{
                $this->error($article->getError());
            }
            return;
        }
        $categoryres=D('category')->select();
        $this->assign('categoryres',$categoryres);
        $this->display();
    }

    public function edit(){
        $article=D('article');
        if(IS_POST){
            if($article->create()){
                if($article->save() !== false){
                    $this->success('修改文章成功！',U('lst'));
                }else{
                    $this->error('修改文章失败！');
                }
            }else{
                $this->error($article->getError());
            }
            return;
        }
        $categoryres=D('category')->select();
        $articles=$article->find(I('id'));
        $this->assign(array(
            'articles'=>$articles,
            'categoryres'=>$categoryres,
            ));
        $this->display();
    }


    public function del(){
        if(D('article')->delete(I('id'))){
            $this->success('删除文章成功！',U('lst'));
        }else{
            $this->error('删除文章失败！');
        }
    }

    

    


















}