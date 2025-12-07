 📦 Inventory Management System
---
Sistem ini dirancang untuk mengelola stok barang, termasuk transaksi barang masuk, barang keluar, serta manajemen user dengan pembagian role Admin dan Staff. Dibangun menggunakan CodeIgniter 4 dengan struktur MVC yang rapi dan modern.
---

## 🚀 Fitur Utama
- 🔐 **Login & Session Role (Admin / Staff)**
- 📊 **Dashboard terpisah untuk Admin & Staff**
- 👥 **Manajemen User (CRUD + Modal Konfirmasi Delete)**
- 📥 **Barang Masuk (CRUD + Modal Konfirmasi Delete)**
- 📤 **Barang Keluar (CRUD + Modal Konfirmasi Delete)**
- 🎨 **Bootstrap 5**
- ⚙️ **Struktur MVC CodeIgniter 4 yang rapi**

## 🛠️ Teknologi yang Digunakan
- **CodeIgniter 4**
- **PHP 8.4+**
- **MySQL /**
- **Bootstrap 5**
- **Composer**

## 📥 Instalasi Project
Ikuti langkah-langkah berikut untuk menjalankan project:
---

### 1️⃣ Clone / Download Project
**Clone via Git:**
```bash
git clone https://github.com/TOS-Kelompok-1-Kelas-A/Progaming.git
```
Atau download ZIP lalu extract ke direktori server lokal kamu.

### 2️⃣ Install Dependencies
```bash
composer install
```

--

### 3️⃣ Import Database
1. Nyalakan Webserver dan Mysql
2. Buka phpMyAdmin  
3. Buat database baru dengan nama  dbinventory
4. Import file `.sql` yang anda dapat akses di app/Database/dbinventory.sql


### 4️⃣ Konfigurasi File .env
Dan atur database:
```
CI_ENVIRONMENT = development

database.default.hostname = localhost
database.default.database = dbinventory
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
```
Note: *jika anda memiliki username dan password pada MySql maka sesuaikan*

### 5️⃣ Jalankan project pada server local 
```bash
php spark serve
```
Akses melalui:  
👉 http://localhost:8080  
---


## 🔑 Akun Default
| Role  | Username | Password |
|-------|----------|----------|
| Admin | admin    | admin123 |
| Staff | staff    | staff123 |

---

## 📧 Kontak
Silakan hubungi lewat GitHub Issues.
