<?php 
$serveur = "127.0.0.1";
$dbname = "test";
$user = "root";
$pass = "";
$port = 3306;

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$age = $_POST['age'];
$classe = $_POST['classe'];
$sexe = $_POST['sexe'];
$telephone = $_POST['telephone'];
$email = $_POST['email'];

//on se connecte a la BDD
try{
    $dbco = new PDO("mysql:host=$serveur;port=$port; dbname=$dbname",$user, $pass);
    $dbco -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    

    
    //on insere les donnees recues
    $sth = $dbco->prepare("
         INSERT INTO etudiant(nom, prenom, age, classe, sexe, telephone, email)
         Values(:nom, :prenom, :age, :classe, :sexe, :telephone, :email)");
    $sth->bindParam(':nom', $nom);
    $sth->bindParam(':prenom', $prenom);
    $sth->bindParam(':age', $age);
    $sth->bindParam(':classe', $classe);
    $sth->bindParam(':sexe', $sexe);
    $sth->bindParam(':telephone', $telephone);
    $sth->bindParam(':email', $email);
    $sth->execute();
    

    // on renvoie l utilisateur vers la page de remerciement
    header("location:merci.html");
}
  catch(PDOException $e){
      echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
  }
?>
