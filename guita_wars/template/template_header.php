<?php

// body>

function output_header($current){
    if ($current){
        $index = '';
        $add_score = '';
        $admin = '';
        if ($current == 'index'){$index = 'active';}
        if ($current == 'add_score'){$add_score = 'active';}
        if ($current == 'admin'){$admin = 'active';}
    ?>
        <header>
            <div class="ym-wrapper">
                <div class="ym-wbox">
                    <h2>HIGH SCORES</h2>
                    <nav class="ym-hlist">
                        <ul>
                            <li class="<?php if (!empty($index)){echo "$index";} ?>"><a href="index.php">HOME</a></li>
                            <li class="<?php if (!empty($add_score)){echo "$add_score";} ?>"><a href="add_score.php">Add score</a></li>
                            <li class="<?php if (!empty($admin)){echo "$admin";} ?>"><a href="admin.php">Administrator</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>
    <?php
    }
}


?>