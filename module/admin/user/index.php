<?php include ('../../../inc/header.php'); ?>
<?php
define("TITLE_PAGE", "UTILISATEUR");
define("SUBTITLE_PAGE", "GESTION DES UTILISATEURS");
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
                    if(isset($_GET['add-user']) && $_GET['add-user'] == 'true')
                    {
                    ?>
                        <div class="alert alert-success alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <h4>
                                <i class="fa fa-check-circle"></i> Succès
                            </h4> 
                            L'utilisateur à été Ajouter
                        </div>
                    <?php
                    }
                    ?>
                    <?php
                    if(isset($_GET['add-user']) && $_GET['add-user'] == 'false')
                    {
                    ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <h4>
                                <i class="fa fa-times-circle"></i> Erreur
                            </h4> 
                            Une erreur à été rencontrer lors de l'ajout de l'utilisateur.<br>Contactez le support technique.
                        </div>
                    <?php
                    }
                    ?>
                    <?php
                    if(isset($_GET['supp-user']) && $_GET['supp-user'] == 'true')
                    {
                    ?>
                        <div class="alert alert-success alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <h4>
                                <i class="fa fa-check-circle"></i> Succès
                            </h4> 
                            L'utilisateur à été Supprimer
                        </div>
                    <?php
                    }
                    ?>
                    <?php
                    if(isset($_GET['supp-user']) && $_GET['supp-user'] == 'false')
                    {
                    ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <h4>
                                <i class="fa fa-times-circle"></i> Erreur
                            </h4> 
                            Une erreur à été rencontrer lors de la suppression de l'utilisateur.<br>Contactez le support technique.
                        </div>
                    <?php
                    }
                    ?>


                    <div class="block">
                        <div class="block-title">
                            <h2>Liste des Utilisateurs</h2>
                            <div class="pull-right">
                                <a href="#add-user" data-toggle="modal" class="btn btn-primary"><i class="fa fa-plus"></i> Ajouter un Utilisateurs</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="user" class="table table-vcenter table-condensed table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">Adresse Mail</th>
                                        <th class="text-center">Groupe</th>
                                        <th class="text-center">Identité</th>
                                        <th class="text-center">Coordonnée</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql_user = mysql_query("SELECT * FROM utilisateur")or die(mysql_error());
                                    while($donnee_user = mysql_fetch_array($sql_user))
                                    {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php
                                            if($donnee_user['connect'] == 0){echo "<i class='fa fa-circle text-danger'></i>";}
                                            if($donnee_user['connect'] == 1){echo "<i class='fa fa-circle text-success'></i>";}
                                            ?>
                                            <?php echo $donnee_user['login']; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php
                                            if($donnee_user['groupe'] == 0){echo "<span class='label label-info'>Utilisateur</span>";}
                                            if($donnee_user['groupe'] == 1){echo "<span class='label label-danger'>Administrateur</span>";}
                                            ?>
                                        </td>
                                        <td>
                                            <?php echo $donnee_user['nom_user']; ?> <?php echo $donnee_user['prenom_user']; ?>
                                        </td>
                                        <td>
                                            <strong>Téléphone:</strong> <?php echo $donnee_user['tel_user']; ?><br>
                                            <strong>Portable:</strong> <?php echo $donnee_user['port_user']; ?>
                                        </td>
                                        <td>
                                            <a href="view.php?iduser=<?php echo $donnee_user['iduser']; ?>" class="btn btn-primary">Voir la fiche de l'utilisateur <i class="fa fa-arrow-right"></i></a>
                                            <a href="<?php echo SITE,FOLDER; ?>inc/control/user.php?iduser=<?php echo $donnee_user['iduser']; ?>&supp-user=valider" class="btn btn-danger"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>   
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div id="add-user" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h3 class="modal-title">Nouvel Utilisateur</h3>
                                </div>
                                <div class="modal-body">
                                    <form class="form-horizontal form-bordered" action="<?php echo SITE,FOLDER; ?>inc/control/user.php" method="POST">

                                        <input type="hidden" name="iduser" value="<?php echo $iduser; ?>" />

                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="val_email">Adresse Mail <span class="text-danger">*</span></label>
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <input type="text" id="val_email" name="login" class="form-control" placeholder="test@example.com">
                                                    <span class="input-group-addon"><i class="gi gi-envelope"></i></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="val_password">Mot de Passe <span class="text-danger">*</span></label>
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <input type="password" id="val_password" name="pass_md5" class="form-control" placeholder="Choose a crazy one..">
                                                    <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="val_confirm_password">Confirm Password <span class="text-danger">*</span></label>
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <input type="password" id="val_confirm_password" name="confirm_pass" class="form-control" placeholder="..and confirm it!">
                                                    <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="example-select2">Groupe</label>
                                            <div class="col-md-6">
                                                <select id="example-select2" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose one..">
                                                    <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                                    <option value="0">Utilisateur</option>
                                                    <option value="1">Administrateur</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Nom de l'utilisateur</label>
                                            <div class="col-md-9">
                                                <input type="text" id="example-text-input" name="nom_user" class="form-control" placeholder="Nom de l'utilisateur en Majuscule...">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Prénom de l'utilisateur</label>
                                            <div class="col-md-9">
                                                <input type="text" id="example-text-input" name="prenom_user" class="form-control" placeholder="Prénom de l'utilisateur">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="masked_phone">Numéro de Téléphone fixe</label>
                                            <div class="col-md-6">
                                                <input type="text" id="masked_phone" name="tel_user" class="form-control" placeholder="XX.XX.XX.XX.XX">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="masked_phone">Numéro de Téléphone Portable</label>
                                            <div class="col-md-6">
                                                <input type="text" id="masked_phone" name="port_user" class="form-control" placeholder="XX.XX.XX.XX.XX">
                                            </div>
                                        </div>

                                        <div class="form-group form-actions">
                                            <button type="submit" class="btn btn-success" name="add-user-valid" value="Valider"><i class="fa fa-check"></i> Ajout de l'utilisateur</button>
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
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