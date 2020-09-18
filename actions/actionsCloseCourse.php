<?php
require_once "../includes/functions.php";
session_start();

$coursIntitule = filter_input(INPUT_POST, 'coursIntitule');
$matiereIntitule = filter_input(INPUT_POST, 'matiereIntitule');
$commentaires = filter_input(INPUT_POST, "commentaires");
$promoIntitule = filter_input(INPUT_POST,"promoIntitule");
$nbParticipants = filter_input(INPUT_POST, 'nbParticipants');
$duree = filter_input(INPUT_POST, 'duree');
$salle = filter_input(INPUT_POST, "salle");
$id_cours = filter_input(INPUT_POST,"id_cours");
$id_personne = filter_input(INPUT_POST,"id_personne");
$id_matiere = filter_input(INPUT_POST,"id_matiere");
$id_promo = filter_input(INPUT_POST,"id_promo");
$date = filter_input(INPUT_POST,"date");
$dateHeure = filter_input(INPUT_POST,"dateHeure");

$timeZone = new DateTimeZone("Europe/Paris");
$d = DateTime::createFromFormat('Y-m-d H:i:s', $date.' '.$dateHeure, $timeZone);
if ($d != false) {
    $dateTimeStamp = $d->getTimestamp();
    hpost("http://localhost:4567/api/postCloseCourse", array("id_cours"=>$id_cours,"id_matiere"=>$id_matiere,
        "id_promo"=>$id_promo,"intitule"=>$coursIntitule, "date"=>$dateTimeStamp, "commentaires"=>$commentaires, "nbParticipants"=>$nbParticipants,
        "duree"=>$duree,"salle"=>$salle));
    header('location: /tuteur-cours');
} else{
    header('location: /tuteur-cours');
}
