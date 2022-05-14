<h2>Dosen</h2>
<div class="table-responsive">
    <a href="#" class="btn btn-primary mb-3"> <span data-feather="plus"></span> Data Baru</a>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Dosen</th>
                <th scope="col">Handphone</th>
                <th scope="col">Email</th>
                <th scope="col">Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include_once("../database/database.php");
            $database = new Database;
            $connection = $database->getConnection();

            $selectSQL = "SELECT * FROM dosen";
            $statement = $connection->prepare($selectSQL);
            $statement->execute();

            $no = 1;
            while ($data = $statement->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $data['nama_dosen'] ?></td>
                    <td><?php echo $data['handpone'] ?></td>
                    <td><?php echo $data['email'] ?></td>
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