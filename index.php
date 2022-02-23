
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
    $arrayClasse = [];
    $stm = $db->prepare("SELECT * FROM eleves");
    if($stm->execute()){
        foreach ($stm->fetchAll() as $eleve){
            $arrayClasse[$eleve['id']] = ["nom" => $eleve['nom'], "prenom" => $eleve['prenom'], "age" => $eleve['age']];
        }
    }
    return $arrayClasse;
}

// update
function updateEleve ($db, $id, $nom, $prenom, $age){
    $stm = $db->prepare("
    UPDATE eleves SET nom = :nom, prenom = :prenom, age = :age WHERE id = :id
    ");
    $stm->bindParam(':nom', $nom);
    $stm->bindParam(':prenom', $prenom);
    $stm->bindParam(':age', $age);
    $stm->bindParam(':id', $id);
    $stm->execute();
}

// delete
function delEleve ($db, $id){
    try {
        $sql = "DELETE FROM eleves WHERE id = '$id'";

        if($db->exec($sql) !== false){
            echo "élève " . $id . " supprimé";
        }
    }
    catch (PDOException $e){
        echo "error : " . $e->getMessage();
    }

}

//createEleve($db, "Skywalker", "Luc", 18);

$classe = readClasse($db);


//updateEleve($db, 2, "Skywalker", "Luc", 18);

//delEleve($db, 2);

