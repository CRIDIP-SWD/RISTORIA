<?php
include('../../../inc/config.php');
include('../../../inc/db.conf.php');
BaseConnect();
$sql_import_centre = mysql_query("SELECT * FROM setting WHERE idsetting = 1")or die(mysql_error());
$import_centre = mysql_fetch_array($sql_import_centre);
$idmenu = $_GET['idmenu'];
$sql_menu = mysql_query("SELECT * FROM menu WHERE idmenu = '$idmenu'")or die(mysql_error());
$donnee_menu = mysql_fetch_array($sql_menu);


ob_start();
?>
    <html>
    <head>
        <title></title>
        <link rel="stylesheet" type="text/css" href="../../../inc/control/pdf/styles/pdf.css">
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
                RECAPITULATIF DES ARTICLES DE LA SEMAINE <?php echo $donnee_menu['semaine']; ?>
            </td>
        </tr>
    </table>

    <div style="padding-top: 15px; padding-bottom: 15px;"></div>




    </body>
    </html>
<?php
$content = ob_get_clean();

// convert in PDF
require_once('../../../inc/control/pdf/html2pdf.class.php');
try
{
    $html2pdf = new HTML2PDF('P', 'A4', 'fr');
    $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
    $html2pdf->Output('exemple01.pdf');
}
catch(HTML2PDF_exception $e) {
    echo $e;
    exit;
}
?>