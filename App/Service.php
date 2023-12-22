<?php

namespace App;

class Service implements IObserver
{

    protected $name;
    protected $priority;


    public function __construct($name, $priority=0)
    {
        $this->name = $name;
        $this->priority = $priority;
    }

    public function update(IObservable $IObservable)
    {
        print_r("{$this->name} : {$IObservable->getEvent() } <br/>");
    }
}