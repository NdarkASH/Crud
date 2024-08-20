<?php
include "koneksi.php";


    $id_siswa = "";
    $nisn = "";
    $nama_siswa = "";
    $jenis_kelamin = "";
    $foto = "";
    $alamat = "";
    
    if(isset($_GET["ubah"])){
    $id_siswa = $_GET["ubah"];

    $query = "SELECT * FROM tb_siswa WHERE id_siswa = '$id_siswa';";
    $sql = mysqli_query($conn, $query);

    $result = mysqli_fetch_assoc($sql);
    
    $nisn = $result["nisn"];
    $nama_siswa = $result["nama_siswa"];
    $jenis_kelamin = $result["jenis_kelamin"];
    $foto = $result["foto_siswa"];
    $alamat = $result["alamat"];

    }
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
          <a class="navbar-brand" href="index.php">CRUD-BS5</a>
        </div>
    </nav>

    <!-- Table isi -->
     <!-- Form -->
    <div class="container mt-3">
            <form method="POST" action="proses.php" enctype="multipart/form-data">
            <input type="hidden" value="<?php echo $id_siswa; ?>" name="id_siswa">
            <div class="mb-3 row">
                    <label for="nisn" class="col-sm-2 col-form-label">
                    NISN
                    </label>
                <div class="col-sm-10">
                <input required type="text" class="form-control" name="nisn" id="nisn" placeholder="112233" value=<?php echo $nisn; ?>>
                </div>
            </div>
        </div>
        <!-- Nama -->
        <div class="container mt-3">
            <div class="mb-3 row">
                    <label for="nama" class="col-sm-2 col-form-label">
                    Nama
                    </label>
                <div class="col-sm-10">
                <input required type="text" class="form-control" name="nama" id="nama" placeholder="Aceng Sudimara" value=<?php echo $nama_siswa; ?>>
                </div>
            </div>
        </div>
        <!-- Jenis kelamin -->
        <div class="container mt-3">
            <div class="mb-3 row">
                    <label for="jkel" class="col-sm-2 col-form-label">
                    Jenis Kelamin
                    </label>
                <div class="col-sm-7">
                    <select required id="jkel" name="jenis_kelamin" class="form-select" aria-label="Default select example" >
                        <option selected value="">Jenis Kelamin</option>
                        <option <?php if($jenis_kelamin == "laki-laki"){echo "selected";} ?> value="laki-laki"> laki-laki</option>
                        <option <?php if($jenis_kelamin == "perempuan"){echo "selected";} ?> value="perempuan"> perempuan</option>
                    </select>
                </div>
            </div>
        </div>
        <!-- Image -->
        <div class="container mt-3">
            <div class="mb-3 row">
                    <label for="foto" class="col-sm-2 col-form-label">
                    Foto Siswa
                    </label>
                <div class="col-sm-4">
                    <div class="mb-3">
                        <input <?php if(!isset ($_GET["ubah"])){ echo "required"; } ?> class="form-control" type="file" name="foto" id="foto" accept="image/*" >
                        <label for="formFile" class="form-label">Masukan foto siswa disini</label>
                    </div>
                </div>
            </div>
        </div>
        <!-- Alamat -->
        <div class="container mt-3">
            <div class="mb-3 row">
                    <label for="alamat" class="col-sm-2 col-form-label">
                    Alamat
                    </label>
                <div class="col-sm-10">
                    <div class="mb-3">
                        <textarea required class="form-control" id="alamat" name="alamat" rows="3"><?php echo $alamat; ?></textarea>
                    </div>
                </div>
            </div>
        </div>
        <!-- Button -->
        <div class="container mt-3">
            <div class="d-grid gap-2 col-2 mx-auto">
                <?php if(isset($_GET['ubah'])){ 
                ?> 
                    <button class="btn btn-primary" type="submit" name="aksi" value="edit"><i class="fa-solid fa-file-pen"></i> Edit</button>
                <?php
                } else {
                ?>
                    <button class="btn btn-primary" type="submit" name="aksi" value="add"><i class="fa-solid fa-upload"></i> Submit</button>
                <?php
                }
                ?> 
                    <a href="index.php" class="btn btn-danger" type="button"><i class="fa-solid fa-trash"></i> Batal</a>
            </div>
        </div>

        <!-- fitur tambahan buat foto -->
    </form>
</body>
</html>