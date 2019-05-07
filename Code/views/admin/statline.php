<?php
 

require_once  '../../core/config.php';
$db=config::getConnexion();
  
   $req1= $db->query("SELECT  month_name, COALESCE(sum(prixtotal),0)  as total , YEAR(sysdate()) as year FROM months  left OUTER join commande  on month(datecommande) =months.month_num AND YEAR(dateCommande)=YEAR(sysdate()) GROUP by months.month_num  order by months.month_num   ");
   $req1->execute();
 	 			$liste= $req1->fetchALL(PDO::FETCH_OBJ);

$dataPoints= array();
foreach ($liste as $tache) {
    $dataPoints[] = array('y' => $tache->total, 'label' => $tache->month_name);
    $year=$tache->year;
}




?>

<!DOCTYPE HTML>
<html>
<head>  
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", { 
	theme: "light2",
	title: {
		text: "revenue de l'année <?=$year?>"
	},

	axisY: {
		includeZero: false
	},
	legend:{
		cursor: "pointer",
		itemclick: toggleDataSeries
	},
	toolTip: {
		shared: true
	},
	data: [{
		type: "stackedArea",
		name: "<?=$year?> ",
		showInLegend: true,
        color: "LightSeaGreen",

		visible: true,
		yValueFormatString: "#,##0 DT",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
 
chart.render();
 
function toggleDataSeries(e){
	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	}
	else{
		e.dataSeries.visible = true;
	}
	chart.render();
}
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>    