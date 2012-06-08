<?php

	function output_head($page_title){
		if (true){
		?>
			<!DOCTYPE HTML>
			<html lang="zh-CN">
			<head>
				<meta charset="UTF-8">
				<?php 
					if (empty($page_title)){
						echo "<title>Title</title>";
					} else {
						echo "<title>$page_title</title>";
					}
				?>
				<link rel="stylesheet" type="text/css" href= "<?php echo main_css ?>" media="all">
				<link rel="stylesheet" type="text/css" href="style/index.css" media="all">
			    <!--[if lte IE 7]>
			        <link rel="stylesheet" href="<?php echo iehack_css ?>" type="text/css"/>
			    <![endif]-->
			    <script type="text/javascript" src="<?php echo html5_js ?>"></script>
			</head>
		<?php
		}
	}
?>