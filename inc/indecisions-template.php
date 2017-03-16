<div id="indecisions" class="group" data-uri="<?php echo get_template_directory_uri(); ?>/lib/get-indecisions.php" data-id="<?php echo get_the_ID(); ?>">
	<div class="content">
		<div class="add-form">
			<form id="add-form" action="<?php echo get_template_directory_uri(); ?>/lib/update-indecisions.php" method="POST">
				<div class="form-row">
					<label>Name</label>
					<input type="text" name="name" />
				</div>
				<div class="form-row">
					<label>Address</label>
					<input type="text" name="information" />
				</div>
				<div class="form-row">
					<input type="hidden" name="ID" value="<?php echo get_the_ID(); ?>" />
					<input type="hidden" name="url" value="<?php echo get_permalink(); ?>" />
					<input type="submit" value="Add This Place" />
				</div>
			</form>
		</div>
		<!-- end add-form -->

		<div class="pick-form">
			<form id="pick-form" action="<?php echo get_template_directory_uri(); ?>/lib/choose-indecision.php" method="POST">
				<input type="hidden" name="ID" value="<?php echo get_the_ID(); ?>" />
				<input type="submit" value="PICK A CHOICE">
			</form>
		</div>
		<!-- end pick-form -->

		<div id="decision-made"></div>
		<!-- container for input -->
	</div>
	<!-- end content -->
	<div class="sidebar">
		<h2>Your Choices</h2>
		<div id="choices" data-uri="<?php echo get_template_directory_uri(); ?>/lib/remove-indecision.php" data-post-id="<?php echo get_the_ID(); ?>"></div>
		<!-- choices -->
	</div>
	<!-- end sidebar-->

</div>
<!-- end indecisions -->