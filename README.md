# Laravel 6.x 开发模板

## 服务器要求

- [PHP](http://php.net/manual/zh/install.php) >= 7.4.0
    - OpenSSL PHP Extension
    - PDO PHP Extension
    - Mbstring PHP Extension
    - Tokenizer PHP Extension

- [Composer](https://getcomposer.org/)

- [MySQL](https://dev.mysql.com/doc/refman/5.7/en/installing.html) >= 5.7.8

- [window 专用 Laragon](https://sourceforge.net/projects/laragon/)[使用文档](http://laravelacademy.org/post/7754.html)


## 配置&安装

以下操作均在laravel目录下进行

### 目录权限

如果php-fpm进程和项目不是同一用户权限，storage和bootstrap目录需要写权限
- storage -> 666
- bootstrap/cache -> 666

### composer 使用

```sh
# 安装
composer install

# 更新
composer update
```

### env

```sh
# 复制一份环境变量
cp .env.example .env

# 生成应用key
php artisan key:generate
```

### 配置项

* `APP_ENV=local` 在正式环境删除此行

* `APP_DEBUG=true` 在正式环境删除此行

* `APP_URL=http://localhost` 在正式环境修改此行

### 数据库

- DB_DATABASE="数据库名"
- DB_USERNAME="数据库用户名"
- DB_PASSWORD="数据库密码"

## 运行

- `php artisan serve ` 或者 `php artisan serve --host=0.0.0.0:8000`

- 访问 {url}:8000/ 到首页

### 运行数据库操作命令

```sh
# 往数据库增加表以及填充数据
php artisan migrate --seed

# 重置数据库表结构以及填充数据
php artisan migrate:refresh --seed
```

## 服务配置

### 队列设置

1. 在root下安装supervisor：`apt install supervisor`

2. 将`.supervisor.conf`复制到`/etc/supervisor/conf.d/`下，请先确认文件中配置的项目路径和执行用户组都是对的
    - cp .supervisor.conf /etc/supervisor/conf.d/[项目名称或者进程名称].conf
    - 提供多进程配置文件参考`.multiple-supervisor.conf`
    - `[program:job-worker]`里`job-worker`修改为`项目名称或者进程名称`
    - 配置项目目录(`directory`)与进程日志路径(`stdout_logfile`) 以及进程用户(`user`)

3. 在root下执行`supervisorctl update`

4. 默认不自动启动进程; 执行`supervisorctl start 进程名称` / `supervisorctl status` 查看进程名称与状态

5. 检查进程`ps -ef|grep queue|grep -v grep`中是否有laravel queue队列进程
