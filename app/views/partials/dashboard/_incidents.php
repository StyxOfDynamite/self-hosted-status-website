
<div class="row">
	<div class="col-sm-12">
		<?php if (isset($incidents[0])) : ?>
			<?php if (strtolower($incidents[0]['status']) !== 'resolved' && strtolower($incidents[0]['status']) !== 'completed') : ?>
				<?php $key = $incidents[0]['page']; ?>
				<?php $name = $incidents[0]['name'];?>
				<h3 class="page-header">Open Incident <small> - Update your most recent open incident</small></h3>
				<div class="panel panel-default yellows_border">
					<div class="panel-heading yellows_bg">
						<a href="/dashboard/incidents/<?= $this->e($incidents[0]['page']); ?>">
							<strong>
								<?= $this->e($name); ?>
							</strong>
						</a>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-12">
								<form action="/dashboard/incidents" method="POST">
									<input type="hidden" name="form" value="update-create-incident">
									<input type="hidden" name="page[key]" value="<?= $this->e($key); ?>">
									<div class="form-group">
										<label>Status</label>
										<div>
									    	<span class="radio-button" style="margin-bottom: 10px;">
									    		<input id="investigating-panel" name="incident[status]" type="radio" value="investigating">
									    		<label for="investigating-panel">
									    			Investigating
									    		</label>
									    	</span>
									    	<span class="radio-button" style="margin-bottom: 10px;">
									    		<input id="identified-panel" name="incident[status]" type="radio" value="identified">
									    		<label for="identified-panel">
									    			Identified
									    		</label>
									    	</span>
									    	<span class="radio-button" style="margin-bottom: 10px;">
									    		<input id="monitoring-panel" name="incident[status]" type="radio" value="monitoring">
									    		<label for="monitoring-panel">
									    			Monitoring
									    		</label>
									    	</span>
											<span class="radio-button" style="margin-bottom: 10px;">
												<input id="resolved-panel" checked="checked" name="incident[status]" type="radio" value="resolved">
												<label for="resolved-panel">
													Resolved
												</label>
											</span>
											<span class="radio-button" style="margin-bottom: 10px;">
												<input id="custom-panel" name="incident[status]" type="radio" value="custom">
												<label for="custom-panel">
													<input class="form-control input-lg" name="incident[custom]" type="text">
												</label>
											</span>
										</div>
									</div>
									<div class="form-group">
								    	<label>Description</label>
								    	<textarea class="form-control input-lg" name="incident[description]" placeholder="Incident Description (& Message)"></textarea>
									</div>
									<button type="submit" class="btn btn-lg btn-primary">Update Incident</button>
								</form>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<hr>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<?php for ($x = 0; $x < 20; $x++) : ?>
									<?php if (isset($incidents[$x])) : ?>
										<?php if ($key === $incidents[$x]['page']) : ?>
											<div class="row">
												<div class="col-sm-2">
													<h5>
														<?= ucfirst($this->e($incidents[$x]['status'])); ?>
													</h5>
												</div>
												<div class="col-sm-10">
													<p>
														<?= $this->e($incidents[$x]['description']); ?>
													</p>
													<p>
														<small class="light_font_color">
															<?= $incidents[$x]['time']; ?>
														</small>
													</p>
												</div>
											</div>
										<?php endif; ?>
									<?php endif; ?>
								<?php endfor; ?>
							</div>
						</div>
					</div>
				</div>
			<?php endif; ?>
		<?php endif; ?>
	</div>
</div>


<div class="row">
	<div class="col-sm-12">
		<h3 class="page-header">
			New Incident <small> - Create an open incident to keep the status of</small>
		</h3>
		<form action="/dashboard/incidents" class="well" method="POST">
			<input type="hidden" name="form" value="create-incident">
	    	<div class="form-group">
	    		<label>Name</label>
	   			<input type="text" class="form-control input-lg" name="incident[name]" placeholder="Incident Name">
	    	</div>
			<div class="form-group">
		    	<div class="control-group">
					<label>Status</label>
					<div>
				    	<span class="radio-button">
				    		<input id="investigating" checked="checked" name="incident[status]" type="radio" value="investigating">
				    		<label for="investigating">
				    			Investigating
				    		</label>
				    	</span>
				    	<span class="radio-button">
				    		<input id="identified" name="incident[status]" type="radio" value="identified">
				    		<label for="identified">
				    			Identified
				    		</label>
				    	</span>
				    	<span class="radio-button">
				    		<input id="monitoring" name="incident[status]" type="radio" value="monitoring">
				    		<label for="monitoring">
				    			Monitoring
				    		</label>
				    	</span>
						<span class="radio-button">
							<input id="resolved" name="incident[status]" type="radio" value="resolved">
							<label for="resolved">
								Resolved
							</label>
						</span>
						<span class="radio-button">
							<input id="custom" name="incident[status]" type="radio" value="custom">
							<label for="custom">
								<input class="form-control input-lg" name="incident[custom]" type="text">
							</label>
						</span>
					</div>
				</div>
			</div>
			<div class="form-group">
		    	<label>Description</label>
		    	<textarea class="form-control input-lg" name="incident[description]" placeholder="Incident Description (& Message)"></textarea>
			</div>
			<button type="submit" class="btn btn-lg btn-primary">Create New Incident</button>
		</form>
	</div>
</div>

<?php if (sizeof($incidents) > 0) : ?>
	<div class="row">
		<div class="col-sm-12">
			<h3 class="page-header">
				Past Incidents <small> - Click to edit each incident</small>
			</h3>
			<div class="well">
				<?php $displayed = array(); ?>
				<?php foreach ($incidents as $incident) : ?>
					<?php if (!in_array($incident['page'], $displayed)) : ?>
						<?php $displayed[] = $incident['page']; ?>
						<h4>
							<a href="/dashboard/incidents/<?= $this->e($incident['page']); ?>">
								<?= $this->e($incident['name']); ?>
							</a>
						</h4>
						<p>
							<small class="light_font_color">
								<strong>
									<?= ucfirst($this->e($incident['status'])); ?>
								</strong> on <?= $this->e($incident['time']); ?>
							</small>
						</p>
						<?php if ($incident !== end($incidents)) : ?>
							<hr>
						<?php endif; ?>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
<?php endif; ?>

<script type="text/javascript">
	$(function(){
		$('textarea').autosize();
	});
</script>