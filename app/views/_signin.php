
<?php $this->layout('layouts/status', ['template' => $template]); ?>


<div class="container">
	<div class="row">
		<div class="col-sm-6 col-sm-offset-3">
			<br><br><br><br><br>
			<h2 class="page-header">Sign In</h2>
		</div>
	</div>
</div>


<?php if (DEMO) : ?>
	<div class="container">
	    <div class="row">
	        <div class="col-sm-6 col-sm-offset-3">
	            <div class="alert alert-danger">
	                Currently in DEMO mode. Click the "Sign in" button.
	            </div>
	        </div>
	    </div>
	</div>
<?php
endif; ?>


<div class="container">
	<div class="row">
		<div class="col-sm-6 col-sm-offset-3">
		<?php if (isset($error)) : ?>
			<div class="alert alert-danger">
				<?= $error; ?>
			</div>
		<?php endif; ?>
			<div class="well">
				<form accept-charset="UTF-8" action="/dashboard" autocomplete="off"  method="post">    
					<dl class="form">
						<dd class="text-left">
							<label>Username</label>
							<input type="text" name="username" class="form-control input-lg" placeholder="john@johnnyinc.org">
						</dd>
					</dl>
					<dl class="form">
						<dd class="text-left">
							<label>Password</label>
							<input type="password" name="password" class="form-control input-lg" placeholder="&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;">
						</dd>
					</dl>
					<button class="btn btn-success btn-lg btn-block" type="submit">Sign in</button>
				</form>
			</div>
			<a href="/">&#8592; To Status Page</a>
		</div>
	</div>
</div>
