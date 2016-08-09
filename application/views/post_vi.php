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
	<title><?php if(isset($title)) { echo $title; } else { echo "管理画面"; } ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <script>
    function editPost(post_id) {
       if (confirm('このポストを変更します。よろしいでしょうか。')) {
            var form = document.createElement( 'form' );
        	document.body.appendChild( form );
        	// Set post data with input_1 and input_2
        	var input_1 = document.createElement( 'input' );
        	input_1.setAttribute( 'type' , 'hidden' );
        	input_1.setAttribute( 'name' , 'post_id' );
        	input_1.setAttribute( 'value' , post_id );
        	form.appendChild( input_1 );
        	
        	// Set action post
        	form.setAttribute( 'action' , "<?php echo base_url();?>post_con/edit" );
        	form.setAttribute( 'method' , 'post' );
        	// 指示されたタゲットの名前を設定
        	// form.setAttribute( 'target' , 'formresult');
    	    // タゲットはＷｉｎｄｏｗポップアップの設定
        	// dis_2016_window = window.open("<?php echo base_url();?>menu_con/edit", 'formresult', 'scrollbars=yes,menubar=no,height=900,width=1200,resizable=yes,toolbar=no,status=no');
        	form.submit();
            return true;
       } else {
            return false;
       }
    }
    
    
    function deletePost(post_id) {
        if (confirm('このポストを削除します。よろしいでしょうか。')) {
            var form = document.createElement( 'form' );
        	document.body.appendChild( form );
        	// Set post data with input_1 and input_2
        	var input_1 = document.createElement( 'input' );
        	input_1.setAttribute( 'type' , 'hidden' );
        	input_1.setAttribute( 'name' , 'post_id' );
        	input_1.setAttribute( 'value' , post_id );
        	form.appendChild( input_1 );
        	
        	// Set action post
        	form.setAttribute( 'action' , "<?php echo base_url();?>post_con/delete" );
        	form.setAttribute( 'method' , 'post' );
        	// 指示されたタゲットの名前を設定
        	// form.setAttribute( 'target' , 'formresult');
    	    // タゲットはＷｉｎｄｏｗポップアップの設定
        	// dis_2016_window = window.open("<?php echo base_url();?>menu_con/edit", 'formresult', 'scrollbars=yes,menubar=no,height=900,width=1200,resizable=yes,toolbar=no,status=no');
        	form.submit();
            
            return true;
        } else {
            return false;
        }
    }
    
    <?php if($deleteFlag == 1){?>
    setTimeout(function(){
    	alert("更新成功しました。");
    	},300);
    <?php }else if($deleteFlag == 2){ ?>
    setTimeout(function(){
    	alert("更新失敗しました。");
    	},300);
    <?php } ?>
    
    </script>
    
</head>
<body>
	<div id="header" style="margin: auto;">
    <!--
		<img height="340" src="<?php echo base_url();?>img/title.jpg" width="960" />
	-->
        <h1>マイブロッグ</h1>
    </div>
	<div align="center" > 
			<table class="bordered" style="margin-top: 50px; width:80%;" >
            <tbody>
                <tr>
                    <th style="width: 5%;">ID</th>
                    <th style="width: 15%;">タイトル</th>
                    <th style="width: 20%;">内容</th>
                    <th style="width: 10%;">作成日付</th>
                    <th style="width: 10%;">変更日付</th>
                    <th style="width: 20%;">管理</th>
                </tr>
                <?php if (isset($allPost) && is_array($allPost)) {
                    foreach ($allPost as $post) {
                ?>
                <tr>
                    <td>
                    <?php if (isset($post['post_id'])) { echo $post['post_id']; } else { echo ''; } ?>
                    </td>
                    <td>
                    <?php if (isset($post['post_title'])) { echo $post['post_title']; } else { echo ''; } ?>
                    </td>
                    <td>
                    <?php if (isset($post['post_content'])) { echo $post['post_content']; } else { echo ''; } ?>
                    </td>
                    <td>
                    <?php if (isset($post['created_date'])) { echo $post['created_date']; } else { echo ''; } ?>
                    </td>
                    <td>
                    <?php if (isset($post['modified_date'])) { echo $post['modified_date']; } else { echo ''; } ?>
                    </td>
                    <td>
                        <div align="center">
                            <input type="button" name="edit_post" id="edit_post" value="変更" onclick="editPost('<?php echo $post['post_id']; ?>')" />
                            &nbsp;&nbsp;
                            <input type="button" name="delete_post" id="delete_post" value="削除" onclick="deletePost('<?php echo $post['post_id']; ?>')" />
                        </div>
                    </td>
                </tr>
                <?php
                    }
                } else {
                    echo '<tr><td>ポストがありません。<td></tr>';
                }
                ?>
            </tbody>
        </table>
    
		<form name="formlogin" method="post" action="<?php echo base_url();?>post_con">
		
		</form>
		</br>
		<div style="clear:both">
		<p style="font-size:20px" align="center">作成者：チュー・クアン・ヴィエン　日進システムエンジニア</p>
	</div>
</div>