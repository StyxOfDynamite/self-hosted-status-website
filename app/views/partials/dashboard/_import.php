
<div class="row">
	<div class="col-sm-12">
		<h3 class="page-header">Import Previous Statuses</h3>
		<?php if (isset($error)) : ?>
			<div class="alert alert-danger">
				<?= $this->e($error); ?>
			</div>
		<?php endif; ?>
		<form action="/dashboard/import" method="POST" class="well">
	    	<div class="form-group">
	    		<label>StatusPage.io RSS Feed</label>
	   			<input type="text" class="form-control input-lg" name="import[url]" placeholder="StatusPage.io RSS Feed URL">
	    	</div>
			<button type="submit" class="btn btn-lg btn-primary">Import from StatusPage.io</button>
		</form>
	</div>
</div>
