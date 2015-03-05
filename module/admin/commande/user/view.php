<?php include ('../../../../inc/header.php'); ?>
<?php
$idcommande = $_GET['idcommande'];
$sql_commande = mysql_query("SELECT * FROM commande WHERE idcommande = '$idcommande'")or die(mysql_error());
$donnee_commande = mysql_fetch_array($sql_commande);
?>
<?php
define("TITLE_PAGE", "COMMANDE UTILISATEUR");
define("SUBTITLE_PAGE", "COMMANDE N° ".$donnee_commande['num_commande']);
//Breadcumb
$li_start = "<li>".$logiciel."</li>";
$li1 = "<li>ADMINISTRATION</li>";
$li2 = "<li>COMMANDE</li>";
$li3 = "<li>UTILISATEUR</li>";
$li4 = "";
$li_end = "<li><a href='#'>".TITLE_PAGE."</a></li>";
?>
    <body>
        <!-- Preloader -->
        <!-- Preloader functionality (initialized in js/app.js) - pageLoading() -->
        <!-- Used only if page preloader is enabled from inc/config (PHP version) or the class 'page-loading' is added in body element (HTML version) -->
        <div class="preloader themed-background">
            <h1 class="push-top-bottom text-light text-center"><strong>Pro</strong>UI</h1>
            <div class="inner">
                <h3 class="text-light visible-lt-ie9 visible-lt-ie10"><strong>Loading..</strong></h3>
                <div class="preloader-spinner hidden-lt-ie9 hidden-lt-ie10"></div>
            </div>
        </div>
        <!-- END Preloader -->

        <!-- Page Container -->
        <!-- In the PHP version you can set the following options from inc/config file -->
        <!--
            Available #page-container classes:

            '' (None)                                       for a full main and alternative sidebar hidden by default (> 991px)

            'sidebar-visible-lg'                            for a full main sidebar visible by default (> 991px)
            'sidebar-partial'                               for a partial main sidebar which opens on mouse hover, hidden by default (> 991px)
            'sidebar-partial sidebar-visible-lg'            for a partial main sidebar which opens on mouse hover, visible by default (> 991px)

            'sidebar-alt-visible-lg'                        for a full alternative sidebar visible by default (> 991px)
            'sidebar-alt-partial'                           for a partial alternative sidebar which opens on mouse hover, hidden by default (> 991px)
            'sidebar-alt-partial sidebar-alt-visible-lg'    for a partial alternative sidebar which opens on mouse hover, visible by default (> 991px)

            'sidebar-partial sidebar-alt-partial'           for both sidebars partial which open on mouse hover, hidden by default (> 991px)

            'sidebar-no-animations'                         add this as extra for disabling sidebar animations on large screens (> 991px) - Better performance with heavy pages!

            'style-alt'                                     for an alternative main style (without it: the default style)
            'footer-fixed'                                  for a fixed footer (without it: a static footer)

            'disable-menu-autoscroll'                       add this to disable the main menu auto scrolling when opening a submenu

            'header-fixed-top'                              has to be added only if the class 'navbar-fixed-top' was added on header.navbar
            'header-fixed-bottom'                           has to be added only if the class 'navbar-fixed-bottom' was added on header.navbar
        -->
        <div id="page-container" class="sidebar-partial sidebar-visible-lg sidebar-no-animations">
            <!-- Alternative Sidebar -->
            <div id="sidebar-alt">
                <!-- Wrapper for scrolling functionality -->
                <div class="sidebar-scroll">
                    <!-- Sidebar Content -->
                    <div class="sidebar-content">
                        <?php //include ('inc/chat.php'); ?>

                        <?php include ('../../../inc/activity.php'); ?>

                        <?php include ('../../../inc/message_ui.php'); ?>
                    </div>
                    <!-- END Sidebar Content -->
                </div>
                <!-- END Wrapper for scrolling functionality -->
            </div>
            <!-- END Alternative Sidebar -->

            <?php include ('../../../../inc/sidebar.php'); ?>

            <!-- Main Container -->
            <div id="main-container">
                <!-- Header -->
                <!-- In the PHP version you can set the following options from inc/config file -->
                <!--
                    Available header.navbar classes:

                    'navbar-default'            for the default light header
                    'navbar-inverse'            for an alternative dark header

                    'navbar-fixed-top'          for a top fixed header (fixed sidebars with scroll will be auto initialized, functionality can be found in js/app.js - handleSidebar())
                        'header-fixed-top'      has to be added on #page-container only if the class 'navbar-fixed-top' was added

                    'navbar-fixed-bottom'       for a bottom fixed header (fixed sidebars with scroll will be auto initialized, functionality can be found in js/app.js - handleSidebar()))
                        'header-fixed-bottom'   has to be added on #page-container only if the class 'navbar-fixed-bottom' was added
                -->
                <?php include ('../../../../inc/headerbar.php'); ?>
                <?php
                $sql_commande = mysql_query("SELECT * FROM commande WHERE idcommande = '$idcommande'")or die(mysql_error());
                $donnee_commande = mysql_fetch_array($sql_commande);
                ?>
                <!-- Page content -->
                <div id="page-content">
                    <!-- Blank Header -->
                    <div class="content-header">
                        <div class="header-section">
                            <h1>
                                <i class="gi gi-user"></i><?php echo TITLE_PAGE; ?><br><small><?php echo SUBTITLE_PAGE; ?></small>
                            </h1>
                        </div>
                        <div class="pull-right">
                            <a href="index.php" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Retour à la liste des Commandes</a>
                            <?php
                            if($donnee_commande['etat_commande'] == '1')
                            {
                            ?>
                            <a href="<?php echo SITE, FOLDER; ?>inc/control/commande-admin.php?idcommande=<?php echo $idcommande; ?>&envoie-prestataire=valider" class="btn btn-success"><i class="fa fa-check"></i> Commande passer chez le prestataire</a>
                            <?php } ?>
                            <?php
                            if($donnee_commande['etat_commande'] == '2')
                            {
                            ?>
                            <a href="<?php echo SITE, FOLDER; ?>inc/control/commande-admin.php?idcommande=<?php echo $idcommande; ?>&disponible=valider" class="btn btn-success"><i class="fa fa-check"></i> Rendre la commande disponible</a>
                            <?php } ?>

                        </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                        <?php
                        if(empty($li_start)){echo "";}else{echo $li_start;}
                        if(empty($li1)){echo "";}else{echo $li1;}
                        if(empty($li2)){echo "";}else{echo $li2;}
                        if(empty($li3)){echo "";}else{echo $li3;}
                        if(empty($li4)){echo "";}else{echo $li4;}
                        if(empty($li_end)){echo "";}else{echo $li_end;}
                        ?>
                    </ul>
                    <!-- END Blank Header -->
                    <!-- ALERT UTILISATEUR -->
                    <?php
                        if($donnee_commande['etat_commande'] == "0"){
                    ?>
                    <div class="alert alert-info alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <h4><i class="fa fa-info-circle"></i> Information</h4> L'utilisateur n'a pas valider sa commande !
                    </div>
                    <?php
                        }
                    ?>
                    <?php
                    if(isset($_GET['add-reglement']) && $_GET['add-reglement'] == 'success')
                    {
                    ?>
                        <div class="alert alert-success alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <h4><i class="fa fa-check-circle"></i> Succès</h4> Le Réglement à bien été ajouté.
                        </div>
                    <?php } ?>
                    <?php
                    if(isset($_GET['add-reglement']) && $_GET['add-reglement'] == 'error')
                    {
                    ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <h4><i class="fa fa-times-circle"></i> Erreur</h4> Une erreur à eu lieu lors de l'ajout du réglement.<br>
                            Contacter le support technique.
                        </div>
                    <?php } ?>
                    <!-- RESULTAT DES ETATS -->

                    <?php
                    if(isset($_GET['envoie-prestataire']) && $_GET['envoie-prestataire'] == 'true')
                    {
                    ?>
                        <div class="alert alert-success alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <h4><i class="fa fa-check-circle"></i> Succès</h4> L'état de la commande à bien été mise à jours.
                        </div>
                    <?php } ?>
                    <?php
                    if(isset($_GET['envoie-prestataire']) && $_GET['envoie-prestataire'] == 'false')
                    {
                    ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <h4><i class="fa fa-times-circle"></i> Erreur</h4> Une erreur à eu lieu lors de la mise à jour de la commande.<br>
                            Contacter le support technique.
                        </div>
                    <?php } ?>

                    <?php
                    if(isset($_GET['disponible']) && $_GET['disponible'] == 'true')
                    {
                    ?>
                        <div class="alert alert-success alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <h4><i class="fa fa-check-circle"></i> Succès</h4> L'état de la commande à bien été mise à jours.
                        </div>
                    <?php } ?>
                    <?php
                    if(isset($_GET['disponible']) && $_GET['disponible'] == 'false')
                    {
                    ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <h4><i class="fa fa-times-circle"></i> Erreur</h4> Une erreur à eu lieu lors de la mise à jour de la commande.<br>
                            Contacter le support technique.
                        </div>
                    <?php } ?>

                    <?php
                    if(isset($_GET['supp-article']) && $_GET['supp-article'] == 'true')
                    {
                    ?>
                        <div class="alert alert-success alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <h4><i class="fa fa-check-circle"></i> Succès</h4> L'article à bien été supprimée de la commande.
                        </div>
                    <?php } ?>
                    <?php
                    if(isset($_GET['supp-article']) && $_GET['supp-article'] == 'false')
                    {
                    ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <h4><i class="fa fa-times-circle"></i> Erreur</h4> Une erreur à eu lieu lors dde la suppression d'un article dans la commande.<br>
                            Contacter le support technique.
                        </div>
                    <?php } ?>

                    <?php
                    if(isset($_GET['supp-reglement']) && $_GET['supp-reglement'] == 'true')
                    {
                    ?>
                        <div class="alert alert-success alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <h4><i class="fa fa-check-circle"></i> Succès</h4> Le reglement à bien été supprimée.
                        </div>
                    <?php } ?>
                    <?php
                    if(isset($_GET['supp-reglement']) && $_GET['supp-reglement'] == 'false')
                    {
                    ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <h4><i class="fa fa-times-circle"></i> Erreur</h4> Une erreur à eu lieu lors de la suppression d'un reglement.<br>
                            Contacter le support technique.
                        </div>
                    <?php } ?>

                    <?php
                    $sql_commande = mysql_query("SELECT * FROM commande, menu WHERE commande.idmenu = menu.idmenu AND idcommande = '$idcommande'")or die(mysql_error());
                    $donnee_commande = mysql_fetch_array($sql_commande);
                    $idmenu = $donnee_commande['idmenu'];

                    ?>


                    <!-- BLOCK -->
                    <div class="row">
                        <div class="col-md-8">
                            <div class="block">
                                <div class="block-title">
                                    <h2>Montant de la commande</h2>
                                </div>
                                <div style="text-align: center; font-size: 35px; font-weight: bolder;"><?php echo number_format($donnee_commande['montant_total'], 2, ',', ' ')." €"; ?></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="block">
                                <div class="block-title">
                                    <h2>Etat de la commande</h2>
                                </div>
                                <div style="text-align: center; font-size: 20px; height: 75px;">
                                    <?php
                                    if($donnee_commande['etat_commande'] == "0"){
                                    ?>
                                    <div class="text-muted">
                                        <i class="fa fa-times-circle"></i>
                                        Commande créer, Non valider par l'utilisateur
                                    </div>
                                    <?php } ?>
                                    <?php
                                    if($donnee_commande['etat_commande'] == "1"){
                                    ?>
                                    <div class="text-info">
                                        <i class="fa fa-user"></i>
                                        Commande Valider
                                    </div>
                                    <?php } ?>
                                    <?php
                                    if($donnee_commande['etat_commande'] == "2"){
                                    ?>
                                    <div class="text-warning">
                                        <i class="fa fa-refresh fa-spin"></i>
                                        Traitement en cours...
                                    </div>
                                    <?php } ?>
                                    <?php
                                    if($donnee_commande['etat_commande'] == "3"){
                                    ?>
                                    <div class="text-success">
                                        <i class="fa fa-check"></i>
                                        Commande Disponible pour l'utilisateur
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <div class="block">
                                <div class="block-title">
                                    <h2>Produit Commander - Menu du <?php echo date("d-m-Y", $donnee_commande['date_menu']); ?> / <?php echo $donnee_commande['semaine']; ?></h2>
                                    <div class="pull-right">
                                        <a href="" class="btn btn-primary"><i class="fa fa-print"></i> Imprimer la commande</a>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-vcenter">
                                        <thead>
                                            <tr>
                                                <th class="text-center;">Famille d'article</th>
                                                <th class="text-center;">Designation Article</th>
                                                <th style="text-align: right;">Prix Unitaire</th>
                                                <th class="text-center;">Quantité</th>
                                                <th style="text-align: right;">Prix Total</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql_article_commande = mysql_query("SELECT * FROM article_commande, commande, article, famille_article WHERE article_commande.idcommande = commande.idcommande
                                                AND article_commande.idfamillearticle = famille_article.idfamillearticle
                                                AND article_commande.idarticle = article.idarticle
                                                AND article_commande.idcommande = '$idcommande'")or die(mysql_error());
                                            while($donnee_article_commande = mysql_fetch_array($sql_article_commande))
                                            {
                                            ?>
                                            <tr>
                                                <td><?php echo $donnee_article_commande['designation']; ?></td>
                                                <td>
                                                    <strong><?php echo $donnee_article_commande['designation_article']; ?></strong>
                                                    <h5><i><?php echo $donnee_article_commande['description_article']; ?></i></h5>
                                                </td>
                                                <td style="text-align: right;"><?php echo number_format($donnee_article_commande['prix_unitaire'], 2, ',', ' ')." €"; ?></td>
                                                <td class="text-center"><?php echo $donnee_article_commande['qte']; ?></td>
                                                <td style="text-align: right;"><?php echo number_format($donnee_article_commande['prix_total_commande'], 2, ',', ' ')." €"; ?></td>
                                                <td>
                                                    <a href="<?php echo SITE, FOLDER; ?>inc/control/commande-admin.php?idcommande=<?php echo $idcommande; ?>&prix_total_commande=<?php echo $donnee_article_commande['prix_total_commande']; ?>&montant_total=<?php echo $donnee_commande['montant_total']; ?>&idarticlecommande=<?php echo $donnee_article_commande['idarticlecommande']; ?>&supp-article=valider" class="btn btn-danger"><i class="fa fa-times"></i></a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="4" style="text-align: right;">Montant Total de la Commande</td>
                                                <td style="text-align: right;"><?php echo number_format($donnee_commande['montant_total'], 2, ',', ' ')." €"; ?></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="block">
                                <div class="block-title">
                                    <h2>Reglement de la commande N°<?php echo $donnee_commande['num_commande']; ?></h2>
                                    <div class="pull-right">
                                        <a class='btn btn-primary' href='#paiement-commande' data-toggle='modal'><i class='fa fa-credit-card'></i> Paiement de la commande</a>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-vcenter">
                                        <thead>
                                            <tr>
                                                <th class="text-center;">Type de Réglement</th>
                                                <th class="text-center;">Montant Réglement</th>
                                                <th>Date du Réglement</th>
                                                <th>Porteur Chèque</th>
                                                <th>Numéro de Chèque</th>
                                                <th>Banque du chèque</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql_reglement_commande = mysql_query("SELECT * FROM reglement_commande, commande WHERE reglement_commande.idcommande = commande.idcommande
                                            AND commande.idcommande = '$idcommande'")or die(mysql_error());
                                            while($donnee_reglement_commande = mysql_fetch_array($sql_reglement_commande))
                                            {
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php
                                                        if($donnee_reglement_commande['type_reglement'] == '1'){echo "<img src='../../../assets/img/perso/icone-cheque.png' /> Chèque";}
                                                        if($donnee_reglement_commande['type_reglement'] == '2'){echo "<i class='fa fa-euro'></i> Espèce";}
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php echo number_format($donnee_reglement_commande['montant_reglement'], 2, ',', ' ')." €"; ?>
                                                </td>
                                                <td>
                                                    <?php echo date("d-m-Y", $donnee_reglement_commande['date_reglement']); ?>
                                                </td>
                                                <td>
                                                    <?php echo $donnee_reglement_commande['porteur_chq']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $donnee_reglement_commande['num_chq']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $donnee_reglement_commande['banque_chq']; ?>
                                                </td>
                                                <td>
                                                    <a href="<?php echo SITE, FOLDER; ?>inc/control/commande-admin.php?idcommande=<?php echo $idcommande; ?>&idreglement=<?php echo $donnee_reglement_commande['idreglement']; ?>&supp-reglement=valider" class="btn btn-danger"><i class="fa fa-times"></i></a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <?php
                                            $sql_calc_total_reglement = mysql_query("SELECT SUM(montant_reglement) FROM reglement_commande WHERE idcommande = '$idcommande'")or die(mysql_error());
                                            $calc_total_reglement = mysql_result($sql_calc_total_reglement, 0);
                                            ?>
                                            <?php
                                            if(empty($calc_total_reglement)){
                                            ?>
                                            <tr>
                                                <td colspan="6" style="text-align: center; font-weight: bold; color: red"><i class="fa fa-times"></i> Facture non régularisée</td>
                                            </tr>
                                            <?php }else{ ?>
                                            <?php
                                            if($calc_total_reglement != $donnee_commande['montant_total']){
                                            ?>
                                            <tr>
                                                <td colspan="6" style="text-align: center; font-weight: bold; color: orange"><i class="fa fa-warning"></i> Facture Partiellement régularisée</td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" style="text-align: right; font-style: italic;">Montant à régularisée:</td>
                                                <td style="text-align: right;">
                                                    <?php
                                                    $calc_reliquat = $calc_total_reglement-$donnee_commande['montant_total'];
                                                    echo number_format($calc_reliquat, 2, ',',' ')." €";
                                                    ?>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                            <?php
                                            if($calc_total_reglement == $donnee_commande['montant_total']){
                                            ?>
                                            <tr>
                                                <td colspan="6" style="text-align: center; font-weight: bold; color: green"><i class="fa fa-times"></i> Facture régularisée</td>
                                            </tr>
                                            <?php }} ?>
                                        </tfoot>
                                    </table>
                                    <div id="paiement-commande" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h3 class="modal-title">Paiement de la commande N° <?php echo $donnee_commande['num_commande']; ?></h3>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="form-horizontal form-bordered" method="POST" action="<?php echo SITE,FOLDER; ?>inc/control/commande-admin.php">
                                                        <input type="hidden" name="idcommande" value="<?php echo $idcommande; ?>" />

                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="example-select2">Type de Réglement</label>
                                                            <div class="col-md-6">
                                                                <select id="example-select2" name="type_reglement" class="select-select2" style="width: 100%;" data-placeholder="Choose one..">
                                                                    <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                                                    <option value="1">Chèque</option>
                                                                    <option value="2">Espèce</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="example-text-input">Date de Réglement</label>
                                                            <div class="col-md-9">
                                                                <input type="text" id="example-text-input" name="date_reglement" class="form-control" placeholder="Date du Réglement (jj-mm-aaaa)...">
                                                                <span class="help-block">Date au format jj-mm-aaaa ou laissez vide pour aujourd'hui.</span>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="example-text-input">Montant du réglement</label>
                                                            <div class="col-md-9">
                                                                <input type="text" id="example-text-input" name="montant_reglement" class="form-control" placeholder="Montant du Réglement en Euro...">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="example-text-input">Porteur du Chèque</label>
                                                            <div class="col-md-9">
                                                                <input type="text" id="example-text-input" name="porteur_chq" class="form-control" placeholder="Porteur du chèque...">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="example-text-input">Numéro du Chèque</label>
                                                            <div class="col-md-9">
                                                                <input type="text" id="example-text-input" name="num_chq" class="form-control" placeholder="Numéro du Chèque...">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="example-text-input">Banque du chèque</label>
                                                            <div class="col-md-9">
                                                                <input type="text" id="example-text-input" name="banque_chq" class="form-control" placeholder="banque émettrice chèque...">
                                                            </div>
                                                        </div>

                                                        <div class="form-group form-action">
                                                            <button type="submit" class="btn btn-success" name="add-reglement" value="valider"><i class="fa fa-check"></i> Soumettre le réglement</button>
                                                            <button type="reset" class="btn btn-warning"><i class="fa fa-refresh fa-spin"></i> Réinitialiser le formulaire</button>
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Fermer le formulaire</button>
                                                        </div>


                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- END Page Content -->

                <?php include ('../../../../inc/footer.php'); ?>
            </div>
            <!-- END Main Container -->
        </div>
        <!-- END Page Container -->

        <!-- Scroll to top link, initialized in js/app.js - scrollToTop() -->
        <a href="#" id="to-top"><i class="fa fa-angle-double-up"></i></a>

        <!-- Include Jquery library from Google's CDN but if something goes wrong get Jquery from local file (Remove 'http:' if you have SSL) -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script>!window.jQuery && document.write(decodeURI('%3Cscript src="../../../../assets/js/vendor/jquery-1.11.1.min.js"%3E%3C/script%3E'));</script>

        <!-- Bootstrap.js, Jquery plugins and Custom JS code -->
        <script src="<?php echo SITE,FOLDER,ASSETS; ?>js/vendor/bootstrap.min.js"></script>
        <script src="<?php echo SITE,FOLDER,ASSETS; ?>js/plugins.js"></script>
        <script src="<?php echo SITE,FOLDER,ASSETS; ?>js/app.js"></script>
        <script src="<?php echo SITE,FOLDER,ASSETS; ?>js/pages/tablesGeneral.js"></script>
        <script src="<?php echo SITE,FOLDER,ASSETS; ?>js/pages/formsGeneral.js"></script>
        <script src="<?php echo SITE,FOLDER,ASSETS; ?>js/pages/formsValidation.js"></script>
        <script>$(function(){ FormsValidation.init(); });</script>
        <script>$(function(){ FormsGeneral.init(); });</script>
        <script>$(function(){ TablesGeneral.init(); });</script>
    </body>
</html>