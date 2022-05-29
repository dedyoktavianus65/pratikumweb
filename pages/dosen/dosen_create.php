<!-- ACTION ADD DATA -->
<?php 
    if(isset($_POST['btn-simpan'])){
        $nama_dosen = $_POST['nama_dosen'];
        $handpone = $_POST['handpone'];
        $email = $_POST['email'];

        $createSQL = "INSERT INTO `dosen` (`id`,`nama_dosen`,`handpone`,`email`) VALUES (NULL, ?,?,?)";

        include_once("../database/database.php");
        $database = new Database;
        $connection = $database->getConnection();
        $statement = $connection->prepare($createSQL);
        $statement->bindParam(1, $nama_dosen);
        $statement->bindParam(2, $handpone);
        $statement->bindParam(3, $email);
        $statement->execute();
?>

<?php
    $_SESSION['message'] = "Berhasil simpan data";
    header('Location: main.php?page=dosen');
    }
?>


<!-- ACTION ADD DATA -->
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Data Dosen</h1>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="nama_dosen" class="form-label">Nama Dosen</label>
                        <input type="text" name="nama_dosen" class="form-control" id="" placeholder="Masukkan Nama...">
                </div>
                <div class="mb-3">
                    <label for="handpone" class="form-label">Handphone</label>
                        <input type="text" name="handpone" class="form-control" id="" placeholder="Masukkan Nomor Hp...">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">email</label>
                        <input type="email" name="email" class="form-control" id="" placeholder="email@gmail.com">
                </div>
                <div class="d-grid gap-2 mb-3">
                    <button class="btn btn-primary" name="btn-simpan" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

