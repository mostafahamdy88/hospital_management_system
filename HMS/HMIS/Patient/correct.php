<?php if (count($correct) > 0) : ?>
	<div class="error" style="color: green; text-align: center;">
		<?php foreach ($correct as $correct) : ?>
			<p><?php echo $correct ?></p>
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

<?php if (count($A_correct) > 0) : ?>
	<div class="error" style="color: green; text-align: center;">
		<?php foreach ($A_correct as $A_correct) : ?>
			<p><?php echo $A_correct ?></p>
		<?php endforeach ?>
	</div>
<?php endif ?>

