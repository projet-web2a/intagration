<?php

class reclamation 
{
private $sujet ;
private $refe;
private $description;
private $date_reclamation;
private $etat;
private $username;

	
	function __construct($sujet,$refe,$description,$username,$date_reclamation)
	{
		$this->refe=$refe;
		$this->description=$description;
		$this->date_reclamation=$date_reclamation;
        $this->username=$username;
        $this->sujet=$sujet;

        
    }
 function get_sujet()
    {
    return $this->sujet;
    }

 function get_refe()
    {
    return $this->refe;
    }
     function get_username()
    {
    return $this->username;
    }
     function get_description()
    {
    return $this->description;
    } 
    function get_date_reclamation()
    {
        return $this->date_reclamation;
    }

} 
?>