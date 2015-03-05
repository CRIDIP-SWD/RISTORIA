<?php include ('../../../inc/header.php'); ?>
<?php
define("TITLE_PAGE", "PRESTATAIRE");
define("SUBTITLE_PAGE", "GESTION DES PRESTATAIRES");
//Breadcumb
$li_start = "<li>".$logiciel."</li>";
$li1 = "";
$li2 = "";
$li3 = "";
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

            <?php include ('../../../inc/sidebar.php'); ?>

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
                <?php include ('../../../inc/headerbar.php'); ?>

                <!-- Page content -->
                <div id="page-content">
                    <!-- Blank Header -->
                    <div class="content-header">
                        <div class="header-section">
                            <h1>
                                <i class="gi gi-user"></i><?php echo TITLE_PAGE; ?><br><small><?php echo SUBTITLE_PAGE; ?></small>
                            </h1>
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
                    <!-- RESULTAT DES ETATS -->
                    <?php
                    if(isset($_GET['add-prestataire']) && $_GET['add-prestataire'] == 'true')
                    {
                    ?>
                        <div class="alert alert-success alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <h4>
                                <i class="fa fa-check-circle"></i> Succès
                            </h4> 
                            Le prestataire à été ajouter.
                        </div>
                    <?php
                    }
                    ?>
                    <?php
                    if(isset($_GET['add-prestataire']) && $_GET['add-prestataire'] == 'false')
                    {
                    ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <h4>
                                <i class="fa fa-times-circle"></i> Erreur
                            </h4> 
                            Une erreur à été rencontrer lors de l'ajout du prestataire.<br>Contactez le support technique.
                        </div>
                    <?php
                    }
                    ?>
                    <?php
                    if(isset($_GET['modif-prestataire']) && $_GET['modif-prestataire'] == 'true')
                    {
                    ?>
                        <div class="alert alert-success alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <h4>
                                <i class="fa fa-check-circle"></i> Succès
                            </h4> 
                            Le prestataire à été modifier.
                        </div>
                    <?php
                    }
                    ?>
                    <?php
                    if(isset($_GET['modif-prestataire']) && $_GET['modif-prestataire'] == 'false')
                    {
                    ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <h4>
                                <i class="fa fa-times-circle"></i> Erreur
                            </h4> 
                            Une erreur à été rencontrer lors de la modification du prestataire.<br>Contactez le support technique.
                        </div>
                    <?php
                    }
                    ?>

                    <?php
                    if(isset($_GET['supp-prestataire']) && $_GET['supp-prestataire'] == 'true')
                    {
                    ?>
                        <div class="alert alert-success alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <h4>
                                <i class="fa fa-check-circle"></i> Succès
                            </h4> 
                            Le prestataire à été supprimer.
                        </div>
                    <?php
                    }
                    ?>
                    <?php
                    if(isset($_GET['supp-prestataire']) && $_GET['supp-prestataire'] == 'false')
                    {
                    ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <h4>
                                <i class="fa fa-times-circle"></i> Erreur
                            </h4> 
                            Une erreur à été rencontrer lors de la suppression du prestataire.<br>Contactez le support technique.
                        </div>
                    <?php
                    }
                    ?>


                    <div class="block">
                        <div class="block-title">
                            <h2>Liste des Prestataires</h2>
                            <div class="pull-right">
                                <a href="#add-prestataire" data-toggle="modal" class="btn btn-primary"><i class="fa fa-plus"></i> Ajouter un Prestataire</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="user" class="table table-vcenter table-condensed table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">Identité</th>
                                        <th class="text-center">Adresse</th>
                                        <th class="text-center">Coordonnée</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql_prestataire = mysql_query("SELECT * FROM prestataire")or die(mysql_error());
                                    while($donnee_prestataire = mysql_fetch_array($sql_prestataire))
                                    {
                                    ?>
                                    <tr>
                                        <td>
                                            <strong><?php echo html_entity_decode($donnee_prestataire['raison_social']); ?></strong>
                                        </td>
                                        <td>
                                            <?php echo html_entity_decode($donnee_prestataire['adresse']); ?><br>
                                            <?php echo $donnee_prestataire['code_postal']; ?> <?php echo html_entity_decode($donnee_prestataire['ville']); ?>
                                        </td>
                                        <td>
                                            <strong>Téléphone:</strong> <?php echo $donnee_prestataire['telephone']; ?><br>
                                            <strong>Adresse Mail:</strong> <?php echo $donnee_prestataire['email']; ?>
                                        </td>
                                        <td>
                                            <a href="#modif-prestataire" data-toggle="modal" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                            <a href="<?php echo SITE,FOLDER; ?>inc/control/prestataire.php?idprestataire=<?php echo $donnee_prestataire['idprestataire']; ?>&supp-prestataire-valid=Valider" class="btn btn-danger"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                        <div id="modif-prestataire" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h3 class="modal-title">Modification du Prestataire</h3>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="form-bordered form-horizontal" action="<?php echo SITE,FOLDER; ?>inc/control/prestataire.php" method="POST">

                                                            <input type="hidden" name="idprestataire" value="<?php echo $donnee_prestataire['idprestataire']; ?>" />

                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label" for="example-text-input">Raison Social</label>
                                                                <div class="col-md-9">
                                                                    <input type="text" id="example-text-input" name="raison_social" class="form-control" value="<?php echo $donnee_prestataire['raison_social']; ?>">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label" for="example-text-input">Adresse</label>
                                                                <div class="col-md-9">
                                                                    <input type="text" id="example-text-input" name="adresse" class="form-control" value="<?php echo $donnee_prestataire['adresse']; ?>">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label" for="example-text-input">Code Postal</label>
                                                                <div class="col-md-9">
                                                                    <input type="text" id="example-text-input" name="code_postal" class="form-control" value="<?php echo $donnee_prestataire['code_postal']; ?>">
                                                                </div>
                                                                <label class="col-md-3 control-label" for="example-text-input">Ville</label>
                                                                <div class="col-md-9">
                                                                    <input type="text" id="example-text-input" name="ville" class="form-control" value="<?php echo $donnee_prestataire['ville']; ?>">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label" for="example-text-input">Téléphone</label>
                                                                <div class="col-md-9">
                                                                    <input type="text" id="example-text-input" name="telephone" class="form-control" placeholder="Numéro de téléphone du prestataire">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label" for="example-text-input">Email</label>
                                                                <div class="col-md-9">
                                                                    <input type="text" id="example-text-input" name="email" class="form-control" placeholder="Adresse Mail du prestataire">
                                                                </div>
                                                            </div>

                                                            <div class="form-group form-actions">
                                                                <button type="submit" class="btn btn-success" name="modif-prestataire-valid" value="Valider"><i class="fa fa-check"></i> Modifier le prestataire</button>
                                                            </div>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="add-prestataire" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h3 class="modal-title">Nouveau Prestataire</h3>
                                </div>
                                <div class="modal-body">
                                    <form class="form-bordered form-horizontal" action="<?php echo SITE,FOLDER; ?>inc/control/prestataire.php" method="POST">

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Raison Social</label>
                                            <div class="col-md-9">
                                                <input type="text" id="example-text-input" name="raison_social" class="form-control" placeholder="Raison social du prestataire">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Adresse</label>
                                            <div class="col-md-9">
                                                <input type="text" id="example-text-input" name="adresse" class="form-control" placeholder="Adresse postal du prestataire">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Code Postal</label>
                                            <div class="col-md-9">
                                                <input type="text" id="example-text-input" name="code_postal" class="form-control" placeholder="Code Postal">
                                            </div>
                                            <label class="col-md-3 control-label" for="example-text-input">Ville</label>
                                            <div class="col-md-9">
                                                <input type="text" id="example-text-input" name="ville" class="form-control" placeholder="Ville du Prestataire">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Téléphone</label>
                                            <div class="col-md-9">
                                                <input type="text" id="example-text-input" name="telephone" class="form-control" placeholder="Numéro de téléphone du prestataire">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Email</label>
                                            <div class="col-md-9">
                                                <input type="text" id="example-text-input" name="email" class="form-control" placeholder="Adresse Mail du prestataire">
                                            </div>
                                        </div>

                                        <div class="form-group form-actions">
                                            <button type="submit" class="btn btn-success" name="add-prestataire-valid" value="Valider"><i class="fa fa-check"></i> Ajouter le prestataire</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- END Page Content -->

                <?php include ('../../../inc/footer.php'); ?>
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
        <script src="<?php echo SITE,FOLDER,ASSETS; ?>js/pages/tablesDatatables.js"></script>
        <script src="<?php echo SITE,FOLDER,ASSETS; ?>js/pages/compAnimations.js"></script>
        <script src="<?php echo SITE,FOLDER,ASSETS; ?>js/pages/formsValidation.js"></script>
        <script>$(function(){ FormsValidation.init(); });</script>
        <script>$(function(){ CompAnimations.init(); });</script>
        <script>$(function(){ TablesDatatables.init(); });</script>
    </body>
</html>