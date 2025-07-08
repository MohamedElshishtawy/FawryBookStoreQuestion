<?php

namespace Interfaces;

interface Saleable {

    public function setPrice(float $price): void ;

    public function getPrice(): float;

}