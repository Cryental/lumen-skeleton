# Lumen Skeleton
This is a skeleton based on Laravel/Lumen with missing features and tweaks for RESTful API developments.

### Requirements
- PHP 8.1
- MaxmindDB Extension
- All Extensions for Lumen

### Optional Requirements
- Swoole Extension

### Installation
```
composer create-project --prefer-dist cryental/lumen-skeleton myproject
```

### Usage
First, copy `.env.example` to `.env`.

After that, run following commands:

```
composer install
php artisan key:generate
php artisan migrate
php artisan cloudflare:reload
```

Do not forget to set a cronjob for production:
```
* * * * * php /path/to/artisan schedule:run
```

Run Laravel/Lumen Swoole using this package:
```
php artisan swoole:http start
```

If you want the Swoole server to run after reboot, add the following line to your crontab:
```
@reboot php /path/to/artisan swoole:http start
```