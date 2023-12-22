<?php

namespace App;

interface IObserver
{
    public function update(IObservable $IObservable);

}