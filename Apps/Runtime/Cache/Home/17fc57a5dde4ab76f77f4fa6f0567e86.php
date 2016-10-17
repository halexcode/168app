<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" href="/web/168/Public/css/bootstrap.min.css">
	<link rel="stylesheet" href="/web/168/Public/css/style.css">
	<title>168班轻应用</title>
	<style>
		.carousel-inner img{margin: 0 auto; }
		.a{padding:15px 20px; margin: 20px auto 10px auto;  }
		.b{border-right: solid 1px #ddd;}
		#ta td{text-align: center;}
		.active{color: #62b900;}
		#bottom_bar ul li a:link { text-decoration: none;} 
 　　 	#bottom_bar ul li a:active { text-decoration:none;} 
 　　 	#bottom_bar ul li a:hover { text-decoration:none;color: #62b900;} 
 　　 	#bottom_bar ul li a:visited { text-decoration: none;}
	</style>
</head>
<body>
	<!-- <nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<a href="index.html" class="navbar-brand"style="padding-top:0;"><img src="./Public/img/168.png" alt="l"></a>
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
					<span class="sr-only">切换导航</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse" id="navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
					<li class="active"><a href="#">首页</a></li>
					<li><a href="information.html">资讯</a></li>
					<li><a href="#">案例</a></li>
					<li><a href="#">关于</a></li>
				</ul>
			</div>	
		</div>
	</nav> -->
	<div id="myCarousel"style="margin-top:0px;" class="carousel slide">
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
			<li data-target="#myCarousel" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner">
			<div class="item active"style="background:#223240;"><img src="/web/168/Public/img/slide1.png" alt=""></div>
			<div class="item"style="background:#F5E4DC;"><img src="/web/168/Public/img/slide2.png" alt=""></div>
			<div class="item"style="background:#DE2A2D;"><img src="/web/168/Public/img/slide3.png" alt=""></div>
		</div>
		<a href="#myCarousel" data-slide="prev" class="carousel-control left">
			<span class="glyphicon glyphicon-chevron-left"></span>
		</a>
		<a href="#myCarousel" data-slide="next" class="carousel-control right">
			<span class="glyphicon glyphicon-chevron-right"></span>
		</a>
	</div>
	<div class="tab1">
	<div class="container">
		
		<table class="table"id="ta">
		  <caption class="text-center"style="color:#ccc">168班轻应用</caption>
		  <!-- <thead>
		    <tr>
		      <th>名称</th>
		      <th>城市</th>
		    </tr>
		  </thead> -->
		  <tbody>
		    <tr>
		      <td class="b"><a href="/web/168/cj/search.html" class="btn btn-primary a" >成绩<br>查询</a></td>
		      <td><a href="#" class="btn btn-info a" >班级<br>管理</a></td>
		    </tr>
		    <tr>
		      <td class="b"><a href="#" class="btn btn-success a" >班级<br>管理</a></td>
		      <td><a href="#" class="btn btn-danger a" >班级<br>管理</a></td>
		    </tr>
		    <tr>
		      <td class="b"><a href="#" class="btn btn-warning a" >班级<br>管理</a></td>
		      <td><a href="#" class="btn btn-primary  a" >班级<br>管理</a></td>
		    </tr>
		  </tbody>
		</table>
			<!-- <h2 class="text-center">[为什么选择博学加油站学习]</h2>
			<p class="text-center"style="margin: 20px 0 40px 0;font-size:20px;">强大的师资力量，完美的实战型管理课程，让您的学习实现质的腾飞！</p>
			<div class="row">
				<div class="col-md-6 col">
					<div class="media">
						<div class="media-left">
							<a href=""><img class="media-object" src="./Public/img/tab1-1.png" alt=""></a>
						</div>
						<div class="media-body">
						 	<h4 class="media-heading">课程内容</h4>
						 	<p class="media-muted"><del>其他：高校不知名的讲师编写，
	没有任何实战价值的教材！</del></p>
							<p>我们：：知名企业家、管理学大师联合编写的具有实现性
	教材！</p>
						</div> 
					</div>
					
				</div>
				<div class="col-md-6 col">
					<div class="media">
						<div class="media-left">
							<a href=""><img class="media-object" src="./Public/img/tab1-2.png" alt=""></a>
						</div>
						<div class="media-body">
						 	<h4 class="media-heading">课程内容</h4>
						 	<p class="media-muted">其他：高校不知名的讲师编写，
	没有任何实战价值的教材！</p>
							<p>我们：：知名企业家、管理学大师联合编写的具有实现性
	教材！</p>
						</div> 
					</div>
				</div>
				<div class="col-md-6 col">
					<div class="media">
						<div class="media-left">
							<a href=""><img class="media-object" src="./Public/img/tab1-3.png" alt=""></a>
						</div>
						<div class="media-body">
						 	<h4 class="media-heading">课程内容</h4>
						 	<p class="media-muted">其他：高校不知名的讲师编写，
	没有任何实战价值的教材！</p>
							<p>我们：：知名企业家、管理学大师联合编写的具有实现性
	教材！</p>
						</div> 
					</div>
				</div>
				<div class="col-md-6 col">
					<div class="media">
						<div class="media-left">
							<a href=""><img class="media-object" src="./Public/img/tab1-4.png" alt=""></a>
						</div>
						<div class="media-body">
						 	<h4 class="media-heading">课程内容</h4>
						 	<p class="media-muted">其他：高校不知名的讲师编写，没有任何实战价值的教材！</p>
							<p>我们：：知名企业家、管理学大师联合编写的具有实现性教材！</p>
						</div> 
					</div>
				</div>
			</div> -->
		</div>
	</div>
	<!-- <div class="tab2">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<h3 >强大的学习体系</h3>
					<p >经过管理学大师层层把关、让您的企业突飞猛进。</p>
				</div>
				<div class="col-md-6 col-sm-6">
					<img src="./Public/img/tab2.png" alt="" class="auto img-responsive center-block">
				</div>
			</div>
			
		</div>
	</div> -->
	<!-- <div class="tab3">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<img src="./Public/img/tab3.png" alt="" class="auto img-responsive center-block">
				</div>
				<div class="col-md-6 col-sm-6">
					<h3 >强大的学习体系</h3>
					<p >经过管理学大师层层把关、让您的企业突飞猛进。</p>
				</div>
				
			</div>
			
		</div>
	</div> -->
	<footer id="footer" class="text-muted"style="margin-bottom:40px;">
		<div class="container">
			<!-- <p><a href="">企业培训</a>|<a href="">合作事宜</a>|<a href="">版权投诉</a></p> -->
			<p> © 2009-2016 博学加油站. Powered by hxb0810.</p>
		</div>
	</footer>
		<nav class="navbar navbar-default navbar-fixed-bottom">
		<div class="container"id="bottom_bar">
			<!-- <div class="navbar-header">
				<a href="index.html" class="navbar-brand"style="padding-top:0;"><img src="./Public/img/168.png" alt="l"></a>
				去除自适应按钮
				 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
					<span class="sr-only">切换导航</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button> 
			</div> <-->
				<div class="row">
				<ul class="nav nav-pills nav-justified "style="text-align: center;">
					<div class="col-xs-3">
						<li >
							<a href="<?php echo U('Index/index');?>" class="btn btn-link"><span class="glyphicon glyphicon-home active"></span><br><span class="active">首页</span>
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
							<a href="<?php echo U('Search/index');?>" class="btn btn-link "><span class="glyphicon glyphicon-search"></span><br><span >查询</span></a>
						</li>
					</div>
					<div class="col-xs-3">
						<li>
							<a href="<?php echo U('My/index');?>" class="btn btn-link "><span class="glyphicon glyphicon-user"></span><br><span>我</span></a>
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