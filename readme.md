Projek ini dapat diakses melalui [Github](https://github.com/rupadana/perpustakaan-online)

# Memulai menggunakan XAMPP atau Laragon
## Pertama
Import database ``db_perpustakaan.sql``

## Kedua

Sesuaikan credential ``config/database.php`` dengan environtment lokal kamu

## Ketiga

Ubah url pada ``config/app.php`` sesuai dengan url projek pada XAMPP atau Laragon kamu

contoh : http://localhost/perpustakaan-online


## Keempat
Kunjungi aplikasi perpustakaan kamu http://localhost/perpustakaan-online



# Memulai menggunakan Docker

## Pertama 

Install  [Docker](https://www.docker.com/) dan [docker-compose](https://docs.docker.com/compose/install/)


## Kedua

Jalankan pada terminal
```
docker-compose up -d
```


## Ketiga

Website perpustakaan akan online pada port 8000


http://localhost:8000

NOTE : Jika kamu menggunakan docker maka phpmyadmin dapat diakses melalui http://localhost:8002
## Akun login

```
username : rupadana
password : rupadana
role : Admin
----------------------
username : aprilia
password : aprilia
role : User

```



## Kontributor

```
Nama : I Wayan Rupadana
NIM  : 200040018
Kelas: CA204
```