<?php

namespace spec\Brzoski\Elements;

use Brzoski\Elements\Column;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TableSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Brzoski\Elements\Table');
    }

    function it_can_set_name()
    {
        $this->setName('users');
        $this->getName()->shouldBe('users');
    }

    function it_can_add_column(Column $column)
    {
        $this->addColumn($column);
        $this->getColumns()->shouldHaveCount(1);
    }

    function it_can_add_many_columns(Column $column1, Column $column2, Column $column3)
    {
        $column1->getName()->willReturn('id');
        $column2->getName()->willReturn('firstName');
        $column3->getName()->willReturn('lastName');

        $this->addColumn($column1);
        $this->addColumn($column2);
        $this->addColumn($column3);

        $this->getColumns()->shouldHaveCount(3);
    }

    function it_can_return_column_by_name(Column $column1, Column $column2, Column $column3)
    {
        $column1->getName()->willReturn('id');
        $column2->getName()->willReturn('firstName');
        $column3->getName()->willReturn('lastName');

        $this->addColumn($column1);
        $this->addColumn($column2);
        $this->addColumn($column3);

        $this->getColumn('lastName')->beAnInstanceOf('Brzoski\Elements\Column');
        $this->getColumn('lastName')->getName()->shouldBe('lastName');
    }
}
