<?php

namespace Brzoski\Differences;

use Brzoski\DifferencesInterface;
use Brzoski\Query\CreateColumn;

class ColumnDifferences implements DifferencesInterface
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
        echo $this->column->getName() . " are not identical in ".$this->table->getName()." table";
    }

    public function generateQuery()
    {
        return CreateColumn::query($this->column, $this->table);
    }
}