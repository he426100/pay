<?php

namespace Yansongda\Pay\Gateways\Alipay;

use Yansongda\Pay\Exceptions\GatewayException;

class TransferGateway extends Alipay
{
    /**
     * get method config.
     *
     * @author yansongda <me@yansongda.cn>
     *
     * @return string
     */
    protected function getMethod()
    {
        return 'alipay.fund.trans.toaccount.transfer';
    }

    protected function getQueryMethod()
    {
        return 'alipay.fund.trans.order.query';
    }

    /**
     * get productCode config.
     *
     * @author yansongda <me@yansongda.cn>
     *
     * @return string
     */
    protected function getProductCode()
    {
        return '';
    }

    /**
     * transfer amount to account.
     *
     * @author yansongda <me@yansongda.cn>
     *
     * @param array $config_biz
     *
     * @return array|bool
     */
    public function pay(array $config_biz = [])
    {
        return $this->getResult($config_biz, $this->getMethod());
    }

    /**
     * 查询转账订单
     * @return [type] [description]
     */
    public function query($order_id = '', $out_biz_no = '')
    {
        $config_biz = [
            'order_id' => $order_id,
            'out_biz_no' => $out_biz_no
        ];

        return $this->getResult($config_biz, $this->getQueryMethod());
    }

    /**
     * 获取原始的支付宝返回信息
     * @param  GatewayException $e [description]
     * @return [type]              [description]
     */
    public function getExceptionRaw(GatewayException $e)
    {
        return $e->getRaw($this->getQueryMethod());
    }
}
