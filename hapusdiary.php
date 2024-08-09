<?php
session_start();
include 'diary_db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' ){

$id = $_POST['id'];

if(!empty($id) && is_numeric($id)){
$sql = "DELETE FROM diary WHERE id = $id";
if($conn->query($sql) == TRUE){
    
    echo "data berhasil dihapus";
    header('Location: index.php');
    exit;
}else{
    echo "error";
}


}else {
    echo "error";
}

}



?>