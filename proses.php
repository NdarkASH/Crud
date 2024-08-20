<?php
    include "fungsi.php";
// submit
    if (isset($_POST["aksi"])){
        if($_POST["aksi"] == "add"){

       $true = tambah_data($_POST, $_FILES);

       if($true){
        header("location: index.php");
    }
    else{
        echo $true;
    }
// edit
    } else if($_POST["aksi"] == "edit"){
        // var_dump($_POST);
        $id_siswa = $_POST["id_siswa"];
        $nisn = $_POST["nisn"];
        $nama_siswa = $_POST["nama"];
        $jenis_kelamin = $_POST["jenis_kelamin"];
        $alamat = $_POST["alamat"];

        $queryShow = "SELECT * FROM tb_siswa WHERE id_siswa='$id_siswa';";
        $sql = mysqli_query($conn, $queryShow);
        $result = mysqli_fetch_assoc($sql);

        if($_FILES['foto']['name'] == ""){
            $foto = $result['foto_siswa'];
        } else {
            $foto = $_FILES['foto']['name'];
            unlink("img/".$result['foto_siswa']);
            move_uploaded_file($_FILES['foto']['tmp_name'], "img/".$_FILES['foto']['name']);
        }
        

        $query = "UPDATE tb_siswa SET nisn='$nisn', nama_siswa='$nama_siswa', jenis_kelamin='$jenis_kelamin', alamat='$alamat', foto_siswa='$foto' WHERE id_siswa='$id_siswa';";
        // var_dump($query);
        $sql = mysqli_query($conn, $query);
        header("location: index.php");
    }
}
// Hapus
    if (isset($_GET['hapus'])){
        $id_siswa = $_GET['hapus'];

        $queryShow="SELECT * FROM tb_siswa WHERE id_siswa = '$id_siswa';";
        $sql = mysqli_query($conn, $queryShow);
        $result = mysqli_fetch_assoc($sql);

        // var_dump($result);
        unlink("img/".$result['foto_siswa']);

        $query = "DELETE FROM tb_siswa WHERE id_siswa = '$id_siswa';";
        $sql = mysqli_query($conn, $query);
    
        if($sql){
            header("location: index.php");
        }
        else {
            echo $query;
        }
    } 
?>