<?php
// include database connection file
include_once("koneksi.php");
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{
$nim = $_POST['nim'];
$nama=$_POST['nama'];
$jenis_kelamin=$_POST['jenis_kelamin'];
$alamat=$_POST['alamat'];
$tanggal_lahir=$_POST['tanggal_lahir'];
// update user data
$result = mysqli_query($con, "UPDATE mahasiswa SET
nama='$nama',jenis_kelamin='$jenis_kelamin',alamat='$alamat',tanggal_lahir='$tanggal_lahir' WHERE nim='$nim'");
// Redirect to homepage to display updated user in list
header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$nim = $_GET['nim'];
// Fetech user data based on id
$result = mysqli_query($con, "SELECT * FROM mahasiswa WHERE nim='$nim'");
while($user_data = mysqli_fetch_array($result))
{
$nim = $user_data['nim'];
$nama = $user_data['nama'];
$jenis_kelamin = $user_data['jenis_kelamin'];
$alamat = $user_data['alamat'];
$tanggal_lahir = $user_data['tanggal_lahir'];
}
?>
<html>
<head>
<title>Edit Data Mahasiswa</title>
</head>
<body>
<a href="index.php">Home</a>
<br/><br/>
<form name="update_mahasiswa" method="post" action="edit.php">
<table border="0">
<tr>
<td>Nama</td>
<td><input type="text" name="nama" value=<?php echo $nama;?>></td>
</tr>
<tr>
<td>Gender</td>
<td><input type="text" name="jenis_kelamin" value=<?php echo $jenis_kelamin;?>></td>
</tr>
<tr>
<td>alamat</td>
<td><input type="text" name="alamat" value=<?php echo $alamat;?>></td>
</tr>
<tr>
<td>Tgl Lahir</td>
<td><input type="text" name="tanggal_lahir" value=<?php echo $tanggal_lahir;?>></td>
</tr>
<tr>
<td><input type="hidden" name="nim" value=<?php echo $_GET['nim'];?>></td>
<td><input type="submit" name="update" value="Update"></td>
</tr>
</table>
</form>
</body>
</html>
