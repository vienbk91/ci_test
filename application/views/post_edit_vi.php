<!DOCTYPE html>
<html lang="ja">
<head>
	<!-- InstanceEndEditable -->
    <!-- CSS START -->
    <link rel="stylesheet" href="<?php echo base_url();?>css/styles.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url();?>css/menu_page.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url();?>css/jquery-ui.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url();?>css/index.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url();?>css/total.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url();?>css/styletest.css" type="text/css" />
    <!-- CSS END -->
    
    <!-- JS , JQUERY START -->
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.12.3.min.js"></script>
    <!-- JS , JQUERY END -->
	<title><?php if(isset($title)) { echo $title; } else { echo "変更画面"; } ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <script>
    function editPost() {
        if (confirm('変更した部分を保存します。よろしいでしょうか。')) {
            return true;
        } else {
            $("#edit_form").submit(function(){
                return false;
            });
            return false;
        }
    }
    
    function backHome() {
        if (confirm('ホームページに戻します。よろしいでしょうか。')) {
            $("#back_form").submit(function(){
                return true;
            });
            return true;
        } else {
            $("#back_form").submit(function(){
                return false;
            });
            return false;
        }
    }
    
     <?php if($updateFlag == 1){?>
        setTimeout(function(){
    	   alert("更新成功しました。");
    	},300);
    <?php }else if($updateFlag == 2){ ?>
        setTimeout(function(){
    	   alert("更新失敗しました。");
    	},300);
    <?php } ?>
    
    </script>
    
</head>
<body>
	<div id="header" style="margin: auto;">
        <h1>マイブロッグ</h1>
    </div>
	<div align="center" >
    <?php 
    if ($post != null) {     
    ?>
        <form action="<?php echo base_url(); ?>post_con/edit" method="post" name="edit_form" id="edit_form" >
			<table class="bordered" style="margin-top: 50px; width:80%;" >
            <tbody>
                <tr>
                    <th style="width: 5%;">ID</th>
                    <th style="width: 15%;">タイトル</th>
                    <th style="width: 40%;">内容</th>
                    <th style="width: 20%;">管理</th>
                </tr>
                <tr>
                    <td>
                    <?php if (isset($post['post_id'])) { echo $post['post_id']; } else { echo ''; } ?>
                    <input type="hidden" name="post_id" id="post_id" value="<?php if (isset($post['post_id'])) { echo $post['post_id']; } else { echo ''; } ?>" />
                    </td>
                    <td>
                    <textarea cols="10" rows="10" name="post_title" id="post_title" ><?php if (isset($post['post_title'])) { echo $post['post_title']; } else { echo ''; } ?></textarea>
                    </td>
                    <td>
                    <textarea cols="80" rows="10" name="post_content" id="post_content" ><?php if (isset($post['post_content'])) { echo $post['post_content']; } else { echo ''; } ?></textarea>
                    </td>
                    <td>
                        <div align="center">
                            <input type="submit" name="edit_post" id="edit_post" value="変更" onclick="editPost()" />
                        </div>
                    </td>
                </tr>
            </tbody>
            </table>
        </form>
        <?php
        } else {
            echo "データーがありません。";
        }
        ?>
		</br>
        <div align="center" style="margin-bottom: 20px;">
            <form action="<?php echo base_url(); ?>post_con" method="post" name="back_form" id="back_form" >
                <input type="submit" name="back_btn" id="back_btn" value="ホームページに戻る" onclick="backHome()" />
            </form>
        </div>
		<div style="clear:both">
		<p style="font-size:20px" align="center">作成者：チュー・クアン・ヴィエン　日進システムエンジニア</p>
        </div>
	</div>
</div>