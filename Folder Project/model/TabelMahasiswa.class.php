<?php

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

// Kelas yang berisikan tabel dari mahasiswa
class TabelMahasiswa extends DB
{
	function getMahasiswa()
	{
		// Query mysql select data mahasiswa
		$query = "SELECT * FROM mahasiswa";
		
		// Mengeksekusi query
		return $this->execute($query);
	}

	public function addMahasiswa($data)
	{
		$nim = $data['nim'];
		$nama = $data['nama'];
		$tempat = $data['tempat'];
		$tgl_lahir = $data['tgl_lahir'];
		$gender = $data['gender'];
		$email = $data['email'];
		$telp = $data['telp'];

		$query = "INSERT INTO mahasiswa (nim, nama, tempat, tl, gender, email, telp) VALUES ('$nim', '$nama', '$tempat', '$tgl_lahir', '$gender', '$email', '$telp')";
		$this->execute($query);
	}

	public function updateMahasiswa($data)
	{
		$id = $data['id'];
		$nim = $data['nim'];
		$nama = $data['nama'];
		$tempat = $data['tempat'];
		$tgl_lahir = $data['tgl_lahir'];
		$gender = $data['gender'];
		$email = $data['email'];
		$telp = $data['telp'];

		$query = "UPDATE mahasiswa SET nim='$nim', nama='$nama', tempat='$tempat', tl='$tgl_lahir', gender='$gender', email='$email', telp='$telp' WHERE id='$id'";
		$this->execute($query);
	}

	
	public function deleteMahasiswa($id)
	{
		$query = "DELETE FROM mahasiswa WHERE id = '$id'";
		$this->execute($query);
	}	
}
