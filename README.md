# TP9DPBO2025C2
Saya Muhammad Alfi Fariz dengan NIM 2311174 mengerjakan TP 9 dalam mata kuliah Desain Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

# Desain Program
Aplikasi ini adalah implementasi manajemen data Mahasiswa menggunakan **arsitektur MVP (Model - View - Presenter)** berbasis PHP, dengan dukungan Bootstrap untuk tampilan antarmuka.

Struktur Folder nya

```
MVP_PHP/
│
├── model/
│   ├── DB.class.php
│   ├── Mahasiswa.class.php
│   ├── TabelMahasiswa.class.php
│   └── Template.class.php
│
├── presenter/
│   ├── KontrakPresenter.php
│   └── ProsesMahasiswa.php
│
├── templates/
│   └── skin.html
│
├── view/
│   ├── KontrakView.php
│   └── TampilMahasiswa.php
│
├── index.php
└── mvp_php.sql
```

---

# Penjelasan Alur Program

### 1. **User Interface (`skin.html`)**

- Template HTML berbasis Bootstrap.
- Menampilkan tabel data mahasiswa + form tambah/edit.
- Menggunakan placeholder: `DATA_TABEL` dan `FORM_INPUT`.

### 2. **index.php**

- Titik masuk utama aplikasi.
- Menginisialisasi view `TampilMahasiswa`.
- Menampilkan hasil render dari view ke browser.

### 3. **View (`TampilMahasiswa.php`)**

- Menampilkan form input / edit.
- Menampilkan data mahasiswa dalam tabel.
- Menghubungkan ke presenter untuk ambil data dan aksi logika.

### 4. **Presenter (`ProsesMahasiswa.php`)**

- Bertanggung jawab atas logika program:
  - Mengambil data mahasiswa dari model.
  - Menambahkan data (`create`).
  - Menghapus data (`delete`).
  - Mengubah data (`update`).
- Mengimplementasikan `KontrakPresenter`.

### 5. **Model**

- `DB.class.php`: Koneksi dan eksekusi query database.
- `TabelMahasiswa.class.php`: Berisi method CRUD (create, read, update, delete).
- `Mahasiswa.class.php`: Objek data mahasiswa.
- `Template.class.php`: Parser HTML dan render placeholder.

## Fitur CRUD nya
| Fitur   | Alur                                                                                                                                      |
|---------|-------------------------------------------------------------------------------------------------------------------------------------------|
| Create  | User isi form → klik Tambah → `index.php` → `ProsesMahasiswa->addData()` → `TabelMahasiswa->addMahasiswa()` → insert ke DB               |
| Read    | `ProsesMahasiswa->prosesDataMahasiswa()` → `TabelMahasiswa->getMahasiswa()` → ditampilkan via View (`tampil()`)                         |
| Update  | User klik tombol Edit → form terisi data → klik Update → `ProsesMahasiswa->updateData()` → `TabelMahasiswa->updateMahasiswa()`          |
| Delete  | User klik tombol Hapus → konfirmasi → `ProsesMahasiswa->deleteData()` → `TabelMahasiswa->deleteMahasiswa()`                             |

## Teknologi yang dipakai
- PHP (Native)
- MySQL
- Bootstrap 4
- Arsitektur MVP

# Dokumentasi ScreenRecord
https://github.com/user-attachments/assets/c49b10df-dd6d-417c-9f55-8d4c7b590127
