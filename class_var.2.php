<?php
$city_name='Киев';

$stadium_name='Олимпийский';
$opacity=67000;

$team_name='Динамо-Киев';
$logo='notherstring';


class City
{

    private $city_name;

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

class Stadium
{
    private $stadium_name;
    private $opacity;

    public function __construct($stadium_name, $opacity, $city_name)
    {
        $this->stadium_name = $stadium_name;
        $this->opacity = $opacity;
        $this->city_name = new City($city_name);

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

class Team
{
    private $team_name;
    private $logo;

    public function __construct($stadium_name, $opacity, $city_name, $logo, $team_name)
    {
        $this->team_name = $team_name;
        $this->logo = $logo;
        $this->stadium = new Stadium($stadium_name, $opacity, $city_name);

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

    /*
     public function getSt(){
         return $this->stadium_name.$this->opacity.$this->getCity($this->city_name);
     }
    */
}

$a=new Team($stadium_name, $opacity, $city_name);
echo $a->getSt();
//echo getCity($team_name);

//$work = new Team($stadium_name, $opacity, $city_name, $logo, $team_name);
//print_r($work);

//$work2 = new Stadium($stadium_name, $opacity, $city_name, $logo, $team_name);
//print_r($work2);