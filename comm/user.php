<?php

/**用户信息操作文件**/
require_once 'common.php';


function addUser($utel,$upass,$identity){
	$link = get_connect();
	$utel=mysql_dataCheck($utel);
	$upass=mysql_dataCheck($upass);
	$uname="用户_".$utel;
	$headimage="//hbimg.huabanimg.com/6d28cfdb0f69acaa5c21651ebfb924a5b796dee646f30-JP2KuL_fw658/format/webp";
	$sql="insert into `tbl_user` (`utel`,`upass`,`uname`,`headimage`,`identity`)  values  ('$utel','$upass','$uname','$headimage','$identity')";
	$rs=execUpdate($sql,$link);
	mysql_close();
	return $rs;
}
//输入过滤
function test_input($data) {
   $data = trim($data); //去除左右两端的空白字符
   $data = stripslashes($data); //去除输入中的反斜杠
   $data = htmlspecialchars($data); //将特殊字符转换为实体引用
   return $data;
}
function findUserByPhone($utel){
	$link = get_connect();
	$sql="select `uid`,`utel`,`upass` from `tbl_user` where `utel`='$utel'";
	$rs=execQuery($sql,$link);
	mysql_close();
	if(count($rs)>0){
		return $rs[0];
	}
	return $rs;
}

?>