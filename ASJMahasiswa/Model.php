<?php 
require_once("./Koneksi.php");

function getAllMahasiswaData(){
    $query = "SELECT * FROM mahasiswa";
    $stmt = $GLOBALS["koneksi"]->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll();
}

function getMahasiswa($id){
    $query = "SELECT * FROM mahasiswa WHERE nim=$id";
    $stmt = $GLOBALS["koneksi"]->prepare($query);
    $stmt->execute();
    return $stmt->fetch();
}

function insertMahasiswa($arr){
    try{
        $query = "INSERT INTO mahasiswa(nim, nama, gender, angkatan, alamat) VALUES (:nim, :nama, :gender, :angkatan, :alamat)";
        $stmt = $GLOBALS["koneksi"]->prepare($query);
        $res = $stmt->execute($arr);
        if(!empty($res)){
            header("location:Mahasiswa.php");
        }
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

function updateMahasiswa($arr, $id){
    try{
        $nim = $arr[":nim"];
        $nama = $arr[":nama"];
        $alamat = $arr[":alamat"];
        $gender = $arr[":gender"];
        $angkatan = $arr[":angkatan"];
        $query = "UPDATE mahasiswa SET nama='$nama', 
            nim='$nim', alamat='$alamat', 
            gender='$gender', 
            angkatan='$angkatan'
            WHERE nim=$id";
        $stmt = $GLOBALS["koneksi"]->prepare($query);
        $res = $stmt->execute();
        if(!empty($res)){
            header("location:Mahasiswa.php");
        }
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

function deleteMahasiswa($id){
    try{
        $query = "DELETE FROM mahasiswa WHERE nim=$id";
        $stmt = $GLOBALS["koneksi"]->prepare($query);
        $stmt->execute();
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

?>