<?php
namespace  OlegChulakovStudio\sentry;

use Raven_Client;
use Raven_ErrorHandler;
use VK\VK;
use yii\base\Component;
use yii\base\Exception;

/**
 * Компонент для работы с Sentry
 * @see https://sentry.io
 * @copyright Copyright (c) 2017, Oleg Chulakov Studio
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 *
 * @link http://chulakov.com/
 */
class SentryComponent extends Component
{
    /** @var string */
    public $url;

    /** @var Raven_Client */
    private $client;

    /**
     * Инициализация
     * @throws Exception
     */
    public function init()
    {
        if (strlen($this->url) <= 0) {
            throw new Exception("SentryComponent: required param url is not set");
        }

        $this->client = new Raven_Client($this->url);
        $errorHandler = new Raven_ErrorHandler($this->client);
        $errorHandler->registerExceptionHandler();
        $errorHandler->registerErrorHandler();
        $errorHandler->registerShutdownFunction();
    }

    /**
     * Отправка ошибок
     * @param $exception
     * @param array $params
     * @return mixed
     */
    public function captureException($exception, array $params = [])
    {
        return $this->client->captureException($exception, $params);
    }

    /**
     * Отправка сообщений
     * @param string $message
     * @param array $params
     * @param array $data
     * @return mixed
     */
    public function captureMessage($message, array $params = [], array $data = [])
    {
        return $this->client->captureMessage($message, $params, $data);
    }
}
