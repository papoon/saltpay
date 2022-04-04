# SaltPay Technical Assessment

## Instructions

* Clone repo
* Rename .env.example to .env


## Usage
### Docker

```bash
docker build .
docker run barkyn_api
docker-compose up
```

### Dependencies

```bash
composer install
```
### Migrations

```bash
php libs/vendor/bin/phinx migrate --configuration db/phinx.php
```
