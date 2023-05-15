<?php 
require_once("./Model.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, tr, td{
            border: 1px solid black;
        }
        td{
            max-width: 300px;
            padding: 5px;
        }
    </style>
</head>
<body>
    <?php 
        if(isset($_GET["delete"])){
            deleteMahasiswa($_GET["delete"]);
        }
        $data = getAllMahasiswaData();
    ?>
    <h1>Data Mahasiswa</h1>
    <table>
        <tr>
            <td>Nama</td>
            <td>NIM</td>
            <td>Jenis Kelamin</td>
            <td>Angkatan</td>
            <td>Alamat</td>
            <td colspan="2">Aksi</td>
        </tr>
        <?php 
            if(!empty($data)):
                foreach($data as $row):
        ?>
        <tr>
            <td><?=$row["nama"]?></td>
            <td><?=$row["nim"]?></td>
            <td><?=$row["gender"]?></td>
            <td><?=$row["angkatan"]?></td>
            <td><?=$row["alamat"]?></td>
            <td><a href="./FormMahasiswa.php?id=<?=$row["nim"]?>">Edit</a></td>
            <td><a href="?delete=<?=$row["nim"]?>" onclick="return confirm('Are You Sure?')">Hapus</a></td>
        </tr>
        <?php 
                endforeach;
            endif;
        ?>
    </table>
    <form action="./FormMahasiswa.php">
        <button type="submit" name="id" value="create">Tambah</button>
    </form>
</body>
</html>