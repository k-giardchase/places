<?php

    class Place
    {
        private $city_name;

        function __construct($user_city_name)
        {
            $this->city_name = $user_city_name;
        }

        function setCityName($new_city_name)
        {
            $this->city_name = (string) $new_city_name;
        }

        function getCityName()
        {
            return $this->city_name;
        }

        function save()
        {
            array_push($_SESSION['list_of_cities'], $this);
        }

        static function getAll()
        {
            return $_SESSION['list_of_cities'];
        }

        static function deleteAll()
        {
            $_SESSION['list_of_cities'] = array();
        }


    }

?>
