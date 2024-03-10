<?php
class database{
    private $host;
    private $db_name;
    private $username;
    private $password;
    private $conn;

    public function__construct ($host, $db_name, $username, $PASSWORD) {
        $this->host=$host;
        $this->db_name=$db_name;
        $this->username=$username;
        $this->password=$password;
        try{
            $this->conn = new PDO("mysql:host=$this->host;  dbname=$this_>db_name",this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTER_ERRMODE, PDO::ERRMODE_EWCEPTION);
        } catch (PDOExeception $e) {
            echo"la connexion a echoue:".$e->getmessage();
            exit;
        }
    }
}
    Public function insertUser ($name,$email, $password) {
        $q=$this-> conn->prepare("insert into CVserveur (nom, email,password) values (:name, :email,:password)");
        $q->bindparam(":name",$name);
        $q->bindparam(":email",$email);
        $q->bindparam(":password",$password);
        try{
            $q->execute();
            return true;
        }  catch(PDOexception $e) {
            echo "error:". $e->getMessage();
            return false;

        }
    }
    
        
    
    public function checkEmailexists($email){
        $q=$this->conn->prepare("SELECT COUNT(*) FROM CVserveur WHERE email = :email");
        $q->bindPARAM(":email",$email);
        $q->execute();
        $count = $q->fetchColumn();
        return $count > 0;
        
    

}
$db = new DATABESE ("localhost", "bd_login","root," ");

$name =$_POST['nom'];
$email =$_POST['email'];
$password =$_POST['password'];


if (empty($name) || empty($email) || empty($password)) {
    echo '<script> alert("Un champ est vide");</script>';
    exit;
}

if ($db->checkEmailExists($email)) {
    echo '<script>alert("L\'adresse email existe déjà");</script>';
    exit;
}

if ($db->insertUser($name, $email, $password)) {
    echo '<script>alert("Inscription réussie");</script>';
} else {
    echo '<script>alert("Erreur lors de l\'inscription");</script>';
}




?>