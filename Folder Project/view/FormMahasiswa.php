<?php
include("presenter/ProsesMahasiswa.php");

$proses = new ProsesMahasiswa();
$data = null;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $mhs = $proses->getDataById($id);
    $nim = $mhs['nim'];
    $nama = $mhs['nama'];
    $tempat = $mhs['tempat'];
    $tanggal = $mhs['tgl_lahir'];
    $gender = $mhs['gender'];
    $email = $mhs['email'];
    $telp = $mhs['telp'];
    $action = "update";
} else {
    $nim = $nama = $tempat = $tanggal = $gender = $email = $telp = "";
    $action = "create";
}
?>

<form method="POST" action="index.php">
    <input type="hidden" name="action" value="<?= $action ?>">
    <input type="hidden" name="id" value="<?= $_GET['id'] ?? '' ?>">
    <input type="text" name="nim" placeholder="NIM" value="<?= $nim ?>"><br>
    <input type="text" name="nama" placeholder="Nama" value="<?= $nama ?>"><br>
    <input type="text" name="tempat" placeholder="Tempat" value="<?= $tempat ?>"><br>
    <input type="date" name="tgl_lahir" value="<?= $tanggal ?>"><br>
    <select name="gender">
        <option <?= $gender == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
        <option <?= $gender == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
    </select><br>
    <input type="email" name="email" placeholder="Email" value="<?= $email ?>"><br>
    <input type="text" name="telp" placeholder="telp" value="<?= $telp ?>"><br>
    <button type="submit">Simpan</button>
</form>
