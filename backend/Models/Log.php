<?php

namespace Models;

class Log
{
    private $id_player;
    private $message;
    private $log_date;

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

    /**
     * Get the value of id_player
     */
    public function getId_player()
    {
        return $this->id_player;
    }

    /**
     * Get the value of message
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set the value of message
     *
     * @return  self
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get the value of log_date
     */
    public function getLog_date()
    {
        return $this->log_date;
    }

    /**
     * Set the value of log_date
     *
     * @return  self
     */
    public function setLog_date($log_date)
    {
        $this->log_date = $log_date;

        return $this;
    }
}
