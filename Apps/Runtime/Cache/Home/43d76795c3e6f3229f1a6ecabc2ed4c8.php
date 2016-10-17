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
	<div class="row">
		<form action='<?php if(empty($user["uname"])): ?>/web/168/index.php/Home/My/do_info
				<?php else: ?>
				/web/168/index.php/Home/My/do_edit_info<?php endif; ?>' method="post" class="uinfo">
			<table class="table table-bordered table-striped table-hover">
				<tr>
					<td class="col-md-2 col-sm-3 col-xs-3 text-center">昵称：</td>
					<td class="col-md-4 col-sm-7 col-xs-7"><?php echo (session('username')); ?></td>
					<td class="col-md- col-sm-2 col-xs-2"><span class="Validform_checktip"style=" line-height:35px"></span></td>
				</tr>
				<tr>
					<td class="col-md-2 text-center col-sm-3 col-xs-3">姓名：</td>
					<td class="col-md-4 col-sm-7 col-xs-7"><input type="text" name="uname" class="form-control" datatype="s2-4" sucmsg="&nbsp;" value="<?php echo ($user['uname']?$user['uname']:'无'); ?>" /></td>
					<td class="col-md- col-sm-2 col-xs-2"><span class="Validform_checktip"style=" line-height:35px"></span></td>
				</tr>
				<tr>
					<td class="col-md-2 text-center col-sm-3 col-xs-3">电话：</td>
					<td class="col-md-4 col-sm-7 col-xs-7"><input type="text" name="tel" class="form-control" datatype="m"sucmsg="&nbsp;" value="<?php echo ($user['tel']?$user['tel']:'无'); ?>" /></td>
					<td class="col-md- col-sm-2 col-xs-2"><span class="Validform_checktip"style=" line-height:35px"></span></td>
				</tr>
				<tr>
					<td class="col-md-2 text-center">职位：</td>
					<td class="col-md-4"><input type="text" name="position" class="form-control" datatype="s2-6"sucmsg="&nbsp;" value="<?php echo ($user['position']?$user['position']:'教员'); ?>" /></td>
					<td class="col-md-"><span class="Validform_checktip"style=" line-height:35px"></span></td>
				</tr>
				<!-- <tr>
					<td class="col-md-2 text-center">地址：</td>
					<td class="col-md-4"><input type="text" name="adress" class="form-control" datatype="*"sucmsg="&nbsp;" value="<?php echo ($list['adress']?$list['adress']:''); ?>" /></td>
					<td class="col-md-"><span class="Validform_checktip"style=" line-height:35px"></span></td>
				</tr> -->
				<tr>
					<td class="col-md-2 text-center">年级：</td>
					<td class="col-md-4">
					<select name="grade" id=""class="form-control"datatype="*"sucmsg="&nbsp;">
						<?php switch($user["grade"]): case "1": ?><option value="1">高一</option><?php break;?>   
						 <?php case "2": ?><option value="2">高二</option><?php break;?>
						 <?php case "3": ?><option value="3">高三</option><?php break;?>
						 <?php default: ?><option value="">请选择。。</option><?php endswitch;?>
						<option value="1">高一</option>
						<option value="2">高二</option>
						<option value="3">高三</option>
					</select>
					</td>
					<td class="col-md-"><span class="Validform_checktip"style=" line-height:35px"></span></td>
				</tr>
				<tr>
					<td class="col-md-2 text-center">班级：</td>
					<td class="col-md-4"><input name="class" type="text" class="form-control" datatype="n2-3"sucmsg="&nbsp;" value="<?php echo ($user['class']?$user['class']:'无'); ?>" /></td>
					<td class="col-md-"><span class="Validform_checktip"style=" line-height:35px"></span></td>
				</tr>
				<tr>
					<td class="col-md-2 text-center">科目：</td>
					<td class="col-md-4">
						<select name="subject" id=""class="form-control"datatype="*"sucmsg="&nbsp;">
						<option value="<?php echo ($user['subject']?$user['subject']:''); ?>"><?php echo ($user['subject']?$user['subject']:'请选择。。'); ?></option>
						<option value="语文">语文</option>
						<option value="数学">数学</option>
						<option value="英语">英语</option>
						<option value="物理">物理</option>
						<option value="化学">化学</option>
						<option value="生物">生物</option>
						<option value="政治">政治</option>
						<option value="历史">历史</option>
						<option value="地理">地理</option>
						<option value="音乐">音乐</option>
						<option value="体育">体育</option>
						<option value="美术">美术</option>
						<option value="通用">通用</option>
						<option value="信息技术">信息技术</option>
					</select>
					</td>
					<td class="col-md-"><span class="Validform_checktip"style=" line-height:35px"></span></td>
				</tr>
				
			</table>
				<input type="hidden" name="uid" value="<?php echo (session('uid')); ?>"/>
				<input type="hidden" name="nickname" value="<?php echo (session('username')); ?>"/>
				<?php if(empty($user["uname"])): ?><button type="submit" class="btn btn-success btn-block" title="提交">提交</button>
				<?php else: ?>
				<button type="submit" class="btn btn-success btn-block" title="修改">修改</button><?php endif; ?>
			   
			   <button type="reset" class="btn btn-info btn-block" title="重置">重置</button></br>
		</form>

	</div>
	
			
			
			
		
	
</div>

<script type="text/javascript">
$(function(){
	//$(".registerform").Validform();  //就这一行代码！;
		
	$(".uinfo").Validform({
		tiptype:2
	});
})
</script>
</body>
</html>