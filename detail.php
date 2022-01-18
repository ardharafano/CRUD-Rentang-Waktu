<!DOCTYPE html>
<html>
<head>
    <title>Detail Anggota</title>
    <!-- Load file CSS Bootstrap offline -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

</head>
<body>
<div class="container">
    <?php

    //Include file koneksi, untuk koneksikan ke database
    include "koneksi.php";

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada nilai yang dikirim menggunakan methos GET dengan nama id_anggota
    if (isset($_GET['id_anggota'])) {
        $id_anggota=input($_GET["id_anggota"]);

        $sql="select * from view_anggota where id_anggota=$id_anggota";
        $hasil=mysqli_query($kon,$sql);
        $data = mysqli_fetch_assoc($hasil);
    }

    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id_anggota=htmlspecialchars($_POST["id_anggota"]);
        $username=input($_POST["username"]);
        $nama=input($_POST["nama"]);
        $alamat=input($_POST["alamat"]);
        $email=input($_POST["email"]);
        $no_hp=input($_POST["no_hp"]);
        $tanggal_gabung=input($_POST["tanggal_gabung"]);
        $selisih_hari=input($_POST["selisih_hari"]);
        $selisih_bulan=input($_POST["selisih_bulan"]);
        $selisih_tahun=input($_POST["selisih_tahun"]);

        //Query update data pada tabel anggota
        $sql="update anggota set
			username='$username',
			nama='$nama',
			alamat='$alamat',
			email='$email',
            no_hp='$no_hp',
            tanggal_gabung='$tanggal_gabung',
            selisih_hari='$selisih_hari',
            selisih_bulan='$selisih_bulan',
            selisih_tahun='$selisih_tahun'
			where id_anggota=$id_anggota";

        //Mengeksekusi atau menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal diupdate.</div>";

        }

    }

    ?>
    <hr>
    <h2>Update Data</h2>


    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="form-group">
            <label>Nama Lengkap:</label>
            <input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>" placeholder="Masukan Nama" readonly/>

        </div>

        <div class="form-group">
            <label>Nama Panggilan:</label>
            <input type="text" name="username" class="form-control" value="<?php echo $data['username']; ?>" placeholder="Masukan Username" readonly />

        </div>

        <div class="form-group">
            <label>Alamat:</label>
            <textarea name="alamat" class="form-control" rows="5" placeholder="Masukan Alamat" readonly><?php echo $data['alamat']; ?></textarea>

        </div>

        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" value="<?php echo $data['email']; ?>" placeholder="Masukan Email" readonly/>
        </div>

        <div class="form-group">
            <label>No HP:</label>
            <input type="text" name="no_hp" class="form-control" value="<?php echo $data['no_hp']; ?>" placeholder="Masukan No HP" readonly/>
        </div>

        <div class="form-group">
            <label>Tanggal Gabung:</label>
            <input type="text" name="tanggal_gabung" class="form-control" value="<?php echo $data['tanggal_gabung']; ?>" placeholder="Masukan No HP" readonly/>
        </div>

        <div class="form-group">
            <label>Selisih Hari:</label>
            <input type="text" name="selisih_hari" class="form-control" value="<?php echo $data['selisih_hari']; ?>" placeholder="Masukan No HP" readonly/>
        </div>

        <div class="form-group">
            <label>Selisih Bulan:</label>
            <input type="text" name="selisih_bulan" class="form-control" value="<?php echo $data['selisih_bulan']; ?>" placeholder="Masukan No HP" readonly/>
        </div>

        <div class="form-group">
            <label>Selisih Tahun:</label>
            <input type="text" name="selisih_tahun" class="form-control" value="<?php echo $data['selisih_tahun']; ?>" placeholder="Masukan No HP" readonly/>
        </div>

        <input type="hidden" name="id_anggota" value="<?php echo $data['id_anggota']; ?>" />

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        <a href="/crud_php" class="btn btn-danger" role="button">Cancel</a>
    </form>
    <hr>
</div>
</body>
</html>