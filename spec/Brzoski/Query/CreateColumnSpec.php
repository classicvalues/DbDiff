<?php

namespace spec\Brzoski\Query;

use Brzoski\Elements\Column;
use Brzoski\Elements\Table;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CreateColumnSpec extends ObjectBehavior
{
    function it_can_generate_query(Column $column, Table $table){
        $table->getName()->willReturn('dbdiff');
        $column->getQueryString()->willReturn('id int(10) unsigned NOT NULL PRIMARY KEY auto_increment');

        $this::query($column, $table)
            ->shouldBe('ALTER TABLE dbdiff ADD COLUMN id int(10) unsigned NOT NULL PRIMARY KEY auto_increment');
    }
}
