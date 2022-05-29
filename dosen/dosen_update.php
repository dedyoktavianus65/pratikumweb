<!-- ACTION EDIT DATA -->
<?php 
    include_once("../database/database.php");
    $database = new Database;
    $connection = $database->getConnection();

    $id = $_GET['id'];

    $findSQL = "SELECT * FROM dosen WHERE id = ?";
    $statement = $connection->prepare($findSQL);
    $statement->bindParam(1, $id);
    $statement->execute();
    $data = $statement->fetch();

    if(isset($_POST['btn-simpan'])){
        $nama_dosen = $_POST['nama_dosen'];
        $handpone = $_POST['handpone'];
        $email = $_POST['email'];

        $updateSQL = "UPDATE `dosen` SET `nama_dosen` = ?, `handpone` = ?, `email` = ? WHERE `dosen`.`id` = ?";

        $statement = $connection->prepare($updateSQL);
        $statement->bindParam(1, $nama_dosen);
        $statement->bindParam(2, $handpone);
        $statement->bindParam(3, $email);
        $statement->bindParam(4, $id);
        $statement->execute();
?>

<div class="alert alert-success" role="alert">
    Data Berhasil Diperbaharui
</div>

<?php
    $_SESSION['message'] = "Data Berhasil Diperbaharui";
    header('Location: main.php?page=dosen');
    }
?>


<!-- ACTION ADD DATA -->
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Ubah Data Dosen</h1>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="nama_dosen" class="form-label">Nama Dosen</label>
                        <input type="hidden" name="id" class="form-control" id="" value="<?php echo $data['id']?>">
                        <input type="text" name="nama_dosen" class="form-control" id="" value="<?php echo $data['nama_dosen']?>" placeholder="Masukkan Nama...">
                </div>
                <div class="mb-3">
                    <label for="handpone" class="form-label">Handphone</label>
                        <input type="text" name="handpone" class="form-control" id="" value="<?php echo $data['handpone']?>" placeholder="Masukkan Nomor Hp...">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">email</label>
                        <input type="email" name="email" class="form-control" id="" value="<?php echo $data['email']?>" placeholder="email@gmail.com">
                </div>
                <div class="d-grid gap-2 mb-3">
                    <button class="btn btn-primary" name="btn-simpan" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

