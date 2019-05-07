<?PHP
class Participation{
    private $Id_participation;
    private $Username;
    private $Id_evenement;
    public   function __construct($Id_participation,$Id_evenement,$Username){
        $this->Id_participation=$Id_participation;
        $this->Id_evenement=$Id_evenement;
        $this->Username=$Username;
    }
    public    function getIdpart(){
        return $this->Id_participation;
    }
    public  function getUser()
    {
        return $this->Username;
    }
    public   function getIdevent()
    {
        return  $this->Id_evenement;
    }


}

?>