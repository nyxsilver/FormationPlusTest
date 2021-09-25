<?php
try{
    $bdd = new PDO('mysql:host=localhost;dbname=formationplus;charset=utf8', 'root', 'root');
} catch(Exception $e) {
    die('Erreur : '.$e->getMessage());
}
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $convention = $_POST["convention"];

    echo $nom;
    echo $prenom;
    echo $email;
    echo $convention;

    $req = $bdd->prepare('INSERT INTO etudiant(nom, prenom, mail, convention) VALUE(:id2, :id3, :id4, :id5)');
    $req->execute(array(
        'id2' => $nom,
        'id3' => $prenom,
        'id4' => $email,
        'id5' => (int)$convention,
    ));
    $req->closeCursor();
?>
