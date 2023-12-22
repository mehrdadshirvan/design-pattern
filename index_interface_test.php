<?php

interface Gateway
{
    public function setPrice($price);

    public function setInfo($info);

    public function pay();
}


class Zarinpal implements Gateway{

    protected $price;
    protected $info;

    public function setPrice($price)
    {
        $this->price = $price;
    }
    public function setInfo($info)
    {
        $this->info = $info;
    }

    public function pay()
    {
        return ['info'=>$this->info,'price'=>$this->price];
    }
}

class Mellat implements Gateway
{
    protected $info;
    protected $price;
    public function setPrice($price)
    {
        $this->price = $price;
    }
    public function setInfo($info)
    {
        $this->info = $info;
    }

    public function pay()
    {
       return  ['info'=>$this->info,'price'=>$this->price];
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

    public function setPrice($price)
    {
        $this->gateway->setPrice($price);
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
$payment->setInfo(['name'=>'mehrdadShirvan']);
$payment->setPrice(10000);
var_dump($payment->pay());