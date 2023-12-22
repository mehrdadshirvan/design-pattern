<?php

namespace App;

class Publisher implements IObservable
{
    protected $observers = [];

    protected $event;

    public function register(IObserver $observer)
    {

        $observerKey = spl_object_hash($observer);
        $this->observers[$observerKey] = $observer;

    }

    public function unregister(IObserver $observer)
    {
        $observerKey = spl_object_hash($observer);
        unset($this->observers[$observerKey]);
    }

    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer;
        }
    }

    public function setEvent($event)
    {
        $this->event = $event;
        $this->notify();
    }

    public function getEvent()
    {
        return $this->event;
    }

    public function getObservers()
    {
        return $this->observers;
    }
}