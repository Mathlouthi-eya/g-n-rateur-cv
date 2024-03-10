<?php
function chargerClass($cv)
{
  require $cv.'form.php';
}
spl_autoload_register("chargerClass");
session_start();
$conn = new PDO('mysql:host=localhost;dbname=cv_bd','root','');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
$personne = new Cvs($conn); 
if (isset($_POST['sbt'])) {
  $donnees = array(
    'nom' => $_POST['nom'],
    'prenom' => $_POST['prenom'],
    'date' => $_POST['date'],
    'statut' => $_POST['statut'],
    'adresse' => $_POST['adresse'],
    'numero' => $_POST['numero'],
    'email' => $_POST['email'],
    'diplome' => $_POST['diplome'],
    'universite' => $_POST['universite'],
    'competences' => $_POST['competences'],
  )
      $user = new Cv($donnees);
      $personne->addUser($user);
  }
?>