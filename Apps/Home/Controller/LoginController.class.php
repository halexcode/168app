<?php 
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
	//登陆视图
	public function index(){
		$this->display();
	}
	public function ck_uname(){
		session('nic',I('post.param'));
		$where['nickname']=I('post.param');
		$u=M('User');
		$re=$u->where($where)->find();
			if (!$re) {
				echo '{
					"info":"该用户名未注册！"
		 		}';
				
			} else {
				echo '{
					"info":"用户名正确！",
					"status":"y"
		 		}';
			}
	}
	public function ck_upass(){
		//dump(I('post.'));
		//dump(session('username'));
		$where['nickname']=session('nic');
		//$where['upass']=I('post.param','','md5');
		$u=M('User');
		$re=$u->where($where)->field('upass')->find();
		//dump($re['upass']);
			if ($re['upass']===I('post.param','','md5')) {
				echo '{
					"info":"密码正确！",
					"status":"y"
		 		}';
				
			} else {
				echo '{
					"info":"密码错误！"
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
	//登陆验证码
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
	//登陆表单处理
	public function _before_do_login(){ 
		if(session('nickname')===I('post.uname')) {
            $this->error('该账号已登录，请勿重复登录',U('Login/index'),3);
                    		//$this->redirect('Login/index'); 
	    }   
	}
	public function do_login(){
		if(!IS_POST){
			$this->error('无此页面');
		}else{
	    //         	$code=I('post.code');
					// $verify = new \Think\Verify();
					// if (!$verify->check($code)) {
					// $this->error('验证码错误');
					// }
				// if(I('post.code','0','md5')!=I('session.verify')){
				// 	$this->error('验证码错误');
				// }
				$user=M(User);
				$where['nickname']=I('post.uname');
				$where['upass']=I('post.upass','','md5');
				$arr=$user->where($where)->find();
				if(!$arr){
					$this->error('账号或者密码错误');
				}
				$data=array(
					'logintime'=>time(),
					'loginip'=>get_client_ip()
				);
				$user->where($where)->save($data);
				//写如session
				session('nic',null);
				session('username',I('post.uname'));
				session('password',I('post.upass','','md5'));
				session('uid',$arr['uid']);
				session('logintime',date('Y-m-d H:i:s',$arr['logintime']));
				session('loginip',$arr['loginip']);
				//redirect(U('Index/index'));
				if (!empty($arr['lasttime'])) {
					$this->redirect('My/index');
					//$this->success('登录成功,新会员！',U('My/index'),1);
				} else {
					$this->success('登录成功,新会员！',U('My/index'),1);
				}	
		}
					
	}
	//登出处理
	public function out_login(){
		//更新登录时间
		$time=M('User');
		$where['nickname']=I('session.username');
		$logintime=$time->where($where)->getfield('logintime');
		// $data= array('lasttime' => $arr['logintime']);
		$time->lasttime=$logintime;
		$time->field('lasttime')->where($where)->save();
		//注销session
		$_SESSION=array();
		//判断是否保存了cookie
			if(isset($_COOKIE[session_name()])){
				setcookie(session_name(),'',time()-1,'/');
			}		
		session('[destroy]'); //这是一个删除的函数
		//$this->redirect('index');
		$this->redirect('My/index');//U('My/index')
	}		
}
 ?>