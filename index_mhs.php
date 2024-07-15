<?php include 'layout/header_mhs.php'; ?>

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
        </a>
    </div>

    <!--Content Row-->
    <div class="container">
        <a href="tambah.php"><button type="button" class="btn btn-success mb-2">TAMBAH DATA</button></a>

        <table class="table table-striped" id="dataTable">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NAMA</th>
                    <th>UMUR</th>
                    <th>ALAMAT</th>
                    <th>OPSI</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'koneksi.php';

                // Query untuk mengambil data dari tabel 'kantor'
                $query = "SELECT * FROM kantor";
                $result = mysqli_query($koneksi, $query);
                if (!$result) {
                    die("Query Error : " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
                }

                $nomor = 1;
                while ($d = mysqli_fetch_array($result)) {
                ?>
                    <tr>
                        <td><?php echo $nomor++; ?></td>
                        <td><?php echo $d['nama']; ?></td>
                        <td><?php echo $d['umur']; ?></td>
                        <td><?php echo $d['alamat']; ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $d['id']; ?>"><button type="button" class="btn btn-warning">EDIT</button></a>
                            <a href="hapus.php?id=<?php echo $d['id']; ?>"><button type="button" class="btn btn-danger">HAPUS</button></a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>

</body>
</html>