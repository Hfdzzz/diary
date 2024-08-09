<?php
session_start();

include 'diary_db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){


$id = $_POST['id'];
$catatan = $_POST['catatan'];

if(!empty($id) && is_numeric($id)){
$sql = "UPDATE diary SET catatan = '$catatan' WHERE id = '$id'";
if ($conn->query($sql) === TRUE){
    echo "Data berhasil diubah";
    header('Location: index.php');
    exit;
}else{
    header('Location: index.php');
    exit;
}


$conn->close();

}else{
    header('Location: index.php');
    exit;
}

}else{
    header('Location: index.php');
    exit;
}



?>