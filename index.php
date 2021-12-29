<?php
//All interfaces 
interface Common {
    public function Sound();
    public function Eat();
    public function Move();
}
interface Dogs { public function Run(); }
interface Birds { public function Fly(); }
interface Ships { public function Run(); }


class Animals implements Common {
    public $sound = "sound";
    public $eat = "eat";

    public function Sound() { echo get_called_class()."`s sound is $this->sound.<br>"; }
    public function Eat() { echo get_called_class()."`s eat is $this->eat.<br>"; }
    
    //-------------------------------------------------------------------------


    public $deg=0;
    public $direction;

    public function Left(){
        $this->deg -=90; 
        if ($this->deg < 0) { $this->deg +=360; }
    }
    public function Right(){
        $this->deg +=90; 
        if ($this->deg >= 360) { $this->deg -=360; }
    }
    public function Move(){ 
        if ($this->deg == 0) { $this->direction="top";}
        elseif ($this->deg == 90) { $this->direction="right";}
        elseif ($this->deg == 180) { $this->direction="bottom";}
        elseif ($this->deg == 270) { $this->direction="left";}
        echo get_called_class()." is move to ".$this->direction."<br>"; 
    }

}

class Dog extends Animals implements Dogs {
    public function __construct(){
        $this->sound = 'hav-hav';
        $this->eat = 'meal';
    }
    
    public function Run(){ echo __CLASS__." is ".__FUNCTION__.".<br>"; }
}

class Ship extends Animals implements Ships {
    public function __construct(){
        $this->sound = 'me-me';
        $this->eat = 'grass';
    }
    
    public function Run(){ echo __CLASS__." is ".__FUNCTION__.".<br>"; }
}


class Bird extends Animals implements Birds {
    public function __construct(){
        $this->sound = 'cip-cip';
        $this->eat = 'grain';
    }
    
    public function fly(){ echo __CLASS__." is ".__FUNCTION__.".<br>"; }
}

$d= new Dog(); 
$d->Sound();
$d->Eat();
$d->Run();
$d->Right();
$d->Right();
$d->Move();
echo "<br>";

$b= new Bird(); 
$b->Sound();
$b->Eat();
$b->Left();
$b->Move();
$b->fly();
echo "<br>";

$s= new Ship(); 
$s->Sound();
$s->Eat();
$s->Run();
$s->Move();
