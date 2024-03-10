<?php
require("connection.php");

$conn = mysqli_connect("localhost","root","","cv_bd");

class cv{
private $nom;
private $prenom;
private $date;
private $statut;
private $adresse;
private $numero;
private $email;
private $diplome;
private $universite;
private $competences;

public function __construct($nom, $prenom, $date, $statut, $adresse, $numero, $email, $diplome, $universite ,$competences) {
  $this->hydrate([
      'nom' => $nom;
      'prenom' => $prenom;
      'date' => $date;
      'statut' => $statut;
      'adresse' => $adresse;
      'numero' => $numero;
      'email' => $email;
      'diplome' => $diplome;
      'universite' => $universite;
      'competences' => $competences;]);
}

public function hydrate(array $data) {
  foreach ($data as $key => $value) {
      $method = 'set' . ucfirst($key);

      if (method_exists($this, $method)) {
          $this->$method($value);
      }
  }
}

public function getNom() {
  return $this->nom;
}

public function setNom($nom) {
  $this->nom = $nom;
}

public function getPrenom() {
  return $this->prenom;
}

public function setPrenom($prenom) {
  $this->prenom = $prenom;
}
public function getDate() {
  return $this->date;
}
public function setDate($date) {
    $this->date = $date;
}
public function getStatut() {
  return $this->statut;
}
public function setStatut($statut) {
    $this->statut = $statut;
}
public function getAdresse() {
  return $this->adresse;
}

public function getNumero() {
  return $this->numero;
}
public function setNumero($numero) {
    $this->numero = $numero;
}
public function getEmail() {
    return $this->email;
  }
public function setEmail($email) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $this->email = $email;
    } else {
        throw new InvalidArgumentException("Invalid email format");
    }
  }
public function getDiplome() {
  return $this->diplome;
}
public function setDiplome($diplome) {
    $this->diplome = $diplome;
}
public function getUniversite() {
  return $this->universite;
}
public function setUniversite($universite) {
    $this->universite = $universite;
}
public function getCompetences() {
  return $this->competences;
}
public function setCompetences($competences) {
    $this->competences = $competences;
}
}
class Cvs {
  private $conn;

  public function __construct(PDO $conn)
  {
      $this->conn = $conn;
  }

  public function addUser(Cv $user)
{
  try {    
    $stmt =$this->conn->prepare("INSERT INTO cv (nom,prenom,date,statut,adresse,numero,email,diplome,universite,competences) VALUES (?, ?, ?, ?,?,?,?,?,?,?)");
    $stmt ->binParam('?',$nom -> getPrenom());
    $stmt ->binParam('?',$prenom -> getPreom());
    $stmt ->binParam('?',$date -> getDate()); 
    $stmt ->binParam('?',$statut -> getStatut());
    $stmt ->binParam('?',$adresse -> getAdresse());
    $stmt ->binParam('?',$numero -> getNumero());
    $stmt ->binParam('?',$email -> getEmail());
    $stmt ->binParam('?',$diplome -> getDiplome());
    $stmt ->binParam('?',$universite -> getUniversite());
    $stmt ->binParam('?',$competences -> getCompetences());
    $stmt = execute();
  }catch (PDOException $e){
    echo 'erreur' .$e->getMessage();
  }
}
}
?>