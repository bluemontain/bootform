# Bootform


## Installation

Require the translation package 

    composer require bluemountainteam/bootform

Add the service provider to your `config/app.php` config file

    Vinkla\Hashids\HashidsServiceProvider::class,
    BlueMountainTeam\Bootform\BootformServiceProvider::class,
    
Add the facade to your aliases in your `config/app.php` config file

    'Hashids' => Vinkla\Hashids\Facades\Hashids::class,
    'BootForm' => BlueMountainTeam\Bootform\Facades\BootForm::class,
    
Publish the flags images assets and translation assets

    php artisan vendor:publish --provider="BlueMountainTeam\Bootform\BootformServiceProvider"
    

## Usage

In views

    BootForm::textLang('name','Nom',['required' => ''])


## Dynamic Translations

If you want to use BootForm::inputLang() you need to include some assets published with :
    
        BootForm::asset_js()
        BootForm::asset_css()