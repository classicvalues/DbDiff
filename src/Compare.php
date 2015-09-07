<?php

namespace Brzoski;

use Brzoski\Differences\ColumnDifferences;
use Brzoski\Differences\ColumnNotExist;
use Brzoski\Differences\ColumnNotExists;
use Brzoski\Differences\TableNotExist;
use Brzoski\Elements\Column;
use Brzoski\Elements\Element;

class Compare
{

    protected $differences = array();

    public function isIdentical(Element $elementInSource, Element $elementInTarget)
    {
        if (md5(serialize($elementInSource)) == md5(serialize($elementInTarget))) {
            return true;
        }

        return false;
    }

    public function compare($source, $target)
    {
        if (!$this->isIdentical($source, $target)) {
            $tables = $source->getTables();

            foreach ($tables as $name => $table) {
                if (!$target->exists($name)) {
                    $this->differences[] = new TableNotExist($table);
                } else {
                    $this->compareTables($table, $target->getTable($name));
                }
            }
        }

        return $this->differences;
    }


    public function compareTables(Element $tableInSource, Element $tableInTarget = null)
    {
        if (!$this->isIdentical($tableInSource, $tableInTarget)) {

            $columnsInSource = $tableInSource->getColumns();
            $columnsInTarget = $tableInTarget->getColumns();

            foreach ($columnsInSource as $name => $column) {

                if (!array_key_exists($name, $columnsInTarget)) {
                    $this->differences[] = new ColumnNotExists($column, $tableInTarget);
                } else {
                    $this->compareColumn($column, $columnsInTarget[$column->getName()], $tableInTarget);
                }

            }
        }
    }

    public function compareColumn(Column $columnInSource, Column $columnInTarget)
    {

        if (!$this->isIdentical($columnInSource, $columnInTarget)) {
            $this->differences[] = new ColumnDifferences($columnInSource, $columnInTarget);
        }

        return $this->differences;
    }

    /**
     * @return array
     */
    public function getDifferences()
    {
        return $this->differences;
    }
}