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
    <link rel="stylesheet" href="style.css">
    <title>Liste des élèves</title>
</head>
<body>
    <main>
        <section>
            <table>
                <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Age</th>
                            <th></th>
                        </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($classe as $key => $eleve){?>
                    <tr>
                        <td><?=$eleve['nom']?></td>
                        <td><?=$eleve['prenom']?></td>
                        <td><?=$eleve['age']?></td>
                        <td>
                            <a href="liste.php?s=<?=$key?>">suppr</a>
                            <a href="updateElv.php?u=<?=$key?>">màj</a>
                        </td>
                    </tr>
                    <?php
                    }
                    if(isset($_GET['s'])){
                        delEleve($db, $_GET['s']);
                        header('Location: liste.php');
                    }

                    if (isset($_GET['u'])) {
                        updateEleve($db, $_GET['u'], $_POST['nom'], $_POST['prenom'], $_POST['age']);
                        header('Location: liste.php');
                    }
                    ?>
                </tbody>
            </table>
        </section>
        <footer>
            <a href="index.php">retour</a>
        </footer>
    </main>

</body>
</html>
