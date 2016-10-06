<html>
<head><title>密码错误提示页面--孝义三中期末成绩查询系统</title>
<link href="i/common.css" rel="stylesheet" type="text/css" />
</head>
<?php
$password=md5($_POST['password']);
 
if($password!='c9e204872004e03f3f528eabe9d94c7a'){
header("refresh:5;url=http://www.phpscc.com/xysz1/qimo_20134/pw.htm");
echo '<table class="errt"><tr><td class="err" style="line-height: 30px;">密码错误!&nbsp;&nbsp;&nbsp;o(︶︿︶)o&nbsp;&nbsp;&nbsp;请重新输入！<br><font color="red"><font color="green">5</font>&nbsp;秒后自动跳转</font></td></tr></table>';

}
else{
header("location:index.php");
}
//header("refresh:5;url=http://www.XXXXX.com");
//print('正在加载，请稍等...<br>五秒后自动跳转。');
?>
</html>
