<?php
require 'crudEleve.php';
$pdo = new connPDO();
$db = $pdo->conn();
$classe = readClasse($db);

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>mise à jour</title>
</head>
<body>
<main>
    <header>
        <h1>Classe</h1>
    </header>
    <section>
        <h2>mettre à jour : de l'élève :
            <?=$classe[$_GET['u']]['nom'] . " " . $classe[$_GET['u']]['prenom']?></h2>
        <form action="liste.php?u=<?=$_GET['u']?>" method="post">
            <input type="text" name="nom" value=<?=$classe[$_GET['u']]['nom']?>>
            <input type="text" name="prenom" value=<?=$classe[$_GET['u']]['prenom']?>>
            <input type="number" name="age" value=<?=$classe[$_GET['u']]['age']?>>
            <button type="submit" name="upEleve">valider</button>
        </form>
    </section>
    <footer>
        <a href="index.php">retour</a>
    </footer>
</main>
</body>
</html>

