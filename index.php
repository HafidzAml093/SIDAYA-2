<?php include 'layout/header.php'; ?>

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
        </a>
    </div>
    <!--Content Row-->
    <div class="container">
        <a href="tambah.php"><button type="button" class="btn btn-success mb-2">Tambah DATA</button></a>

        <!-- Form Pencarian -->
        <form method="GET" action="index.php" class="form-inline mb-3">
            <input type="text" class="form-control mr-2" name="kata_cari" placeholder="Cari data..." value="<?php echo isset($_GET['kata_cari']) ? $_GET['kata_cari'] : ''; ?>">
            <button type="submit" class="btn btn-primary">Cari</button>
        </form>

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
            <tfoot>
                <tr>
                    <th>NO</th>
                    <th>NAMA</th>
                    <th>UMUR</th>
                    <th>ALAMAT</th>
                    <th>OPSI</th>
                </tr>
            </tfoot>
            <tbody>
                <?php 
                $no = 1;
                // Untuk menyambungkan dengan file koneksi.php
                include('koneksi.php');

                // Pagination
                $batas = 2;
                $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                $previous = $halaman - 1;
                $next = $halaman + 1;

                // Jika kita klik cari, maka yang tampil query cari ini
                if (isset($_GET['kata_cari'])) {
                    // Menampung variabel kata_cari dari form pencarian
                    $kata_cari = $_GET['kata_cari'];
                    // Mencari data dengan query
                    $query = "SELECT * FROM kantor WHERE nama LIKE '%$kata_cari%' OR umur LIKE '%$kata_cari%' OR alamat LIKE '%$kata_cari%' ORDER BY nama ASC";
                } else {
                    // Jika tidak ada pencarian, default yang dijalankan query ini
                    $query = "SELECT * FROM kantor ORDER BY nama ASC LIMIT $halaman_awal, $batas";
                }

                $result = mysqli_query($koneksi, $query);
                $jumlah_data = mysqli_num_rows($result);
                $total_halaman = ceil($jumlah_data / $batas);

                if (!$result) {
                    die("Query Error : " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
                }

                // Melakukan perulangan
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row['nama']; ?></td>
                        <td><?php echo $row['umur']; ?></td>
                        <td><?php echo $row['alamat']; ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $row['id']; ?>"><button type="button" class="btn btn-warning">EDIT</button></a>
                            <a href="hapus.php?id=<?php echo $row['id']; ?>"><button type="button" class="btn btn-danger">HAPUS</button></a>
                        </td>
                    </tr>
                <?php 
                }
                ?>
            </tbody>
        </table>

        <a href="mhs_pdf.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"></i> Generate PDF
        </a>
        <a href="mhs_excel.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"></i> Generate Excel
        </a>

        <!-- Pagination -->
        <nav>
            <ul class="pagination">
                <li class="page-item <?php if ($halaman == 1) echo 'disabled'; ?>">
                    <a class="page-link" href="?halaman=<?php echo $previous; ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php for ($x = 1; $x <= $total_halaman; $x++) { ?>
                    <li class="page-item <?php if ($halaman == $x) echo 'active'; ?>"><a class="page-link" href="?halaman=<?php echo $x; ?>"><?php echo $x; ?></a></li>
                <?php } ?>
                <li class="page-item <?php if ($halaman == $total_halaman) echo 'disabled'; ?>">
                    <a class="page-link" href="?halaman=<?php echo $next; ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>

    </div>
</div>

<!-- Footer -->
<?php include 'layout/footer.php'; ?>
<!-- End of Footer -->

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