<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    // public function _initialize(){
    //                 //初始化的时候检查用户权限
    //             if(!session('?username') || session('username')==''){
    //                 $this->redirect('Login/index'); 
    //         }
    //     }
    public function index(){
    	
        $this->display();
    }
}