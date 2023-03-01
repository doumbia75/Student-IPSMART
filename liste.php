<?php
  $host = '127.0.0.1';
  $dbname = 'test';
  $username = 'root';
  $password = '';
  $port = 3306;
    
  $dsn = "mysql:host=$host;port=$port; dbname=$dbname"; 
  // rÃ©cupÃ©rer tous les utilisateurs
  $sql = "SELECT * FROM etudiant";
   
  try{
   $pdo = new PDO($dsn, $username, $password);
   $stmt = $pdo->prepare($sql);
   $stmt->execute();
   
   if($stmt === false){
    die("Erreur");
   }
   
  }catch (PDOException $e){
    echo $e->getMessage();
  }
?>


<!DOCTYPE html>
<head>
  
<link rel="stylesheet" href="list.css">
<title>liste</title>
</head>
<html>
<body>
 <h1>Liste des utilisateurs Enregistrer</h1>
 <table>
   <thead>
     <tr>
       <th>ID</th>
       <th>Nom</th>
       <th>Prenom</th>
       <th>Age</th>
       <th>Classe</th>
       <th>Sexe</th>
       <th>Telephone</th>
       <th>Email</th>
     </tr>
   </thead>
   <tbody>
    
     <?php while($row =$stmt->fetch() ): ?>
      <tr>
        <td><?php echo htmlspecialchars($row['id']); ?></td>
        <td><?php echo htmlspecialchars($row['nom']); ?></td>
        <td><?php echo htmlspecialchars($row['prenom']); ?></td>
        <td><?php echo htmlspecialchars($row['age']); ?></td>
        <td><?php echo htmlspecialchars($row['classe']); ?></td>
        <td><?php echo htmlspecialchars($row['sexe']); ?></td>
        <td><?php echo htmlspecialchars($row['telephone']); ?></td>
        <td><?php echo htmlspecialchars($row['email']); ?></td>
       

     </tr>
    <?php endwhile ?>
   </tbody>
 </table>
</body>
</html>
