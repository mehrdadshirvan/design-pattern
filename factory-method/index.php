<?php

interface Transport
{
    public function deliver($place);
}


class TruckA implements Transport
{

    public function deliver($place)
    {
        return $place;
    }

    public function someMethodA1()
    {
        return 'some thing A1';
    }

    public function someMethodA2()
    {
        return 'some thing A2';
    }
}
class TruckB implements Transport
{

    public function deliver($place)
    {
        return $place;
    }

    public function someMethodB1()
    {
        return 'some thing B1';
    }

    public function someMethodB2()
    {
        return 'some thing B2';
    }
}

class ShipA implements Transport
{

    public function deliver($place)
    {
        return $place;
    }
}

class ShipB implements Transport
{

    public function deliver($place)
    {
        return $place;
    }
}


abstract class ATransportFactory
{
    abstract public function createRoadTransport();

    abstract public function createSeaTransport();
}

class TransportFactoryA extends ATransportFactory
{
    public function createRoadTransport()
    {
        return new TruckA();
    }

    public function createSeaTransport()
    {
        return new ShipA();
    }
}

class TransportFactoryB extends ATransportFactory
{
    public function createRoadTransport()
    {
        return new TruckB();
    }

    public function createSeaTransport()
    {
        return new ShipB();
    }
}


$trans = new TransportFactoryA();

$truck1 = $trans->createRoadTransport();
$truck1 = $truck1->deliver('tehran');


$ship1 = $trans->createSeaTransport();
$ship1 = $ship1->deliver('america');
