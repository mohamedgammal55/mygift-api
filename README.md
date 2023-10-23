<p align="center"><img src="logo.svg" alt="Laravel Hyperpay"></p>

<p align="center">
<a href="https://github.com/mohamedgammal55/mygift-api/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/gemy/mygift-api"><img src="https://img.shields.io/packagist/dt/gemy/mygift-api" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/gemy/mygift-api"><img src="https://img.shields.io/packagist/v/gemy/mygift-api" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/gemy/mygift-api"><img src="https://img.shields.io/packagist/l/gemy/mygift-api" alt="License"></a>
</p>

## My Gift

My Gift is an application to buy discount coupons

## Installation

You can install the package via composer:

```bash
composer require gemy/mygift-api
```

## setup

to setup my gift setting:

```bash
php artisan my-gift
```

## publish

run it to publish config file:

```bash
php artisan vendor:publish --tag=config --provider=Gemy\MygiftApi\MyGiftRouteServiceProvider
```