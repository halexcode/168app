<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" href="/168/Public/css/bootstrap.min.css">
	<link rel="stylesheet" href="/168/Public/css/style.css">
	<link rel="stylesheet" type="text/css" href="/168/Public/css/Validform.css" />
	<script type="text/javascript" src="/168/Public/js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="/168/Public/js/Validform_v5.3.2_min.js"></script>
	<title><?php echo (C("site_name")); ?>—密码修改</title>
	<style>
		.red{color: red;}
		
	
	</style>

</head>
<body>
	&nbsp;
<div class="container">
  	<div class="row">
  		<div class="col-md-10">
  			<form action="/168/index.php/Home/My/re_upass/id/<?php echo session('uid'); ?>" method="post" role="form" class="upassform">
  				<div class="form-group">
				      <label for="oldpass">原密码：</label>
				      <input type="password" class="form-control" name="oldpass" id="oldpass" title='原始密码' placeholder="请输入您的原始密码"datatype="*2-15" ajaxurl="/168/index.php/Home/My/ck_upass/uname/<?php echo session('username'); ?>" sucmsg="输入正确！" nullmsg="请输入原始密码！" errormsg="请输入2-15位密码！">
				</div>
				<div class="form-group">
				      <label for="newpass">新密码：</label>
				      <input type="password" class="form-control" name="newpass" id="newpass" title='新密码' placeholder="请输入您的最新密码"datatype="*6-15" errormsg="新密码范围在6~15位之间！">
				</div>
				<div class="form-group">
				      <label for="newpass2">重复新密码：</label>
				      <input type="password" class="form-control" name="newpass2" id="newpass2" title='新密码' placeholder="请再次输入您的最新密码"datatype="*" recheck="newpass" errormsg="您两次输入的账号密码不一致！"sucmsg="两次输入相同！">
				</div>
		   		<button type="submit" class="btn btn-danger">修改密码</button>			 
  			</form>
  		</div>

  	</div>
</div>	
<script type="text/javascript">
$(function(){
	//$(".registerform").Validform();  //就这一行代码！;
		
	$(".upassform").Validform({
		tiptype:3
	});
})
</script>
</body>
</html>