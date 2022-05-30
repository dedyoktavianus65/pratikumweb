<!-- ACTION ADD DATA -->
<?php 
    if(isset($_POST['btn-simpan'])){
        $dosen_id = $_POST['dosen_id'];
        $matakuliah = $_POST['nama_matakuliah'];
        $hari = $_POST['hari'];
        $jam = $_POST['jam'];


        $createSQL = "INSERT INTO `matakuliah` (`id`,`dosen_id`,`nama_matakuliah`,`hari`, `jam`) VALUES (NULL, ?,?,?,?)";

        include_once("../database/database.php");
        $database = new Database;
        $connection = $database->getConnection();
        $statement = $connection->prepare($createSQL);
        $statement->bindParam(1, $dosen_id);
        $statement->bindParam(2, $matakuliah);
        $statement->bindParam(3, $hari);
        $statement->bindParam(4, $jam);
        $statement->execute();
?>

<?php
    $_SESSION['message'] = "Berhasil simpan data";
    header('Location: main.php?page=matakuliah');
    }
?>

<?php 
    include_once("../database/database.php");
    $database = new Database;
    $connection = $database->getConnection();

    $sql = "SELECT id, nama_dosen FROM dosen";
    $statement = $connection->prepare($sql);
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_ASSOC);
?>

<!-- ACTION ADD DATA -->
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah MataKuliah</h1>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="nama_dosen" class="form-label">Dosen Pengampu</label>
                    <select name="dosen_id" id="" class="form-select">
                        <?php 
                            while($data = $statement->fetch()){
                                echo '<option value='.$data['id'].'>'.$data['nama_dosen'].'</option>';
                            }
                        ?>
                    </select>

                </div>
                <div class="mb-3">
                    <label for="nama_matakuliah" class="form-label">MataKuliah</label>
                    <select name="nama_matakuliah" class="form-select">
                        <option value="jaringan">jaringan</option>
                        <option value="manajemen perangkat lunak">manajemen perangkat lunak</option>
                        <option value="citra">citra</option>
                        <option value="basis data">basis data</option>
                        <option value="fiqih">fiqih</option>
                        <option value="testing">testing</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="hari" class="form-label">Hari</label>
                    <select name="hari" class="form-select">
                        <?php 
                            $Days = ['Senin','Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu'];
                        ?>
                        <option value="" selected disabled>-- Pilih Hari --</option>
                        <?php foreach($Days as $day) { ?>
                            <option value="<?php echo $day?>"><?php echo $day?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="jam">Jam</label>
                            <input type="text" name="jam" class="form-control" required>
                        </div>
                </div>
                <div class="d-grid gap-2 mb-3">
                    <button class="btn btn-primary" name="btn-simpan" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>