<?php

namespace Models;

class Transaction
{
    private $id_seller;
    private $id_buyer;
    private $article_type;
    private $selling_date;
    private $buying_date;

    /**
     * Get the value of id_seller
     */
    public function getId_seller()
    {
        return $this->id_seller;
    }

    /**
     * Set the value of id_seller
     *
     * @return  self
     */
    public function setId_seller($id_seller)
    {
        $this->id_seller = $id_seller;

        return $this;
    }

    /**
     * Get the value of id_buyer
     */
    public function getId_buyer()
    {
        return $this->id_buyer;
    }

    /**
     * Set the value of id_buyer
     *
     * @return  self
     */
    public function setId_buyer($id_buyer)
    {
        // if(is_null($id_buyer)) {
        //     $this->id_buyer = $id_buyer;
        //     return $this;
        // }
        $this->id_buyer = $id_buyer;

        return $this;
    }

    /**
     * Get the value of article_type
     */
    public function getArticle_type()
    {
        return $this->article_type;
    }

    /**
     * Set the value of article_type
     *
     * @return  self
     */
    public function setArticle_type($article_type)
    {
        $this->article_type = $article_type;

        return $this;
    }

    /**
     * Get the value of selling_date
     */
    public function getSelling_date()
    {
        return $this->selling_date;
    }

    /**
     * Set the value of selling_date
     *
     * @return  self
     */
    public function setSelling_date($selling_date)
    {
        $this->selling_date = $selling_date;

        return $this;
    }

    /**
     * Get the value of buying_date
     */
    public function getBuying_date()
    {
        return $this->buying_date;
    }

    /**
     * Set the value of buying_date
     *
     * @return  self
     */
    public function setBuying_date($buying_date)
    {
        $this->buying_date = $buying_date;

        return $this;
    }
}
