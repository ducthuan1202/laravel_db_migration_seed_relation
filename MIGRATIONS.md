# Migrations

- `posts` (category_id)
- `categories`
- `tags`

- `posts_tags`

## Commands
```shell
# tao file migration
php artisan make:migration create_users_table

# chay tat ca files migrations
php artisan migrate

# phuc hoi lai lan chay migrate gan nhat
php artisan migrate:rollback

# reset tat ca cac lan chay migration 
php artisan migrate:reset

# drop table neu ton tai va chay migrate
php artisan migrate:refresh


# tao file seeding data
php artisan make:seeder UserSeeder

# can dump autoload truoc khi chayj

# chay all seeder files
php artisan db:seed
 
# chay 1 file seeder
php artisan db:seed --class=CategorySeeder
```

```shell

php artisan migrate:reset

php artisan db:seed

```