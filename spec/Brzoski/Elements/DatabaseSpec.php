<?php

namespace spec\Brzoski\Elements;

use Brzoski\Elements\Table;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DatabaseSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Brzoski\Elements\Database');
    }

    function it_can_set_name()
    {
        $this->setName('db_diff');
        $this->getName('db_diff');
    }

    function it_can_add_table(Table $table)
    {
        $this->addTable($table);
        $this->getTables()->shouldHaveCount(1);
    }

    function it_can_add_many_tables(Table $table1, Table $table2, Table $table3)
    {
        $table1->getName()->willReturn('users');
        $table2->getName()->willReturn('products');
        $table3->getName()->willReturn('categories');

        $this->addTable($table1);
        $this->addTable($table2);
        $this->addTable($table3);

        $this->getTables()->shouldHaveCount(3);
    }
}
