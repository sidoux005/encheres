<?php 
		session_start();
include('conndb.php');


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enchere</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Google-Style-Login.css">
    <link rel="stylesheet" href="assets/css/Pretty-Footer.css">
</head>

<body>
 <?php 
				include "menu.php";
	?>
	<?php 
$result = $db->query('SELECT * FROM produit');

echo "<div style='margin-left : 45%;'>";



echo "</div>";

?>
    <div class="container">
		<?php
		while ($row = $result->fetcharray()){
			
			
	
	$image = $row["fichier"];
	$descript = $row["description"];
	$nom_pro = $row['desi_pro'];
	//date de mise en ligne
	$la_Dates=$row['date_debut_valide'];
	//le numero du vendeur
	$vend=$row['vendeur'];
	//var_dump ($descript);
	//Déclaration de la date de today
			$startTime = strtotime(date("Y-m-d H:i:s"));
			//date de mise en ligne  +10minutes
			//$cenvertedTime1 = strtotime(date('Y-m-d H:i:s',strtotime('+10 minutes',strtotime($la_Dates))));
			//$cenvertedTime1 = date('Y-m-d H:i:s',strtotime('+10 minutes',strtotime($la_Dates)));
			$cenvertedTime = strtotime($la_Dates)+600;
			// date actuelle -date acien de 10 minute
			$interval = $startTime-$cenvertedTime;
			//afficher la différence en entier
			$ok=floor($interval/(60));
			//echo $startTime;
			//echo 'ancienne'.$cenvertedTime;
			//echo 'actuel'.$interval;
			//echo '     la conversion'.$ok;
			// reconversion en date
			$date_voir =  date('Y-m-d H:i:s',strtotime('+10 minutes',strtotime($interval/(60))));
			
			
			if($ok >=720){ $query = $db->exec("DELETE FROM produit WHERE date_enregistrement='".$la_Dates."'");}
			//"delete from pb2 where id ='"+ident.getText()+"' "
	
	
	if(file_exists($image))
	{
		
      echo ' <div class="row">
            <div class="col-md-4"><img height="200px" src="'.$image.'" id="images"></div>
            <div class="col-md-8">
                <h1>'.$nom_pro.' </h1>
                <p>'.$descript.' </p>
				<form action="" method ="POST" class="form_prix">
					<button class="btn btn-default btn-proposer-prix"
					type="submit">Proposer un prix</button>
					<input type="number" name="prix" class="champ_prix" placeholder="  FCFA"/>
					<input type="hidden" name="user" value="'.$_SESSION['donnees_user']['id'].'"/>
					<input type="hidden" name="id_pro" value="'.$row['id_produit'].'"/>
					<input  name="LaDate" value="'.$la_Dates.'"/>
					
					
					<div class="message " style="display:none; margin-top:20px;">
						
					</div>
				</form>
				
            </div>
        </div>';
	}
	//$Date_courant=$la_Dates;
	//echo strtotime($Date_courant);
}

       
		?>
		
		
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
	
	<?php 
				include "javascript_cloud.php";
	?>
	
	<!--////////////////////////Lancer le décompte\\\\\\\\\\\\\\\\\\\\\\\\\\\-->
		<?php
			
		
//if($ok >=720){ $query = $db->exec("DELETE FROM produit WHERE id_produit=26");}





		?>
	
	
</body>


</html>