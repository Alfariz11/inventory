# UAS PEMROGRAMAN WEBSITE RA
Rizki Alfariz Ramadhan

# **Inventory Management System**

Aplikasi sistem manajemen inventaris berbasis web menggunakan PHP, MySQL, dan JavaScript. Aplikasi ini memungkinkan pengguna untuk melakukan operasi CRUD (Create, Read, Update, Delete) pada produk, serta mengelola data pengguna melalui sesi dan cookie.

## **Bagian 1: Client-side Programming**

### **1.1 Manipulasi DOM dengan JavaScript**

Aplikasi ini menggunakan JavaScript untuk menangani manipulasi DOM sebagai berikut:
- **Form Input:** Formulir dengan 4 elemen input yang terdiri dari teks, email, password, dan input untuk menambah produk.
- **Tabel HTML:** Menampilkan data produk dari server dalam tabel HTML.
- **Manipulasi DOM:** Menggunakan JavaScript untuk menangani aksi pengguna seperti konfirmasi penghapusan produk.

### **1.2 Event Handling**

Aplikasi ini menangani beberapa jenis event pada elemen input:
- **Event pada Formulir:** Menangani pengiriman formulir dengan validasi input terlebih dahulu.
- **Validasi Form:** Melakukan validasi di sisi klien (JavaScript) untuk memastikan data yang dikirimkan valid.

## **Bagian 2: Server-side Programming**

### **2.1 Pengelolaan Data dengan PHP**

Aplikasi menggunakan PHP untuk mengelola data pengguna dan produk:
- **Metode HTTP:** Menggunakan metode POST dan GET untuk menangani data yang dikirimkan melalui formulir.
- **Validasi Server:** Melakukan validasi data formulir di server sebelum disimpan ke database.
- **Penyimpanan Data:** Data produk dan pengguna disimpan di database MySQL, termasuk informasi tentang browser dan alamat IP pengguna.

### **2.2 Objek PHP Berbasis OOP**

Aplikasi ini menggunakan pendekatan OOP untuk mengelola data:
- **Class PHP:** Implementasi class seperti `Product` untuk menangani operasi CRUD pada produk, dan `User` untuk pengelolaan data pengguna.
- **Skenario:** Setiap operasi CRUD dilakukan melalui method dalam class tersebut, seperti `addProduct`, `updateProduct`, `deleteProduct`, dan `getProductById`.

## **Bagian 3: Database Management**

### **3.1 Pembuatan Tabel Database**

Aplikasi menggunakan tabel MySQL untuk menyimpan data pengguna dan produk:
- **Tabel Pengguna:** Menyimpan informasi pengguna seperti username, email, dan password yang di-hash.
- **Tabel Produk:** Menyimpan informasi produk seperti nama, deskripsi, harga, serta data browser dan IP pengguna.

### **3.2 Konfigurasi Koneksi Database**

Konfigurasi koneksi ke database dilakukan dengan file `config/database.php` yang menghubungkan aplikasi dengan database MySQL.

### **3.3 Manipulasi Data pada Database**

Operasi CRUD dilakukan pada tabel MySQL melalui objek PHP:
- **Create:** Menambahkan produk baru ke dalam database.
- **Read:** Menampilkan produk yang ada dari database ke halaman utama.
- **Update:** Memperbarui informasi produk yang sudah ada.
- **Delete:** Menghapus produk dari database.

## **Bagian 4: State Management**

### **4.1 State Management dengan Session**

Aplikasi menggunakan PHP `session_start()` untuk menyimpan data pengguna dalam sesi dan memastikan hanya pengguna yang terautentikasi yang dapat mengakses dashboard.

### **4.2 Pengelolaan State dengan Cookie dan Browser Storage**

- **Cookie Management:** Menggunakan cookie untuk menyimpan informasi sementara pada sisi pengguna, seperti nama cookie dan nilainya.
- **Browser Storage:** Dapat diimplementasikan menggunakan localStorage atau sessionStorage untuk menyimpan data di sisi klien secara lokal.
