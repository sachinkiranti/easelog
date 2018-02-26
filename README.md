#Easelog

A simple yet flexible event log activity integration system for laravel.
## Installation

Installation is straightforward, setup is similar to every other Laravel Package.

#### 1. Install via Composer

Begin by pulling in the package through Composer:

```
composer require sachinkiranti/easelog
```

#### 2. Define the Service Provider and alias

Next we need to pull in the alias and service providers.

**Note:** This package supports the new _auto-discovery_ features of Laravel 5.5, so if you are working on a Laravel 5.5 project, then your install is complete, you can skip to step 3.

Inside of your `config/app.php` define a new service provider

```
'providers' => [
	//  other providers

	SachinKiranti\Easelog\EaselogServiceProvider::class,
];
```

Then we want to define an alias in the same `config/app.php` file.

```
'aliases' => [
	// other aliases

	'Easelog' => SachinKiranti\Easelog\EaselogFacade::class,
];
```

#### 3. Publish Config File

To generate a config file type this command into your terminal:

```
php artisan vendor:publish --tag=easelog
```

#### 4. Publish Migration File

To generate a migration file type this command into your terminal:

```
php artisan vendor:publish --provider="SachinKiranti\Easelog\EaselogServiceProvider" --tag="migrations"
```

#### 5. Migrate

After publishing migration
```
php artisan migrate
```

## Usage
Using Easelog is as easy as it sound. It uses eloquent event state to monitor.

### Adding Easelog to start monitoring the models
All you have to do is add your models name in easelog config file.

```
/*
/*
    |--------------------------------------------------------------------------
    | Enable the use of namespace
    |--------------------------------------------------------------------------
    |
    | If true, the package will use the given model_namespace for all your models.
    | If false, you have to give model with namespace in models.
    |
    */
   'use_namespace' => true,
 
   /*
    |--------------------------------------------------------------------------
    | Model Namespace for all your Models
    |--------------------------------------------------------------------------
    |
    | Models namespace
    |
    */
   'model_namespace' => '\\App\\',
   
    |--------------------------------------------------------------------------
    | Keeping your model's in an array
    |--------------------------------------------------------------------------
    |
    | Models to be monitored
    |
    */
   'models' => [
        'User',
        'Post'
   ]
```
Now it will start monitoring User and Post models.

### Condition
if use_namespace is true, it will use model_namespace for every models. If false, than you have to give models name with their namespaces.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.