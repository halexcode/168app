<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" href="/web/168/Public/css/bootstrap.min.css">
	<link rel="stylesheet" href="/web/168/Public/css/style.css">
	<link rel="stylesheet" type="text/css" href="/web/168/Public/css/Validform.css" />
	<script type="text/javascript" src="/web/168/Public/js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="/web/168/Public/js/Validform_v5.3.2_min.js"></script>
	<title><?php echo (C("site_name")); ?>—登陆</title>
	<script type="text/javascript">
		    if(window !=top){  
		        top.location.href=location.href;  
		    }  
	</script>
	<style>
		
		/*.loginform table tr{margin: 10px;padding: 10px;}*/
		.loginform table tr td{padding: 5px;word-break:keep-all;border: 0;}
	
	</style>
</head>
<body>
<!-- <center><h2>该项目已暂停！</h2></center> -->
<!----登录页-->
&nbsp;
<div class="container">
	<div class="panel panel-default">
	    <div class="panel-heading">
	        <h3 class="panel-title">
	            <?php echo (C("site_name")); ?>—登陆
	        </h3>
	    </div>
	    <div class="panel-body">
	        <form action="/web/168/index.php/Home/Login/do_login" method="post" class="loginform">
			<table class="table">
				
				<tr >
					<td ><label for="uname">用户名：</label></td>
					<td ><input type="text" class="form-control" name="uname" id="uname" title='用户名' placeholder="请输入您的昵称"datatype="*"ajaxurl="/web/168/index.php/Home/Login/ck_uname" sucmsg="输入正确！" nullmsg="请输入用户名！" ></td>
				</tr>
				<tr >
					<td><label for="upass">密　码：</label></td>
					<td ><input class="form-control" type="password" name="upass" id="upass"  placeholder="请输入您的密码"datatype="*"ajaxurl="/web/168/index.php/Home/Login/ck_upass"nullmsg="请输入密码！"/></td>
					
				</tr>
				<tr>
					<td ><label for="code">验证码：</label></td>
					<td ><input class="form-control" type="text" name="code" id="code" title='验证码'  placeholder="验证码"datatype="*"ajaxurl="/web/168/index.php/Home/Login/ck_code"nullmsg="请输入验证码！"/></td>
					
				</tr>
				<tr>
					<td ></td>
					<td ><img src="/web/168/index.php/Home/Login/code"  class="code" onclick="this.src=this.src+'?'+Math.random()"/><span><small style="color:red">&nbsp;&nbsp;(点击图片刷新)</small></span></td>
					
				</tr>
				<tr>
					<td colspan="3">
					<button type="submit" class="btn btn-success btn-block" title="登录">登录</button>
					<button type="reset" class="btn btn-info btn-block" title="重置">重置</button>
					<a href="<?php echo U('Register/index');?>"role="button"class="btn btn-primary btn-block"><span class="small">没有账号？</span><strong>注册</strong></a>
					</td>
				</tr>
				
			</table>
			</form>
	    </div>
	</div>
		
	
</div>

<!-- 旧版登录页 -->
<!-- <div class="container">
	<div class="col-md-6 col-md-offset-3">
		<form role="form" action="/web/168/index.php/Home/Login/do_login" method="post">
		   <div class="form-group">
		      <label for="uname">用户名：</label>
		      <input type="text" class="form-control" name="uname" id="uname" title='用户名' placeholder="Enter your name">
		   </div>
		   <div class="form-group">
		      <label for="upass">密　码：</label>
		      <input class="form-control" type="password" name="upass" id="upass"  placeholder="password"/>
		   </div>
		   <div class="form-group">
		      <label for="code">验证码：</label>
		      <input class="form-control" type="text" name="code" id="code" title='验证码'  placeholder="Verify code"/><br>
		      <img src="/web/168/index.php/Home/Login/code"  class="code" onclick="this.src=this.src+'?'+Math.random()"/><span><small>&nbsp;&nbsp;点击图片刷新</small></span>
		   </div>
		   <button type="submit" class="btn btn-success btn-block" title="登录">登录</button>
		   <button type="reset" class="btn btn-info btn-block" title="重置">重置</button>
		   <a href="<?php echo U('Register/index');?>"role="button"class="btn btn-primary btn-block"><span class="small">没有账号？</span><strong>注册</strong></a>
		</form>
	</div>
</div> -->


<script type="text/javascript">
$(function(){
	//$(".registerform").Validform();  //就这一行代码！;
		
	$(".loginform").Validform({
		tiptype:1,
		
	});
})
</script>
</body>
</html>