<?php

namespace Brzoski\Query;

use Brzoski\Elements\Element as Element;
use Brzoski\QueryInterface;

class ModifyColumn implements QueryInterface
{
    static function query(Element $element, Element $table)
    {
        $query = "ALTER TABLE ".$table->getName(). " ";
        $query .= "MODIFY ".$element->getQueryString();

        return $query;
    }
}