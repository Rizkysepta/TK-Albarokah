<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>TK R.A Albarokah</title>

    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
</head>
<body>

<!-- Add Student -->
<div class="modal fade" id="studentAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="post" action="tambah.php" id="saveStudent">
            <div class="modal-body">

                <div id="errorMessage" class="alert alert-warning d-none"></div>

                <div class="mb-3">
                    <label for="">Nama_murid</label>
                    <input type="text" name="nama" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">NISN</label>
                    <input type="text" name="nisn" class="form-control" />
                </div>
                <div class="mb-3">
                    <select class="form-select" name="kelamin" aria-label="Default select example">
                        <option selected>Jenis Kelamin</option>
                        <option value="L">Laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                    </div>
                <div class="mb-3">
                    <label for="">Alamat</label>
                    <input type="text" name="alamat" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">No.Telp Ortu</label>
                    <input type="text" name="telp" class="form-control" />
                </div>
                <div class="mb-3">
                    <select class="form-select" name="kelas" aria-label="Default select example">
                    <?php
                        require 'dbcon.php';
                        $sql = "SELECT id_kelas, Nama_kelas FROM tb_kelas";
                        $result = $con->query($sql);

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row["id_kelas"] . "'>" . $row["Nama_kelas"] . "</option>";
                            }
                        } else {
                            echo "<option value=''>Tidak ada data kelas</option>";
                        }
                        ?>

                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Student</button>
            </div>
        </form>
        </div>
    </div>
</div>

<!-- Include Edit and View Student Modals here -->

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Nama Murid TK Albarokah
                        
                        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#studentAddModal">
                            Add Student
                        </button>
                    </h4>
                </div>
                <div class="card-body">

                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama_murid</th>
                                <th>NISN</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>No.Telp Ortu</th>
                                <th>Kelas</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require 'dbcon.php';

                            $query = "SELECT * FROM tb_murid";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $tb_murid)
                                {
                                    ?>
                                    <tr>
                                        <td><?= $tb_murid['id_murid'] ?></td>
                                        <td><?= $tb_murid['Nama_murid'] ?></td>
                                        <td><?= $tb_murid['Nisn'] ?></td>
                                        <td><?= $tb_murid['Jenis_kelamin'] ?></td>
                                        <td><?= $tb_murid['Alamat'] ?></td>
                                        <td><?= $tb_murid['No_Telp_Ortu'] ?></td>
                                        <td><?= $tb_murid['Kelas_id'] ?></td>
                                        <td>
                                            <button type="button" class="editStudentBtn btn btn-success btn-sm" data-id="<?= $tb_murid['id_murid'] ?>">Edit</button>
                                            <a href="hapus.php?id=<?= $tb_murid['id_murid'] ?>" class="deleteStudentBtn btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                            
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

</body>
</html>
