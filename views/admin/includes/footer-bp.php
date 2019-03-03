</div>
<!--/.main-->

<script src="<?php echo BASEPLUGINS;?>js/jquery-1.11.1.min.js"></script>
<script src="<?php echo BASEPLUGINS;?>js/bootstrap.min.js"></script>
<script src="<?php echo BASEPLUGINS;?>js/chart.min.js"></script>
<script src="<?php echo BASEPLUGINS;?>js/chart-data.js"></script>
<script src="<?php echo BASEPLUGINS;?>js/easypiechart.js"></script>
<script src="<?php echo BASEPLUGINS;?>js/easypiechart-data.js"></script>
<script src="<?php echo BASEPLUGINS;?>js/bootstrap-datepicker.js"></script>
<script src="<?php echo BASEPLUGINS;?>plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>
<script src="<?php echo BASEPLUGINS;?>js/custom.js"></script>
<script>
	window.onload = function() {
		var chart1 = document.getElementById("line-chart").getContext("2d");
		window.myLine = new Chart(chart1).Line(lineChartData, {
			responsive: true,
			scaleLineColor: "rgba(0,0,0,.2)",
			scaleGridLineColor: "rgba(0,0,0,.05)",
			scaleFontColor: "#c5c7cc"
		});
	};

</script>

</body>

</html>
