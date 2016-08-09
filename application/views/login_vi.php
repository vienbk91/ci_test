<!DOCTYPE html>
<html lang="ja">
<head>
	<!-- InstanceEndEditable -->
	<link href="<?php echo base_url();?>css/index.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>css/total.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/styletest.css" />
	<title><?php if(isset($title)) { echo $title; } else { echo "ログイン画面"; } ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
	<div id="header">
		<img height="340" src="<?php echo base_url();?>img/title.jpg" width="960" />
	</div>
	<div id="wrapper">
		<form name="formlogin" method="post" action="<?php echo base_url();?>login_con">
			<span style = "padding:20px;color:red; font-size:16px;font-weight:bold;"><?php if(isset($message)){ echo $message;} else { echo '';}?></span>
			<fieldset id="p" style="float:left" >
				<legend>ログイン画面</legend>
					<table>
						<tr>
							<td>ご登録ID：社員番号</td>
							<td><input type="text" name="user_nic"id="user_nic" value='<?php if (isset($user_nic)) { echo $user_nic; } else { echo ''; } ?>' size='10' maxlength='6'>
							</td>
						</tr>  
						<tr>
							<td>パスワード</td>
							<td><input type="password" name="user_password" id="user_password" value='<?php if (isset($user_password)) { echo $user_password;} else { echo ''; } ?>' size='10'>
							</td>
						</tr>
						<tr>
							<td colspan="2" align="center">
								<input type="submit" name="submit" value="ログイン">
							</td>
						</tr>
					</table>
			</fieldset>
		</form>
		</br>
		<div style="clear:both">
		<p style="font-size:20px" align="center">ツアー参加者様の専用サイトです。</p>
	</div>
</div>