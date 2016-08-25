<?php 
include('../db.conf.php');
?>
<?php
if(isset($_POST['modif-centre-valid']) && $_POST['modif-centre-valid'] == 'Valider')
{
	$raison_social = htmlentities(addslashes($_POST['raison_social']));
	$adresse = htmlentities(addslashes($_POST['adresse']));
	$code_postal = $_POST['code_postal'];
	$ville = htmlentities(addslashes($_POST['ville']));
	$telephone = $_POST['telephone'];
	$email = $_POST['email'];
	$nb_liv_theorique = $_POST['nb_liv_theorique'];

	$sql_up_centre = mysql_query("UPDATE setting SET raison_social = '$raison_social', adresse = '$adresse', code_postal = '$code_postal', ville = '$ville', telephone = '$telephone', email = '$email', nb_liv_theorique = '$nb_liv_theorique'")or die(mysql_error());

	if($sql_up_centre == TRUE)
	{
		header("Location: ../../module/admin/setting/index.php?idsetting=1&modif-centre=true");
	}else{
		header("Location: ../../module/admin/setting/index.php?idsetting=1&modif-centre=false");
	}
}
?>