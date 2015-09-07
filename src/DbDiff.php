<?php

namespace Brzoski;

use Brzoski\Differences\ColumnNotExist;
use Brzoski\Differences\ColumnNotExists;
use Brzoski\Differences\TableNotExist;
use Brzoski\Elements\Column;
use Brzoski\Elements\Table;

class DbDiff
{
    protected  $source;
    protected  $target;

    public function __construct($source, $target)
    {
        $this->source = Exporter::export(Connector::connect($source), $source['db_name']);
        $this->target = Exporter::export(Connector::connect($target), $target['db_name']);
    }

    public function diff()
    {
        $diff = new Compare();
        $differences = $diff->compare($this->source, $this->target);

        return $differences;
    }

    public function diffTable($tableName)
    {
        $diff = new Compare();

        $tableInSource= $this->source->getTable($tableName);
        $tableInTarget= $this->target->getTable($tableName);

        $differences = $diff->compareTables($tableInSource, $tableInTarget);

        return $differences;
    }

    public function diffColumn($columnName, $tableName)
    {
        $diff = new Compare();

        $columnInSource= $this->source->getTable($tableName)->getColumn($columnName);
        $tableInTarget= $this->target->getTable($tableName);


        if(!$tableInTarget instanceof Table){
            return new TableNotExist($this->source->getTable($tableName));
        }

        $columnInTarget = $tableInTarget->getColumn($columnName);

        if(!$columnInTarget instanceof Column)
        {
            return new ColumnNotExists($columnInSource, $tableInTarget);
        }

        $differences = $diff->compareColumn($columnInSource, $columnInTarget);

        return $differences;
    }

    /**
     * @return Elements\Database
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @return Elements\Database
     */
    public function getTarget()
    {
        return $this->target;
    }
}