<?php if (count($errors) > 0) : ?>
	<div class="error" style="color: red; text-align: center;">
		<?php foreach ($errors as $error) : ?>
			<p><?php echo $error ?></p>
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

<?php if (count($U_errors) > 0) : ?>
	<div class="error" style="color: red; text-align: center;">
		<?php foreach ($U_errors as $U_error) : ?>
			<p><?php echo $U_error ?></p>
		<?php endforeach ?>
	</div>
<?php endif ?>

<?php if (count($MRC_errors) > 0) : ?>
	<div class="error" style="color: red; text-align: center;">
		<?php foreach ($MRC_errors as $MRC_errors) : ?>
			<p><?php echo $MRC_errors ?></p>
		<?php endforeach ?>
	</div>
<?php endif ?>

<?php if (count($MRU_errors) > 0) : ?>
	<div class="error" style="color: red; text-align: center;">
		<?php foreach ($MRU_errors as $MRU_errors) : ?>
			<p><?php echo $MRU_errors ?></p>
		<?php endforeach ?>
	</div>
<?php endif ?>

