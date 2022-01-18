<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran Anggota</title>
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
    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $username=input($_POST["username"]);
        $nama=input($_POST["nama"]);
        $alamat=input($_POST["alamat"]);
        $email=input($_POST["email"]);
        $no_hp=input($_POST["no_hp"]);
        $tanggal_gabung=input($_POST["tanggal_gabung"]);

        //Query input menginput data kedalam tabel anggota
        $sql="insert into anggota (username,nama,alamat,email,no_hp, tanggal_gabung) values
		('$username','$nama','$alamat','$email','$no_hp','$tanggal_gabung')";

        //Mengeksekusi/menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }
    ?>
    <hr>
    <h2>Input Data</h2>
    <hr>


    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label>Nama Lengkap:</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" required/>

        </div>

        <div class="form-group">
            <label>Nama Panggilan:</label>
            <input type="text" name="username" class="form-control" placeholder="Masukan Username" required />

        </div>

        <div class="form-group">
            <label>Alamat:</label>
            <textarea name="alamat" class="form-control" rows="5"placeholder="Masukan Alamat" required></textarea>

        </div>

        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" placeholder="Masukan Email" required/>
        </div>

        <div class="form-group">
            <label>No HP:</label>
            <input type="text" name="no_hp" class="form-control" placeholder="Masukan No HP" required/>
        </div>

        <div class="form-group">
            <label>Tanggal Gabung:</label>
            <input type="date" name="tanggal_gabung" class="form-control" placeholder="Pilih Tanggal" required/>
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        <a href="/crud_php" class="btn btn-danger" role="button">Cancel</a>
    </form>
    <hr>
</div>
</body>
</html>