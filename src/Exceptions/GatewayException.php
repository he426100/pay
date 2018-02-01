<?php

namespace Yansongda\Pay\Exceptions;

class GatewayException extends Exception
{
    /**
     * error raw data.
     *
     * @var array
     */
    public $raw = [];

    /**
     * [__construct description].
     *
     * @author JasonYan <me@yansongda.cn>
     *
     * @param string     $message
     * @param string|int $code
     */
    public function __construct($message, $code, $raw = [])
    {
        parent::__construct($message, intval($code));

        $this->raw = $raw;
    }

    /**
     * 返回友好的支付宝数据
     * @param  string $method
     * @return array
     */
    public function getRaw($method)
    {
        $method = str_replace('.', '_', $method).'_response';
        return isset($this->raw[$method]) ? $this->raw[$method] : [];
    }
}
