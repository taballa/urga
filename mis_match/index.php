<?php
    require_once('template/template_head.php');
?>
<body>
    <?php
        require_once('appvars.php');
        $db = mysqli_connect(db_host, db_user, db_password, db_name) or die('error connecting to mysql server.');

    ?>
    <?php
        require_once('template/template_header.php');
    ?>
     <div class="ym-wrapper">
         <div class="ym-grid">
             <div class="ym-g38 ym-gl">
                 <dl>
                 <dt></dt>
                     <dd></dd>
                     <dd></dd>
                     <dd></dd>
                 <dt></dt>
                     <dd></dd>
                     <dd></dd>
                     <dd></dd>
                 <dt></dt>
                     <dd></dd>
                     <dd></dd>
                     <dd></dd>
                 </dl>
             </div>
             <div class="ym-g62 ym-gr"></div>
         </div>
     </div>
     <?php
        require_once('template/template_footer.php');
     ?>
</body>
</html>

