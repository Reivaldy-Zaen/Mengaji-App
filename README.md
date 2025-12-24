# 📖 Al-Qur'an Digital App

Aplikasi Al-Qur'an digital berbasis web yang modern, responsif, dan kaya fitur. Dibangun menggunakan **Laravel 12**, **Bootstrap 5**, dan **MySQL** untuk memberikan pengalaman membaca serta mendengarkan Al-Qur'an yang nyaman.

---

## 🛠️ Tech Stack

* **Framework:** Laravel 12
* **Frontend:** Bootstrap 5 (Custom Dark Theme)
* **Database:** MySQL
* **Icons:** FontAwesome / Bootstrap Icons
* **Audio Player:** HTML5 Audio Integration

---

## ✨ Fitur

Sesuai dengan antarmuka aplikasi, fitur-fitur yang tersedia meliputi:

* **Daftar Surah Lengkap:** Menampilkan 114 surah dengan informasi tempat turun (Mekah/Madinah) dan jumlah ayat.
* **Pencarian Cepat:** Mencari surah berdasarkan nama atau nomor secara real-time.
* **Mode Gelap (Dark Mode):** Antarmuka yang nyaman di mata untuk penggunaan waktu lama.
* **Audio Murottal:** Pemutar audio terintegrasi untuk mendengarkan bacaan setiap surah.
* **Kustomisasi Tampilan:** Pengaturan ukuran font Arab dan terjemahan sesuai preferensi pengguna.
* **Sistem Bookmark & Riwayat:** Menyimpan ayat favorit dan melihat riwayat bacaan terakhir.
* **Filter Berdasarkan Juz & Lokasi:** Memudahkan navigasi berdasarkan Juz atau kategori Makkiyah/Madaniyah.

---

## 🚀 Panduan Instalasi

Lakukan langkah-langkah berikut untuk menjalankan project secara lokal:

### 1. Persiapan Awal
```bash
git clone [https://github.com/Reivaldy-Zaen/Mengaji-App.git]
cd nama-repo
composer install
cp .env.example .env

sesuaikan bagian database di .env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_db_anda
DB_USERNAME=root
DB_PASSWORD=

php artisan key:generate
php artisan migrate --seed
php artisan serve
