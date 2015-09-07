<?php

namespace Brzoski\Elements;

class Table extends Element
{
    protected $columns = array();

    public function addColumn(Column $column)
    {
        $this->columns[$column->getName()] = $column;
    }

    /**
     * @return array
     */
    public function getColumns()
    {
        return $this->columns;
    }

    public function getColumn($columnName)
    {
        if(array_key_exists($columnName, $this->columns)){
            return $this->columns[$columnName];
        }
    }
}