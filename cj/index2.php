<?php
$re=getchengji2('./d/p.data','郭琪','10成绩：');
if ($re) {
	var_dump($re) ;
	echo $re[0];
} else {
	echo 'error';
}
//var_dump(getchengji('d/p.data','韩壮','10yue'));

function getchengji2($file,$name,$title) {
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
function getchengji($file,$name,$title) {
	set_time_limit(0);
	$q=$name;
		$dreamdb= file($file,FILE_IGNORE_NEW_LINES);//读取区号文件
		$count=count($dreamdb);//计算行数
		$keyname=trim($q);//去掉关键字的空格
		//$kemu=array('准考证号','姓名' ,'班级','语文','数学','英语','物理','化学','生物','政治','历史','地理','总分','班排名','校排名');	
			for($i=0; $i<$count; $i++) {
				$detail=explode("\t",rtrim($dreamdb[$i]));//拆分每一行为一个数组
				 //var_dump($detail);
				 //判断文理科
				 if (strstr($detail[3], '理科')) {
				 	$kemu=array('准考证号','姓名' ,'班级','文理','语文','数学','英语','物理','化学','生物','总分','班排名','校排名');
				 } elseif (strstr($detail[3], '文科')){
				 	$kemu=array('准考证号','姓名' ,'班级','文理','语文','数学','英语','政治','历史','地理','总分','班排名','校排名');
				 } else{
				 	$kemu=array('准考证号','姓名' ,'班级','文理','语文','数学','英语','物理','化学','生物','政治','历史','地理','总分','班排名','校排名');
				 }
				 //判断文理科结束
				 if (strstr($detail[1], $keyname)) {//判断是否包含关键字
				 $re[]=array_combine($kemu, $detail) ;	
				  	//$re[]=$detail;
				  }
				//  另一种实现方法;
				// if (preg_grep("/$keyword/", $detail)) {//判断数组中是否有对应的值返回相关全部数组
				//  	$re[]=$detail;
				//  }
			}
			//var_dump($re) ;
			if (!empty($re)) {
				$res=$title;
				foreach ($re as $key => $value) {
					foreach ($value as $k => $v) {
						$res.= $k.'：'.$v.'，';
					}
				echo '</br>';
				}
			} else {
				echo '获取数据失败';
			}
			return $res;
}				
?>