
<?php if ($template['custom_footer'] === true) : ?>

	<?php if (PREMIUM) : ?>
		<?= $template['custom_footer_html']; ?>
	<?php endif; ?>

<?php else : ?>

	<footer class="footer">
		<div class="container section">
			<div class="row">
				<div class="col-sm-8 col-sm-offset-2">
					<h4><?= $this->e($template['footline']); ?></h4>
				</dic>
			</div>
		</div>
	</footer>

<?php endif; ?>
