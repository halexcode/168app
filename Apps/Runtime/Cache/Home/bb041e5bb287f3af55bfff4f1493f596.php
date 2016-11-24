<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" href="/web/168/Public/css/bootstrap.min.css">
	<link rel="stylesheet" href="/web/168/Public/css/style.css">
	<title><?php echo (C("site_name")); ?>-QrcodeScan</title>
	<style>
 		.w{width: 45%;}
 		#img{display: none;}
 		/*.a{width: 50%;height: 50%;}*/
	</style>
	<script>
		function input(){
			var value=document.getElementById('in').value;
				//alert(value);
			if (value==0) {
				document.getElementById('hide').style.display='block';
			}else{
				document.getElementById('hide').style.display='none';
			}
			
			
		}
	</script>
	</head> 
<body>
	<div class="container" style="margin-top:7px;">
	<div class="diver"></div>
   		<div class="panel panel-default">
		   <div class="panel-heading">
		      <h3 class="panel-title"><center><b>扫描数据</b></center></h3>	
		   </div>
		   <div class="panel-body">
				<div><!-- class="table-responsive" -->
				   <table class="table table-bordered table-hover text-center">
				      <!-- <caption class="text-center">&nbsp;</caption> -->
				      <tbody>
				      
				     
				     <tr >
				     	<td colspan="2">

							<!-- <div class="carousel-inner">
							<div class="item active"><img src="/web/168/Public/img/168.jpg" alt=""></div>
							</div> -->

				     	<img src="/web/168<?php echo ($user["image"]); ?>" class="carousel-inner img-responsive img-thumbnail " id="ab">
				     	</td>
				     </tr>
				     <tr>
				     	<td class="w">姓名：</td><td><span class="text-primary h3"><?php echo ($user["sname"]); ?></span ></td>
				     </tr>
				     <tr>
				     	<td class="w">类型：</td><td><?php echo ($user["type"]); ?></td>
				     </tr>
				     <tr>
				     	<td class="w">班级：</td><td><?php echo ($user["class"]); ?>班(<?php echo ($user["grade"]); ?>)</td>
				     </tr>
				     <tr >
				     <form action="/web/168/index.php/Home/Search/do_s/sid/<?php echo ($user['sid']); ?>" method="post" id="form" role="form">
						<td class="w" style="vertical-align:middle;"><div class="form-group">
						      	<select name="wj"  class="form-control" id="in" oninput="input();">
						      		<option value="无">违纪项目...</option>
						      		<option value="私自外出">私自外出</option>
						      		<option value="不带胸卡">不带胸卡</option>
						      		<option value="顶撞老师">顶撞老师</option>
						      		<option value="购买外卖">购买外卖</option>	
						      		<option value="0">其它</option>	
								</select>
			   				</div>
			   				<div class="form-group" id="hide" style="display: none">
			   					<input type="text" name="wj2" class="form-control"placeholder="手动输入">
			   				</div>
			   			</td>
						<td style="vertical-align:middle;">
						
							<button type="submit" class="btn btn-success btn-danger" title="提交"onclick="return sub(this);" v="<?php echo ($user["sname"]); ?>"><span class="glyphicon glyphicon-send"></span>&nbsp;一键通知班主任</button>
							<!-- <a href="<?php echo U('Search/do_s',array('uid'=>$user['uid'],'wj'=>wj));?>" class="btn  btn-danger" title="一键通知班主任" onclick="return sub();"><span class="glyphicon glyphicon-send"></span>&nbsp;一键通知班主任</a> -->
						</td>
					</form>
				     </tr>
				      </tbody>
				   </table>
				</div>
		   </div>
		   <div id="img"><img src="/web/168<?php echo ($user["image"]); ?>" class="img-thumbnail" ></div>
		   <div class="panel-footer text-center">
					Copyright © 168
			</div>
		</div>
   </div>
   <script src="/web/168/Public/js/bootstrap.min.js"></script>
   <script src="/web/168/Public/js/jquery.min.js"></script>
   <script src="/web/168/Public/js/layer/layer.js"></script>
   <script type="text/javascript">
   $('#ab').on('click', function(){
  		layer.open({
	  	type: 1,
	  	title: false,
	  	area: ['300px', '300px'],
	  	closeBtn: 0,
	  	skin: 'layui-layer-nobg', //没有背景色
	  	shadeClose: true,
	  	closeBtn:2,
	  	content: $('#img')
		});
	});

		
   function sub(x){
   		var sname=x.getAttribute('v');
		if(confirm('确定要提交 ['+sname+'] 的违纪记录吗？')){
		return true;
		}else{
		return false;
		}
	}
	
	
   
   </script>
</body>
</html>