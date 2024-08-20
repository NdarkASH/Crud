<?php
    include "koneksi.php";

    function tambah_data($data, $files){ 

    $nisn = $data["nisn"];
    $nama_siswa = $data["nama"];
    $jenis_kelamin = $data["jenis_kelamin"];
    $foto = $files["foto"]["name"];
    $alamat = $data["alamat"];
    
    
    $dir = "img/";
    $tmpFile = $_FILES["foto"]["tmp_name"];
    
    move_uploaded_file($tmpFile, $dir.$foto);

    
    $query = "INSERT INTO tb_siswa VALUES(null, '$nisn', '$nama_siswa', '$jenis_kelamin', '$foto', '$alamat')";
    $sql = mysqli_query($GLOBALS['conn'], $query);
    return true;
}
?>