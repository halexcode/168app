<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" href="/web/168/Public/css/bootstrap.min.css">
	<link rel="stylesheet" href="/web/168/Public/css/style.css">
	<title><?php echo (C("site_name")); ?></title>
	<style>
		.a{padding:15px 20px; margin: 20px auto 10px auto;  }
		.b{border-right: solid 1px #eeeeee;}
		#ta td{text-align: center;}
		.active{color: #62b900;}
		#bottom_bar ul li a:link { text-decoration: none;} 
 　　 	#bottom_bar ul li a:active { text-decoration:none;} 
 　　 	#bottom_bar ul li a:hover { text-decoration:none;color: #62b900;} 
 　　 	#bottom_bar ul li a:visited { text-decoration: none;}
 		.search_bar{background-color: #fff; }
 		
	</style>
	<script>
	function out(){
		if(confirm("确定要退出吗？")){
		return true;
		}else{
		return false;
		}
	}
	function sub(){
		var power="<?php echo $user['power']; ?>";
		if ( power>=90) {
			return true;
		} else {
			alert('无权限！');
			return false;
		}
	}
	</script>
</head>
<body>
<div id="search" >
	<div class="container ">
		<table class="table search_bar">
		  <caption>我的信息</caption>
				<tbody style="box-shadow: 0px 5px 3px #ccc;">
				    <tr>
				      <?php if(empty($_SESSION['username'])): ?><td><a href="<?php echo U('Login/index');?>" class="btn btn-link "><span class="glyphicon glyphicon-user"style="color:#62b900;"></span>&nbsp;&nbsp;&nbsp;<span style="color:red;">尚未登录</span></a></td>
						<td><a href="<?php echo U('Login/index');?>" class="btn btn-info btn-xs"style="color:white;margin-top:7px;">登录/注册</a></td>
						<?php else: ?>
						<td><a href="/web/168/index.php/Home/My/myinfo" class="btn btn-link"><span class="glyphicon glyphicon-user"style="color:#62b900;"></span>&nbsp;&nbsp;&nbsp;<span style="color:green;"><?php echo ($user['uname']?$user['uname']:$user['nickname']); ?></span></a></td>
						<td><a href="<?php echo U('Login/out_login');?>" class="btn btn-danger btn-xs"style="color:white;margin-top:7px;"onclick="return out();">退出</a></td><?php endif; ?>
						
				      
				    </tr>
				    <tr >
				      <td><a href="/web/168/cj/search.html" class="btn btn-link"><span class="glyphicon glyphicon-search"style="color:red;"></span>&nbsp;&nbsp;&nbsp;成绩查询</a></td>
				      <td><a href="/web/168/cj/search.html" class="btn btn-link">></a></td>
				    </tr>
				    <tr style="border-bottom: solid #ccc 2px;">
				      <td><a href="<?php echo U('Outline/search');?>" class="btn btn-link"><span class="glyphicon glyphicon-search"style="color:green;"></span>&nbsp;&nbsp;&nbsp;纪律查询</a></td>
				      <td><a href="<?php echo U('Outline/search');?>" class="btn btn-link">></a></td>
				    </tr>
		  		</tbody>
		  
		</table>	
	</div>
</div>
<div id="search" >
	<div class="container ">
		<table class="table search_bar">
		  <caption>设置</caption>
				<tbody>
				    <tr>
				      <td><a href="/web/168/index.php/Home/My/upass" class="btn btn-link"><span class="glyphicon glyphicon-cog"style="color:purple;"></span>&nbsp;&nbsp;&nbsp;密码修改</a></td>
				      <td>&nbsp;</td>
				    </tr>
				    <tr style="border-bottom: solid #ccc 2px;">
				      <td><a href="/web/168/index.php/Home/My/about" class="btn btn-link"><span class="glyphicon glyphicon-exclamation-sign"style="color:orange;"></span>&nbsp;&nbsp;&nbsp;关于我们</a></td>
				      <td>&nbsp;</td>
				    </tr>
		  		</tbody>
		  
		</table>
		
		
			
	</div>
</div>
<div id="search" >
	<div class="container ">
		<table class="table search_bar">
		  <caption>后台管理</caption>
				<tbody>
				    <tr>
				      <td><a href="/web/168/index.php/Home/My/ulist" class="btn btn-link"onclick="return sub();"><span class="glyphicon glyphicon-user" style="color:#1E90FF;"></span>&nbsp;&nbsp;&nbsp;用户管理</a></td>
				      <td>&nbsp;</td>
				    </tr>
				    <tr >
				      <td><a href="/web/168/index.php/Home/My/olist" class="btn btn-link"onclick="return sub();"><span class="glyphicon glyphicon-star" style="color:#8B6508;"></span>&nbsp;&nbsp;&nbsp;纪律管理</a></td>
				      <td>&nbsp;</td>
				    </tr>
				    <tr style="border-bottom: solid #ccc 2px;">
				      <td><a href="/web/168/index.php/Home/My/slist" class="btn btn-link"onclick="return sub();"><span class="glyphicon glyphicon-comment" style="color:#8600FF;"></span>&nbsp;&nbsp;&nbsp;学生信息</a></td>
				      <td>&nbsp;</td>
				    </tr>
		  		</tbody>
		  
		</table>
		
		
			
	</div>
</div>
	
	<!-- 版权 -->
	<footer id="footer" class="text-muted"style="margin-top:430px;margin-bottom:45px;">
		<div class="container">
			<p> © 2009-2016 博学加油站. Powered by hxb0810.</p>
		</div>
	</footer>
	<!-- bottom_bar底部导航 -->
		<nav class="navbar navbar-default navbar-fixed-bottom">
		<div class="container"id="bottom_bar">
				<div class="row">
				<ul class="nav nav-pills nav-justified "style="text-align: center;">
					<div class="col-xs-3">
						<li >
							<a href="<?php echo U('Index/index');?>" class="btn btn-link"><span class="glyphicon glyphicon-home"></span><br><span>首页</span>
							</a>
						</li>
					</div>
					<div class="col-xs-3">
						<li>
							<a href="<?php echo U('Info/index');?>" class="btn btn-link "><span class="glyphicon glyphicon-th-list"></span><br><span>资讯</span></a>
						</li>
					</div>
					<div class="col-xs-3">
						<li >
							<a href="<?php echo U('Search/index');?>" class="btn btn-link "><span class=" glyphicon glyphicon-search"></span><br><span  >查询</span></a>
						</li>
					</div>
					<div class="col-xs-3">
						<li>
							<a href="<?php echo U('My/index');?>" class="btn btn-link "><span class="glyphicon glyphicon-user active"></span><br><span class="active">我</span></a>
						</li>
					</div>
				</div>
				<!-- <ul class="nav nav-pills nav-justified "style="margin-top:5px;">
					<li class="active"><a href="#">首页</a></li>
					<li><a href="information.html">资讯</a></li>
					<li><a href="#">案例</a></li>
					<li><a href="#">关于</a></li>
				</ul>	 -->
		</div>
	</nav>
<script src="/web/168/Public/js/jquery.min.js"></script>
<script src="/web/168/Public/js/bootstrap.min.js"></script>
<script type="text/javascript">
$(function(){
	//设置轮播时间
	$('#myCarousel').carousel({
	//设置自动播放5 秒
		interval : 5000,
	});
	//设置左右箭头位置
	// $('.carousel-control').css('line-height', $('.carousel-inner img').height() + 'px');
	// $('.carousel-control').css('font-size', $('.carousel-inner img').height()/4 + 'px');
	// $(window).resize(function() {
	// 	var $height = $('.carousel-inner img').eq(0).height() ||
	// 	$('.carousel-inner img').eq(1).height() ||
	// 	$('.carousel-inner img').eq(2).height();
	// 	$('.carousel-control').css('line-height', $height + 'px');
	// 	$('.carousel-control').css('font-size',$height/4+'px');
	// });

});


</script>
</body>
</html>