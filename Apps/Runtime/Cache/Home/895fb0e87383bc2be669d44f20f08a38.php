<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
	<link href="/web/168/Public/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="/web/168/Public/css/style.css">
	<link rel="stylesheet" type="text/css" href="/web/168/Public/css/Validform.css" />
	<script type="text/javascript" src="/web/168/Public/js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="/web/168/Public/js/Validform_v5.3.2_min.js"></script>
	<title>168班纪律查询</title>
</head>
<body>
	<div class="container"style="margin-top:7px;">
	<div class="diver"></div>
   		<div class="panel panel-default">
		   <div class="panel-heading">
		      <h3 class="panel-title"><center><b>168班纪律查询</b></center></h3>	
		   </div>
		   <div class="panel-body">
		   请各位及时查询并给予适当的教育<br/>
		   <hr>
		      <form role="form" class="jilv" method="post" action="/web/168/index.php/Home/Outline/do_search">
		       <!-- <div class="form-group">
			      <label for="department"class="sr-only">月份：</label>
			      	<select name="mon" id="department"class="form-control">
			      		<option value=''>请选择考试月份．．．</option>
					<option value="16810">10月份月考</option>

				</select>
			   </div> -->
			   <div class="form-group">
			      <label for="name" class="sr-only">学生姓名：</label>
			      <input type="text" class="form-control" id="name" name="sname"title='学生姓名' placeholder="请填写学生姓名"datatype="zh2-4"  sucmsg="输入正确！" nullmsg="不能为空！" errormsg="请输入2-4位中文！">
			   </div>
			   <button type="submit" class="btn btn-primary btn-block">提交</button>
		</form>

		   </div>
		</div>
   </div>
   <script type="text/javascript">
$(function(){
	//$(".registerform").Validform();  //就这一行代码！;
		
	var demo=$(".jilv").Validform({
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