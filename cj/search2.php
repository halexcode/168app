<?php 
function getchengji2($file,$name) {
	set_time_limit(0);
	$q=$name;
		$dreamdb= file($file,FILE_IGNORE_NEW_LINES);//读取区号文件
		$count=count($dreamdb);//计算行数
		$keyname=trim($q);//去掉关键字的空格
		//$kemu=array('准考证号','姓名' ,'班级','语文','数学','英语','物理','化学','生物','政治','历史','地理','总分','班排名','校排名');	
			for($i=0; $i<$count; $i++) {
				$detail=explode("\t",rtrim($dreamdb[$i]));//拆分每一行为一个数组
				 //var_dump($detail);
				 if (strstr($detail[1], $keyname)) {//判断是否包含关键字
				  	$re=$detail;
				  }
				//  另一种实现方法;
				// if (preg_grep("/$keyword/", $detail)) {//判断数组中是否有对应的值返回相关全部数组
				//  	$re[]=$detail;
				//  }
			}
			//var_dump($re) ;
			return $re;
}
//var_dump($_POST);
$name=$_POST['uname'];
$m=$_POST['mon'];
//echo $m;
$res=getchengji2('d/'.$m.'.data',$name);
//var_dump($re);
//$resd="<td>$re[0]</td><td>$re[1]</td><td>$re[2]</td><td>$re[3]</td><td>$re[4]</td><td>$re[5]</td><td>$re[6]</td><td>$re[7]</td><td>$re[8]</td><td>$re[9]</td><td>$re[10]</td><td>$re[11]</td><td>$re[12]</td>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
	<link href="i/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<title>168班成绩查询</title>
	<style>
		body {
	background: #eee;
	font-family: "Helvetica Neue", Helvetica, Arial, "Microsoft Yahei UI", "Microsoft YaHei", SimHei, "\5B8B\4F53", simsun, sans-serif;
	}
	</style>
</head>
<body>
	<div class="container"style="margin-top:7px;">
	<div class="diver"></div>
   		<div class="panel panel-default">
		   <div class="panel-heading">
		      <h3 class="panel-title"><center><b>168班成绩查询结果</b></center></h3>	
		   </div>
		   <div class="panel-body">
				<div class="table-responsive">
				   <table class="table">
				      <caption></caption>
				      <tbody>
				      <?php 
				      	if ($res) {
				      		//var_dump($res);
				      		echo '<tr><td><b>准考证号：</b></td><td>'.$res[0].'</td><td><b>姓名：</b></td><td>'.$res[1].'</td></tr>';
				      		echo '<tr><td><b>班级：</b></td><td>'.$res[2].'</td><td><b>语文：</b></td><td>'.$res[4].'</td></tr>';
				      		echo '<tr><td><b>数学：</b></td><td>'.$res[5].'</td><td><b>英语：</b></td><td>'.$res[6].'</td></tr>';
				      		echo '<tr><td><b>物理：</b></td><td>'.$res[7].'</td><td><b>化学：</b></td><td>'.$res[8].'</td></tr>';
				      		echo '<tr><td><b>生物：</b></td><td>'.$res[9].'</td><td><b>政治：</b></td><td>'.$res[10].'</td></tr>';
				      		echo '<tr><td><b>历史：</b></td><td>'.$res[11].'</td><td><b>地理：</b></td><td>'.$res[12].'</td></tr>';
				      		echo '<tr><td><b>总分：</b></td><td>'.$res[13].'</td><td><b>班排名：</b></td><td>'.$res[14].'</td></tr>';
				      		echo '<tr><td><b>校排名：</b></td><td>'.$res[15].'</td><td></td><td>'.'</td></tr>';
				      	} else {
				      		echo '<font style="color:red">查无此人或数据库尚未上传！</font>';
				      	}
				       ?>
				      </tbody>
				   </table>
				</div>
		   </div>
		</div>
   </div>	
</body>
</html>