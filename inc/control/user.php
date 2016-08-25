<?php
include('../db.conf.php');
?>
<?php 
//Ajout Utilisateur par l'administration
if(isset($_POST['add-user-valid']) && $_POST['add-user-valid'] == 'Valider')
{
	$login = $_POST['login'];
	$pass_clear = $_POST['pass_md5'];
	$pass_md5 = md5($pass_clear);
	$groupe = $_POST['groupe'];
	$nom_user = $_POST['nom_user'];
	$prenom_user = $_POST['prenom_user'];
	$tel_user = $_POST['tel_user'];
	$port_user = $_POST['port_user'];

	$sql_add_user = mysql_query("INSERT INTO `utilisateur`(`iduser`, `login`, `pass_md5`, `pass_clear`, `groupe`, `nom_user`, `prenom_user`, `tel_user`, `port_user`, `last_connect`, `connect`) 
		VALUES (NULL,'$login','$pass_md5','$pass_clear','$groupe','$nom_user','$prenom_user','$tel_user','$port_user','','0')")or die(mysql_error());

	if($sql_add_user == TRUE)
	{
		//Envoie du message à l'utilisateur
			//Mail Destinataire
			$to = $login;

			//Sujet
			$subject = "Vos identifiants pour Ristogest - ".$nom_user."".$prenom_user;

			//Message
			$message = "
			<html>
			<head>
				<title></title>
			</head>
			<body>
				Bonjour $nom_user $prenom_user,<br>
				Voici vos identifiants de connexion à Ristogest:<br><br>
				<ul>
					<li>Nom d'utilisateur: <strong>$login</strong></li>
					<li>Mot de Passe: <strong>$pass_clear</strong></li>
				</ul>
				Cordialement,<br><br>
				Administrateur Ristogest

			</body>
			</html>
			";
			$headers  = 'MIME-Version: 1.0' . "\r\n";
     		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

     		//ENVOIE
     		mail($to, $subject, $message);

     header("Location: ../../module/admin/user/index.php?add-user=true");


	}else{
		header("Location: ../../module/admin/user/index.php?add-user=false");
	}
}

 ?>

 <?php 
//Ajout Utilisateur par l'administration
if(isset($_POST['modif-user-valid']) && $_POST['modif-user-valid'] == 'Valider')
{
	$iduser = $_POST['iduser'];
	$login = $_POST['login'];
	$nom_user = $_POST['nom_user'];
	$prenom_user = $_POST['prenom_user'];
	$tel_user = $_POST['tel_user'];
	$port_user = $_POST['port_user'];

	$sql_add_user = mysql_query("UPDATE utilisateur SET login = '$login', nom_user = '$nom_user', prenom_user = '$prenom_user', 
		tel_user = '$tel_user', port_user = '$port_user' WHERE iduser = '$iduser'")or die(mysql_error());

	if($sql_add_user == TRUE)
	{
		//Envoie du message à l'utilisateur
			//Mail Destinataire
			$to = $login;

			//Sujet
			$subject = "Mise à jour de vos informations - RISTOGEST";

			//Message
			$message = "
			<html>
			<head>
				<title></title>
			</head>
			<body>
				Bonjour $nom_user $prenom_user,<br>
				Des Informations on été modifier sur votre espace, voici un récapitulatif:<br><br>
				<ul>
					<li><strong>Nom d'utilisateur:</strong> $login</li>
					<li><strong>Identité:</strong> $nom_user $prenom_user</li>
					<li>
						<strong>Coordonnée:</strong>
						<ul>
							<li><em>Téléphone Fixe:</em> $tel_user</li>
							<li><em>Téléphone Portable:</em> $port_user</li>
						</ul>
					</li>
				</ul>
				Cordialement,<br><br>
				Administrateur Ristogest

			</body>
			</html>
			";
			$headers  = 'MIME-Version: 1.0' . "\r\n";
     		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

     		//ENVOIE
     		mail($to, $subject, $message);

     header("Location: ../../module/admin/user/view.php?iduser=".$iduser."&modif-user=true");


	}else{
		header("Location: ../../module/admin/user/view.php?iduser=".$iduser."&modif-user=false");
	}
}

 ?>
<?php
//Suppression de l'utilisateur
if(isset($_GET['supp-user']) && $_GET['supp-user'] == 'valider')
{
	$iduser = $_GET['iduser'];
	//Import Base utilisateur
	$sql_user = mysql_query("SELECT * FROM utilisateur WHERE iduser = '$iduser'")or die(mysql_error());
	$donnee_user = mysql_fetch_array($sql_user);
	$login = $donnee_user['login'];

	$sql_delete_user = mysql_query("DELETE FROM utilisateur WHERE iduser = '$iduser'")or die(mysql_error());

	if($sql_delete_user == TRUE)
	{
		//Envoie du message à l'utilisateur
			//Mail Destinataire
			$to = $login;

			//Sujet
			$subject = "Suppression de votre compte utilisateur - RISTOGEST";

			//Message
			$message = "
			<html>
			<head>
				<title></title>
			</head>
			<body>
				Bonjour,<br>
				Suite à votre demande, le compte utilisateur affilié à votre accès sous le nom <strong><em>$login</em></strong> à été supprimer.<br>
				Cordialement,<br><br>

				Administrateur Ristogest
				

			</body>
			</html>
			";
			$headers  = 'MIME-Version: 1.0' . "\r\n";
     		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

     		//ENVOIE
     		mail($to, $subject, $message);
	header("Location: ../../module/admin/user/index.php?supp-user=true");


	}else{
		header("Location: ../../module/admin/user/index.php?supp-user=false");
	}
}