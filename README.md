# Test Project

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

Download and install [Docker](https://www.docker.com/get-started).
Download and install [MySQL Workbench](https://www.mysql.com/products/workbench/).
Create database with credentials that matches .env file ie 
```sh
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=db_test
DB_USERNAME=root
DB_PASSWORD=root
```

### Set up project

Create empty directory for project:

```sh
mkdir test
cd test
```

Clone TestProject backend project:

```sh
git clone https://github.com/savovivant/testproject.git
```

In your favorite IDE open `TestProject` directory, and:

Now from TestProject(where is located docker-compose.yml) directory you should be able to start and stop docker containers using terminal.

Start:

```sh
sudo docker-compose up -d --build site
```

Stop:

```sh
docker-compose down
```

Now access docker container with project files with:

```sh
sudo docker-compose exec php /bin/sh
```

Run composer install
```sh
composer install
```

Run migrations
```sh
php artisan migrate
```

Run install passport
```sh
php artisan passport:install
```

Run command for read data from json file
```sh
php artisan command:init-json
```
### Run project

In your browser navigate to: http://localhost:88/register

Add new user with:

 - Username: admin
 - Password: admin
 
 In your browser navigate to: http://localhost:88/login
 
 Login user with:
 
  - Username: admin
  - Password: admin

### API example routes
Get a list of all transmissions
```sh
http://localhost:88/api/transmissions/
```
Create new transmission
```sh
http://localhost:88/api/transmissions/create
```

Update transmission using id
```sh
http://localhost:88/api/transmissions/update/1
```

Delete transmission using id
```sh
http://localhost:88/api/transmissions/delete/1
```







