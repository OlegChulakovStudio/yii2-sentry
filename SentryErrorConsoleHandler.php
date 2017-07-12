<?php

namespace  OlegChulakovStudio\sentry;

use yii\console\ErrorHandler;

/**
 * Class SentryErrorConsoleHandler
 * @package OlegChulakovStudio\sentry
 */
class SentryErrorConsoleHandler extends ErrorHandler
{
    /**
     * Компонент sentry
     * @var SentryComponent|array $sentry
     */
    public $sentry;

    /**
     * Отправлять ли сообщения в sentry
     * @var bool
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
