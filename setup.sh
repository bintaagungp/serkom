docker exec -t http composer install

docker exec -t http php artisan key:generate

docker exec -t http php artisan migrate

docker exec -t http php artisan db:seed

docker exec -t http npm install vite

docker exec -t http npm run build