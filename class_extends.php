<?php

/*
 ПРАКТИЧЕСКОЕ ЗАДАНИЕ
Необходимо с помощью классов описать сущности city, stadium и team.

Создайте три класса, в которых будут описаны свойства и методы по модификации этих свойств и их получения (get и set).
При этом в классе Team в качестве свойств стадиона и города должны выступать классы City и Stadium, а в классе Stadium
в качестве свойства города должен выступать класс City.

Напишите функцию, которая в качестве аргумента будет принимать
 набор ваших данных:
- команда - "динамо киев"
- город - "киев"
- лого - "какая-то строка"
- стадион - "олимпийский"
- вместимость - 67000

Необходимо создать объект класса Team на основе передаваемых данных и заполнить все его свойства всеми необходимыми
данным, включая связанные с ним классы City и Stadium.

Примечание

В классе Team в конструкторе будут создаваться объект класса City
и объект класса Stadium, а в конструкторе класса
 Stadium также будет создавать объект класса City.
 */
$city_name='Киев';

$stadium_name='Олимпийский';
$opacity=67000;

$team_name='Динамо-Киев';
$logo='notherstring';

class City
{

    protected $city_name;

    public function __construct($city_name)
    {
        $this->city_name = $city_name;
    }

    public function setCity($city_name)
    {
        $this->city_name = $city_name;
    }

    public function getCity()
    {
        return $this->city_name;
    }
}

class Stadium extends City
{
    protected $stadium_name;
    protected $opacity;

    public function __construct($stadium_name, $opacity, $city_name)
    {
        $this->stadium_name = $stadium_name;
        $this->opacity = $opacity;
        parent::__construct($city_name);


    }

    public function setStadium($stadium_name)
    {
        $this->stadium_name = $stadium_name;
    }

    public function getStadium()
    {
        return $this->stadium_name;
    }

    public function setOpacity($opacity)
    {
        $this->opacity = $opacity;
    }

    public function getOpacity()
    {
        return $this->opacity;
    }
}

class Team extends Stadium
{
    private $team_name;
    private $logo;

    public function __construct($team_name, $logo, $stadium_name, $opacity, $city_name)
    {
        $this->team_name = $team_name;
        $this->logo = $logo;
        parent::__construct($stadium_name, $opacity, $city_name);
    }

    public function setTeam($team_name)
    {
        $this->team_name = $team_name;
    }

    public function getTeam()
    {
        return $this->team_name;
    }

    public function setLogo($logo)
    {
        $this->logo = $logo;
    }

    public function getLogo()
    {
        return $this->logo;
    }
}

$work = new Team($stadium_name, $opacity, $city_name, $logo, $team_name);
print_r($work);