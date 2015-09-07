<?php

namespace Brzoski\Differences;

use Brzoski\DifferencesInterface;
use Brzoski\Query\CreateTable;

class TableNotExist implements DifferencesInterface
{
    protected $table;

    public function __construct($table)
    {
        $this->table = $table;
    }

    public function getMessage()
    {
        return 'Table '. $this->table->getName(). " not exists!";
    }

    public function generateQuery()
    {
        return CreateTable::query($this->table);
    }
}

