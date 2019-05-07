<?php

class Rdv
{
	private $dateR;
	private $timeR;
	private $refP;
	private $user;
	
	function __construct($date,$time,$refP,$u)
	{
		$this->dateR=$date;
		$this->timeR=$time;
		$this->refP=$refP;
		$this->user=$u;
	}
	
	
	function getDateR()
	{
		return $this->dateR;
	}
	
	function getTime()
	{
		return $this->timeR;
	}
	
	function getRefp()
	{
		return $this->refP;
	}
	function getUser()
	{
		return $this->user;
	}
}