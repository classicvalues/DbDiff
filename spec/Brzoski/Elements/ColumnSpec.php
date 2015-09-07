<?php

namespace spec\Brzoski\Elements;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ColumnSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Brzoski\Elements\Column');
    }

    function it_can_set_name()
    {
        $this->setName('id');
        $this->getName()->shouldBe('id');
    }

    function it_can_set_type()
    {
        $this->setType('int(10) unsigned');
        $this->getType()->shouldBe('int(10) unsigned');

    }

    function it_can_set_no_as_key()
    {
        $this->setKey('');
        $this->getKey()->shouldBe(null);
    }

    function it_can_set_pri_as_key()
    {
        $this->setKey('PRI');
        $this->getKey()->shouldBe('PRIMARY KEY');
    }

    function it_can_set_no_as_null()
    {
        $this->setNull('NO');
        $this->getNull()->shouldBe('NOT NULL');
    }

    function it_can_set_yes_as_null()
    {
        $this->setNull('YES');
        $this->getNull()->shouldBe(null);
    }

    function it_can_set_null_as_default()
    {
        $this->setDefault(null);
        $this->getDefault()->shouldBe(null);
    }

    function it_can_set_string_as_default()
    {
        $this->setDefault('0000-00-00 00:00:00');
        $this->getDefault()->shouldBe('0000-00-00 00:00:00');
    }

    function it_can_set_extra()
    {
        $this->setExtra('auto_increment');
        $this->getExtra()->shouldBe('auto_increment');
    }

    function it_generate_query_string1()
    {
        $this->setName('id');
        $this->setType('int(10) unsigned');
        $this->setNull('NO');
        $this->setKey('PRI');
        $this->setDefault(null);
        $this->setExtra('auto_increment');

        $this->getQueryString()->shouldBe('id int(10) unsigned NOT NULL PRIMARY KEY auto_increment');
    }

    function it_generate_query_string2()
    {
        $this->setName('parent_id');
        $this->setType('int(11)');
        $this->setNull('YES');
        $this->setKey('');
        $this->setDefault(null);
        $this->setExtra('');

        $this->getQueryString()->shouldBe('parent_id int(11)');
    }
}
