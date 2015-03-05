
            <div id="sidebar">
                <!-- Wrapper for scrolling functionality -->
                <div class="sidebar-scroll">
                    <!-- Sidebar Content -->
                    <div class="sidebar-content">
                        <!-- Brand -->
                        <a href="<?php echo SITE,FOLDER; ?>/index.php" class="sidebar-brand">
                            <i class="gi gi-flash"></i><strong><?php echo $logiciel; ?></strong>
                        </a>
                        <!-- END Brand -->

                        <!-- User Info -->
                        <div class="sidebar-section sidebar-user clearfix">
                            <div class="sidebar-user-avatar">
                                <a href="<?php echo SITE,FOLDER; ?>/user/profil.php?iduser=<?php echo $iduser; ?>">
                                    <img src="<?php echo SITE,FOLDER,ASSETS; ?>img/placeholders/avatars/avatar2.jpg" alt="avatar">
                                </a>
                            </div>
                            <div class="sidebar-user-name"><?php echo $donnee_utilisateur['nom_user']; ?> <?php echo $donnee_utilisateur['prenom_user']; ?></div>
                            <div class="sidebar-user-links">
                                <!-- <a href="page_ready_user_profile.html" data-toggle="tooltip" data-placement="bottom" title="Profile"><i class="gi gi-user"></i></a>
                                <a href="page_ready_inbox.html" data-toggle="tooltip" data-placement="bottom" title="Messages"><i class="gi gi-envelope"></i></a> -->
                                <!-- Opens the user settings modal that can be found at the bottom of each page (page_footer.html in PHP version) -->
                                <!-- <a href="#modal-user-settings" data-toggle="modal" class="enable-tooltip" data-placement="bottom" title="Settings"><i class="gi gi-cogwheel"></i></a> -->
                                <a href="<?php echo SITE,FOLDER; ?>logout.php" data-toggle="tooltip" data-placement="bottom" title="Logout"><i class="gi gi-exit"></i></a>
                            </div>
                        </div>
                        <!-- END User Info -->

                        <!-- Sidebar Navigation -->
                        <?php
                        if($groupe == 0){
                        ?>
                        <ul class="sidebar-nav">
                            <li>
                                <a href="<?php echo SITE,FOLDER; ?>index.php" class=" active"><i class="gi gi-stopwatch sidebar-nav-icon"></i>Accueil</a>
                            </li>
                            <li>
                                <a href="<?php echo SITE,FOLDER; ?>module/menu/index.php"><i class="gi gi-cutlery sidebar-nav-icon"></i>Les menus</a>
                            </li>
                            <li class="sidebar-header">
                                <span class="sidebar-header-options clearfix">
                                </span>
                                <span class="sidebar-header-title">MES COMMANDES</span>
                            </li>
                            <li>
                                <a href="<?php echo SITE,FOLDER; ?>module/commande/index.php?iduser=<?php echo $iduser; ?>"><i class="gi gi-stopwatch sidebar-nav-icon"></i>Liste des Commandes</a>
                            </li>
                        </ul>
                        <?php } ?>
                        <?php
                        if($groupe == 1){
                        ?>
                        <ul class="sidebar-nav">

                            <li>
                                <a href="<?php echo SITE,FOLDER; ?>index.php"><i class="fa fa-dashboard"></i> Accueil</a>
                            </li>

                            <li class="sidebar-header">
                                <span class="sidebar-header-options clearfix">
                                </span>
                                <span class="sidebar-header-title">COMMANDE</span>
                            </li>
                            <li>
                                <a href="<?php echo SITE,FOLDER; ?>module/admin/commande/user/index.php"><i class="fa fa-user"></i> Commandes Utilisateurs</a>
                            </li>

                            <li class="sidebar-header">
                                <span class="sidebar-header-options clearfix">
                                </span>
                                <span class="sidebar-header-title">MENUS</span>
                            </li>
                            <li>
                                <a href="<?php echo SITE,FOLDER; ?>module/admin/menu/index.php"><i class="gi gi-shop_window"></i> Gestion des Menus</a>
                            </li>

                            <li class="sidebar-header">
                                <span class="sidebar-header-options clearfix">
                                </span>
                                <span class="sidebar-header-title">ETAT & IMPRESSION</span>
                            </li>
                            <li>
                                <a href="<?php echo SITE,FOLDER; ?>module/admin/etat/commande/"><i class="fa fa-cubes"></i> Commande</a>
                            </li>

                            <li class="sidebar-header">
                                <span class="sidebar-header-options clearfix">
                                </span>
                                <span class="sidebar-header-title">PARAMETRE</span>
                            </li>
                            <li>
                                <a href="<?php echo SITE,FOLDER; ?>module/admin/user/index.php"><i class="fa fa-users"></i> Gestion des Utilisateurs</a>
                            </li>
                            <li>
                                <a href="<?php echo SITE,FOLDER; ?>module/admin/setting/index.php?idsetting=1"><i class="fa fa-building"></i> Gestion du centre de gestion</a>
                            </li>
                            <li>
                                <a href="<?php echo SITE,FOLDER; ?>module/admin/setting/purge.php"><i class="fa fa-refresh fa-spin"></i> Purge de la base de donnée</a>
                            </li>

                        </ul>
                        <?php } ?>
                        <!-- END Sidebar Navigation -->

                        <!-- Sidebar Notifications -->
                        <div class="sidebar-header">
                            <span class="sidebar-header-options clearfix">
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Refresh"><i class="gi gi-refresh"></i></a>
                            </span>
                            <span class="sidebar-header-title">Système</span>
                        </div>
                        <div class="sidebar-section">
                            <table>
                            <?php
                            $sql_module = mysql_query("SELECT * FROM module")or die(mysql_error());
                            while($donnee_module = mysql_fetch_array($sql_module))
                            {
                            ?>
                                <tr>
                                    <td style="width: 50%; padding-bottom: 5px;"><?php echo $donnee_module['designation']; ?><br><small> <font color="green">A jour</font></small></td>
                                    <td><?php echo $donnee_module['version']; ?></td>
                                </tr>
                            <?php } ?>
                            </table>
                        </div>
                        <!-- END Sidebar Notifications -->
                    </div>
                    <!-- END Sidebar Content -->
                </div>
                <!-- END Wrapper for scrolling functionality -->
            </div>
            <!-- END Main Sidebar