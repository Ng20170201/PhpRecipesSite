<?php 

class Recept{
   
    public $IDRecepta;
    public $naziv;
    public $ocena;
    public $opis;
    public $vrsta;
   

    public function __construct($IDRecepta,$naziv,$ocena,$opis,$vrsta)
	{
        $this->IDRecepta=$IDRecepta;
        $this->naziv=$naziv;
        $this->ocena=$ocena;
        $this->opis=$opis;
        $this->vrsta=$vrsta;
	}

    public function UbaciRecept($data,$db){
		
		if($data['naziv'] === '' || $data['ocena'] === '' || $data['opis'] === ''){
		$this-> poruka ='Polja moraju biti popunjena';
		
		}else{
		
			$save=$db->query("INSERT INTO receptii(naziv,ocena,opis,IDVrste) VALUES ('".$data['naziv']."','".$data['ocena']."','".$data['opis']."','".$data['IDVrste']."')") or die($db->error);
			if($save){
				$this -> poruka = 'Uspesno sacuvan recept';
			}else{
				$this -> poruka = 'Neuspesno sacuvan recept';
			}
		}
	}

    public function getPoruka(){
		return $this -> poruka;
	}

	public static function vratiSve($db,$uslov){
		$query="SELECT * FROM receptii r JOIN vrstarecepta v ON r.IDVrste=v.IDVrste".$uslov;
		$query=trim($query);
        $result=$db->query($query) or die($db->error);
        $array=[];
        while($r = $result->fetch_assoc()){
			$vrsta=new Vrsta($r['IDVrste'],$r['NazivVrste']);
			$recept=new Recept($r['IDRecepta'],$r['naziv'],$r['ocena'],$r['opis'],$vrsta);
            array_push($array,$recept);
            }
        return $array;
    }


}

?>

