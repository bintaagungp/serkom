# Aplikasi Pembayaran Listrik Pascabayar

Langkah Instalasi:

1. Install docker dan juga docker compose
2. Setup .env
```
DB_CONNECTION=mysql
DB_HOST=database
DB_PORT=3306
DB_DATABASE=serkom
DB_USERNAME=root
DB_PASSWORD=root
```
3. Jalankan docker compose
```
docker compose -p serkom up -d
```
4. Jalankan setup bash script
```
./setup.sh
```
5. Akses localhost dibrowser dengan port 8080
```
http://localhost:8080
```