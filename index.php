<?php
  include("koneksi.php");

  $query = "SELECT * FROM tb_siswa";
  $sql = mysqli_query($conn, $query);
  $no = 0;
  

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>belajar_crud</title>

    <!-- Script Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <!-- icon -->
    <script src="https://kit.fontawesome.com/7c7282044a.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">CRUD-BS5</a>
        </div>
    </nav>
    <!-- Judul -->
     <div class="container-fluid">
          <h1 class="mt-3">DATA SISWA</h1>
          <figure>
            <blockquote class="blockquote">
                <p>isinya data-data siswa</p>
            </blockquote>
            <figcaption class="blockquote-footer">
                CRUD <cite title="Source Title">Create Update Delete Read</cite>
            </figcaption>
          </figure>
          <a href="kelola.php" type="button" class="btn btn-primary" style="margin: 20px 0;"><i class="fa-solid fa-plus"></i> Masukan data</a>

          <!-- Table -->
          <div class="table-responsive">
            <table class="table align-middle table-bordered table-hover">
              <thead>
                <tr>
                    <th><center>No.</center></th>
                    <th>NISN</th>
                    <th>Nama Siswa</th>
                    <th>Jenis Kelamin</th>
                    <th>Foto Siswa</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                    while ($result = mysqli_fetch_assoc($sql)) {
                ?>
                <tr>
                  <td>
                    <?php echo ++$no; ?>
                  </td>
                  <td><?php echo $result ["nama_siswa"]; ?></td>
                  <td><?php echo $result ["nisn"]; ?></td>
                  <td><?php echo $result ["jenis_kelamin"]; ?></td>
                  <td><center><img src='img/<?php echo $result["foto_siswa"]; ?>' style="width: 150px;"></td></center>
                  <td><?php echo $result ["alamat"]; ?></td>
                  
                  <!--submit  -->

                  <td><a href="kelola.php?ubah=<?php echo $result ["id_siswa"]; ?>" type="button" class="btn btn-success btn-sm"><i class="fa-solid fa-file-pen"></i></a>
                  <a href="proses.php?hapus=<?php echo $result ["id_siswa"]; ?>" type="button" class="btn btn-danger btn-sm" onclick="return confirm ('apakah anda yakin ingin menghapus data ini')"><i class="fa-solid fa-trash"></i></a>
                </td>
                </tr>
                <?php
                    }
                ?>
              </tbody>
            </table>
          </div>
    </div>
</body>
</html>