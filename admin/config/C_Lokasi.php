<?php
require_once 'koneksi.php';

// tambah pariwisata
if (isset($_POST['tambah'])) {
    $jalan = $_POST['jalan'];
    $desa = $_POST['desa'];
    $kecamatan = $_POST['kecamatan'];
    $kabKota = $_POST['kab/kota'];
    $provinsi = $_POST['provinsi'];

    $sql = "INSERT INTO lokasiwisata(jalan, desa, kecamatan, kab_kota, provinsi ) VALUES('$jalan', '$desa', '$kecamatan', '$kabKota', '$provinsi')";
    $query = mysqli_query($db, $sql);
    if ($query) {
        header('location:../lokasi.php');
    } else {
        echo mysqli_error($db);
    }
}