<div class="container">

    <?php
    include 'koneksi.php';
    $id = $_GET['id'];
    $data = mysqli_query($koneksi, "SELECT * FROM kantor WHERE id='$id'");
    while ($d = mysqli_fetch_array($data)) {
    ?>
        <form method="post" action="edit_aksi.php">

            <div class="mb-3">
                <label for="id" class="form-label"></label>
                <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $d['id']; ?>">
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">NAMA</label>
                <input type="text" class="form-control" id="nama" placeholder="nama" name="nama" value="<?php echo $d['nama']; ?>">
            </div>
            <div class="mb-3">
                <label for="umur" class="form-label">UMUR</label>
                <input type="number" class="form-control" id="umur" placeholder="umur" name="umur" value="<?php echo $d['umur']; ?>">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">ALAMAT</label>
                <textarea class="form-control" id="alamat" rows="3" name="alamat"><?php echo $d['alamat']; ?></textarea>
            </div>
            <a href="index.php"><button type="button" class="btn btn-danger mb-2">BATAL</button></a>
            <button type="submit" class="btn btn-success mb-2">SIMPAN</button>
        </form>
    <?php
    }
    ?>
</div>