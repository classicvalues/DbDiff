<?php

namespace Brzoski;

use Brzoski\Elements\Element;

interface QueryInterface
{
    static function query(Element $element, Element $table);
}