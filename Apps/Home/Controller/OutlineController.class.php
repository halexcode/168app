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
	public function do_reg(){
		var_dump(I('post.'));
		$user=D("User");
		if (!$user->create()){
			header("Content-Type:text/html; charset=utf-8");
			exit($user->getError().'[<a href="javascript:history.back()" rel="external nofollow" style="color:red;">返 回</a>]');
		}else{
			$user->upass=I('post.upass','','md5');
			$result = $user->add(); // 写入数据到数据库
			if($result){
			header("Content-Type:text/html; charset=utf-8");
			echo "恭喜您，注册成功！请登录!";
			redirect(U('Login/index'), 5, ' 页面跳转中 ...');
			}
		}
	 }
}

?>