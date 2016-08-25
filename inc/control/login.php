							<?php
							include('../db.conf.php');

							date_default_timezone_set("UTC");
                            $date = date('d/m/y');
                            $heure = date('H:i');
                            if (isset($_POST['connexion']) && $_POST['connexion'] == 'Connexion') {
                                if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['pass']) && !empty($_POST['pass']))) {

                                    // on teste si une entrée de la base contient ce couple login / pass
                                    $sql = 'SELECT count(*) FROM utilisateur WHERE login="'.mysql_escape_string($_POST['login']).'"  AND pass_md5="'.mysql_escape_string(md5($_POST['pass'])).'"';
                                    $req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
                                    $data = mysql_fetch_array($req);



                                    // si on obtient une réponse, alors l'utilisateur est un membre
                                    if ($data[0] == 1) {
                                        session_start();
                                        $login = $_POST['login'];
                                        $sql_user_up = mysql_query("UPDATE utilisateur SET last_connect = '$date - $heure', connect = '1' WHERE login = '$login'")or die(mysql_error());
                                        $_SESSION['login'] = $_POST['login'];
                                        header('Location: ../../index.php');
                                        exit();
                                    }
                                    // si on ne trouve aucune réponse, le visiteur s'est trompé soit dans son login, soit dans son mot de passe
                                    elseif ($data[0] == 0) {
                                        header("Location: ../../login.php?alert_fail=true&error=1&error_base=false&error_champs=false");
                                    }
                                    // sinon, alors la, il y a un gros problème :)
                                    else {
                                        header("Location: ../../login.php?error_base=true&error=1&alert_fail=false&error_champs=false");
                                    }
                                }
                                else {
                                header("Location: ../../login.php?error_champs=true&error=1&alert_fail=false&error_base=false");
                                }
                            }
                            ?>
                   