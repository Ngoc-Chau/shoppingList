## Cài đặt Laravel từ 1 repo clone về

1. Tạo file .env từ file .env.example (đơn giản là copy nội dung file .env.example sang file .env vừa tạo)
```
cp .env.example .env

```

2. Generate app key:
```
php artisan key:generate

```

3. Chạy server thông qua dòng lệnh php artisan:
```
php artisan serve --port {YOUR_PORT}

```

4. Mở trình duyệt với địa chỉ
* http://localhost:{YOUR_PORT} *

## Chạy kết hợp với vuejs

### với npm:
```
npm install
npm run hot

```

### với yarn
```
yarn
yarn hot

```
