<?php include ('../../../inc/header.php'); ?>
<?php
$sql_center = mysql_query("SELECT * FROM setting WHERE idsetting = '1'")or die(mysql_error());
$donnee_center = mysql_fetch_array($sql_center);
?>
<?php
define("TITLE_PAGE", "CENTRE DE GESTION");
define("SUBTITLE_PAGE", "PURGE DE LA BASE DE DONNEE");
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
                                <i class="fa fa-building"></i><?php echo TITLE_PAGE; ?><br><small><?php echo SUBTITLE_PAGE; ?></small>
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
                    if(isset($_GET['purge']))
                    {
                    ?>
                    <?php
                        if($_GET['purge'] == 'true')
                        {
                    ?>
                        <div class="alert alert-success alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <h4>
                                <i class="fa fa-check-circle"></i> Succès
                            </h4> 
                            La purge à bien été effectuée.
                        </div>
                    <?php } ?>
                    <?php
                        if($_GET['purge'] == 'false')
                        {
                    ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <h4>
                                <i class="fa fa-times-circle"></i> Erreur
                            </h4> 
                            Une erreur à été rencontrer lors de la purge de la base de donnée.<br>Contactez le support technique.
                        </div>
                    <?php } ?>


                    <?php } else{ ?>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <a href="<?php echo SITE,FOLDER; ?>inc/control/purge.php?purge=valider" class="btn btn-danger btn-block"><i class="fa fa-refresh fa-spin"></i> Purge de la base de donnée</a><br>
                            <div class="alert alert-warning alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                <h4><i class="fa fa-exclamation-circle"></i> Attention</h4>La purge de la base de donnée entraine l'effacement de toutes les données de fonctionnement du programme (menu, article,etc...).<br>Soyez bien sur d'effectuer la purge en tout état de cause.
                            </div>
                        </div>
                    </div>
                    <?php } ?>


                </div>
                <div id="modif-centre" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h3 class="modal-title">Modification de l'utilisateur</h3>
                                </div>
                                <div class="modal-body">
                                    <form class="form-horizontal form-bordered" action="<?php echo SITE,FOLDER; ?>inc/control/centre.php" method="POST">

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Raison Social</label>
                                            <div class="col-md-9">
                                                <input type="text" id="example-text-input" name="raison_social" class="form-control" value="<?php echo $donnee_center['raison_social']; ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Adresse Postal</label>
                                            <div class="col-md-9">
                                                <input type="text" id="example-text-input" name="adresse" class="form-control" value="<?php echo $donnee_center['adresse']; ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label" for="example-text-input">Code Postal</label>
                                            <div class="col-md-3">
                                                <input type="text" id="example-text-input" name="code_postal" class="form-control" value="<?php echo $donnee_center['code_postal']; ?>">
                                            </div>
                                            <label class="col-md-2 control-label" for="example-text-input">Ville</label>
                                            <div class="col-md-5">
                                                <input type="text" id="example-text-input" name="ville" class="form-control" value="<?php echo $donnee_center['ville']; ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="masked_phone">Téléphone</label>
                                            <div class="col-md-9">
                                                <input type="text" id="masked_phone" name="telephone" class="form-control" value="<?php echo $donnee_center['telephone']; ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="user-settings-email">Adresse Mail</label>
                                            <div class="col-md-8">
                                                <input type="email" id="user-settings-email" name="email" class="form-control" value="<?php echo $donnee_center['email']; ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Nb jours livraison théorique</label>
                                            <div class="col-md-9">
                                                <input type="text" id="example-text-input" name="nb_liv_theorique" class="form-control" value="<?php echo $donnee_center['nb_liv_theorique']; ?>">
                                            </div>
                                        </div>

                                        <div class="form-group form-actions">
                                            <button type="submit" class="btn btn-success" name="modif-centre-valid" value="Valider"><i class="fa fa-check"></i> Modification du centre</button>
                                        </div>

                                    </form>
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
        <script src="<?php echo SITE,FOLDER,ASSETS; ?>js/pages/widgetsStats.js"></script>
        <script src="<?php echo SITE,FOLDER,ASSETS; ?>js/pages/formsGeneral.js"></script>
        <script>$(function(){ FormsGeneral.init(); });</script>
        <script>$(function(){ WidgetsStats.init(); });</script>
        <script>$(function(){ FormsValidation.init(); });</script>
        <script>$(function(){ CompAnimations.init(); });</script>
        <script>$(function(){ TablesDatatables.init(); });</script>
    </body>
</html>