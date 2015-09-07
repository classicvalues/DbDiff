<?php

namespace spec\Brzoski\Differences;

use Brzoski\Elements\Column;
use Brzoski\Elements\Table;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ColumnNotExistsSpec extends ObjectBehavior
{
    function it_is_initializable(Column $column, Table $table)
    {
        $this->beConstructedWith($column, $table);
        $this->shouldHaveType('Brzoski\Differences\ColumnNotExists');
    }

    function it_return_error_message(Column $column, Table $table)
    {
        $column->getName()->willReturn('users');

        $this->beConstructedWith($column, $table);
        $this->shouldHaveType('Brzoski\Differences\ColumnNotExists');
    }
}
