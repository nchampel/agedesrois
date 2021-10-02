<?php

namespace Models;

class Player
{
    private $pseudo;
    private $townFood;
    private $townGold;

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
     * Get the value of townGold
     */
    public function getTownGold()
    {
        return $this->townGold;
    }

    /**
     * Set the value of townGold
     *
     * @return  self
     */
    public function setTownGold($townGold)
    {
        $this->townGold = $townGold;

        return $this;
    }

    /**
     * Get the value of townFood
     */
    public function getTownFood()
    {
        return $this->townFood;
    }

    /**
     * Set the value of townFood
     *
     * @return  self
     */
    public function setTownFood($townFood)
    {
        $this->townFood = $townFood;

        return $this;
    }
}
