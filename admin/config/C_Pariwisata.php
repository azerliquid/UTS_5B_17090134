<?php
include 'koneksi.php';

// tambah pariwisata
if (isset($_POST['tambah'])) {
    $file = $_FILES['tumbnail'];
    $cover = $_FILES["tumbnail"]["name"];
    $tmp_cover = $_FILES["tumbnail"]["tmp_name"];
    $target = "../../assets/img/";
    $upload = upload_img($tmp_cover, $cover, $target);
    $data = array(
        'namaPariwisata' => $_POST['namaPariwisata'],
        'lokasi' => $_POST['lokasi'],
        'harga' => $_POST['harga'],
        'jenisWisata' => $_POST['jenisWisata'],
        'deskripsi' => $_POST['deskripsi'],
        'tumbnail' => $_FILES["tumbnail"]["name"]
    );
    tambah($data);
}

function tambah($data)
{
    include 'koneksi.php';
    $sql = "INSERT INTO pariwisata(namaPariwisata, lokasi, harga, jenisWisata, deskripsi, tumbnail) VALUES('" . implode("','", $data) . "')";
    $query = mysqli_query($db, $sql);
    if ($query) {
        header('location:../pariwisata.php');
    } else {
        echo mysqli_error($db);
    }
}

// update pariwisata
if (isset($_POST['edit'])) {
    $file = $_FILES['tumbnail'];
    $cover = $_FILES["tumbnail"]["name"];
    $tmp_cover = $_FILES["tumbnail"]["tmp_name"];
    $target = "../../assets/img/";
    $upload = upload_img($tmp_cover, $cover, $target);
    $id = $_POST['id'];
    $data = array(
        'namaPariwisata' => $_POST['namaPariwisata'],
        'lokasi' => $_POST['lokasi'],
        'harga' => $_POST['harga'],
        'jenisWisata' => $_POST['jenisWisata'],
        'deskripsi' => $_POST['deskripsi'],
        'tumbnail' => $_FILES["tumbnail"]["name"]
    );
    updatePariwisata($data, $id);
}

function updatePariwisata($data, $id)
{
    include 'koneksi.php';
    $set = array();
    foreach ($data as $colom => $value) {
        $set[] = "`" . $colom . "` = '" . $value . "'";
    }
    $sql = "UPDATE pariwisata SET " . implode(', ', $set) . " WHERE id='$id'";
    $query = mysqli_query($db, $sql);
    if ($query) {
        header('location:../pariwisata.php');
    } else {
        mysqli_error($query);
    }
}

// hapus pariwisata
if (isset($_POST['hapus'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM pariwisata WHERE id='$id'";
    $query = mysqli_query($db, $sql);
    if ($query) {
        header('location:../pariwisata.php');
    } else {
        echo mysqli_error($sql);
    }
}

// upload gambar
function upload_img($file_tmp, $file_nama, $target)
{
    $target_dir = $target;
    $target_file = $target_dir . basename($file_nama);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
    $check = getimagesize($file_tmp);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        return false;
    } else {
        if (move_uploaded_file($file_tmp, $target_file)) {
            echo "The file " . basename($file_nama) . " has been uploaded.";
            return true;
        } else {
            echo "Sorry, there was an error uploading your file.";
            return false;
        }
    }
}