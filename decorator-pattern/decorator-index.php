<?php

interface Car
{
    public function cost();
    public function description();
}


class BMW implements Car
{

    public function cost()
    {
       return 4000;
    }

    public function description()
    {
        return "BMW";
    }
}

abstract class CarFeature implements Car
{
    protected $car;

    public function __construct(Car $car)
    {
        $this->car = $car;
    }

    abstract public function cost();
    abstract public function description();
}


class SunRoof extends CarFeature
{

    public function cost()
    {
       return $this->car->cost() + '500';
    }

    public function description()
    {
        return $this->car->description() . ', SunRoof';
    }
}
$BMW = new BMW();
$person1WithSunRoof = new SunRoof($BMW);
echo $person1WithSunRoof->cost();
echo '<br/>';
echo $person1WithSunRoof->description();
