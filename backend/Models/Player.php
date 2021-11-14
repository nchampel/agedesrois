<?php

namespace Models;

class Player
{
    private $pseudo;
    private $player_password;
    private $id;
    private $town_food;
    private $town_wood;
    private $town_metal;
    private $town_stone;
    private $town_gold;
    private $town_mana;
    private $town_mail;
    private $town_leather;
    private $town_sword;
    private $town_bow;
    private $town_crossbow;
    private $stock_food;
    private $stock_wood;
    private $stock_metal;
    private $stock_stone;
    private $stock_gold;
    private $level_archer;
    private $level_workshop;
    private $level_castle;
    private $level_farm;
    private $level_sawmill;
    private $level_extractor;
    private $level_quarry;
    private $level_mine;
    private $level_barracks;
    private $pcclh_parties;
    private $position_x;
    private $position_y;
    private $view;

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
                if ($prop != 'player_password') {
                    $setKey = 'set' . ucfirst($prop);
                    $this->$setKey($values[$prop]);
                }
            }
        }
    }

    /**
     * Get the value of pseudo
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * Set the value of pseudo
     *
     * @return  self
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;

        return $this;
    }


    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of player_password
     */
    public function getPlayer_password()
    {
        return $this->player_password;
    }

    /**
     * Set the value of player_password
     *
     * @return  self
     */
    public function setPlayer_password($player_password)
    {
        $this->player_password = $player_password;

        return $this;
    }

    /**
     * Get the value of town_food
     */
    public function getTown_food()
    {
        return $this->town_food;
    }

    /**
     * Set the value of town_food
     *
     * @return  self
     */
    public function setTown_food($town_food)
    {
        $this->town_food = $town_food;

        return $this;
    }

    /**
     * Get the value of town_wood
     */
    public function getTown_wood()
    {
        return $this->town_wood;
    }

    /**
     * Set the value of town_wood
     *
     * @return  self
     */
    public function setTown_wood($town_wood)
    {
        $this->town_wood = $town_wood;

        return $this;
    }

    /**
     * Get the value of town_metal
     */
    public function getTown_metal()
    {
        return $this->town_metal;
    }

    /**
     * Set the value of town_metal
     *
     * @return  self
     */
    public function setTown_metal($town_metal)
    {
        $this->town_metal = $town_metal;

        return $this;
    }

    /**
     * Get the value of town_stone
     */
    public function getTown_stone()
    {
        return $this->town_stone;
    }

    /**
     * Set the value of town_stone
     *
     * @return  self
     */
    public function setTown_stone($town_stone)
    {
        $this->town_stone = $town_stone;

        return $this;
    }

    /**
     * Get the value of town_gold
     */
    public function getTown_gold()
    {
        return $this->town_gold;
    }

    /**
     * Set the value of town_gold
     *
     * @return  self
     */
    public function setTown_gold($town_gold)
    {
        $this->town_gold = $town_gold;

        return $this;
    }

    /**
     * Get the value of town_tool
     */
    public function getTown_tool()
    {
        return $this->town_tool;
    }

    /**
     * Set the value of town_tool
     *
     * @return  self
     */
    public function setTown_tool($town_tool)
    {
        $this->town_tool = $town_tool;

        return $this;
    }

    /**
     * Get the value of stock_food
     */
    public function getStock_food()
    {
        return $this->stock_food;
    }

    /**
     * Set the value of stock_food
     *
     * @return  self
     */
    public function setStock_food($stock_food)
    {
        $this->stock_food = $stock_food;

        return $this;
    }

    /**
     * Get the value of stock_wood
     */
    public function getStock_wood()
    {
        return $this->stock_wood;
    }

    /**
     * Set the value of stock_wood
     *
     * @return  self
     */
    public function setStock_wood($stock_wood)
    {
        $this->stock_wood = $stock_wood;

        return $this;
    }

    /**
     * Get the value of stock_metal
     */
    public function getStock_metal()
    {
        return $this->stock_metal;
    }

    /**
     * Set the value of stock_metal
     *
     * @return  self
     */
    public function setStock_metal($stock_metal)
    {
        $this->stock_metal = $stock_metal;

        return $this;
    }

    /**
     * Get the value of stock_stone
     */
    public function getStock_stone()
    {
        return $this->stock_stone;
    }

    /**
     * Set the value of stock_stone
     *
     * @return  self
     */
    public function setStock_stone($stock_stone)
    {
        $this->stock_stone = $stock_stone;

        return $this;
    }

    /**
     * Get the value of stock_gold
     */
    public function getStock_gold()
    {
        return $this->stock_gold;
    }

    /**
     * Set the value of stock_gold
     *
     * @return  self
     */
    public function setStock_gold($stock_gold)
    {
        $this->stock_gold = $stock_gold;

        return $this;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of level_archer
     */
    public function getLevel_archer()
    {
        return $this->level_archer;
    }

    /**
     * Set the value of level_archer
     *
     * @return  self
     */
    public function setLevel_archer($level_archer)
    {
        $this->level_archer = $level_archer;

        return $this;
    }

    /**
     * Get the value of level_workshop
     */
    public function getLevel_workshop()
    {
        return $this->level_workshop;
    }

    /**
     * Set the value of level_workshop
     *
     * @return  self
     */
    public function setLevel_workshop($level_workshop)
    {
        $this->level_workshop = $level_workshop;

        return $this;
    }

    /**
     * Get the value of level_castle
     */
    public function getLevel_castle()
    {
        return $this->level_castle;
    }

    /**
     * Set the value of level_castle
     *
     * @return  self
     */
    public function setLevel_castle($level_castle)
    {
        $this->level_castle = $level_castle;

        return $this;
    }

    /**
     * Get the value of level_farm
     */
    public function getLevel_farm()
    {
        return $this->level_farm;
    }

    /**
     * Set the value of level_farm
     *
     * @return  self
     */
    public function setLevel_farm($level_farm)
    {
        $this->level_farm = $level_farm;

        return $this;
    }

    /**
     * Get the value of level_sawmill
     */
    public function getLevel_sawmill()
    {
        return $this->level_sawmill;
    }

    /**
     * Set the value of level_sawmill
     *
     * @return  self
     */
    public function setLevel_sawmill($level_sawmill)
    {
        $this->level_sawmill = $level_sawmill;

        return $this;
    }

    /**
     * Get the value of level_extractor
     */
    public function getLevel_extractor()
    {
        return $this->level_extractor;
    }

    /**
     * Set the value of level_extractor
     *
     * @return  self
     */
    public function setLevel_extractor($level_extractor)
    {
        $this->level_extractor = $level_extractor;

        return $this;
    }

    /**
     * Get the value of level_quarry
     */
    public function getLevel_quarry()
    {
        return $this->level_quarry;
    }

    /**
     * Set the value of level_quarry
     *
     * @return  self
     */
    public function setLevel_quarry($level_quarry)
    {
        $this->level_quarry = $level_quarry;

        return $this;
    }

    /**
     * Get the value of level_mine
     */
    public function getLevel_mine()
    {
        return $this->level_mine;
    }

    /**
     * Set the value of level_mine
     *
     * @return  self
     */
    public function setLevel_mine($level_mine)
    {
        $this->level_mine = $level_mine;

        return $this;
    }

    /**
     * Get the value of level_barracks
     */
    public function getLevel_barracks()
    {
        return $this->level_barracks;
    }

    /**
     * Set the value of level_barracks
     *
     * @return  self
     */
    public function setLevel_barracks($level_barracks)
    {
        $this->level_barracks = $level_barracks;

        return $this;
    }

    /**
     * Get the value of town_mana
     */
    public function getTown_mana()
    {
        return $this->town_mana;
    }

    /**
     * Set the value of town_mana
     *
     * @return  self
     */
    public function setTown_mana($town_mana)
    {
        $this->town_mana = $town_mana;

        return $this;
    }

    /**
     * Get the value of town_mail
     */
    public function getTown_mail()
    {
        return $this->town_mail;
    }

    /**
     * Set the value of town_mail
     *
     * @return  self
     */
    public function setTown_mail($town_mail)
    {
        $this->town_mail = $town_mail;

        return $this;
    }

    /**
     * Get the value of town_leather
     */
    public function getTown_leather()
    {
        return $this->town_leather;
    }

    /**
     * Set the value of town_leather
     *
     * @return  self
     */
    public function setTown_leather($town_leather)
    {
        $this->town_leather = $town_leather;

        return $this;
    }

    /**
     * Get the value of town_sword
     */
    public function getTown_sword()
    {
        return $this->town_sword;
    }

    /**
     * Set the value of town_sword
     *
     * @return  self
     */
    public function setTown_sword($town_sword)
    {
        $this->town_sword = $town_sword;

        return $this;
    }

    /**
     * Get the value of town_bow
     */
    public function getTown_bow()
    {
        return $this->town_bow;
    }

    /**
     * Set the value of town_bow
     *
     * @return  self
     */
    public function setTown_bow($town_bow)
    {
        $this->town_bow = $town_bow;

        return $this;
    }

    /**
     * Get the value of town_crossbow
     */
    public function getTown_crossbow()
    {
        return $this->town_crossbow;
    }

    /**
     * Set the value of town_crossbow
     *
     * @return  self
     */
    public function setTown_crossbow($town_crossbow)
    {
        $this->town_crossbow = $town_crossbow;

        return $this;
    }

    /**
     * Get the value of pcclh_parties
     */
    public function getPcclh_parties()
    {
        return $this->pcclh_parties;
    }

    /**
     * Set the value of pcclh_parties
     *
     * @return  self
     */
    public function setPcclh_parties($pcclh_parties)
    {
        $this->pcclh_parties = $pcclh_parties;

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
     * Get the value of view
     */
    public function getView()
    {
        return $this->view;
    }

    /**
     * Set the value of view
     *
     * @return  self
     */
    public function setView($view)
    {
        $this->view = $view;

        return $this;
    }
}
