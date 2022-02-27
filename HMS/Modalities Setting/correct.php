<?php if (count($correct) > 0) : ?>
	<div class="error" style="color: green; text-align: center;">
		<?php foreach ($correct as $correct) : ?>
			<p><?php echo $correct ?></p>
		<?php endforeach ?>
	</div>
<?php endif ?>


