<?php

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

include("KontrakView.php");
include("presenter/ProsesMahasiswa.php");

class TampilMahasiswa implements KontrakView
{
	private $prosesmahasiswa; // Presenter yang dapat berinteraksi langsung dengan view
	private $tpl;

	function __construct()
	{
		//konstruktor
		$this->prosesmahasiswa = new ProsesMahasiswa();
	}

	function tampil()
	{
		$this->prosesmahasiswa->prosesDataMahasiswa();
		$data = null;

		//semua terkait tampilan adalah tanggung jawab view
		for ($i = 0; $i < $this->prosesmahasiswa->getSize(); $i++) {
			$no = $i + 1;
			$data .= "<tr>
			<td>" . $no . "</td>
			<td>" . $this->prosesmahasiswa->getNim($i) . "</td>
			<td>" . $this->prosesmahasiswa->getNama($i) . "</td>
			<td>" . $this->prosesmahasiswa->getTempat($i) . "</td>
			<td>" . $this->prosesmahasiswa->getTl($i) . "</td>
			<td>" . $this->prosesmahasiswa->getGender($i) . "</td>
			<td>" . $this->prosesmahasiswa->getEmail($i) . "</td>
			<td>" . $this->prosesmahasiswa->getTelp($i) . "</td> 
			<td>
				<a href='index.php?action=edit&id=" . $this->prosesmahasiswa->getId($i) . "' class='btn btn-sm btn-primary'>Edit</a>
				<a href='index.php?action=delete&id=" . $this->prosesmahasiswa->getId($i) . "' class='btn btn-sm btn-danger' onclick='return confirm(\"Hapus data ini?\")'>Hapus</a>
			</td>
			</tr>";
		}

	// Cek apakah user sedang dalam mode edit
	if (isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['id'])) {
		$idEdit = $_GET['id'];
		$indexEdit = -1;

		// Cari index berdasarkan ID
		for ($i = 0; $i < $this->prosesmahasiswa->getSize(); $i++) {
			if ($this->prosesmahasiswa->getId($i) == $idEdit) {
				$indexEdit = $i;
				break;
			}
		}

		// Jika ditemukan, tampilkan form edit
		if ($indexEdit !== -1) {
			$form = '
			<form method="POST" action="index.php" class="form-inline">
			<input type="hidden" name="id" value="' . $this->prosesmahasiswa->getId($indexEdit) . '">
			<input type="text" name="nim" value="' . $this->prosesmahasiswa->getNim($indexEdit) . '" class="form-control mr-2" required>
			<input type="text" name="nama" value="' . $this->prosesmahasiswa->getNama($indexEdit) . '" class="form-control mr-2" required>
			<input type="text" name="tempat" value="' . $this->prosesmahasiswa->getTempat($indexEdit) . '" class="form-control mr-2" required>
			<input type="date" name="tgl_lahir" value="' . $this->prosesmahasiswa->getTl($indexEdit) . '" class="form-control mr-2" required>
			<select name="gender" class="form-control mr-2" required>
				<option value="Laki-laki"' . ($this->prosesmahasiswa->getGender($indexEdit) == 'Laki-laki' ? ' selected' : '') . '>Laki-laki</option>
				<option value="Perempuan"' . ($this->prosesmahasiswa->getGender($indexEdit) == 'Perempuan' ? ' selected' : '') . '>Perempuan</option>
			</select>
			<input type="email" name="email" value="' . $this->prosesmahasiswa->getEmail($indexEdit) . '" class="form-control mr-2" required>
			<input type="text" name="telp" value="' . $this->prosesmahasiswa->getTelp($indexEdit) . '" class="form-control mr-2" required>
			<button type="submit" name="action" value="update" class="btn btn-warning">Update</button>
			</form>';
		} else {
			$form = "<p class='text-danger'>Data tidak ditemukan</p>";
		}
	} else {
		// Form tambah
		$form = '
		<form method="POST" action="index.php" class="form-inline">
		<input type="text" name="nim" placeholder="NIM" class="form-control mr-2" required>
		<input type="text" name="nama" placeholder="Nama" class="form-control mr-2" required>
		<input type="text" name="tempat" placeholder="Tempat" class="form-control mr-2" required>
		<input type="date" name="tgl_lahir" class="form-control mr-2" required>
		<select name="gender" class="form-control mr-2" required>
			<option value="-">-</option>
			<option value="Laki-laki">Laki-laki</option>
			<option value="Perempuan">Perempuan</option>
		</select>
		<input type="email" name="email" placeholder="Email" class="form-control mr-2" required>
		<input type="text" name="telp" placeholder="No Telepon" class="form-control mr-2" required>
		<button type="submit" name="action" value="create" class="btn btn-success">Tambah</button>
		</form>';
	}

		// Membaca template skin.html
		$this->tpl = new Template("templates/skin.html");

		// Mengganti kode Data_Tabel dengan data yang sudah diproses
		$this->tpl->replace("DATA_TABEL", $data);

		$this->tpl->replace("FORM_INPUT", $form);

		// Menampilkan ke layar
		$this->tpl->write();
	}
}
