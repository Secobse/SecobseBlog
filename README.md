# SecobseBlog

This is our team's blog.

#### we use

- php5.6
- Laravel5.3
- mysql
- bootstrap
- font-awesome
- (maybe need php-gd, php-mbstring)

#### team member:
- [Gasbylei](https://github.com/Gasbylei)
- [loner11](https://github.com/loner11)
- [happylwp](https://github.com/happylwp)
- [G1enY0ung](https://github.com/G1enY0ung)
- [Th0rns](https://github.com/Th0rns)

#### several steps to go:

first, you must clone this repo:

```
git clone git@github.com:Secobse/SecobseBlog.git
```

**if you fork this repo, you can continue from here**

change the `.env.example` to `.env`, and recommand to set database mysql as below:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=secobse_dev
DB_USERNAME=secobse
DB_PASSWORD=dev
```

**recommand**:

```
CREATE USER 'secobse'@'localhost' IDENTIFIED BY 'dev';
GRANT ALL PRIVILEGES ON secobse_dev.* To 'secobse'@'localhost' IDENTIFIED BY 'dev';
```

next, generate your key:

```
php artisan key:generate
```

you will migrate the table with run:

```
php artisan migrate
```

the default repo not exist your composer vendor dir and the node_modules dir, so you will run:

```
composer install

npm install
```

to complie your static file, run:(this command assume you have gulp in your path, if not, you will run `npm install gulp-cli -g`)

```
gulp
```

if you don't have node or npm, please install it.

The last, run `php artisan serve`, go to [localhost:8000](http://localhost:8000)

every time you pull the update, you must read the commit log to execute optional migarte, composer install or npm install

#### 2016.8.31 Update:

> Set your reset password successful, you can choose the Mail service provider what you like.
By default, you can sign up a [mailtrap.io](https://mailtrap.io) and test for free.Happy use it!
You need update you MAIL*** in your **.env** file.For mailtrap you only need a username and a
password.

#### 2016.9.2 Update:

> Add admin manage, you must go into the database, manually set users->isadmin to `1`, then you can login as admin.[localhost:8000/admin](http://localhost:8000/admin)
