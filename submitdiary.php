<?php

session_start();

include 'diary_db.php';

$catatan = $_POST['catatan'];

if($catatan != null){
$sql = "INSERT INTO diary (catatan) VALUES ('$catatan')";
if($conn->query($sql) === TRUE){
    $_SESSION['sukses'] = "Data Berhasil dikirim";
    echo "data berhasil dikirim";
    header('location: index.php');
    exit;
}else{
 echo "error" . $sql . $conn->error;
}
}else{
    $_SESSION['gagal'] ="Data tidak boleh kosong";
    header('Location: index.php');
}





?>