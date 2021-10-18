<?php

namespace Models\Constructs;

class Sawmill
{
    private $food;
    private $wood;
    private $metal;
    private $stone;
    private $gold;
    private $level_item;
    private $time_construct;
    private $type_item;

    function __construct(array $values)
    {
        $this->hydratation($values);
    }

    public function hydratation($values)
    {
        //$proprietes = $this->proprietesUtilisateur();
        $proprietes = get_object_vars($this);
        $keysValeurs = array_keys($proprietes);
        foreach ($keysValeurs as $prop) {
            if (isset($values[$prop])) {
                $setKey = 'set' . ucfirst($prop);
                $this->$setKey($values[$prop]);
            }
        }
    }
    /**
     * Get the value of food
     */
    public function getFood()
    {
        return $this->food;
    }

    /**
     * Set the value of food
     *
     * @return  self
     */
    public function setFood($food)
    {
        $this->food = $food;

        return $this;
    }

    /**
     * Get the value of wood
     */
    public function getWood()
    {
        return $this->wood;
    }

    /**
     * Set the value of wood
     *
     * @return  self
     */
    public function setWood($wood)
    {
        $this->wood = $wood;

        return $this;
    }

    /**
     * Get the value of metal
     */
    public function getMetal()
    {
        return $this->metal;
    }

    /**
     * Set the value of metal
     *
     * @return  self
     */
    public function setMetal($metal)
    {
        $this->metal = $metal;

        return $this;
    }

    /**
     * Get the value of stone
     */
    public function getStone()
    {
        return $this->stone;
    }

    /**
     * Set the value of stone
     *
     * @return  self
     */
    public function setStone($stone)
    {
        $this->stone = $stone;

        return $this;
    }

    /**
     * Get the value of gold
     */
    public function getGold()
    {
        return $this->gold;
    }

    /**
     * Set the value of gold
     *
     * @return  self
     */
    public function setGold($gold)
    {
        $this->gold = $gold;

        return $this;
    }

    /**
     * Get the value of level_item
     */
    public function getLevel_item()
    {
        return $this->level_item;
    }

    /**
     * Set the value of level_item
     *
     * @return  self
     */
    public function setLevel_item($level_item)
    {
        $this->level_item = $level_item;

        return $this;
    }

    /**
     * Get the value of time_construct
     */
    public function getTime_construct()
    {
        return $this->time_construct;
    }

    /**
     * Set the value of time_construct
     *
     * @return  self
     */
    public function setTime_construct($time_construct)
    {
        $this->time_construct = $time_construct;

        return $this;
    }

    /**
     * Get the value of type_item
     */
    public function getType_item()
    {
        return $this->type_item;
    }

    /**
     * Set the value of type_item
     *
     * @return  self
     */
    public function setType_item($type_item)
    {
        $this->type_item = $type_item;

        return $this;
    }
}
