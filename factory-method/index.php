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

    public function someMethodA1(): string
    {
        return 'some thing A1';
    }

    public function someMethodA2(): string
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

    public function someMethodB1(): string
    {
        return 'some thing B1';
    }

    public function someMethodB2(): string
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
    public function createRoadTransport(): TruckA
    {
        return new TruckA();
    }

    public function createSeaTransport(): ShipA
    {
        return new ShipA();
    }
}

class TransportFactoryB extends ATransportFactory
{
    public function createRoadTransport(): TruckB
    {
        return new TruckB();
    }

    public function createSeaTransport(): ShipB
    {
        return new ShipB();
    }
}


$transA = new TransportFactoryA();
$transB = new TransportFactoryB();

$truck1 = $transA->createRoadTransport();
$truck1 = $truck1->deliver('tehran');


$ship1 = $transB->createSeaTransport();
$ship1 = $ship1->deliver('america');
