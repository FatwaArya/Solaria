<?php
include "../conn.php";

session_start();
if ($_SESSION['status_login'] != true) {
    header('location: ../login.php');
}
$sql = "select * from materi ;";
$result = mysqli_query($conn, $sql);

$delSubject = mysqli_fetch_array($result);

$id = $_GET['id'];

if ($id) {
    $sql = "DELETE FROM `materi` WHERE `materi`.`id_subject` = '" . $id . "'";
    $qry_hapus = mysqli_query($conn, $sql);
//    function str_after($str, $search, $limit)
//    {
//        return $search === '' ? $str : array_reverse(explode($search, $str, $limit))[0];
//    }


    $path = 'uploads/' . $_SESSION['name'] . '/' . $delSubject['file'];


    if ($qry_hapus && file_exists($path)) {
        if (unlink($path)) {
            echo "<script>alert('delete sucess');
            location.href='addMaterial.php';</script>";
        } else {

            echo "<script>alert('delete failed');
//            location.href='addProduct.php';</script>";
        }


    }
}

