<?php

namespace Brzoski\Query;

use Brzoski\Elements\Element as Element;
use Brzoski\QueryInterface;

class CreateColumn implements QueryInterface
{
    static function query(Element $element, Element $table)
    {
        $query = "ALTER TABLE ".$table->getName(). " ";
        $query .= "ADD COLUMN ".$element->getQueryString();

        return $query;
    }
}