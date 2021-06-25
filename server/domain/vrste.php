<?php

    class Vrsta{

        public $IDVrste;
        public $NazivVrste;

        public function __construct($IDVrste,$NazivVrste){

            $this->IDVrste = $IDVrste;
            $this->NazivVrste = $NazivVrste;
        }

        public static function vratiSve($db){

            $query = "SELECT * FROM vrstarecepta";
            $result = $db->query($query);
            $array = [];
            while($r = $result->fetch_assoc()){

                $vrsta = new Vrsta($r['IDVrste'],$r['NazivVrste']);
                array_push($array,$vrsta);
            }
            return $array;
        }
       
    }

?>


