<?php

class detail
{
    public $playerName = '';
    public $playerTeam = '';


    function set_playerName($name)
    {
        $this->playerName = $name;
    }

    function get_playerName()
    {
        return $this->playerName;
    }

    function set_team($team)
    {
        $this->playerTeam = $team;
    }

    function get_team()
    {
        return $this->playerTeam;
    }
}


$data = new detail();
$data->set_playerName('madhav');
// echo $val->playerName;
echo $data->get_playerName();
echo "<br />";

$data->set_team("rcb");
echo $data->get_team();
