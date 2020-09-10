# Alphazento Package Assistant

## 1. Introduction

The Alphazento Package Assistant extends Laravel **make** command group to help you to implement **Alphazento**.

-   Create package with a single command.
-   Make console, model, provider, mail... classes for your package.

## 2. Requirements

-   **Laravel**: v7.0.0 or higher.
-   **PHP**: v7.2.0 or higher.

## 3. Installation

### Install with composer

Go to the root folder of **Alphazento** and run the following command

```php
composer require alphazento/alphazento-package-assistant
```

After install the package, just run the following command

```php
php artisan package:enable Zento_PackageAssistant
```

-   If your project is base on Laravel not Alphazento, since the Zento\*PackageAssistant package will install it's dependency package **\*alphazento\zento**\_, so you need to run the command to enable **Zento_Kernel** first.

```php
php artisan package:enable Zento_Kernel
php artisan package:enable Zento_PackageAssistant
```

## 4. Support Command List

### 1. make:package

It's a new added command.

For e.g., If you want to create a package under your vendor's name 'YourCompany', and the package name is "TestPackage", so the full name of your package will be "YourCompany_TestPackage",(Pleae note that you the "\_" is for seperate Vendor name and package name, so please do not use "\_" in your vendor and package name) then you need to use the command like this,

```php
php artisan make:package YourCompany_TestPackage
```

### 2. other make command extends from Laravel

Here're some commands extends from Laravel by adding package name parametter

-   make:model
-   make:controller
-   make:middleware
-   make:request
-   make:job
-   make:provider
-   make:mail
-   make:event
-   make:listener
-   make:console
-   make:migration
-   make:exception

All these command will take first parameter as **package name**
For e.g., If you want to create model in your pacage **YourCompany_TestPackage**, just run the following command:

```php
php artisan make:model YourCompany_TestPackage TestModel
```

Then you will find there's file **TestModel.php** inside the folder **YourCompany\TestPackage\Model**

As a comparation, the original command in Laravel which is:

```php
php artisan make:model TestModel
```

-   All these commands detail you can check on Laravel docs

*   [Laravel make:model](https://laravel.com/docs/7.x/eloquent#defining-models)
*   [Laravel make:controller](https://laravel.com/docs/7.x/controllers#single-action-controllers)
*   [Laravel make:middleware](https://laravel.com/docs/7.x/middleware#defining-middleware)
*   [Laravel make:request](https://laravel.com/docs/7.x/validation#form-request-validation)
*   [Laravel make:job](https://laravel.com/docs/7.x/queues#generating-job-classes)
*   [Laravel make:provider](https://laravel.com/docs/7.x/providers#writing-service-providers)
*   [Laravel make:mail](https://laravel.com/docs/7.x/mail#generating-mailables)
*   [Laravel make:console](https://laravel.com/docs/7.x/artisan#generating-commands)
*   [Laravel make:migration](https://laravel.com/docs/7.x/migrations#:~:text=Generating%20Migrations,-To%20create%20a&text=Each%20migration%20file%20name%20contains,the%20order%20of%20the%20migrations.&text=If%20you%20would%20like%20to,executing%20the%20make%3Amigration%20command.)
