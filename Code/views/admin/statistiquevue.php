<?php

require_once  '../../core/config.php';
$db=config::getConnexion();

$req1= $db->query("select sum(nbrvue) as nb, nom_evenement as nom from evenement GROUP by nom_evenement "
);
$req1->execute();
$liste= $req1->fetchALL();
/*$req2= $db->query("SELECT sum(quantiteCommandee) as nb FROM lignecommande   " );
$nb = $req2->fetch();
*/
$dataPoints = array();
foreach ($liste as $row) {
    $nom= $row['nom'];
    $nb=$row['nb'];

    $dataPoints[] = array('label' => $nom, 'y' => $nb );
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <script>
        window.onload = function() {


            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                title: {
                    text: "Nombre de vue de chaque evenement"
                },
                subtitles: [{
                    text: "janvier-juin"
                }],
                data: [{
                    type: "pie",
                    yValueFormatString: "#,##0.00\"%\"",
                    indexLabel: "{label} ({y})",
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();

        }
    </script>
</head>
<body>
<div id="chartContainer" style="height: 400px; width: 200%;"></div>
</body>
</html>