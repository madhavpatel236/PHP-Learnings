 <?php

class practice{
    public $name='';
    public $team='';

    function __construct($myName, $myTeam){
        $this->name = $myName;
    }

    function __destruct(){
        echo ' Here we print the name from the __destruct, name: ' . $this->name . '<br />' ;
        echo ' Here we print the Team from the __destruct, Team: ' . $this->team ;

    }
}

$value = new practice('madhav', myTeam: 'RCB');
// echo $value->name

?> 