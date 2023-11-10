<?php
include("_functions.php");
$conn = dbconn();

if (isset($_POST['delete'])) {
   $nrpToDelete = $_POST['nrplama'];
   $deleteSql = "DELETE FROM mahasiswa WHERE nrp = '$nrpToDelete'";
   mysqli_query($conn, $deleteSql);
} else if (isset($_POST['edit'])) {
   $nrp_lama = $_POST['nrplama'];
   $nrp_baru = $_POST['nrpbaru'];
   $nama_baru = $_POST['namabaru'];
   $editSql = "UPDATE MAHASISWA SET nrp = '$nrp_baru', nama = '$nama_baru' WHERE nrp = '$nrp_lama'";
   mysqli_query($conn, $editSql);
} else if (isset($_POST["tambah"])) {
   $nrptambah = $_POST["nrp"];
   $namatambah = $_POST["nama"];
   $tambahSql = "INSERT INTO mahasiswa VALUES('$nrptambah', '$namatambah')";
   mysqli_query($conn, $tambahSql);
}

$sql = "SELECT * from mahasiswa order by nrp";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>

<head>
   <meta content="en-us" http-equiv="Content-Language" />
   <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
   <title>Untitled 1</title>
</head>

<body>
   <table style="width: auto" border="1">
      <tr>
         <th>No</th>
         <th>NRP</th>
         <th>Nama</th>
      </tr>
      <?php
      $i = 0;
      while ($row = mysqli_fetch_array($result)) {
         $nrp[$i] = $row['nrp'];
         $nama[$i] = $row['nama'];
      ?>
         <tr>
            <td><?php echo $i + 1 ?></td>
            <td><?php echo $nrp[$i]; ?></td>
            <td><?php echo $nama[$i]; ?></td>
            <td>
               <form method="post">
                  <input type="hidden" name="nrplama" value="<?php echo $nrp[$i]; ?>">
                  <input type="text" name="nrpbaru" value="<?php echo $nrp[$i]; ?>">
                  <input type="text" name="namabaru" value="<?php echo $nama[$i]; ?>">
                  <input type="submit" name="edit" value="Edit">
                  <input type="submit" name="delete" value="Delete">
               </form>
            </td>
            </td>
         </tr>
      <?php
         $i++;
      }
      ?>
   </table>
   <form method="post">
      Masukkan NRP:
      <input type="text" name="nrp">
      Masukkan Nama:
      <input type="text" name="nama">
      <input type="submit" name="tambah" value="Tambah">
   </form>
</body>

</html>