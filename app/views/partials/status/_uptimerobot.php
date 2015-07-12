
<script type="text/javascript">
	$.get('/api/v1/uptimerobot/summary', function(data) {
		var labels = [];
		var latencies = [];
		var latency_avg = 0;
		for (var check in data.responsetime) {
			var day = new Date(data.responsetime[check].time *1000).toString('MMM d');
			if(labels.indexOf(day) === -1){
				labels.push(day);
			} else {
				labels.push('');
			}
			latency_avg += (data.responsetime[check].value);
			latencies.push(data.responsetime[check].value);
		}
		latency_avg = Math.ceil(latency_avg / latencies.length);
		labels = labels.reverse();
		latencies = latencies.reverse();
		$('#uptimerobot-average-latency').html(latency_avg +'ms ');
		<?php if (UPTIMEROBOT_RESPONSE_TIME) : ?>
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
			$('#uptimerobot-latency-graph').html('');
			new Chartist.Line('#uptimerobot-latency-graph', data, context);
		<?php endif; ?>
	});
</script>


<div class="container">
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<div class="graph-container">
				<div class="row">
					<div class="col-sm-12">
						<h4 class="pull-left">Average Response Time</h4> 
						<h4 id="uptimerobot-average-latency" class="pull-right light_font_color"></h4>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div id="uptimerobot-latency-graph" class="graph">
							<h4 class="light_font_color">Loading...</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
