<?php

interface Gateway
{
    public function setInfo($info);

    public function pay();
}


class Zarinpal implements Gateway{

    protected $info;

    public function setInfo($info)
    {
        $this->info = $info;
    }

    public function pay()
    {
        return $this->info;
    }
}

class Mellat implements Gateway
{
    protected $info;

    public function setInfo($info)
    {
        $this->info = $info;
    }

    public function pay()
    {
       return $this->info;
    }
}

class payment
{

    protected $gateway;

    public function setGateway(Gateway $gateway)
    {
        $this->gateway = $gateway;
    }

    public function setInfo($info)
    {
        $this->gateway->setInfo($info);
    }

    /**
     * @return mixed
     */
    public function pay()
    {
        return $this->gateway->pay();
    }
}

$payment = new Payment();
$payment->setGateway(new Zarinpal());
$payment->setInfo(['name'=>'mehrdadShirvan','price'=>10000]);
var_dump($payment->pay());