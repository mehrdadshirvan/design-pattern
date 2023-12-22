<?php

interface Transport
{
    public function deliver($place);
}


class Truck implements Transport
{

    public function deliver($place)
    {
        return $place;
    }
}

class Ship implements Transport
{

    public function deliver($place)
    {
        return $place;
    }
}


abstract class Logistic{
    abstract public function createTransport();

    public function planDelivery($place)
    {
        $transport = $this->createTransport();
        $transport->deliver($place);
        return $transport;
    }
}

class RoadLogistic extends Logistic{

    public function createTransport()
    {
        return new Truck();
    }
}

class SeaLogistic extends Logistic{

    public function createTransport()
    {
       return new Ship();
    }
}



$road = new RoadLogistic();
$seaL = new SeaLogistic();
//transports
$truck1 = $road->planDelivery('tehran');
$ship1 = $seaL->planDelivery('America');

