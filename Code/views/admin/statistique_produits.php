<?php
 

include_once "../../config.php";


$db=config::getConnexion();
  

    
  $req1= $db->query("SELECT COUNT(*) as nb1 FROM reclamation WHERE  YEAR(date_reclamation)=YEAR(sysdate())-6 ");
    $nb1 = $req1->fetch();

    $req2= $db->query("SELECT COUNT(*) as nb2 FROM reclamation WHERE YEAR(date_reclamation)=YEAR(sysdate())-5 " );
    $nb2 = $req2->fetch();

    $req3= $db->query("SELECT COUNT(*) as nb3 FROM reclamation WHERE YEAR(date_reclamation)=YEAR(sysdate())-4  " );
     $nb3 = $req3->fetch();

    $req4= $db->query("SELECT COUNT(*) as nb4 FROM reclamation WHERE YEAR(date_reclamation)=YEAR(sysdate())-3  " );
    $nb4 = $req4->fetch();

      $req5= $db->query("SELECT COUNT(*) as nb5 FROM reclamation WHERE YEAR(date_reclamation)=YEAR(sysdate())-2 " );
    $nb5 = $req5->fetch();

       $req6= $db->query("SELECT COUNT(*) as nb6 FROM reclamation WHERE YEAR(date_reclamation)=YEAR(sysdate())-1  " );
    $nb6 = $req6->fetch();
       $req7= $db->query("SELECT COUNT(*) as nb7 FROM reclamation WHERE  YEAR(date_reclamation)=YEAR(sysdate()) ");
       $nb7 = $req7->fetch();



$dataPoints = array(
  array("label"=> date("Y")-6, "y"=> intval($nb1['nb1'])),
  array("label"=> date("Y")-5, "y"=> intval($nb2['nb2'])),
  array("label"=> date("Y")-4, "y"=> intval($nb3['nb3'])),
  array("label"=> date("Y")-3, "y"=> intval($nb4['nb4'])),
  array("label"=> date("Y")-2, "y"=> intval($nb5['nb5'])),
  array("label"=> date("Y")-1, "y"=> intval($nb6['nb6'])),
  array("label"=> date("Y"), "y"=> intval($nb7['nb7'])),

);
  
?>


<!DOCTYPE html>
<html lang="en">

  <head>

   <script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
  animationEnabled: true,
  exportEnabled: true,
  theme: "light1", // "light1", "light2", "dark1", "dark2"
  title:{
    text: "Statistique des Reclamations "
  },
  data: [{
    type: "column", //change type to bar, line, area, pie, etc
    //indexLabel: "{y}", //Shows y value on all Data Points
    indexLabelFontColor: "#5A5757",
    indexLabelPlacement: "outside",   
    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
  }]
});
chart.render();
 
}
</script>

<body>
   <div class="page-container">
   <!--/content-inner-->
<div class="left-content">
     <div class="mother-grid-inner">
            <!--header start here-->
        <div class="header-main">
         </div>

  </div>  
       
<!--heder end here-->

<div class="agile-grids"> 
<div id="chartContainer" style="height: 370px; width: 83%; margin-left: 20px" align="center"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</div>

<!-- script-for sticky-nav -->
    <script>
    $(document).ready(function() {
       var navoffeset=$(".header-main").offset().top;
       $(window).scroll(function(){
        var scrollpos=$(window).scrollTop(); 
        if(scrollpos >=navoffeset){
          $(".header-main").addClass("fixed");
        }else{
          $(".header-main").removeClass("fixed");
        }
       });
       
    });
    </script>
    <!-- /script-for sticky-nav -->
<div class="inner-block">

</div>
<!--inner block end here-->
<!--copy rights start here-->
<div class="copyrights">
   <p>© 2016 Pooled . All Rights Reserved | Design by  <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
</div>  
<!--COPY rights end here-->
</div>
</div>
  <!--//content-inner-->
    <!--/sidebar-menu-->
        <div class="sidebar-menu">
        </div>
                <div class="clearfix"></div>    
              </div>
              <script>
              var toggle = true;
                    
              $(".sidebar-icon").click(function() {                
                if (toggle)
                {
                $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
                $("#menu span").css({"position":"absolute"});
                }
                else
                {
                $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
                setTimeout(function() {
                  $("#menu span").css({"position":"relative"});
                }, 400);
                }
                      
                      toggle = !toggle;
                    });
              </script>
<!--js -->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->     
<!-- calendar -->
  <script type="text/javascript" src="js/monthly.js"></script>
  <script type="text/javascript">
    $(window).load( function() {

      $('#mycalendar').monthly({
        mode: 'event',
        
      });

      $('#mycalendar2').monthly({
        mode: 'picker',
        target: '#mytarget',
        setWidth: '250px',
        startHidden: true,
        showTrigger: '#mytarget',
        stylePast: true,
        disablePast: true
      });

    switch(window.location.protocol) {
    case 'http:':
    case 'https:':
    // running on a server, should be good.
    break;
    case 'file:':
    alert('Just a heads-up, events will not work when run locally.');
    }

    });
  </script>
  <!-- //calendar -->
</body>
</html>