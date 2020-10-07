# docker-laravel 🐳

![License](https://img.shields.io/github/license/ucan-lab/docker-laravel?color=f05340)
![Stars](https://img.shields.io/github/stars/ucan-lab/docker-laravel?color=f05340)
![Issues](https://img.shields.io/github/issues/ucan-lab/docker-laravel?color=f05340)
![Forks](https://img.shields.io/github/forks/ucan-lab/docker-laravel?color=f05340)

## Introduction

**This repository's origin lies here: <https://github.com/ucan-lab/docker-laravel>**

**The rest of what is altered is solely for education purposes only. `ucan-lab`'s work has made my work easier, I suggest you take a look at the based repository if you are interested in setting up Laravel project easily via Docker.**

Build a simple laravel development environment with docker-compose.

## Usage

```bash
$ git clone git@github.com:ucan-lab/docker-laravel.git
$ cd docker-laravel
$ make create-project # Install the latest Laravel project
$ make install-recommend-packages # Not required
```

Afterwards, create `.env` file from the `.env.example` template in the `backend` directory and alter the database environment variable values. For example, include this instead of what's specified in `.env.example` or change it however you prefer (you would have to alter other build/configuration files as well):

```sh
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=blog
DB_USERNAME=laravel
DB_PASSWORD=laravel
```

You will most likely prefer to login to the `app` container as `laravel` user (especially if you're using Linux and you want generated files not to be owned by the `root` user which would make working with the `backend` directory a bit cumbersome due to file ownership issues, though you can locally enter `sudo chown -R <user>:<group> <path>` to recursively change file ownership in specified path), so type: `make app` and then `su laravel`. To setup the database, you can run `php artisan migrate` in the `backend` directory. The data files saved from the database will be stored locally to `db-store` directory as well, which means that you can safely enter `make down` to stop the container and you will not lose data. `make up` to start the container again.

http://127.0.0.1

Read this [Makefile](https://github.com/ucan-lab/docker-laravel/blob/master/Makefile).

## Tips

Read this [Wiki](https://github.com/ucan-lab/docker-laravel/wiki).

## Container structure

```bash
├── app
├── web
└── db
```

### app container

- Base image
  - [php](https://hub.docker.com/_/php):7.4-fpm-buster
  - [composer](https://hub.docker.com/_/composer):1.10

### web container

- Base image
  - [nginx](https://hub.docker.com/_/nginx):1.18-alpine
  - [node](https://hub.docker.com/_/node):14.2-alpine

### db container

- Base image
  - [mysql](https://hub.docker.com/_/mysql):8.0

#### Persistent MySQL Storage

By default, the [named volume](https://docs.docker.com/compose/compose-file/#volumes) is mounted, so MySQL data remains even if the container is destroyed.
If you want to delete MySQL data intentionally, execute the following command.

```bash
$ docker-compose down -v && docker-compose up
```
