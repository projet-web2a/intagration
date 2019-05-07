<?php

class avis 
{


private $marque;
private $commentaire;
private $note;
private $refe;
private $username;
    
    function __construct($marque,$commentaire,$note,$refe,$username)
    {
      
        $this->marque=$marque;
        $this->commentaire=$commentaire;
        $this->note=$note;
        $this->refe=$refe;
        $this->username=$username;
        
    }
   
 function get_marque()
    {
    return $this->marque;
    }
     function get_commentaire()
    {
    return $this->commentaire;
    } 
    function get_note()
    {
        return $this->note;
    }
   function get_refe()
    {
        return $this->refe;
    }
    function get_username()
    {
        return $this->username;
    }


} 
?>