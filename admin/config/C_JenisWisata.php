<?php
require_once 'koneksi.php';

// tambah pariwisata
if (isset($_POST['tambah'])) {
    $jenisWisata = $_POST['jenisWisata'];

    $sql = "INSERT INTO jeniswisata(jenisWisata) VALUES('$jenisWisata')";
    $query = mysqli_query($db, $sql);
    if ($query) {
        header('location:../jenisWisata.php');
    } else {
        echo mysqli_error($db);
    }
}

// update pariwisata
if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $jenisWisata = $_POST['jenisWisata'];

    $sql = "UPDATE jeniswisata SET jenisWisata='$jenisWisata' WHERE id_jeniswisata='$id'";
    $query = mysqli_query($db, $sql);
    if ($query) {
        header('location:../jenisWisata.php');
    } else {
        echo mysqli_error($query);
    }
}

// hapus pariwisata
if (isset($_POST['hapus'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM jeniswisata WHERE id_jeniswisata='$id'";
    $query = mysqli_query($db, $sql);
    if ($query) {
        header('location:../jenisWisata.php');
    } else {
        echo mysqli_error($sql);
    }
}