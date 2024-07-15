
<!-- Content Row -->
<div class="container">

    <form method="post" action="tambah_aksi.php">
            
        <div class="mb-3">
            <label for="nama" class="form-label">NAMA</label>
            <input type="text" class="form-control" id="nama" placeholder="NAMA" name="nama">
        </div>
        <div class="mb-3">
            <label for="umur" class="form-label">UMUR</label>
            <input type="text" class="form-control" id="umur" placeholder="UMUR" name="umur">
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" rows="3" name="alamat">
        </div>
        <a href="index.php"><button type="button" class="btn btn-danger mb-2">BATAL</button></a>
        <button type="submit" class="btn btn-success mb-2">TAMBAH</button>

    </form>
</div>