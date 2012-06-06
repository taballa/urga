<?php
	require_once("authorize.php");
	require_once('template/template_head.php');
	output_head('Approve score');
?>
<body>
	<?php
		require_once('template/template_header.php');
		output_header('approve_core');
	?>
	<div class="ym-warpper">
		<div class="ym-wbox">
			<?php
				require_once('appvars.php');

				if (isset($_GET['id']) && isset($_GET['name']) && isset($_GET['score']) && isset($_GET['screen_shot'])){
					$name = $_GET['name'];
					$id = $_GET['id'];
					$score = $_GET['score'];
					$screen_shot = $_GET['screen_shot'];
					echo "<h2>确认？！</h2>";
					echo "<p>name is $name</p>";
					echo "<p>score is $score</p>";
					?>
					<form action="approve_score.php" method="post" class="ym-form">
						<div class="ym-fbox-check">
							<div>
								<input type="radio" name="confirm" value="Yes" id="approve">
								<label for="approve">Approve</label>
							</div>
							<div>
								<input type="radio" name="confirm" value="No" id="disapprove">
								<label for="disapprove">Disapprove</label>
							</div>
						</div>
						<div class="ym-fbox-button">
							<input type="submit" value="Submit" class="ym-button" id="submit" name='submit'>
							<input type="reset" value="Reset" class="ym-button" id="reset">
							<input type="hidden" name="id" value="<?php echo "$id"; ?>">
							<input type="hidden" name="name" value="<?php echo "$name"; ?>">
							<input type="hidden" name="score" value="<?php echo "$score"; ?>">
							<input type="hidden" name="screen_shot" value="<?php echo "$screen_shot"; ?>">
						</div>
					</form>
					<?php
				} else if (isset($_POST['submit'])) {
					if ($_POST['confirm'] == 'Yes'){
						$id = $_POST['id'];
						$name = $_POST['name'];
						$score = $_POST['score'];

						$dbc = mysqli_connect(db_host, db_user, db_password, db_name) or die('error connecting to mysql server');
						$query = "update scores set approved = 1 where id = $id";
						mysqli_query($dbc, $query) or die('error querying database');
						mysqli_close($dbc);
						echo "<p>The high score of $score for $name was successfully approved.</p>";
						echo "<a href='admin.php'>back</a>";
					} else {
						echo "<p class='error'>Srroy, there was a problem approving the high score.</p>";
					}
				}
			?>
		</div>
	</div>
</body>