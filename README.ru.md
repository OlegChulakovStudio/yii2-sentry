# Yii2 компонент для Sentry
[English](README.md)

## Установка через composer
composer require oleg-chulakov-studio/yii2-sentry
## Или добавьте эту строку в секцию require файла composer.json и выполните команду composer update в консоли

"oleg-chulakov-studio/yii2-sentry": "*"
## Использование
В конфигурационном файле web-приложения пропишите:
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
В конфигурационном файле консольного приложения пропишите:
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
