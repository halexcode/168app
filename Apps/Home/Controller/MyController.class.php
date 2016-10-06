<?php
namespace Home\Controller;
use Think\Controller;
class MyController extends Controller {
    public function index(){
    	if(session('?username')){
                   $this->assign('uname',session('username'));
            }
        $this->display();
    }
    public function myinfo(){
    	$user=M(User);
    	$where['nickname']=session('username');
    	$u=$user->where($where)->find();
    	$this->assign('user',$u);
        $this->display();
    }
    public function do_info(){
		// dump(I('post.'));
		$n=M("User");
		if (!$n->create()){
			header("Content-Type:text/html; charset=utf-8");
			exit($n->getError().'[<a href="javascript:history.back()" rel="external nofollow" style="color:red;">返 回</a>]');
		}else{
			$result = $n->add(); // 写入数据到数据库
			if($result){
			header("Content-Type:text/html; charset=utf-8");
			echo "信息添加成功！";
			redirect(U('My/index'), 1, ' 页面跳转中 ...');
			}
		}  
	}
	public function do_edit_info(){
		// dump(I('post.'));
		$where['uid']= I('post.uid');
		$p=M('User');
		$p->create();
		$result = $p->where($where)->save();
		if($result===false){
			$this->error('修改失败');
		}else{
			$this->success('修改成功',U('My/index'));
			
			}
	}
	public function upass(){
		//dump(I('post.'));
		//dump(I('get.'));
		//$this->error('该模块尚未开发');
		$this->display();
	}
	public function ck_upass(){
		$where['nickname']=I('get.uname');
		$u=M('User');
		$pass=$u->where($where)->field('upass')->find();
			if (I('post.param','','md5')===$pass['upass']) {
				echo '{
					"info":"输入正确！",
					"status":"y"
		 		}';
			} else {
				echo '{
					"info":"原始密码输入错误！"
		 		}';
			}
	}
	public function re_upass(){
		if (IS_POST) {
			$where['uid']=I('get.id');
			$data['upass']=I('post.newpass','','md5');
			$u=M('User');
			$result = $u->where($where)->field('upass')->save($data);
			if($result===false){
 				$this->error('修改失败');
 			}else{
 				//注销session
				$_SESSION=array();
				//判断是否保存了cookie
				if(isset($_COOKIE[session_name()])){
					setcookie(session_name(),'',time()-1,'/');
				}		
				session('[destroy]');
 				$this->success('修改成功,请重新登录',U('Login/index'));
			}
		} else {
			$this->error('非法请求');
		}
		
	}








}