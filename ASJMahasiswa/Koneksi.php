<?php 
$DBHOST = "localhost";
$DBNAME = "db_mahasiswa";
$USERNAME = "ramandha";
$PASSWORD = "rama";
try{
    $koneksi = new PDO("mysql:host=$DBHOST;dbname=$DBNAME","$USERNAME","$PASSWORD");
    //echo "Koneksi Sukses";
}catch(PDOException $e){
    echo "Koneksi Gagal <br/>".$e->getMessage();
}

?>