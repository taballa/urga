<?php
function output_header($active){
	?>
		<header>
			<div class="ym-wrapper">
				<div class="ym-wbox">
					<nav class="ym-hlist">
						<ul>
							<?php
								if (isset($_COOKIE['id'])) {
									?>
									<li class="<?php if ($active == 'index'){echo "active";} ?>"><a href="index.php">home</a></li>
									<li class="<?php if ($active == 'view_profile'){echo "active";} ?>"><a href="view_profile.php">view profile</a></li>
									<li class="<?php if ($active == 'edit_profile'){echo "active";} ?>"><a href="edit_profile.php">edit profile</a></li>
									<li class="<?php if ($active == 'logout'){echo "active";} ?>"><a href="logout.php">logout</a></li>
									<?php
								}else{
									?>
									<li class="<?php if ($active == 'index'){echo "active";} ?>"><a href="index.php">home</a></li>
									<li class="<?php if ($active == 'login'){echo "active";} ?>"><a href="login.php">login</a></li>
									<li class="<?php if ($active == 'register'){echo "active";} ?>"><a href="register.php">register</a></li>
									<?php
								}
							?>
						</ul>
					</nav>
				</div>
			</div>
		</header>
	<?php	
}
?>