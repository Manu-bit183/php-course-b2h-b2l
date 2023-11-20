<?php
session_start();

include '18_database-connection.php';

global $db;


$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if ($id !== null && $id !== false) {
    $query = $db->prepare("SELECT * FROM fietsen WHERE id = :id");
    $query->bindParam('id', $id);
    $query->execute();
    $bike = $query->fetch(PDO::FETCH_ASSOC);
    $catagoryId = $bike['catagorie_id']
}else{
    die();
};


$deleteQuery = $db->prepare(query: 'DELETE FROM fietsen WHERE id = :id');
$deleteQuery->bindParam(param: 'id', &var: $id);
if ($deleteQuery->execute()){
    $_SESSION['message']= "Object verwijderd";
}else{
    $_SESSION['message'] = "Er is iets mis gegaan";
}

header(header: 'location: detail.php?id=' . $catagoryId);

?>