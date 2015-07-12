
<?php $this->layout('layouts/status', ['template' => $template, 'components' => $components, 'incidents' => $incidents]); ?>


<?= $this->insert('partials/_header', ['template' => $template, 'components' => $components, 'incidents' => $incidents, 'path' => $path ]); ?>


<?= $this->insert('partials/history/_month', ['template' => $template, 'components' => $components, 'incidents' => $incidents ]); ?>


<div class="container section">
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2 left">
		<hr>
			<a href="/" class="left">&#8592; Current Status</a>
		</div>
	</div>
</div>


<?= $this->insert('partials/_footer', ['template' => $template, 'components' => $components, 'incidents' => $incidents ]); ?>
