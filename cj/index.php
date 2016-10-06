<?php
set_time_limit(0);
$y=date(Y);
$m=date(m);
$d=date(d);
$h=date(H);
$n=date(i);
$t = ''.$y.$m.$d.$h.$n.'';
$n=mt_rand(111,999);
$q = trim($_GET['q']); //获取查询关键词
$w = trim($_GET['w']); //获取查询类别关键词
$page = intval($_GET['p']); //页数
$head = '2015年孝义三中高二年级期末考试成绩查询系统';
//网页标题
$title = '准考证号码,姓名,班级,语文,数学,英语,物理,化学,生物,总分,班排名,校排名,市排名'; //分项,用于生成EXCEL表格标题和网页关键字
if($page==0) $page=1;
$r_num = 0; //结果个数
$p_num = 3; //每页条数
$result = "";

$shengpy = array('key1','key2','key3','key4');
$sheng = array('准考证号码','姓名');

if($q){
	switch ($_GET['w']){
		case "key1":
		case "key2":
		case "key3":
		case "key4":
			$keydb = "k/".$t.$n.$w.$q.".csv";
			break;
		default:
			$keydb = "k/".$t.$n.$q.".csv";
			break;
	}

	if (!@file_exists($keydb)){
		$dreamdb=file("d/p.dat");//读取区号文件
		$count=count($dreamdb);//计算行数

		for($i=0; $i<$count; $i++) {
			$keyword=explode(" ",$q);//拆分关键字
			$dreamcount=count($keyword);//关键字个数
			$detail=explode("\t",$dreamdb[$i]);

			for ($ai=0; $ai<$dreamcount; $ai++){
				switch ($_GET['w']){
					case "key1":
						@eval("\$found = eregi(\"$keyword[$ai]\",\"$detail[0]\");");
						$qw = "准考证号: ";
						break;
					case "key2":
						@eval("\$found = eregi(\"$keyword[$ai]\",\"$detail[1]\");");
						$qw = "姓名: ";
						break;
					case "key3":
						@eval("\$found = eregi(\"$keyword[$ai]\",\"$detail[2]\");");
						$qw = "班级: ";
						break;
					case "key4":
						@eval("\$found = eregi(\"$keyword[$ai]\",\"$detail[3]\");");
						$qw = "语文: ";
						break;
					default:
						@eval("\$found = eregi(\"$keyword[$ai]\",\"$dreamdb[$i]\");");
						$qw = "孝义三中: ";
						break;
				}

				if(($found)){
					$r_num++;
					if(fmod($r_num, $p_num)==0) $s .= "\n";
					$s .= ''.$detail[0].','.$detail[1].','.$detail[2].','.$detail[3].''.$detail[4].''.$detail[5].','.$detail[6].','.$detail[7].','.$detail[8].','.$detail[9].','.$detail[10].','.$detail[11].'';
					if($r_num>=$p_num*($page-1)+1 && $r_num<=$p_num*$page){
					$result .= '<tr height="24" class="res"><td >'.$detail[0].'</td><td>'.$detail[1].'</td><td>'.$detail[2].'</td><td>'.$detail[3].'</td><td>'.$detail[4].'</td><td>'.$detail[5].'</td><td>'.$detail[6].'</td><td>'.$detail[7].'</td><td>'.$detail[8].'</td><td>'.$detail[9].'</td><td>'.$detail[10].'</td><td>'.$detail[11].'</td></tr>';
					}
					break;
				}
			}
			$p = ceil($r_num/$p_num); //结果实际页数
		}
		//将数据缓存下来
		$fp = @fopen($keydb,"a");
		@fwrite($fp,$head.$q."\n".$title."\n".$s);
		@fclose($fp);
	}else{
		$dreamdb=file($keydb);
		$r_num = trim($dreamdb[0],"\n\r");
		$p = ceil($r_num/$p_num); //结果实际页数
		if($page>$p) $page=$p;
		$result = $dreamdb[$page];
	}

	for($i=1; $i<=$p; $i++){
		$post_l .= '<a href="?q='.urlencode($q).'&p='.$i;
		if($_GET['w']) $post_l .= '&act='.$_GET['w'];
		if($i==$page){
			$post_l .= '"><font color="red">['.$i.']</font></a> ';
		}else{
			$post_l .= '">['.$i.']</a> ';
		}
	}
	$post_l = '<tr><td align="center" style="font-size:14px;padding:10px;color:red;" bgcolor="#bcf6fa">本次期末考试成绩只供个人参考</td></tr>';
	//$post_l = '<tr><td align="center" style="font-size:14px;padding:10px;" bgcolor="#bcf6fa">本次期末考试成绩只供个人参考'.$post_l.' (共计'.$r_num.'个，每页'.$p_num.'个)</td></tr>';

	/***<a href="'.$keydb.'"  target="_blank"><font color="#c60a00">下载查询结果用Excel打开</font></a>**/
	$result = '<table width="800" cellpadding="2" cellspacing="0" style="border:1px solid #B2D0EA;"><tr><td style="background:#EDF7;padding:0 5px;color:#014198;" height="26" valign="middle"><b>找到'.$r_num.'个与 <font color="#c60a00">'.$q.'</font> 相关结果。</b> </td></tr><tr><td><table cellpadding="4" cellspacing="4" width="100%" style="text-align:center"><tr style="text-align:center;font-weight:bold;" height="26" bgcolor="#efefef"><td width="120px">准考证号码</td><td width="80">姓名</td><td width="80">班级</td><td width="80">语文</td><td width="80">数学</td><td width="80">英语</td><td width="80">物理</td><td width="80">化学</td><td width="80">生物</td><td width="80">总分</td><td width="80">班排名</td><td width="80">校排名</td></tr>'.$result.'</table></td></tr>'.$post_l.'</table>';

	}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=ut8" />
