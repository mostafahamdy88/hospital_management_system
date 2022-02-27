<?php if (count($D_correct) > 0) : ?>
	<div class="error" style="color: green; text-align: center;">
		<?php foreach ($D_correct as $D_correct) : ?>
			<p><?php echo $D_correct ?></p>
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

