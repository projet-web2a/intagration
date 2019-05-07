<?PHP
class Evenement{
    private $Nom;
    private $Id;
    private $Datedebut;
    private $Datefin;
    private $Nbrparticipant;
    private $Nbrvue;
    private  $Image;
    public   function __construct($Id,$Nom,$Datedebut,$Datefin,$Nbrparticipant,$Nbrvue,$Image,$Description){
        $this->Nom=$Nom;
        $this->Id=$Id;
        $this->Datedebut=$Datedebut;
        $this->Datefin=$Datefin;
        $this->Nbrparticipant=$Nbrparticipant;
        $this->Nbrvue=$Nbrvue;
        $this->Image=$Image;
        $this->Description=$Description;

    }
    public    function getNom(){
        return $this->Nom;
    }
 public  function getId()
 {
     return $this->Id;
 }
    public   function getDatedebut()
    {
        return  $this->Datedebut;
    }
    public  function getDatefin()
{
    return $this->Datefin;
}
 public  function getNbrparticipant()
 {
     return $this->Nbrparticipant;
 }
 public  function getNbrvue()
 {
     return $this->Nbrvue;
 }

  public  function getImage()
  {
      return $this->Image;
  }
    public    function getDes(){
        return $this->Description;
    }

}

?>