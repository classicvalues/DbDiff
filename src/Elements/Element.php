<?php

namespace Brzoski\Elements;

abstract class Element
{
    protected $name;

    public function setName($name)
    {
        return $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

}
