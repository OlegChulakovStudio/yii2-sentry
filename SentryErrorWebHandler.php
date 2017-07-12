<?php

namespace OlegChulakovStudio\sentry;

use yii\web\ErrorHandler;

/**
 * Class SentryErrorWebHandler
 * @package OlegChulakovStudio\sentry
 */
class SentryErrorWebHandler extends ErrorHandler
{
    /**
     * Компонент sentry
     * @var SentryComponent|[] $sentry
     */
    public $sentry;

    /**
     * Отправлять ли сообщения в sentry
     * @var boolean
     */
    public $mode = true;

    /**
     * @inheritdoc
     */
    public function init()
    {
        if (!$this->mode) {
            return;
        }
        
        $this->sentry = \Yii::createObject($this->sentry);
    }

    /**
     * Перехватывание ошибок
     * @inheritdoc
     * @param \Exception $exception
     */
    protected function renderException($exception)
    {
        parent::renderException($exception);

        if (!$this->mode) {
            return;
        }

        $this->sentry->captureException($exception);
    }
}
