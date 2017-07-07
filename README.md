# Yii2 component for Sentry
[Russian](README.ru.md)

## Install by composer
composer require oleg-chulakov-studio/yii2-sentry
## Or add this code into require section of your composer.json and then call composer update in console
"oleg-chulakov-studio/yii2-sentry": "*"
## Usage
In configuration file for web do
```php
<?php
  'components'  =>  [
        'errorHandler' => [
            'class' => \OlegChulakovStudio\sentry\SentryErrorWebHandler::className(),
            'mode' => YII_DEBUG,
            'errorAction'   => '/system/error',
            'sentry' => [
                'class' => OlegChulakovStudio\sentry\SentryComponent::className(),
                'url' => 'dsn'
            ],
        ]
  ]
 ?>
 ```
 In configuration file for console do
 ```php
 <?php
   'components'  =>  [
         'errorHandler' => [
             'class' => \OlegChulakovStudio\sentry\SentryErrorConsoleHandler::className(),
             'mode' => YII_DEBUG,
             'sentry' => [
                 'class' => OlegChulakovStudio\sentry\SentryComponent::className(),
                 'url' => 'dsn'
             ],
         ]
   ]
  ?>
  ```


