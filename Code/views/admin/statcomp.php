<?php
require_once  '../../core/config.php';
$db=config::getConnexion();
 $req1= $db->query("SELECT  month_name, COALESCE(sum(prixtotal),0)  as total , YEAR(sysdate()) as year FROM months  left OUTER join commande  on month(datecommande) =months.month_num AND YEAR(dateCommande)=YEAR(sysdate()) GROUP by months.month_num  order by months.month_num   ");
   $req1->execute();
 	 			$liste= $req1->fetchALL(PDO::FETCH_OBJ);
 	$req2= $db->query("SELECT  month_name, COALESCE(sum(prixtotal),0) as total , YEAR(sysdate())-1 as year FROM months  left OUTER join commande  on month(datecommande) =months.month_num AND YEAR(dateCommande)=YEAR(sysdate())-1 GROUP by months.month_num  order by months.month_num   ");
   $req2->execute();
 	 			$liste2= $req2->fetchALL(PDO::FETCH_OBJ);


	$req3= $db->query("SELECT  month_name, COALESCE(sum(prixtotal),0) as total , YEAR(sysdate())-2 as year FROM months  left OUTER join commande  on month(datecommande) =months.month_num AND YEAR(dateCommande)=YEAR(sysdate())-2 GROUP by months.month_num  order by months.month_num   ");
   $req3->execute();
 	 			$liste3= $req3->fetchALL(PDO::FETCH_OBJ);


$dataPoints1 = array();
foreach ($liste as $tache) {
    $dataPoints1[] = array('y' => $tache->total, 'label' => $tache->month_name);
        $year1=$tache->year;

}
$dataPoints2 = array();
foreach ($liste2 as $tache) {
    $dataPoints2[] = array('y' => $tache->total, 'label' => $tache->month_name);
    $year2=$tache->year;
}
$dataPoints3 = array();
foreach ($liste3 as $tache) {
    $dataPoints3[] = array('y' => $tache->total, 'label' => $tache->month_name);
    $year3=$tache->year;
}
	
?>
<!DOCTYPE HTML>
<html>
<head>  
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "revenue des trois dernières années "
	},
	legend:{
		cursor: "pointer",
		itemclick: toggleDataSeries
	},
	data: [{
		type: "column",
		name: "<?=$year3?>",
		yValueFormatString: "#,##0 DT",

		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPoints3, JSON_NUMERIC_CHECK); ?>
	},{
		type: "column",
		name: "<?=$year2?>",
			yValueFormatString: "#,##0 DT",

		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
	},
	{
		type: "column",
		name: "<?=$year1?>",
			yValueFormatString: "#,##0 DT",

		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
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