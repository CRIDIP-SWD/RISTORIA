<?php
require_once "../inc/config.php";
require_once "../inc/db.conf.php";

/**
 * TACHE CRON pour Valider automatique les commandes le vendredi à 00h00
 */

$semaine = date("W");
var_dump($semaine);
die();
