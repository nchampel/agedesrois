<?php

namespace Models\Map;

class Item
{
    private $id_player;
    private $type_item;
    private $level_item;
    private $position_x;
    private $position_y;
    private $map_position;
    private $item_strength;
    private $item_defense;
    private $item_quantity;
    private $is_active;

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
     * Get the value of position_x
     */
    public function getPosition_x()
    {
        return $this->position_x;
    }

    /**
     * Set the value of position_x
     *
     * @return  self
     */
    public function setPosition_x($position_x)
    {
        $this->position_x = $position_x;

        return $this;
    }

    /**
     * Get the value of position_y
     */
    public function getPosition_y()
    {
        return $this->position_y;
    }

    /**
     * Set the value of position_y
     *
     * @return  self
     */
    public function setPosition_y($position_y)
    {
        $this->position_y = $position_y;

        return $this;
    }

    /**
     * Get the value of map_position
     */
    public function getMap_position()
    {
        return $this->map_position;
    }

    /**
     * Set the value of map_position
     *
     * @return  self
     */
    public function setMap_position($map_position)
    {
        $this->map_position = $map_position;

        return $this;
    }

    /**
     * Get the value of item_strength
     */
    public function getItem_strength()
    {
        return $this->item_strength;
    }

    /**
     * Set the value of item_strength
     *
     * @return  self
     */
    public function setItem_strength($item_strength)
    {
        $this->item_strength = $item_strength;

        return $this;
    }

    /**
     * Get the value of item_defense
     */
    public function getItem_defense()
    {
        return $this->item_defense;
    }

    /**
     * Set the value of item_defense
     *
     * @return  self
     */
    public function setItem_defense($item_defense)
    {
        $this->item_defense = $item_defense;

        return $this;
    }

    /**
     * Get the value of item_quantity
     */
    public function getItem_quantity()
    {
        return $this->item_quantity;
    }

    /**
     * Set the value of item_quantity
     *
     * @return  self
     */
    public function setItem_quantity($item_quantity)
    {
        $this->item_quantity = $item_quantity;

        return $this;
    }

    /**
     * Get the value of is_active
     */
    public function getIs_active()
    {
        return $this->is_active;
    }

    /**
     * Set the value of is_active
     *
     * @return  self
     */
    public function setIs_active($is_active)
    {
        $this->is_active = $is_active;

        return $this;
    }

    /**
     * Get the value of id_player
     */
    public function getId_player()
    {
        return $this->id_player;
    }

    /**
     * Set the value of id_player
     *
     * @return  self
     */
    public function setId_player($id_player)
    {
        $this->id_player = $id_player;

        return $this;
    }
}
