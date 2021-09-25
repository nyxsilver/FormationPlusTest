<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
    try{
        $bdd = new PDO('mysql:host=localhost;dbname=formationplus;charset=utf8', 'root', 'root');
    } catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
    $idStudent = $_POST['student'];
    $convention = $bdd->query('SELECT etudiant.nom , etudiant.prenom, convention.name, convention.nbHeur 
    FROM etudiant, convention 
    WHERE etudiant.idEtudiant = convention.idConvention && etudiant.idEtudiant = ' . $idStudent);
    while ($donnees = $convention->fetch())
    {
        $prenom = $donnees['prenom'];
        $nomSociete = $donnees['name'];
        $nomEtudiant = $donnees['nom'];
        $nbHeure = $donnees['nbHeur'];
    }
    ?>

    <p>Convention: <input type="text" name="convention" value=" <?php echo $nomSociete ?>" disabled="disabled" /></p>   
   
    <p>Mail :</p>
    <textarea name="textarea" id="generate" cols="50" rows="12">
<?php echo "Bonjour ". $nomEtudiant ." " . $prenom . ", 
Vous avez suivi " . $nbHeure . "heures de formation chez FormationPlus. 
Pouvez-vous nous retourner ce mail avec la pièce jointe signée. 

Cordialement,
FormationPlus"
    ?>

    </textarea>
</body>
</html>