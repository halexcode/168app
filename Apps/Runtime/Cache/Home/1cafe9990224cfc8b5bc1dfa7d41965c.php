<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" href="/web/168/Public/css/bootstrap.min.css">
	<link rel="stylesheet" href="/web/168/Public/css/style.css">
	<title>168班轻应用</title>
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
</head>
<body>
<div id="search" >
	<div class="container ">
		<table class="table search_bar">
		  <caption>168微课堂</caption>
				<tbody>
				    <tr>
				    
				      <td><a href="http://mp.weixin.qq.com/s?__biz=MzA4Mzk1MTg2MQ==&mid=2649212280&idx=1&sn=aa043b58dba372d12ed3a94c44ce63d2&chksm=87fdcce2b08a45f40c642af1f14f29047673f58d33df87f5ed3fd4f14ad4b7f9ab14a86d855b#rd" class="btn btn-link"><span class="glyphicon glyphicon-film"style="color:#62b900;"></span>&nbsp;&nbsp;&nbsp;追及相遇问题的简单分类</a></td>
				    </tr>
				    <tr style="border-bottom: solid #ccc 2px;">
				      <td><a href="#" class="btn btn-link"><span class="glyphicon glyphicon-film"style="color:#62b900;"></span>&nbsp;&nbsp;&nbsp;待定...</a></td>
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
		<!-- <nav class="navbar navbar-default navbar-fixed-bottom">
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
						<li style="color:green;">
							<a href="<?php echo U('Search/index');?>" class="btn btn-link "><span class="active glyphicon glyphicon-search"></span><br><span class="active" >查询</span></a>
						</li>
					</div>
					<div class="col-xs-3">
						<li>
							<a href="<?php echo U('My/index');?>" class="btn btn-link "><span class="glyphicon glyphicon-user"></span><br><span>我</span></a>
						</li>
					</div>
				</div>
				 <ul class="nav nav-pills nav-justified "style="margin-top:5px;">
					<li class="active"><a href="#">首页</a></li>
					<li><a href="information.html">资讯</a></li>
					<li><a href="#">案例</a></li>
					<li><a href="#">关于</a></li>
				</ul>	 
		</div>
	</nav> -->
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