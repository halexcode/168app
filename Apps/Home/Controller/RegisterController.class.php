<?php 
namespace Home\Controller;
use Think\Controller;
class RegisterController extends Controller {
	public function _initialize(){
            //初始化的时候检注册是否关闭
	            $sys=M("System");
	            $sysdata=$sys->where('id=1')->find();
	           if ($sysdata['regopen']==0) {
	            	$this->error('关闭注册</br>'.'<font color="red" size="4px">'.$sysdata['regoffmes'].'</font>');
	            } 
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
	public function ck_code(){
		$code=I('post.param');
					$verify = new \Think\Verify();
					if (!$verify->check($code)) {
						echo '{
						"info":"验证码错误！"
		 				}';
				
					} else {
						echo '{
						"info":"验证码正确！",
						"status":"y"
		 				}';
					}
	}
	//注册验证码
	public function code(){
		// import('ORG.Util.Image');
		// Image::buildImageVerify(4,1);
		$config = array(
		'fontSize' => 30, // 验证码字体大小
		'length' => 4, // 验证码位数
		'useNoise' => false, // 关闭验证码杂点
		);
	$Verify = new \Think\Verify($config);
	$Verify->entry();
	}
	public function do_reg(){
		//var_dump(I('post.'));
		$user=D("User");
		if (!$user->create()){
			header("Content-Type:text/html; charset=utf-8");
			exit($user->getError().'[<a href="javascript:history.back()" rel="external nofollow" style="color:red;">返 回</a>]');
		}else{
			$user->upass=I('post.upass','','md5');
			$user->regtime=time();
			$user->loginip=get_client_ip();
			$result = $user->add(); // 写入数据到数据库
			if($result){
			$this->success('恭喜您，注册成功！请登录',U('Login/index'),5);
			// header("Content-Type:text/html; charset=utf-8");
			// echo "恭喜您，注册成功！请登录!";
			// redirect(U('Login/index'), 5, ' 页面跳转中 ...');
			}
		}
	 }
}

?>