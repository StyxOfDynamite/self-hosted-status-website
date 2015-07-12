
<?php $this->layout('layouts/status', ['template' => $template, 'components' => $components, 'incidents' => $incidents]); ?>


<?= $this->insert('partials/_header', ['template' => $template, 'components' => $components, 'incidents' => $incidents, 'path' => $path ]); ?>


<?= $this->insert('partials/status/_status', ['template' => $template, 'components' => $components, 'incidents' => $incidents ]); ?>


<?= $this->insert('partials/status/_components', ['template' => $template, 'components' => $components, 'incidents' => $incidents ]); ?>


<?php if (PREMIUM) : ?>
	<?php if (PINGDOM) : ?>
		<?= $this->insert('partials/status/_pingdom', ['template' => $template, 'components' => $components, 'incidents' => $incidents ]); ?>
	<?php endif; ?>

	<?php if (UPTIMEROBOT) : ?>
		<?= $this->insert('partials/status/_uptimerobot', ['template' => $template, 'components' => $components, 'incidents' => $incidents ]); ?>
	<?php endif; ?>
<?php endif; ?>


<?= $this->insert('partials/status/_day', ['template' => $template, 'components' => $components, 'incidents' => $incidents ]); ?>


<div class="container">
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2 left">
			<hr>
			<a href="/history">&#8592; Incident History</a>
		</div>
	</div>
</div>


<?= $this->insert('partials/_footer', ['template' => $template, 'components' => $components, 'incidents' => $incidents ]); ?>
