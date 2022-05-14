<h2>Mata Kuliah</h2>
<div class="table-responsive">
    <a href="#" class="btn btn-primary mb-3"> <span data-feather="plus"></span> Data Baru</a>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama mata Kuliah</th>
                <th scope="col">hari</th>
                <th scope="col">jam</th>
                <th scope="col">id dosen</th>
                <th scope="col">Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include_once("../database/database.php");
            $database = new Database;
            $connection = $database->getConnection();

            $selectSQL = "SELECT * FROM matakuliah";
            $statement = $connection->prepare($selectSQL);
            $statement->execute();

            $no = 1;
            while ($data = $statement->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $data['nama_matakuliah'] ?></td>
                    <td><?php echo $data['hari'] ?></td>
                    <td><?php echo $data['jam'] ?></td>
                    <td><?php echo $data['dosen_id'] ?></td>
                    <td>
                        <a href="#" class="badge bg-warning">
                            <span data-feather="edit"></span>
                        </a>
                        <a href="#" class="badge bg-danger">
                            <span data-feather="x-circle"></span>
                        </a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>