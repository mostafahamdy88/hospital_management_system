<?php if (count($errors) > 0) : ?>
	<div class="error" style="color: red; text-align: center;">
		<?php foreach ($errors as $error) : ?>
			<p><?php echo $error ?></p>
		<?php endforeach ?>
	</div>
<?php endif ?>

<?php if (count($D_errors) > 0) : ?>
	<div class="error" style="color: red; text-align: center;">
		<?php foreach ($D_errors as $D_errors) : ?>
			<p><?php echo $D_errors ?></p>
		<?php endforeach ?>
	</div>
<?php endif ?>

<?php if (count($P_errors) > 0) : ?>
	<div class="error" style="color: red; text-align: center;">
		<?php foreach ($P_errors as $P_errors) : ?>
			<p><?php echo $P_errors ?></p>
		<?php endforeach ?>
	</div>
<?php endif ?>