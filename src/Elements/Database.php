<?php

namespace Brzoski\Elements;

class Database extends Element
{
    protected $tables;

    public function addTable(Table $table)
    {
        $this->tables[$table->getName()] = $table;
    }

    /**
     * @return mixed
     */
    public function getTables()
    {
        return $this->tables;
    }

    public function getTable($name)
    {
        if($this->exists($name)){
            return $this->tables[$name];
        }
    }

    public function exists($name)
    {
        if(array_key_exists($name,$this->tables)){
            return true;
        }

        return false;
    }

}