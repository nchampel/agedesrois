<?php

namespace Models\Army;

class Archer
{
    private $food;
    private $gold;
    private $mana;
    private $mail;
    private $leather;
    private $sword;
    private $bow;
    private $crossbow;
    private $level_soldier;
    private $time_training;
    private $type_army;
    private $strength;
    private $life_points;
    private $stock;

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
     * Get the value of mana
     */
    public function getMana()
    {
        return $this->mana;
    }

    /**
     * Set the value of mana
     *
     * @return  self
     */
    public function setMana($mana)
    {
        $this->mana = $mana;

        return $this;
    }

    /**
     * Get the value of mail
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set the value of mail
     *
     * @return  self
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get the value of leather
     */
    public function getLeather()
    {
        return $this->leather;
    }

    /**
     * Set the value of leather
     *
     * @return  self
     */
    public function setLeather($leather)
    {
        $this->leather = $leather;

        return $this;
    }

    /**
     * Get the value of sword
     */
    public function getSword()
    {
        return $this->sword;
    }

    /**
     * Set the value of sword
     *
     * @return  self
     */
    public function setSword($sword)
    {
        $this->sword = $sword;

        return $this;
    }

    /**
     * Get the value of bow
     */
    public function getBow()
    {
        return $this->bow;
    }

    /**
     * Set the value of bow
     *
     * @return  self
     */
    public function setBow($bow)
    {
        $this->bow = $bow;

        return $this;
    }

    /**
     * Get the value of crossbow
     */
    public function getCrossbow()
    {
        return $this->crossbow;
    }

    /**
     * Set the value of crossbow
     *
     * @return  self
     */
    public function setCrossbow($crossbow)
    {
        $this->crossbow = $crossbow;

        return $this;
    }

    /**
     * Get the value of level_soldier
     */
    public function getLevel_soldier()
    {
        return $this->level_soldier;
    }

    /**
     * Set the value of level_soldier
     *
     * @return  self
     */
    public function setLevel_soldier($level_soldier)
    {
        $this->level_soldier = $level_soldier;

        return $this;
    }

    /**
     * Get the value of time_training
     */
    public function getTime_training()
    {
        return $this->time_training;
    }

    /**
     * Set the value of time_training
     *
     * @return  self
     */
    public function setTime_training($time_training)
    {
        $this->time_training = $time_training;

        return $this;
    }

    /**
     * Get the value of type_army
     */
    public function getType_army()
    {
        return $this->type_army;
    }

    /**
     * Set the value of type_army
     *
     * @return  self
     */
    public function setType_army($type_army)
    {
        $this->type_army = $type_army;

        return $this;
    }

    /**
     * Set the value of strength
     *
     * @return  self
     */
    public function setStrength($strength)
    {
        $this->strength = $strength;

        return $this;
    }

    /**
     * Get the value of strength
     */
    public function getStrength()
    {
        return $this->strength;
    }

    /**
     * Get the value of life_points
     */
    public function getLife_points()
    {
        return $this->life_points;
    }

    /**
     * Set the value of life_points
     *
     * @return  self
     */
    public function setLife_points($life_points)
    {
        $this->life_points = $life_points;

        return $this;
    }

    /**
     * Get the value of stock
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set the value of stock
     *
     * @return  self
     */
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }
}
