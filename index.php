<?php
require 'connPDO.php';
$pdo = new connPDO();
$db = $pdo->conn();

// create
function createEleve ($db, $nom, $prenom, $age){
    try {
        $sql = "
        INSERT INTO eleves (nom, prenom, age)
        VALUES ('$nom', '$prenom', '$age');       
        ";
        $db->exec($sql);
    }
    catch (PDOException $e){
        echo "Error : " . $e->getMessage();
    }
}

// read
function readClasse ($db){
    $stm = $db->prepare("SELECT * FROM eleves");
    if($stm->execute()){
        foreach ($stm->fetchAll() as $eleve){
            echo $eleve['nom'] . "<br>";
        }
    }
}



//createEleve($db, "Solo", "Han", 40);
readClasse($db);

