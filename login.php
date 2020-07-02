<?php
	$phoneData = $_POST['phoneData'];
	$passData = $_POST['passData'];
	include('comm/user.php');
	if(!findUserByPhone($phoneData)){
		$arr=array('statusCode'=>3,'errMsg'=>"手机号未注册");
	}else{
		$result=findUserByPhone($phoneData);
		if($result['upass']!=$passData){
			$arr=array('statusCode'=>2,'errMsg'=>"密码不正确");
		}else{
			$arr=array('statusCode'=>1,'Msg'=>"登录成功");
		}
	}
	echo json_encode($arr);	
?>