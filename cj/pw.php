<html>
<head><title>���������ʾҳ��--Т��������ĩ�ɼ���ѯϵͳ</title>
<link href="i/common.css" rel="stylesheet" type="text/css" />
</head>
<?php
$password=md5($_POST['password']);
 
if($password!='c9e204872004e03f3f528eabe9d94c7a'){
header("refresh:5;url=http://www.phpscc.com/xysz1/qimo_20134/pw.htm");
echo '<table class="errt"><tr><td class="err" style="line-height: 30px;">�������!&nbsp;&nbsp;&nbsp;o(����)o&nbsp;&nbsp;&nbsp;���������룡<br><font color="red"><font color="green">5</font>&nbsp;����Զ���ת</font></td></tr></table>';

}
else{
header("location:index.php");
}
//header("refresh:5;url=http://www.XXXXX.com");
//print('���ڼ��أ����Ե�...<br>������Զ���ת��');
?>
</html>
