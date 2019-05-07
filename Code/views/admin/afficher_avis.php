<?php 
 
require '../../entities/avis.php';
require '../../core/avisC.php';
$avis=new avisC();
$listeavis=$avis->afficher_avis();



?>

<?php require 'head.php';?>
<div class="container-fluid">	
<div class="card p-3 mb-2 bg-info text-white">  
	<div class="card-header">
			    <h1 class="card-title text-center">avis</h1>

	</div>
<div class="card-body">
<table class="table table-bordered table-hover table-dark ">
  <thead >
    <tr>
   
      <th scope="col">marque</th>
      <th scope="col">commentaire</th>
      <th scope="col">note </th>
     
    </tr>
  </thead>
  <tbody>
<?php foreach($listeavis as $avis): ?>
    <tr>
     
      <td> <?= $avis->marque; ?> </td>
      <td> <?= $avis->commentaire; ?> </td>
      <td> <?= $avis->note; ?> </td>

      
    </tr>
  </tbody>
            <?php endforeach; ?>

</table>

</div>
</div>
  </div>	
