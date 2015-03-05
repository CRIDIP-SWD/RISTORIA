<?php
include ('../db.conf.php');
BaseConnect();
?>

<?php
//Modification du prestataire
if(isset($_POST['modif-prestataire-valid']) && $_POST['modif-prestataire-valid'] == 'Valider')
{
	$idprestataire = $_POST['idprestataire'];
	$raison_social = $_POST['raison_social'];
	$adresse = $_POST['adresse'];
	$code_postal = $_POST['code_postal'];
	$ville = $_POST['ville'];
	$telephone = $_POST['telephone'];
	$email = $_POST['email'];

	$sql_up_prestataire = mysql_query("UPDATE prestataire SET raison_social = '$raison_social', adresse = '$adresse', code_postal = '$code_postal', ville = '$ville', telephone = '$telephone', email = '$email' WHERE idprestataire = '$idprestataire'")or die(mysql_error());

	if($sql_up_prestataire == TRUE)
	{
		header("Location: ../../module/admin/prestataire/index.php?modif-prestataire=true");
	}else{
		header("Location: ../../module/admin/prestataire/index.php?modif-prestataire=false");
	}
}

?>
<?php
//Modification du prestataire
if(isset($_POST['add-prestataire-valid']) && $_POST['add-prestataire-valid'] == 'Valider')
{

	$raison_social = $_POST['raison_social'];
	$adresse = $_POST['adresse'];
	$code_postal = $_POST['code_postal'];
	$ville = $_POST['ville'];
	$telephone = $_POST['telephone'];
	$email = $_POST['email'];

	$sql_add_prestataire = mysql_query("INSERT INTO `prestataire`(`idprestataire`, `raison_social`, `adresse`, `code_postal`, `ville`, `telephone`, `email`) 
		VALUES (NULL,'$raison_social','$adresse','$code_postal','$ville','$telephone','$email')")or die(mysql_error());

	if($sql_add_prestataire == TRUE)
	{
		header("Location: ../../module/admin/prestataire/index.php?add-prestataire=true");
	}else{
		header("Location: ../../module/admin/prestataire/index.php?add-prestataire=false");
	}
}

?>
<?php
//Modification du prestataire
if(isset($_GET['supp-prestataire-valid']) && $_GET['supp-prestataire-valid'] == 'Valider')
{

	$idprestataire = $_GET['idprestataire'];

	$sql_supp_prestataire = mysql_query("DELETE FROM prestataire WHERE idprestataire = '$idprestataire'")or die(mysql_error());

	if($sql_supp_prestataire == TRUE)
	{
		header("Location: ../../module/admin/prestataire/index.php?supp-prestataire=true");
	}else{
		header("Location: ../../module/admin/prestataire/index.php?supp-prestataire=false");
	}
}

?>