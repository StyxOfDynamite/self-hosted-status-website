
<div class="container">
	<div class="row">
		<div class="col-sm-10 col-sm-offset-1">
			<ul class="nav nav-tabs">
				<?php if ($path === '/dashboard/components') : ?>
					<li class="active">
				<?php else : ?>		
					<li>
				<?php endif; ?>
					<a href="/dashboard/components">
						Components
					</a>
				</li>
				<?php if ($path === '/dashboard/incidents' || preg_match('^/dashboard/incidents/^', $path)) : ?> 
					<li class="active">
				<?php else : ?>		
					<li>
				<?php endif; ?>
					<a href="/dashboard/incidents">
						Incidents
					</a>
				</li>
				<?php if ($path === '/dashboard/settings') : ?> 
					<li class="active">
				<?php else : ?>		
					<li>
				<?php endif; ?>
					<a href="/dashboard/settings">
						Styles
					</a>
				</li>
				<?php if ($path === '/dashboard/import') : ?> 
					<li class="active hidden-sm">
				<?php else : ?>		
					<li class="hidden-sm hidden-xs">
				<?php endif; ?>
					<a href="/dashboard/import">
						Import
					</a>
				</li>
				<li class="pull-right hidden-xs">
					<a href="/">
						Status Page
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>
