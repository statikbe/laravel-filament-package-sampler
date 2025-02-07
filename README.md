<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## About

This is a sample project that demos our Filament packages. It can be used for development to test new features or as a 
sample for how to implement the packages.

## Setup

### With DDEV
The project makes use of [DDEV](https://ddev.com/) to set up a local server:

- `cp .env.ddev-example .env`
- `ddev start`
- `ddev composer install`
- `ddev artisan migrate`
- __optional:__ seed some sample pages: `ddev artisan db:seed`
- `ddev artisan storage:link`
- make a filament user: `ddev artisan filament:user`
- go to https://larsam.local.statik.be

### With Herd
You might also use [Laravel Herd](https://herd.laravel.com/) to get this project up and running

- Clone this repository to your local Herd directory
- `cp .env.herd-example .env`
- `composer install`
- `php artisan migrate`
- __optional:__ seed some sample pages: `php artisan db:seed`
- `php artisan storage:link`
- make a filament user: `php artisan filament:user`
- `npm install && npm run build`
- go to http://laravel-filament-package-sampler.test

## Frontend build

- `nvm install && nvm use`
- `npm run dev`

## License

The MIT License (MIT).
