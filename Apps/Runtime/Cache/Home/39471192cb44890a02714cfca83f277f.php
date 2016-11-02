<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" href="/web/168/Public/css/bootstrap.min.css">
	<link rel="stylesheet" href="/web/168/Public/css/style.css">
	<title><?php echo (C("site_name")); ?>-学生管理</title>
	<style>
 		
	</style>
	
</head>
<body>
	<div class="container"style="margin-top:7px;">
	<div class="diver"></div>
   		<div class="panel panel-default">
		   <div class="panel-heading">
		      <h3 class="panel-title"><b >学生列表</b><a href="<?php echo U('My/add_s');?>" class="btn btn-link pull-right"style="margin-top:-6px;"><span class="glyphicon glyphicon-plus "></span>添加学生</a></h3>	
		   </div>
		   <div class="panel-body">
				<div class="table-responsive">
				   <table class="table table-bordered table-striped table-hover text-center">
				      <caption>&nbsp;共查询获得&nbsp;<span class="text-success"><?php echo ($count); ?></span>&nbsp;条数据</caption>
				      <tbody>
				      <tr>
				      	<th>姓名</th><th>性别</th><th>班级</th><th>年级</th><th>类型</th><th>图像</th><th>登记时间</th><th>操作</th>
				      </tr>
				     <?php if(is_array($slist)): $i = 0; $__LIST__ = $slist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
				     	<td><?php echo ($vo["sname"]); ?></td><td><?php echo ($vo["sex"]); ?></td><td><?php echo ($vo["class"]); ?></td><td><?php echo ($vo["grade"]); ?></td><td><?php echo ($vo["type"]); ?></td><td><img src="/web/168<?php echo ($vo["image"]); ?>" onclick="show(this)" style="width: 50px;height: 50px;"></td><td><?php echo (date("Y-m-d H:i:s",$vo["time"])); ?></td>
						<td>
						
							<?php if(($_SESSION['username']) == "hxb0810"): ?><a href="<?php echo U('My/sedit',array('sid'=>$vo['sid']));?>" class="btn btn-xs btn-info" title="编辑"><span class="glyphicon glyphicon-edit"></span></a>
							<a href="<?php echo U('My/sdel',array('sid'=>$vo['sid']));?>" class="btn btn-xs btn-danger"onclick="return del(this)" title="删除" v="<?php echo ($vo["sname"]); ?>"><span class="glyphicon glyphicon-trash"></span></a>
							<?php else: ?>
							
							<span class="text-center text-danger">无权操作</span><?php endif; ?>
						</td>
				     </tr><?php endforeach; endif; else: echo "" ;endif; ?>
				      </tbody>
				   </table>
				</div>
		   </div>
		   <div class="panel-footer">
					<div style="text-align:center;margin-top:-23px;margin-bottom:-23px;">
						<ul class="pagination"><?php echo ($page); ?></ul>
					</div>	
			</div>
		</div>
   </div>
   <script src="/web/168/Public/js/jquery.min.js"></script>
   <script src="/web/168/Public/js/layer/layer.js"></script>
   <script type="text/javascript">
	// $('#simg').on('click', function(){
 //  		layer.open({
	//   	type: 1,
	//   	title: false,
	//   	area: ['300px', '300px'],
	//   	closeBtn: 0,
	//   	skin: 'layui-layer-nobg', //没有背景色
	//   	shadeClose: true,
	//   	closeBtn:2,
	//   	content: $('#showimg')
	// 	});
	// });
	//点击小图片显示大图
	function show(x){
		var i=x.src;
		layer.open({
	  	type: 1,
	  	title: false,
	  	area: ['300px', '300px'],
	  	closeBtn: 0,
	  	skin: 'layui-layer-nobg', //没有背景色
	  	shadeClose: true,
	  	closeBtn:2,
	  	content: '<div><img src="'+i+'" alt="" /></div>',
		});
	}
	
	function del(x){
		//var stu=document.getElementById("studel");
		var sname=x.getAttribute('v');
		if(confirm('确定要删除学生 ['+sname+'] 的信息吗？')){
		return true;
		}else{
		return false;
		}
	}
	</script>
</body>
</html>