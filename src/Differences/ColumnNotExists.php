<?php

namespace Brzoski\Differences;

use Brzoski\DifferencesInterface;
use Brzoski\Query\CreateColumn;

class ColumnNotExists implements DifferencesInterface
{
    protected $column;
    protected $table;

    public function __construct($column, $table)
    {
        $this->column = $column;
        $this->table = $table;
    }

    public function getMessage()
    {
        return 'Column '. $this->column->getName(). " not exists in ".$this->table->getName()." table";
    }

    public function generateQuery()
    {
        return CreateColumn::query($this->column, $this->table);
    }
}

