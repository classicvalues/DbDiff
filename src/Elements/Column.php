<?php

namespace Brzoski\Elements;

class Column extends Element
{
    protected $type;
    protected $null;
    protected $key;
    protected $default;
    protected $extra;


    public function getQueryString()
    {
        $query = $this->getName();

        if($this->getType()!=''){
            $query .= " ".$this->getType();
        }

        if($this->getNull()){
            $query .= " ".$this->getNull();
        }

        if($this->getKey()!=''){
            $query .= " ".$this->getKey();
        }

        if($this->getExtra()!='')
        {
            $query .= " ".$this->getExtra();
        }

        return $query;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function getKey()
    {
        if($this->key == 'PRI')
        {
            return 'PRIMARY KEY';
        }
    }

    /**
     * @return mixed
     */
    public function getExtra()
    {
        return $this->extra;
    }

    /**
     * @return mixed
     */
    public function getNull()
    {
        if($this->null=='NO'){
            return 'NOT NULL';
        }
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param mixed $extra
     */
    public function setExtra($extra)
    {
        $this->extra = $extra;
    }

    /**
     * @return mixed
     */
    public function getDefault()
    {
        return $this->default;
    }

    /**
     * @param mixed $default
     */
    public function setDefault($default)
    {
        $this->default = $default;
    }

    /**
     * @param mixed $key
     */
    public function setKey($key)
    {
        $this->key = $key;
    }

    /**
     * @param mixed $null
     */
    public function setNull($null)
    {
        $this->null = $null;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }


}
