
<?php $this->layout('layouts/dashboard', ['template' => $template]); ?>


<?= $this->insert('partials/dashboard/_menu', ['path' => $path]); ?>


<div class="container">
	<div class="row">
		<div class="col-sm-10 col-sm-offset-1">
			<div class="box">
				<?php if ($path === '/dashboard/components') : ?>
					<?php if (isset($error)) : ?>
						<?= $this->insert('partials/dashboard/_components', ['template' => $template, 'components' => $components, 'error' => $error]); ?>
					<?php else : ?>
						<?= $this->insert('partials/dashboard/_components', ['template' => $template, 'components' => $components]); ?>
					<?php endif; ?>
				<?php endif; ?>

				<?php if ($path === '/dashboard/incidents') : ?>
					<?php if (isset($error)) : ?>
						<?= $this->insert('partials/dashboard/_incidents', ['template' => $template, 'incidents' => $incidents, 'error' => $error]); ?>
					<?php else : ?>
						<?= $this->insert('partials/dashboard/_incidents', ['template' => $template, 'incidents' => $incidents]); ?>
					<?php endif; ?>
				<?php endif; ?>

				<?php if (preg_match('^/dashboard/incidents/^', $path)) : ?>
					<?php if (isset($error)) : ?>
						<?= $this->insert('partials/dashboard/_single', ['template' => $template, 'page' => $page, 'incidents' => $incidents, 'error' => $error]); ?>
					<?php else : ?>
						<?= $this->insert('partials/dashboard/_single', ['template' => $template, 'page' => $page, 'incidents' => $incidents]); ?>
					<?php endif; ?>
				<?php endif; ?>

				<?php if ($path === '/dashboard/settings') : ?>
					<?php if (isset($error)) : ?>
						<?= $this->insert('partials/dashboard/_settings', ['template' => $template, 'error' => $error]); ?>
					<?php else : ?>
						<?= $this->insert('partials/dashboard/_settings', ['template' => $template]); ?>
					<?php endif; ?>
				<?php endif; ?>

				<?php if ($path === '/dashboard/import') : ?>
					<?php if (isset($error)) : ?>
						<?= $this->insert('partials/dashboard/_import', ['template' => $template, 'error' => $error]); ?>
					<?php else : ?>
						<?= $this->insert('partials/dashboard/_import', ['template' => $template]); ?>
					<?php endif; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
