<?php

namespace Brzoski\Query;

use Brzoski\Elements\Element as Element;
use Brzoski\QueryInterface;

class CreateTable implements QueryInterface
{

    public static function query(Element $element, Element $table= null)
    {
        $query = 'CREATE TABLE  '.$element->getName()." (";

        $columns = $element->getColumns();
        $end = end($columns);

        foreach($columns as $k => $column){
            $query .= "\n    ".$column->getQueryString();


            if($k!=$end->getName()){
                $query .=",";
            }
        }

        $query .= "\n);";

        return $query;
    }
}