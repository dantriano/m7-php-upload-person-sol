<?php

class Person
{
    private $_name;
    private $_surnamename;
    private $_picture;
    private $_comments;
    private $_address;

    public function setName($name)
    {
        $this->_name = $name;
    }
    public function setSurname($surname)
    {
        $this->_surnamename = $surname;
    }
    public function setPicture($picture)
    {
        $this->_picture = $picture;
    }
    public function setComments($comments)
    {
        $this->_comments = $comments;
    }
    public function setAddress($address)
    {
        $this->_address = $address;
    }

    public function getName()
    {
        return $this->_name;
    }
    public function getSurname()
    {
        return $this->_surnamename;
    }
    public function getPicture()
    {
        return $this->_picture;
    }
    public function getComments()
    {
        return $this->_comments;
    }
    public function getAddress()
    {
        return $this->_address;
    }
}
