

<?php
    function output_head($title){
        if ($title){
            ?>
                <!DOCTYPE HTML>
                <html lang="zh-CN">
                <head>
                    <meta charset="UTF-8">
                    <meta http-equiv="Pragma" content="no-cache">
                    <link href="style/main.css" rel="stylesheet" type="text/css" />
                    <!--[if lte IE 7]>
                        <link rel="stylesheet" href="style/yaml_css/core/iehacks.css" type="text/css"/>
                    <![endif]-->
                    <!--[if lt IE 9]>
                        <script src="js/html5.js"></script>
                    <![endif]-->
                    <title><?php echo "$title"; ?></title>
                </head>
            <?php
        }
    }
?>
