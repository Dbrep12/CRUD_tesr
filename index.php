<?php
// koneksi database
$server = "localhost";
$user = "root";
$pass = "";
$database = "dbtest";

$koneksi = mysqli_connect($server, $user, $pass, $database) or die(mysqli_error($koneksi));
// jika tombol simpan diklik
if(isset($_POST['bsimpan']))
{
    $simpan = mysqli_query($koneksi, "INSERT INTO tmbs (nis, nama, alamat, jurusan)
                                      VALUES ('$_POST[tnis]',
                                              '$_POST[tnama]', 
                                              '$_POST[talamat]', 
                                              '$_POST[tjurusan]') ");
    if($simpan) 
    {
        echo "<script>
                alert('simpan data sukses');
                document.location='index.php';
              </script>";
    }
    else
    {
        echo "<script>
                alert('simpan data gagal!!');
                document.location='index.php';
              </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD test php</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">

    
    <h1 class="text-center">CRUD PHP</h1>
<!-- awal card form -->
    <div class="card mt-4">
  <div class="card-header bg-primary text-white">
    Form input data siswa
  </div>
  <div class="card-body">
    <form method="post" action="">
        <div class="form-group">
            <label>Nis</label>
            <input type="text" name="tnis" class="form-control" placeholder="input nis anda disini!" required>
        </div>
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="tnama" class="form-control" placeholder="input nama anda disini!" required>
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <textarea class="form-control" name="talamat" placeholder="input alamat anda disini!"></textarea>
        </div>
        <div class="form-group">
            <label>jurusan</label>
           <select class="form-control"name="tjurusan">
                <option></option>
                <option value="RPL">RPL</option>
                <option value="AK">AK</option>
           </select>
        </div>

        <button type="submit" class="btn btn-success" name="bsimpan">Simpan</button>
        <button type="submit" class="btn btn-danger" name="breset">Hapus Semua Data</button>
        
    </form>
  </div>
</div>
<!-- akhir card form -->

<!-- awal card tabel -->
<div class="card mt-4">
  <div class="card-header bg-info text-white">
    Daftar siswa
  </div>
  <div class="card-body">
    
    <table class="table table-bordered table-striped">
        <tr>
            <th>No Hp</th>
            <th>Nis</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Jurusan</th>
            <th>Aksi</th>
        </tr>
        <?php
            $no = 1;
            $tampil = mysqli_query($koneksi, "SELECT * from tmbs order by id_siswa desc");
            while($data = mysqli_fetch_array($tampil)) :
        ?>

        <tr>
            <td><?=$no++;?>1</td>
            <td><?=$data['nis']?></td>
            <td><?=$data['nama']?></td>
            <td><?=$data['alamat']?></td>
            <td><?=$data['jurusan']?></td>
            <td>
                <a href="#" class="btn btn-warning">Edit</a>
                <a href="#" class="btn btn-danger">Hapus</a>
            </td>
        </tr>
    <?php endwhile; //penutup perulangan while ?>
    </table>

  </div>
</div>
<!-- akhir card tabel -->

</div>

<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>