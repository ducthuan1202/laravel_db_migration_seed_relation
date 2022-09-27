# Laravel

- [migrations](https://laravel.com/docs/7.x/migrations)
- [accessor, mutators, cast](https://laravel.com/docs/7.x/eloquent-mutators)


- Event -> Listener: trigger trực tiếp 

- Queue -> Job: lưu queue vào db hoặc file -> thực hiện 

```shell
# chạy migrate
php artisan migrate

# rollback lại lần migrate trước 
php artisan migrate:rollback


# tạo custom cast
php artisan make:cast TextTitleCast
```

```sql
SELECT *, JSON_EXTRACT(options, "$.job") AS job 
FROM issues 
WHERE JSON_EXTRACT(options, "$.job") IS NOT NULL;
```