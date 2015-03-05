<?php include ('../../../inc/header.php'); ?>
<?php
$idmenu = $_GET['idmenu'];
$sql_menu = mysql_query("SELECT * FROM menu WHERE idmenu = '$idmenu'")or die(mysql_error());
$donnee_menu = mysql_fetch_array($sql_menu);
?>
<?php
define("TITLE_PAGE", "MENU");
define("SUBTITLE_PAGE", "SEMAINE ".$donnee_menu['semaine']);
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

                        <?php include ('inc/activity.php'); ?>

                        <?php include ('inc/message_ui.php'); ?>
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
                                <i class="gi gi-brush"></i><?php echo TITLE_PAGE; ?><br><small><?php echo SUBTITLE_PAGE; ?></small>
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
                        <div class="pull-right">
                            <a class="btn btn-info btn-xs" href="index.php"><i class="fa fa-arrow-circle-left"></i> Retour à la liste des menus</a>
                        </div>
                    </ul>

                    <!-- END Blank Header -->
                    <!-- AFFICHAGE DES RESULTATS -->

                    <?php
                    if(isset($_GET['add-article']) && $_GET['add-article'] == 'true')
                    {
                    ?>
                        <div class="alert alert-success alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <h4><i class="fa fa-check-circle"></i> Succès</h4> L'article à bien été ajouter au menu.
                        </div>
                    <?php
                    }
                    ?>
                    <?php
                    if(isset($_GET['add-article']) && $_GET['add-article'] == 'false')
                    {
                        ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <h4><i class="fa fa-times-circle"></i> Erreur</h4> Une erreur à eu lieu lors de l'ajout de l'article dans le menu.<br>
                            Veuillez Contacter le support technique. <strong>Erreur EX8873</strong>.
                        </div>
                    <?php
                    }
                    ?>




                    <!-- Example Block -->
                    <div class="block">
                        <!-- Example Title -->
                        <div class="block-title">
                            <h2>Liste des Articles du menu de la semaine <?php echo $donnee_menu['semaine']; ?></h2>
                            <div class="pull-right">
                                <a href="#add-article" data-toggle="modal" class="btn btn-success"><i class="fa fa-plus-circle"></i> Ajouter un article</a>
                                <a href="print.php?idmenu=<?php echo $idmenu; ?>" class="btn btn-info"><i class="fa fa-print"></i> Imprimer le récapitulatif de ce menu</a>
                            </div>
                        </div>

                        <!-- END Example Title -->

                        <!-- Example Content -->
                        <div class="table-responsive">
                            <table id="general-table" class="table table-striped table-vcenter table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">Designation</th>
                                        <th class="text-center">Prix Unitaire</th>
                                        <th class="text-center">Quantité commander</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sql_article_menu = mysql_query("SELECT * FROM article WHERE idmenu = '$idmenu'")or die(mysql_error());
                                while($donnee_article = mysql_fetch_array($sql_article_menu))
                                {
                                ?>
                                    <tr>
                                        <td>
                                            <strong><?php echo $donnee_article['designation']; ?></strong><br>
                                            <h5><i><?php echo $donnee_article['description']; ?></i></h5>
                                        </td>
                                        <td>
                                            <?php echo number_format($donnee_article['prix_unitaire'], 2, ',', ' ')." €"; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php
                                            $sql_sum_qte_article = mysql_query("SELECT SUM(qte) FROM article_commande WHERE idarticle = ".$donnee_article['idarticle'])or die(mysql_error());
                                            $result = mysql_result($sql_sum_qte_article, 0);
                                            if($result == "0"){echo "0";}else{echo $result;}
                                            ?>
                                        </td>
                                        <td class="pull-right">
                                            <a href="#modif-article" data-toggle="modal" class="btn btn-default btn-xs"><i class="fa fa-edit"></i></a>
                                            <a class="btn btn-danger btn-xs" href="<?php echo SITE,FOLDER; ?>inc/control/menu.php?idarticlemenu=<?php echo $donnee_article['idarticlemenu']; ?>&supp-article-control=Valider"><i class="fa fa-times-circle-o"></i></a>
                                        </td>
                                    </tr>
                                    <div id="modif-article" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h3 class="modal-title">Modification d'un article</h3>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="form-bordered form-horizontal" action="<?php echo SITE,FOLDER; ?>inc/control/menu.php" method="POST">
                                                        <input type="hidden" name="idarticlemenu" value="<?php echo $donnee_article['idarticlemenu']; ?>" />

                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="example-text-input">Designation de l'article</label>
                                                            <div class="col-md-9">
                                                                <input type="text" id="example-text-input" name="designation" class="form-control" value="<?php echo $donnee_article['designation']; ?>">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="example-textarea-input">Description de l'article</label>
                                                            <div class="col-md-9">
                                                                <textarea id="example-textarea-input" name="description" rows="9" class="form-control"><?php echo $donnee_article['description']; ?></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="val_number">Prix Unitaire</label>
                                                            <div class="col-md-6">
                                                                <div class="input-group">
                                                                    <input type="text" id="val_number" name="prix_unitaire" class="form-control" value="<?php echo $donnee_article['prix_unitaire']; ?>">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group form-actions">
                                                            <div class="pull-left">
                                                                <button type="submit" class="btn btn-success" name="add-article-control" value="Valider"><i class="fa fa-check-circle-o"></i> Valider</button>
                                                            </div>
                                                            <div class="pull-right">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times-circle-o"></i> Fermer la boite de dialogue</button>
                                                            </div>
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
                        <!-- END Example Content -->
                    </div>
                    <div id="add-article" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h3 class="modal-title">Ajout d'un article au menu de la semaine</h3>
                                </div>
                                <div class="modal-body">
                                    <form class="form-bordered form-horizontal" action="<?php echo SITE,FOLDER; ?>inc/control/menu.php" method="POST">
                                        <input type="hidden" name="idmenu" value="<?php echo $donnee_menu['idmenu']; ?>" />

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Designation de l'article</label>
                                            <div class="col-md-9">
                                                <input type="text" id="example-text-input" name="designation" class="form-control" placeholder="Désignation de l'article">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-textarea-input">Description de l'article</label>
                                            <div class="col-md-9">
                                                <textarea id="example-textarea-input" name="description" rows="9" class="form-control" placeholder="Content.."></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="val_number">Prix Unitaire</label>
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <input type="text" id="val_number" name="prix_unitaire" class="form-control" placeholder="X.XX">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group form-actions">
                                            <div class="pull-left">
                                                <button type="submit" class="btn btn-success" name="add-article-control" value="Valider"><i class="fa fa-check-circle-o"></i> Valider</button>
                                            </div>
                                            <div class="pull-right">
                                                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times-circle-o"></i> Fermer la boite de dialogue</button>
                                            </div>
                                        </div>



                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Example Block -->
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
        <script>!window.jQuery && document.write(decodeURI('%3Cscript src="js/vendor/jquery-1.11.1.min.js"%3E%3C/script%3E'));</script>

        <!-- Bootstrap.js, Jquery plugins and Custom JS code -->
        <script src="<?php echo SITE,FOLDER,ASSETS; ?>js/vendor/bootstrap.min.js"></script>
        <script src="<?php echo SITE,FOLDER,ASSETS; ?>js/plugins.js"></script>
        <script src="<?php echo SITE,FOLDER,ASSETS; ?>js/app.js"></script>
        <script src="<?php echo SITE,FOLDER,ASSETS; ?>js/pages/tablesGeneral.js"></script>
        <script src="<?php echo SITE,FOLDER,ASSETS; ?>js/pages/formsValidation.js"></script>
        <script>$(function(){ FormsValidation.init(); });</script>
        <script>$(function(){ TablesGeneral.init(); });</script>
    </body>
</html>