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
	<style>
		.red{color: red;}
		
	
	</style>

</head>
<body>
&nbsp;
<div class="container">
<b class="red">暂不开放家长注册！</b><br>
		<form action="/web/168/index.php/Home/Register/do_reg"method="post" id="form"role="form"class="registerform">
				<div class="form-group">
			      <label for="nickname">昵称：</label>
			      <input type="text" class="form-control" name="nickname" id="nickname" title='昵称' placeholder="请填写登录昵称"datatype="s2-10" ajaxurl="/web/168/index.php/Home/Register/ck_nickname"  sucmsg="输入正确！" nullmsg="不能为空！" errormsg="请输入2-10字符！">
			   </div>
			   <div class="form-group">
			      <label for="uname">姓名：</label>
			      <input type="text" class="form-control" name="uname" id="uname" title='用户名' placeholder="请填写真实姓名"datatype="zh2-4"  sucmsg="输入正确！" nullmsg="不能为空！" errormsg="请输入2-4位中文！">
			   </div>
			   <div class="form-group">
			      <label for="position">职　位：</label>
			      	<select name="position" id="position"class="form-control"datatype="*">
			      		<option value="">请选择．．．</option>
			      		<option value="管理员">管理员</option>
			      		<option value="校长">校长</option>
			      		<option value="副校长">副校长</option>
			      		<option value="年级主任">年级主任</option>
			      		<option value="班主任">班主任</option>
			      		<option value="教师">教师</option>
			      		
				</select>
			   </div>
			   <div class="form-group">
			      <label for="department">年级：</label>
			      	<select name="grade" id="department"class="form-control"datatype="*">
			      		<option value="">请选择．．．</option>
			      		<option value="1">高一</option>
			      		<option value="2">高二</option>
			      		<option value="3">高三</option>
					
				</select>
			   </div>
			   <div class="form-group">
			      <label for="sex">性　别：</label>
			      <div class="form-control">
			      	<label class="checkbox-inline">
				      <input type="radio" name="sex" value="男" />男
				 </label>
				 <label class="checkbox-inline">
				     <input type="radio" name="sex" value="女" />女
				 </label>
			      </div>	      
			   </div>
			   <div class="form-group">
			      <label for="upass">密　码：</label>
			      <input class="form-control" type="password" name="upass" id="upass"  placeholder="请输入您设置的密码"datatype="*6-15" errormsg="密码范围在6~15位之间！"/>
			   </div>
			   <div class="form-group">
			      <label for="reupass">重复密码：</label>
			      <input class="form-control" type="password" name="reupass" id="reupass"  placeholder="请再次输入您设置的密码"datatype="*" recheck="upass" errormsg="您两次输入的账号密码不一致！"sucmsg="两次输入相同！"/>
			   </div>
			   <div class="form-group">
			      <label for="code">验证码：</label>
			      <input class="form-control" type="text" name="code" id="code" title='验证码'  placeholder="验证码"/><br>
			      <img src="<?php echo U('Login/code');?>" class="code" onclick="this.src=this.src+'?'+Math.random()"/><span><small>点击图片刷新</small></span>
			   </div>
			   <button type="submit" class="btn btn-success btn-block" title="注册">注册</button>
			   <button type="reset" class="btn btn-info btn-block" title="重置">重置</button>
			   <a href="<?php echo U('Login/index');?>"role="button"class="btn btn-primary btn-block"><span class="small">已经有账号？</span>登录</a>
		</form>
</div>
&nbsp;
<script type="text/javascript">
// $(function(){
// 	//$(".registerform").Validform();  //就这一行代码！;
		
// 	$(".registerform").Validform({
// 		tiptype:3
// 	});
// })

</script>
<script type="text/javascript">
$(function(){
	//$(".registerform").Validform();  //就这一行代码！;
		
	var demo=$(".registerform").Validform({
		tiptype:3,
		//label:".label",
		showAllError:true,
		datatype:{
			"zh1-6":/^[\u4E00-\u9FA5\uf900-\ufa2d]{1,6}$/
		},
		//ajaxPost:true
	});
	
	//通过$.Tipmsg扩展默认提示信息;
	//$.Tipmsg.w["zh1-6"]="请输入1到6个中文字符！";
	//demo.tipmsg.w["zh1-6"]="请输入1到6个中文字符！";
	
	//demo.addRule([{
		//ele:".inputxt:eq(0)",
		//datatype:"zh2-4"
	//}
	//]);
	
})
</script>
</body>
</html>