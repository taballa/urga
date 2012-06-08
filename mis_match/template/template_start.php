<?php
    require_once('appvars.php');
    require_once('template/template_head.php');
    output_head('Title');
?>
<body>
    <?php
        $db = mysqli_connect(db_host, db_user, db_password, db_name) or die('error connecting to mysql server.');
    ?>
    <?php
        require_once('template/template_header.php');
        output_header('active');
    ?>
     <div class="ym-wrapper">
         <div class="ym-grid">
         	<div>content</div>
         </div>
     </div>

	<?php
        require_once('template/template_footer.php');
   	?>
</body>
</html>
