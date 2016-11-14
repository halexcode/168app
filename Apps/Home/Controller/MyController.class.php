<?php
namespace Home\Controller;
use Think\Controller;
class MyController extends Controller {
    public function index(){
    	if(session('?username')){
	    		$user=M(User);
		    	$where['nickname']=session('username');
		    	$u=$user->where($where)->find();
		    	//dump($u);
	            $this->assign('user',$u);
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
			$this->success('信息添加成功！',U('My/index'),2);
			// header("Content-Type:text/html; charset=utf-8");
			// echo "信息添加成功！";
			// redirect(U('My/index'), 1, ' 页面跳转中 ...');
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
	public function olist(){
		$p=D('Outlines');
		$count      = $p->count();
		$Page       = new \Think\Page($count,10);
			$Page->setConfig('prev',  '<span >上一页</span>');//上一页
			$Page->setConfig('next',  '<span >下一页</span>');//下一页
			$Page->setConfig('first', '<span >首页</span>');//第一页
			$Page->setConfig('last',  '<span >尾页</span>');//最后一页
		$show       = $Page->show();// 分页显示输出
		$olist = $p->order('sid desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		//$plist=$p->relation(true)->select();
		//dump($plist);
		//dump (I('session.'));
		$this->assign('count',$count);
		$this->assign('olist',$olist);
		$this->assign('page',$show);// 赋值分页输出
		$this->display();
	}
	public function oedit(){

		$where['sid']=I('get.sid');
		$out=M("Outlines");
		$re=$out->where($where)->find();	
		//dump($re);	
		$this->assign('out',$re);
	 	$this->display();
	}
	public function do_oedit(){
		$where['sid']= I('get.sid');
		$p=D('Outlines');
		$p->create();
		$p->processtime=time();
		$result = $p->where($where)->save();
		if($result===false){
			$this->error('修改失败');
		}else{
			$this->success('修改成功',U('olist'));
			
			}
	}
	public function odel(){
		//echo I('get.sid');
		$where['sid']= I('get.sid');
		$p=M("Outlines");
		$result=$p->where($where)->delete();
		if ($result===false||$result===0) {
			$this->error('删除失败');
		} else {
			$this->success('删除成功',U('olist'));
		}	
	}
	public function ulist(){
		// $adarr=D("user");
		// $re=$adarr->relation(true)->order('id asc')->select();
		// //dump ($re);
		// $this->assign('list',$re);
		// //dump($re);
		// $this->display();
		///////////////////////////////////////////////////////
		    $User = D('User'); // 实例化User对象
		    $count      = $User->count();// 查询满足要求的总记录数
		    $Page       = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		    	$Page->setConfig('prev',  '<span >上一页</span>');//上一页
			$Page->setConfig('next',  '<span >下一页</span>');//下一页
			$Page->setConfig('first', '<span >首页</span>');//第一页
			$Page->setConfig('last',  '<span >尾页</span>');//最后一页
			//$Page->setConfig('theme','');设置你想显示的按钮，%XXXX%含义参照图示
			//$Page->setConfig('theme',"<ul class='pagination'><li><a> %HEADER%  %NOW_PAGE%/%TOTAL_PAGE% 页</a></li><li>%FIRST%</li><li>%UP_PAGE%</li><li>%LINK_PAGE%</li><li>%DOWN_PAGE%</li><li>%END%</li></ul>");
			//$Page->setConfig ( 'theme', ' %HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%' );
		    $show       = $Page->show();// 分页显示输出
		    // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		     $list = $User->order('uid asc')->limit($Page->firstRow.','.$Page->listRows)->select();
		     $this->assign('count',$count);
		     $this->assign('ulist',$list);// 赋值数据集
		    $this->assign('page',$show);// 赋值分页输出
		    $this->display(); // 输出模板
	}
	public function uedit(){
		//echo I('get.uid');
		//获取用户信息
		$where['uid']=I('get.uid');
		$user=M("user");
		$re=$user->where($where)->find();
		$this->assign('user',$re);
		$this->display();
	}
	public function do_uedit(){
		//echo I('get.uid');
		$where['uid']= I('get.uid');
		$p=D('User');
		$p->create();
		//$p->processtime=time();
		$result = $p->where($where)->save();
		if($result===false){
			$this->error('修改失败');
		}else{
			$this->success('修改成功',U('ulist'));
			
			}
	}
	public function udel(){
		//echo I('get.uid');
		$where['uid']= I('get.uid');
		$p=M("User");
		$result=$p->where($where)->delete();
		if ($result===false||$result===0) {
			$this->error('删除失败');
		} else {
			$this->success('删除成功',U('ulist'));
		}	
	}
	public function add_s(){
		//echo I('get.uid');
		// $where['uid']= I('get.uid');
		// $p=M("User");
		// $result=$p->where($where)->delete();
		// if ($result===false||$result===0) {
		// 	$this->error('删除失败');
		// } else {
		// 	$this->success('删除成功',U('ulist'));
		// }
		$this->display();	
	}
	public function do_add_s(){
		//dump (I('post.'));
		$config = array(
		'maxSize' => 3145728,
		'rootPath' => './Uploads/',
		'savePath' => '',
		'saveName' => array('uniqid',''),
		'exts'=> array('jpg', 'gif', 'png', 'jpeg'),
		'autoSub' => true,
		'subName' => array('date','Ymd'),
		);
		$upload = new \Think\Upload($config);// 实例化上传类
		// 上传文件
		$info = $upload->upload();
			if(!$info) {// 上传错误提示错误信息
			$this->error($upload->getError());
			}else{// 上传成功
			//$this->success('上传成功!');
			$path= '/Uploads/'.$info['image']['savepath'].$info['image']['savename'];
			$stu=D("Students");
				if (!$stu->create()){
				header("Content-Type:text/html; charset=utf-8");
				exit($stu->getError().'[<a href="javascript:history.back()" rel="external nofollow" style="color:red;">返 回</a>]');
				}else{
					$stu->image=$path;
					$stu->time=time();
					$result = $stu->add(); // 写入数据到数据库
					if($result){
					$this->success('恭喜您，添加学生信息成功！',U('add_s'),2);
					// header("Content-Type:text/html; charset=utf-8");
					// echo "恭喜您，添加学生信息成功！";
					// redirect(U('add_s'), 2, ' 页面跳转中 ...');
					}
				}
			//echo $path;
			}
		
		}
		public function ck_sname(){
		$where['sname']=I('post.param');
		$s=M('Students');
		$sname=$s->where($where)->field('sname')->find();
			if (!$sname) {
				echo '{
					"info":"该学生尚未添加，可以添加！",
					"status":"y"
		 		}';
			} else {
				echo '{
					"info":"该学生已添加！请勿重复添加！"
		 		}';
			}
	}
	public function slist(){
		
		    $User = D('Students'); // 实例化User对象
		    $count      = $User->count();// 查询满足要求的总记录数
		    $Page       = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		    	$Page->setConfig('prev',  '<span >上一页</span>');//上一页
			$Page->setConfig('next',  '<span >下一页</span>');//下一页
			$Page->setConfig('first', '<span >首页</span>');//第一页
			$Page->setConfig('last',  '<span >尾页</span>');//最后一页
			//$Page->setConfig('theme','');设置你想显示的按钮，%XXXX%含义参照图示
			//$Page->setConfig('theme',"<ul class='pagination'><li><a> %HEADER%  %NOW_PAGE%/%TOTAL_PAGE% 页</a></li><li>%FIRST%</li><li>%UP_PAGE%</li><li>%LINK_PAGE%</li><li>%DOWN_PAGE%</li><li>%END%</li></ul>");
			//$Page->setConfig ( 'theme', ' %HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%' );
		    $show       = $Page->show();// 分页显示输出
		    // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		     $list = $User->order('sid asc')->limit($Page->firstRow.','.$Page->listRows)->select();
		     $this->assign('count',$count);
		     $this->assign('slist',$list);// 赋值数据集
		    $this->assign('page',$show);// 赋值分页输出
		    $this->display(); // 输出模板
	}
	public function sedit(){
		//echo I('get.sid');
		//获取用户信息
		$where['sid']=I('get.sid');
		$stu=M("Students");
		$re=$stu->where($where)->find();
		$this->assign('stu',$re);
		$this->display();
	}
	public function do_sedit(){
		//dump (I('post.'));
		$where['sid']=I('get.sid');
		$stu=M("Students");
		$simage=$stu->where($where)->getField('image');

		$config = array(
		'maxSize' => 3145728,
		'rootPath' => './Uploads/',
		'savePath' => '',
		'saveName' => array('uniqid',''),
		'exts'=> array('jpg', 'gif', 'png', 'jpeg'),
		'autoSub' => true,
		'subName' => array('date','Ymd'),
		);
		$upload = new \Think\Upload($config);// 实例化上传类
		// 上传文件
		$info = $upload->upload();
		//echo I('get.sid');
		//dump(I('post.'));
		//var_dump($info);
			if(!$info) {// 上传错误提示错误信息
			$data['image']=$simage;
			}else{// 上传成功
			//$this->success('上传成功!');
			$path= '/Uploads/'.$info['image']['savepath'].$info['image']['savename'];
			$data['image']=$path;
			//echo $path;
			}
			$data['sname']=I('post.sname');
			$data['sex']=I('post.sex');
			$data['class']=I('post.class');
			$data['grade']=I('post.grade');
			$data['type']=I('post.type');
			$re=$stu->where($where)->save($data);
			if ($re===0) {
				$this->error('信息修改失败！');
			} else {
				$this->success('信息修改成功',U('slist'));
			}
			

		
		}
		public function sdel(){
		//echo I('get.sid');
		$where['sid']= I('get.sid');
		$p=M("Students");
		$result=$p->where($where)->delete();
		if ($result===false||$result===0) {
			$this->error('删除失败');
		} else {
			$this->success('删除成功',U('slist'));
		}	
	}








		
	}

	




