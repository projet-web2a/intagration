<?PHP
class Promotion{

    private $Id_promotion;
    private $Datedebut;
    private $Datefin;
    private $IdProduit;
    private $Categorie;
    private  $Taux;
    private  $Prixfinal;
private $lu;

    public   function __construct($Id_promotion,$Datedebut,$Datefin,$IdProduit,$Categorie,$Taux,$Prixfinal,$lu){
        $this->Id_promotion=$Id_promotion;
        $this->Datedebut=$Datedebut;
        $this->Datefin=$Datefin;
        $this->IdProduit=$IdProduit;
        $this->Categorie=$Categorie;
        $this->Taux=$Taux;
        $this->Prixfinal=$Prixfinal;
        $this->lu=$lu;
    }
    public    function getId(){
        return $this->Id_promotion;
    }

    public   function getDatedebut()
    {
        return  $this->Datedebut;
    }
    public  function getDatefin()
    {
        return $this->Datefin;
    }
    public  function getRefe()
    {
        return $this->IdProduit;
    }
    public  function getCategorie()
    {
        return $this->Categorie;
    }

    public  function getTaux()
    {
        return $this->Taux;
    }
    public  function getPrix()
    {
        return $this->Prixfinal;
    }
    public  function getLu()
    {
        return $this->lu;
    }



}

?>