<?php 
namespace Home\Controller;
use Think\Controller;
class OutlineController extends Controller {
	// public function _initialize(){
 //                    //初始化的时候检查用户权限
 //                if(!session('?username') || session('username')==''){
 //                    $this->redirect('Login/index'); 
 //            }
 //        }
	public function _before_index(){
		
		if(!session('?username') || session('username')==''){
                     $this->error('您尚未登录，请登录',U('Login/index'),3); 
        }
        $where['nickname']=session('username');
		$u=M('User');
		$power=$u->where($where)->field('power')->find();
		//var_dump($power);
        if ($power['power']<90) {
        	$this->error('您的权限不够',U('Index/index'),3); 
        }
       
			// if ($power>=90) {
			// 	$this->redirect('index'); 
			// } else {
			// 	$this->error('您的权限不够',U('Index/index'),3); 
			// }
    	 
    }
	public function index(){
		
		$this->display();
	}
	
	public function ck_nickname(){
		$where['nickname']=I('post.param');
		$u=M('User');
		$uname=$u->where($where)->field('nickname')->find();
			if (!$uname) {
				echo '{
					"info":"该用户名未使用可以注册！",
					"status":"y"
		 		}';
			} else {
				echo '{
					"info":"用户名已注册！"
		 		}';
			}
	}
	public function do_outlines(){
		// var_dump(I('post.'));
		// $t= time();
		// echo date('Y-m-d H:i:s', $t);
		$out=D("Outlines");
		if (!$out->create()){
			header("Content-Type:text/html; charset=utf-8");
			exit($p->getError().'[<a href="javascript:history.back()" rel="external nofollow" style="color:red;">返 回</a>]');
		}else{
			$out->booktime=time();
			$result = $out->add(); // 写入数据到数据库
			if($result){
				$this->success('违纪记录添加成功！',U('Index/index'),30);
			 // header("Content-Type:text/html; charset=utf-8");
			 // echo '<b style="vertical-align:40%;text-align:center;">违纪记录添加成功！</b>';
			 // redirect(U('Index/index'), 3, ' 页面跳转中 ...');
			}
		}   	
	}
	public function search(){
		
		$this->display();
	}
	public function do_search(){
		
		$where['sname']=I('post.sname');
		$O=M('Outlines');
		$re=$O->where($where)->select();
		//$count = $O->where($where)->count();
		$count=count($re);
		//var_dump($re);
		if (!$re) {
			$this->error('恭喜，没有该生的违纪记录！');
		} else {
			$this->assign('outlines',$re);
			$this->assign('count',$count);
			//var_dump($re);
			$this->display();
		}
		
	}
	public function edit(){

		$where['sid']=I('get.sid');
		$out=M("Outlines");
		$re=$out->where($where)->find();	
		//dump($re);	
		$this->assign('out',$re);
	 	$this->display();
	}
	public function do_edit(){
		$where['sid']= I('get.sid');
		$p=D('Outlines');
		$p->create();
		$p->processtime=time();
		$result = $p->where($where)->save();
		if($result===false){
			$this->error('修改失败');
		}else{
			$this->success('修改成功',U('Outline/search'));
			
			}
	}
	public function del(){
		//echo I('get.sid');
		$where['sid']= I('get.sid');
		$p=M("Outlines");
		$result=$p->where($where)->delete();
		if ($result===false||$result===0) {
			$this->error('删除失败');
		} else {
			$this->success('删除成功',U('Outline/search'));
		}	
	}
	
}

?>