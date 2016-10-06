<?php 
namespace Home\Controller;
use Think\Controller;
class EmptyController extends Controller {
	public function index(){
		$this->error('无此页面！');
		//$this->display();
	}
}

?>