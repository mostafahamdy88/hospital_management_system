<?php if (count($errors) > 0) : ?>
	<div class="error" style="color: red; text-align: center;">
		<?php foreach ($errors as $error) : ?>
			<p><?php echo $error ?></p>
		<?php endforeach ?>
	</div>
<?php endif ?>


<?php if (count($U_errors) > 0) : ?>
	<div class="error" style="color: red; text-align: center;">
		<?php foreach ($U_errors as $U_error) : ?>
			<p><?php echo $U_error ?></p>
		<?php endforeach ?>
	</div>
<?php endif ?>

<?php if (count($A_errors) > 0) : ?>
	<div class="error" style="color: red; text-align: center;">
		<?php foreach ($A_errors as $A_errors) : ?>
			<p><?php echo $A_errors ?></p>
		<?php endforeach ?>
	</div>
<?php endif ?>

