<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>gestion de classe</title>
</head>
<body>
    <main>
        <header>
            <h1>Classe</h1>
        </header>
        <section>
            <h2>ajouter un élève :</h2>
            <form action="index.php" method="post">
                <input type="text" name="nom" placeholder="Nom">
                <input type="text" name="prenom" placeholder="Prénom">
                <input type="number" name="age" placeholder="age">
                <button type="submit" name="addEleve">valider</button>
            </form>
        </section>
        <footer>
            <a href="liste.php">liste des élèves</a>
        </footer>
    </main>
</body>
</html>
<?php
require 'crudEleve.php';
$pdo = new connPDO();
$db = $pdo->conn();

if(isset($_POST['addEleve'], $_POST['nom'], $_POST['prenom'], $_POST['age'])){
    createEleve($db, $_POST['nom'], $_POST['prenom'], $_POST['age']);
}
