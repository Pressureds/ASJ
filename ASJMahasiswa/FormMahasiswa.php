<?php 
require("./Model.php");
$create;
$id = $_GET['id'];
if($id == "create"){
    $create = true;
}else{
    $create = false;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        if(!$create){
            $data = getMahasiswa($id);
        }
    ?>
    <form method="post" action="">
        <div>
            <label>Nama</label>
            <input type="text" name="nama" value="<?=($create)?"":$data["nama"]?>">
        </div>
        <div>
            <label>NIM</label>
            <input type="text" name="nim" value="<?=($create)?"":$data["nim"]?>">
        </div>
        <div>
            <label>Alamat</label>
            <input type="text" name="alamat" value="<?=($create)?"":$data["alamat"]?>">
        </div>
        <div>
            <label>Jenis Kelamin</label>
            <input type="radio" name="gender" value="Laki-laki" <?=((!$create) && $data["gender"]=="Laki-laki")? "checked":"";?>><label>Laki-laki</label>
            <input type="radio" name="gender" value="Perempuan" <?=((!$create) && $data["gender"]=="Perempuan")? "checked":"";?>><label>Perempuan</label>
        </div>
        <div>
            <label>Angkatan</label>
            <input type="text" name="angkatan" value="<?=($create)?"":$data["angkatan"]?>">
        </div>
        <button type="submit" name="simpan" value="simpan">Simpan</button>
    </form>

    <?php 
        if(!empty($_POST["simpan"])){
            if($create){
                insertMahasiswa(array(":nama"=>$_POST["nama"],
                ":nim"=>$_POST["nim"],
                ":alamat"=>$_POST["alamat"],
                ":gender"=>$_POST["gender"],
                ":angkatan"=>$_POST["angkatan"]));
            }else{
                updateMahasiswa(array(":nama"=>$_POST["nama"],
                ":nim"=>$_POST["nim"],
                ":alamat"=>$_POST["alamat"],
                ":gender"=>$_POST["gender"],
                ":angkatan"=>$_POST["angkatan"]), $id);
            }
        }
    ?>
</body>
</html>