<?php
	fonction output_head($page_name){
		if (!$page_name){
		?>
			<!DOCTYPE HTML>
			<html lang="zh-CN">
			<head>
				<meta charset="UTF-8">
				<title>Title</title>
				<link rel="stylesheet" type="text/css" href="../style/main.css" media="all">
				<link rel="stylesheet" type="text/css" href="../style/page/index.css" media="all">
			    <!--[if lte IE 7]>
			        <link rel="stylesheet" href="../style/iehacks.css" type="text/css"/>
			    <![endif]-->
			</head>
		<?php
		}
		
	}
?>