<?
if($q){
	echo "<title>".$qw.$q." - ".$head."</title>";
	echo '<meta name="keywords" content="'.$q.','.$title.'" />';
	echo '<meta name="description" content="'.$q.','.$title.'" />';
}else{
	echo "<title>".$head." hxb0810</title>";
	echo '<meta name="keywords" content="'.$title.'" />';
	echo '<meta name="description" content="'.$title.'" />';
}
?>
<link href="i/common.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div align="center">
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

<body bgcolor="#FFFFFF">
<DIV id=Head>
<table cellspacing="4" cellpadding="0" style="background-color:#f7f7f7;border-bottom:1px solid #dfdfdf;" width="800">
<tr><td align="left">
<? echo ''.$head.'';
if($q) echo '（ &gt; <strong>'. $q.'</strong> - 查询结果）'; ?>
</td><td align="right"><a href="javascript:;" onClick="window.external.AddFavorite(document.location.href,document.title);">收藏本页</a></td></tr></table>
<br>
<style type="text/css">
h3{font-size:24px;padding:15px 10px 5px 10px;color:#014198;}
p{padding: 10px;}
</style>
<div align="center" id="bt" width="800" height="80px">孝义三中高二年级2014-2015学年期末考试成绩查询系统<br><br>
</div>
<table width="800" cellpadding="2" cellspacing="0" style="border:1px solid #B2D0EA;" id="top"><tr><td style="background:#EDF7FF;padding:0 5px;color:#014198;" height="26" valign="middle" colspan="5"><b>查询区域</b></td></tr><tr><td align="center" valign="middle" style="padding:20px;"><?=$re?><form action="index.php" method="get" name="f1"><input name="q" id="q" type="text" size="18" delay="0" value="<?=$q?>" onmouseover="this.select()" />  <select name="w" id="w">
 <option selected=selected value="">姓名</option>
<?
$count = count($sheng);
for($i=0;$i<$count;$i++){
	echo '<option value="'.$shengpy[$i].'"';
	if($_GET['w']=="sheng" && $sheng[$i]==$q) echo ' selected';
	echo '>'.$sheng[$i].'</option>';
}
?>
</select> <input type="submit" class="sub" value=" 查询 " /></form></td></tr></table>
</td></tr></table><br />
<?
if($q!=""){
	echo $result;
}else{
	echo '<table width="800" cellpadding="2" cellspacing="0" style="border:1px solid #B2D0EA;"><tr><td style="background:#bcf6fa;padding:0 5px;color:#014198;" height="26" valign="middle" colspan="5"><b>说明</b></td></tr><tr><td><p style="line-height:150%"><font color="red" size="3px"><b>输入学生姓名即可查询考试成绩，本次考试仅限本人查询不得向外传播。谢谢合作。</b></font></p></td></tr></table><br>';
	echo $result;
?>
</div>
<?
}
?>


</div>
<div align="center"><table width="800" align="center" cellpadding="2" cellspacing="0" style="border:1px solid #B2D0EA;"><tr><td style="background:#EDF7FF;padding:0 5px;color:#014198;" height="26" valign="middle" colspan="5">Write by <a href="http://www.xysz2003.com" target="_blank"><font color="green"><b>孝义三中高二年级组</b></font></a></td><td style="background:#EDF7FF;padding:0 5px;color:#014198;" height="26" valign="middle" colspan="5" align="right">如有意见请发送邮箱：<a href=mailto:hxb0810@163.com  title="发送邮箱">hxb0810@163.com</a>
</td></tr></table>
</div>
<!--禁止网页另存为： --> 
<noscript><iframe src=*.html></iframe></noscript>
<!-- 禁用右键: --> 
<script> 
function stop(){ 
return false; 
} 
document.oncontextmenu=stop; 
</script>
</body>
</html>