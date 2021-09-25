<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="traitement.php">
    Etudiant : 
    
    <?php
    try{
        $bdd = new PDO('mysql:host=localhost;dbname=formationplus;charset=utf8', 'root', 'root');
    } catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
    $reponse = $bdd->query('SELECT * FROM Etudiant');
    $convention = $bdd->query('SELECT * FROM Convention');
    echo '<select name="student">';
    while ($donnees = $reponse->fetch())
{
    ?>
    <option value="<?php echo $donnees['idEtudiant']?>"><?php echo $donnees['nom'] . " " .$donnees['prenom']?></option> 
    <?php
    
}
echo '</select>';

$reponse->closeCursor(); // Termine le traitement de la requête
?>
<button type="submit">Rechercher</button>
    </form>
    <form method="post" action="ajout.php">
    <input type="text" name="nom" value="nom">
    <input type="text" name="prenom" value="prenom">
    <input type="text" name="email" value="email">
    <input type="text" name="convention" value="convention">
    <button type="submit">Ajout</button>
    </form>
</body>
</html>