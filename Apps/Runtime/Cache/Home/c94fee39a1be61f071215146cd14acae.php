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
	<title><?php echo (C("site_name")); ?>—add_StudentsInfo</title>
	<style>
		.red{color: red;}
		
	
	</style>

</head>
<body>
&nbsp;
<div class="container">
		<form action="/web/168/index.php/Home/My/do_add_s" enctype="multipart/form-data" method="post" id="form"role="form"class="registerform">
				
			   <div class="form-group">
			      <label for="sname">姓名：</label>
			      <input type="text" class="form-control" name="sname" id="sname" title='学生姓名' placeholder="请填写姓名"datatype="zh2-4" ajaxurl="/web/168/index.php/Home/My/ck_sname" sucmsg="输入正确！" nullmsg="不能为空！" errormsg="请输入2-4位中文！">
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
			      <label for="class">班 级：</label>
			      	<select name="class" id="class" class="form-control" datatype="*">
			      		<option value="168">168</option>
			      		<option value="其它">其它</option>
			      		<!-- <option value="校长">校长</option>
			      		<option value="副校长">副校长</option>
			      		<option value="年级主任">年级主任</option>
			      		<option value="班主任">班主任</option>
			      		<option value="教师">教师</option> -->
			      		
				</select>
			   </div>
			   <div class="form-group">
			      <label for="grade">年 级：</label>
			      	<select name="grade" id="grade" class="form-control" datatype="*">
			      		<option value="">请选择</option>
			      		<option value="高一">高一</option>
			      		<option value="高二">高二</option>
			      		<option value="高三">高三</option>
			      		<!-- <option value="年级主任">年级主任</option>
			      		<option value="班主任">班主任</option>
			      		<option value="教师">教师</option> -->
			      		
				</select>
			   </div>
			   <div class="form-group">
			      <label for="type">类 型：</label>
			      	<select name="type" id="type"class="form-control"datatype="*">
			      		<option value="">请选择．．．</option>
			      		<option value="跑校">跑校</option>
			      		<option value="住校">住校</option>
			      		
					
				</select>
			   </div>
			   <div class="form-group">
			      <label for="image">照片：</label>
			      		
			      			<input type="file" onchange="previewImage(this)" name="image" /><br>

			      			<div id="preview" class="text-center">
	  						<!-- <img id="imghead" width=100 height=100 border=0 src='<%=request.getContextPath()%>/Public/img/168.jpg'> -->
	  						<img id="imghead" width=100 height=100 border=0 src='/web/168/Public/img/16800.jpg'>
							</div>
			      </table>
			      	 
					 
			      <!-- <input type="file" name="image" id="image" > -->
			   </div>
			   <button type="submit" class="btn btn-success btn-block" title="提交">提交</button>
			   <button type="reset" class="btn btn-info btn-block" title="重置">重置</button>
		</form>
</div>
&nbsp;
<script type="text/javascript">
	//实时显示学生上传图片-----------------------
    function previewImage(file)  
    {  
          
        fileName=$("#img").val();  
        $("#imgName").attr("value",fileName);  
          
      var MAXWIDTH  = 218;     //用来显示上传图片的宽度  
      var MAXHEIGHT = 158;     //用来显示上传图片的高度  
      var div = document.getElementById('preview');  
      if (file.files && file.files[0])  
      {  
        div.innerHTML = '<img id=imghead>';  
        var img = document.getElementById('imghead');  
        img.onload = function(){  
          var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);  
          img.width = rect.width;  
          img.height = rect.height;  
          img.style.marginLeft = rect.left+'px';  
          img.style.marginTop = rect.top+'px';  
        };  
        var reader = new FileReader();  
        reader.onload = function(evt){img.src = evt.target.result;};  
        reader.readAsDataURL(file.files[0]);  
      }  
      else  
      {  
        var sFilter='filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src="';  
        file.select();  
        var src = document.selection.createRange().text;  
        div.innerHTML = '<img id=imghead>';  
        var img = document.getElementById('imghead');  
        img.filters.item('DXImageTransform.Microsoft.AlphaImageLoader').src = src;  
        var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);  
        status =('rect:'+rect.top+','+rect.left+','+rect.width+','+rect.height);  
        div.innerHTML = "<div id=divhead style='width:"+rect.width+"px;height:"+rect.height+"px;margin-top:"+rect.top+"px;margin-left:"+rect.left+"px;"+sFilter+src+"\"'></div>";  
      }  
    }  
    function clacImgZoomParam( maxWidth, maxHeight, width, height ){  
        var param = {top:0, left:0, width:width, height:height};  
        if( width>maxWidth || height>maxHeight )  
        {  
            rateWidth = width / maxWidth;  
            rateHeight = height / maxHeight;  
            if( rateWidth > rateHeight )  
            {  
                param.width =  maxWidth;  
                param.height = Math.round(height / rateWidth);  
            }else  
            {  
                param.width = Math.round(width / rateHeight);  
                param.height = maxHeight;  
            }  
        }  
        param.left = Math.round((maxWidth - param.width) / 2);  
        param.top = Math.round((maxHeight - param.height) / 2);  
        return param;  
    } 
    //实时显示学生上传图片结束----------------------- 
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