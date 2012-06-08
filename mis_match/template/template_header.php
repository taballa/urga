<?php
function output_header($active){
if (true){
	?>
		<header>
			<div class="ym-wrapper">
				<div class="ym-wbox">
					<nav class="ym-hlist">
						<ul>
							<li class="<?php if ($active == 'index'){echo "active";} ?>"><a href="index.php">home</a></li>
							<li class="<?php if ($active == 'login'){echo "active";} ?>"><a href="login.php">login</a></li>
							<li class="<?php if ($active == 'register'){echo "active";} ?>"><a href="register.php">register</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</header>
	<?php	
	}
}
?>