<?php if (count($correct) > 0) : ?>
	<div class="error" style="color: green; text-align: center;">
		<?php foreach ($correct as $correct) : ?>
			<p><?php echo $correct ?></p>
		<?php endforeach ?>
	</div>
<?php endif ?>

<?php if (count($P_correct) > 0) : ?>
	<div class="error" style="color: green; text-align: center;">
		<?php foreach ($P_correct as $P_correct) : ?>
			<p><?php echo $P_correct ?></p>
		<?php endforeach ?>
	</div>
<?php endif ?>

<?php if (count($U_correct) > 0) : ?>
	<div class="error" style="color: green; text-align: center;">
		<?php foreach ($U_correct as $U_correct) : ?>
			<p><?php echo $U_correct ?></p>
		<?php endforeach ?>
	</div>
<?php endif ?>

<?php if (count($MRC_correct) > 0) : ?>
	<div class="error" style="color: green; text-align: center;">
		<?php foreach ($MRC_correct as $MRC_correct) : ?>
			<p><?php echo $MRC_correct ?></p>
		<?php endforeach ?>
	</div>
<?php endif ?>

<?php if (count($MRU_correct) > 0) : ?>
	<div class="error" style="color: green; text-align: center;">
		<?php foreach ($MRU_correct as $MRU_correct) : ?>
			<p><?php echo $MRU_correct ?></p>
		<?php endforeach ?>
	</div>
<?php endif ?>

