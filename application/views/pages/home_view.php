<canvas id="myChart" width="800" height="400"></canvas>

<script>

		var lineChartData = {
			labels : ["January","February","March","April","May","June","July","August","September","October","November","Descember"],
			datasets : [
				{
					fillColor : "none",
					strokeColor : "#ff7f7f",
					pointColor : "#ff7f7f",
					pointStrokeColor : "#ff7f7f",
					data : [125,230,225,160,305,275,240,240,180,255,248,265]
				},
				{
					fillColor : "none",
					strokeColor : "#7f007f",
					pointColor : "#7f007f",
					pointStrokeColor : "#7f007f",
					data : [175,160,195,345,375,200,250,185,200,185,175,275]
				},
				{
					fillColor : "none",
					strokeColor : "#00ffff",
					pointColor : "#00ffff",
					pointStrokeColor : "#00ffff",
					data : [170,180,260,165,300,160,175,145,140]
				},		{
					fillColor : "none",
					strokeColor : "#444",
					pointColor : "#444",
					pointStrokeColor : "#444",
					data : [180,155,225,190,425,200,250,180,180,200,175,195]
				}
			]
			
		}

	var lineOptions = {
		bezierCurve : false
	}

	var myLine = new Chart(document.getElementById("myChart").getContext("2d")).Line(lineChartData, lineOptions);
	

</script>