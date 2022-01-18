<!DOCTYPE html>
<html>
<head>
<title>Data Karyawan</title>
    <!-- Load file CSS Bootstrap offline -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <br>
   <center> <h4>Data Karyawan</h4>
    <a href="create.php" class="btn btn-primary btn-sm" role="button">Tambah Data</a></center>
    <hr>
<?php

    include "koneksi.php";

    //Cek apakah ada nilai dari method GET dengan nama id_anggota
    if (isset($_GET['id_anggota'])) {
        $id_anggota=htmlspecialchars($_GET["id_anggota"]);

        $sql="delete from anggota where id_anggota='$id_anggota' ";
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak
            if ($hasil) {
                header("Location:index.php");

            }
            else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";

            }
        }
?>

<div class="table-responsive">
    <table class="table table-bordered text-nowrap" id="example">
        <thead>
        <tr>
            <th>No</th>
            <th>Nama Lengkap</th>
            <th>Alamat</th>
            <th>No HP</th>
            <th>Tgl Gabung</th>
            <th>Rentang Waktu</th>
            <th colspan='2'>Aksi</th>

        </tr>
        </thead>
        <?php
        include "koneksi.php";
        $sql="select * from view_anggota order by id_anggota desc";

        $hasil=mysqli_query($kon,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;

            ?>
            <tbody>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data["nama"];   ?></td>
                <td><?php echo $data["alamat"];   ?></td>
                <td><?php echo $data["no_hp"];   ?></td>
                <td><?php echo $data["tanggal_gabung"];   ?></td>
                <td><?php echo $data["selisih_hari"];   ?> Hari</td>
                <td>
                <a href="detail.php?id_anggota=<?php echo htmlspecialchars($data['id_anggota']); ?>" class="btn btn-primary btn-sm" role="button">Detail</a>
                    <a href="update.php?id_anggota=<?php echo htmlspecialchars($data['id_anggota']); ?>" class="btn btn-warning btn-sm" role="button">Edit</a>
                    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id_anggota=<?php echo $data['id_anggota']; ?>" class="btn btn-danger btn-sm" role="button" onclick="javascript: return confirm('Anda yakin hapus ?')">Delete</a>
                </td>
            </tr>
            </tbody>
            <?php
        }
        ?>
    </table>
    </div>

</div>
</body>
</html>
