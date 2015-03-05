<?php include ('../../../inc/header.php'); ?>
<?php
define("TITLE_PAGE", "MENU");
define("SUBTITLE_PAGE", "GESTION DES MENUS");
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
                    </ul>
                    <!-- END Blank Header -->
                    <!-- AFFICHAGE DES RESULTATS -->

                    <?php
                    if(isset($_GET['add-menu']) && $_GET['add-menu'] == 'true')
                    {
                    ?>
                        <div class="alert alert-success alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <h4><i class="fa fa-check-circle"></i> Succès</h4> Le menu à bien été ajouter.
                        </div>
                    <?php
                    }
                    ?>
                    <?php
                    if(isset($_GET['add-menu']) && $_GET['add-menu'] == 'false')
                    {
                        ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <h4><i class="fa fa-times-circle"></i> Erreur</h4> Une erreur à eu lieu lors de l'ajout du menu dans la base.<br>
                            Veuillez Contacter le support technique. <strong>Erreur EX8870</strong>.
                        </div>
                    <?php
                    }
                    ?>

                    <?php
                    if(isset($_GET['modif-menu']) && $_GET['modif-menu'] == 'true')
                    {
                        ?>
                        <div class="alert alert-success alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <h4><i class="fa fa-check-circle"></i> Succès</h4> Le menu à bien été modifier.
                        </div>
                    <?php
                    }
                    ?>
                    <?php
                    if(isset($_GET['modif-menu']) && $_GET['modif-menu'] == 'false')
                    {
                        ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <h4><i class="fa fa-times-circle"></i> Erreur</h4> Une erreur à eu lieu lors de la modification du menu dans la base.<br>
                            Veuillez Contacter le support technique. <strong>Erreur EX8871</strong>.
                        </div>
                    <?php
                    }
                    ?>

                    <?php
                    if(isset($_GET['supp-menu']) && $_GET['supp-menu'] == 'true')
                    {
                        ?>
                        <div class="alert alert-success alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <h4><i class="fa fa-check-circle"></i> Succès</h4> Le menu à bien été supprimer.
                        </div>
                    <?php
                    }
                    ?>
                    <?php
                    if(isset($_GET['supp-menu']) && $_GET['supp-menu'] == 'false')
                    {
                        ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <h4><i class="fa fa-times-circle"></i> Erreur</h4> Une erreur à eu lieu lors de la suppression du menu dans la base.<br>
                            Veuillez Contacter le support technique. <strong>Erreur EX8872</strong>.
                        </div>
                    <?php
                    }
                    ?>


                    <!-- Example Block -->
                    <div class="block">
                        <!-- Example Title -->
                        <div class="block-title">
                            <h2>Listing des menus</h2>
                            <div class="pull-right">
                                <a href="#add-menu" data-toggle="modal" class="btn btn-success"><i class="fa fa-plus-circle"></i> Nouveau Menu</a>
                            </div>
                        </div>

                        <!-- END Example Title -->

                        <!-- Example Content -->
                        <div class="table-responsive">
                            <table id="general-table" class="table table-striped table-vcenter table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">Semaine</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sql_menu = mysql_query("SELECT * FROM menu ORDER BY idmenu DESC")or die(mysql_error());
                                while($donnee_menu = mysql_fetch_array($sql_menu))
                                {
                                ?>
                                    <tr>
                                        <td>SEMAINE <?php echo $donnee_menu['semaine']; ?></td>
                                        <td class="pull-right">
                                            <a class="btn btn-default btn-xs" href="view.php?idmenu=<?php echo $donnee_menu['idmenu']; ?>"><i class="fa fa-eye"></i></a>
                                            <a class="btn btn-info btn-xs" href="#modif-menu" data-toggle="modal"><i class="fa fa-edit"></i></a>
                                            <a class="btn btn-danger btn-xs" href="<?php echo SITE, FOLDER; ?>inc/control/menu.php?idmenu=1&supp-menu-control=Valider"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                    <div id="modif-menu" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h3 class="modal-title">Modification du menu</h3>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="form-bordered form-horizontal" action="<?php echo SITE, FOLDER; ?>inc/control/menu.php" method="POST">

                                                        <input type="hidden" name="idmenu" value="<?php echo $donnee_menu['idmenu']; ?>" />
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="example-text-input">N° de la semaine</label>
                                                            <div class="col-md-9">
                                                                <input type="text" id="example-text-input" name="semaine" class="form-control" Value="<?php echo $donnee_menu['semaine']; ?>">
                                                            </div>
                                                        </div>

                                                        <div class="form-group form-actions text-center">
                                                            <button type="submit" class="btn btn-success" name="modif-menu-control" value="Valider"><i class="fa fa-check-circle-o"></i> Valider </button>
                                                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times-circle-o"></i> Fermer la boite de dialogue </button>
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
                    <div id="add-menu" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h3 class="modal-title">Nouveau Menu</h3>
                                </div>
                                <div class="modal-body">
                                    <form class="form-bordered form-horizontal" action="<?php echo SITE, FOLDER; ?>inc/control/menu.php" method="POST">

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">N° de la semaine</label>
                                            <div class="col-md-9">
                                                <input type="text" id="example-text-input" name="semaine" class="form-control" placeholder="N° de la semaine uniquement">
                                            </div>
                                        </div>

                                        <div class="form-group form-actions text-center">
                                            <button type="submit" class="btn btn-success" name="add-menu-control" value="Valider"><i class="fa fa-check-circle-o"></i> Valider </button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times-circle-o"></i> Fermer la boite de dialogue </button>
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
        <script>$(function(){ TablesGeneral.init(); });</script>
    </body>
</html>