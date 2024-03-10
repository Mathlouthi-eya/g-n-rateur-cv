<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cv_bd";

// Créer la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupérer les données du formulaire
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$date = $_POST['date'];
$statut = $_POST['statut'];
$adresse = $_POST['adresse'];
$numero = $_POST['numero'];
$email = $_POST['email'];
$diplome = $_POST['diplome'];
$universite = $_POST['universite'];
$competences = $_POST['competences'];

// Insérer les données dans la base de données
$sql = "INSERT INTO info_user (nom, prenom,date,statut,adresse,numero,email,diplome,universite,competences) VALUES ('$nom', '$prenom','$date','$statut','$adresse','$numero','$email','$diplome','$universite','$competences')";

if ($conn->query($sql) === TRUE) {
    echo "Données enregistrées avec succès";
} else {
    echo "Erreur: " . $sql . "<br>" . $conn->error;
}

// Fermer la connexion
$conn->close();
?>