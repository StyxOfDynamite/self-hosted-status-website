
<script type="text/javascript">
	$.get('/api/v1/pingdom/summary', function(data){
		var responsetime = data.responsetime.avgresponse;
		var uptime = (data.status.totalup / (data.status.totalup + data.status.totaldown)) * 100;
		$('#pingdom-average-uptime').html(uptime +'% ');
		$('#pingdom-average-latency').html(responsetime +'ms ');
	});

	$.get('/api/v1/pingdom/performance', function(data){
		var labels = [];
		var uptime = [];
		var latencies = [];
		for (var hour in data.hours) {
			var day = new Date(data.hours[hour].starttime *1000).toString('MMM d');
			if(labels.indexOf(day) === -1){
				labels.push(day);
			} else {
				labels.push('');
			}
			var hour_uptime 	= data.hours[hour].uptime;
			var hour_downtime 	= data.hours[hour].downtime;
			var uptime_percent 	= (hour_uptime / (hour_uptime + hour_downtime)) * 100;
			uptime.push(uptime_percent);
			latencies.push(data.hours[hour].avgresponse);
		}

		labels[0] = "";

		<?php if (PINGDOM_UPTIME) : ?>
			var data = {
				labels: labels,
				series: [
					{
						name: 'ms',
						data: uptime
					}
				]
			};
			var context = {
				axisY: {
				    labelInterpolationFnc: function(value) {
				      return value + '%';
				    }
			  	}
			};
			$('#pingdom-uptime-graph').html('');
			new Chartist.Line('#pingdom-uptime-graph', data, context);
		<?php endif; ?>

		<?php if (PINGDOM_RESPONSE_TIME) : ?>
			var data = {
				labels: labels,
				series: [
					{
						name: 'ms',
						data: latencies
					}
				]
			};
			var context = {
				axisY: {
				    labelInterpolationFnc: function(value) {
				      return value + 'ms';
				    }
			  	}
			};
			$('#pingdom-latency-graph').html('');
			new Chartist.Line('#pingdom-latency-graph', data, context);
		<?php endif; ?>
	});
</script>

<?php if (PINGDOM_UPTIME) : ?>
	<div class="container">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<div class="graph-container">
					<div class="row">
						<div class="col-sm-12">
							<h4 class="pull-left">Uptime</h4> 
							<h4 id="pingdom-average-uptime" class="pull-right light_font_color"></h4>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div id="pingdom-uptime-graph" class="graph">
								<h4 class="light_font_color">Loading...</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>

<?php if (PINGDOM_RESPONSE_TIME) : ?>
	<div class="container">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<div class="graph-container">
					<div class="row">
						<div class="col-sm-12">
							<h4 class="pull-left">Average Response Time</h4> 
							<h4 id="pingdom-average-latency" class="pull-right light_font_color"></h4>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div id="pingdom-latency-graph" class="graph">
								<h4 class="light_font_color">Loading...</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>
