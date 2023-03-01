try {
 $conn = new PDO("mysql:host=$hostdb; dbname=$namedb", $userdb, $passdb);
$conn->exec("SET CHARACTER SET utf8");      // Sets encoding UTF-8
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 $sql = "UPDATE `access_users`   
      (`contact_first_name`,`contact_surname`,`contact_email`,`telephone`) 
      VALUES (:firstname, :surname, :telephone, :email);
      ";



 $statement = $conn->prepare($sql);
 $statement->bindValue(":firstname", $firstname);
 $statement->bindValue(":surname", $surname);
 $statement->bindValue(":telephone", $telephone);
 $statement->bindValue(":email", $email);
 $count = $statement->execute();

  $conn = null;        // Disconnect
}
catch(PDOException $e) {
  echo $e->getMessage();
}
