<?php
include('../../../../inc/config.php');
include('../../../../inc/db.conf.php');
BaseConnect();
$sql_import_centre = mysql_query("SELECT * FROM setting WHERE idsetting = 1")or die(mysql_error());
$import_centre = mysql_fetch_array($sql_import_centre);
/**
 * HTML2PDF Librairy - example
 *
 * HTML => PDF convertor
 * distributed under the LGPL License
 *
 * @author      Laurent MINGUET <webmaster@html2pdf.fr>
 *
 * isset($_GET['vuehtml']) is not mandatory
 * it allow to display the result in the HTML format
 */

    // get the HTML
    ob_start();
?>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="../../../../inc/control/pdf/styles/pdf.css">
</head>
<body>
    <table style="width: 100%;">
        <tr>
            <td style="width: 50%">
                <div style="font-size: 45px; font-weight: bold;"><?php echo $import_centre['raison_social']; ?></div>
                <p>
                    <?php echo $import_centre['adresse']; ?><br>
                    <?php echo $import_centre['code_postal']; ?> <?php echo $import_centre['ville']; ?><br>
                    <strong>Téléphone:</strong> <?php echo $import_centre['telephone']; ?><br>
                    <strong>Adresse Mail:</strong> <?php echo $import_centre['email']; ?>
                </p>
            </td>
            <td style="text-align: right; width: 50%; position: relative; top: -50px; font-size: 35px; font-weight: bolder; color: grey;">
                Listing des Utilisateurs
            </td>
        </tr>
    </table>

    <div style="padding-top: 15px; padding-bottom: 15px;"></div>

    <table cellspacing="0" style="width: 100%; border: solid 2px; border-radius: 5px 5px 5px 5px;">
        <tr>
            <th style="width: 25%; text-align: center; border: solid 1px; height: 25px;">Identité</th>
            <th style="width: 25%; text-align: center; border: solid 1px; height: 25px;">Coordonnées</th>
            <th style="width: 25%; text-align: center; border: solid 1px; height: 25px;">Montant total de commande</th>
            <th style="width: 25%; text-align: center; border: solid 1px; height: 25px;">Nombre de Commande</th>
        </tr>
        <?php
        $sql_user = mysql_query("SELECT * FROM utilisateur WHERE groupe = '0' ORDER BY nom_user ASC")or die(mysql_error());
        while($donnee_user = mysql_fetch_array($sql_user))
        {
        ?>
        <tr>
            <td style="padding-left: 5px; border: solid 1px; padding-top: 10px; padding-bottom: 10px;">
                <strong><?php echo $donnee_user['nom_user']; ?> <?php echo $donnee_user['prenom_user']; ?></strong><br>
                <u>Nom d'utilisateur:</u> <?php echo $donnee_user['login']; ?><br>
            </td>
            <td style="padding-left: 5px; border: solid 1px; padding-top: 10px; padding-bottom: 10px;">
                <strong>Téléphone:</strong> <?php echo $donnee_user['tel_user']; ?><br>
                <strong>Portable:</strong> <?php echo $donnee_user['port_user']; ?>
            </td>
            <td style="text-align: right; border: solid 1px; padding-top: 10px; padding-bottom: 10px; padding-right: 10px;">
                <?php
                $sql_sum_cmd = mysql_query("SELECT SUM(montant_total) FROM commande WHERE iduser = ".$donnee_user['iduser'])or die(mysql_error());
                echo number_format(mysql_result($sql_sum_cmd, 0), 2, ',', ' ')." €";
                ?>
            </td>
            <td style="text-align: center; border: solid 1px; padding-top: 10px; padding-bottom: 10px;">
                <?php
                $sql_count_cmd = mysql_query("SELECT COUNT(idcommande) FROM commande WHERE iduser = ".$donnee_user['iduser'])or die(mysql_error());
                echo mysql_result($sql_count_cmd, 0);
                ?>
            </td>
        </tr>
        <?php } ?>
    </table>

</body>
</html>
<?php
    $content = ob_get_clean();

    // convert in PDF
    require_once('../../../../inc/control/pdf/html2pdf.class.php');
    try
    {
        $html2pdf = new HTML2PDF('L', 'A4', 'fr');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('exemple01.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
?>