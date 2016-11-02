<?php
namespace Home\Controller;
use Think\Controller;
class SearchController extends Controller {
    public function index(){
        $this->display();
    }
    public function s(){
    	$where['sid']=I('get.sid');
    	$user=M(Students);
      	$u=$user->where($where)->find();
    	$this->assign('user',$u);
        $this->display();
        
    }
    public function do_s(){
        //dump(I('post.'));
        //dump(I('get.'));
        $where['sid']=I('get.sid');
        $user=M(Students);
        $sname=$user->where($where)->getField('sname');
        //dump($u);
        echo $sname;
        if (!$sname) {
            $this->error('无该生信息！添加失败！');
        } else {
            $out = M('Outlines');
            // 创建数据后写入到数据库
            $data['sname'] = $sname;
            $data['outlines'] = I('post.wj');
            $data['booktime'] = time();
            $data['booker'] = '值班老师';
            $re=$out->data($data)->add(); 
            if (!re) {
                $this->error('添加违纪失败！');
            } else {
                $this->success('添加违纪成功！');
            }

        }
                    

        // $this->assign('user',$u);
        // $this->display();
        
    }
    
  //   public function _after_s(){
		// redirect(U('Search/s'), 1, ' 查询中 ...');
		// }
}