<?php 
    class Conecction{
        protected $databaseHost;
        protected function conecction(){
            try{
                $conecction = $this->databaseHost = new PDO('mysql:host=localhost;dbname=crud_php_mvc','root','');
                return $conecction;
            }catch(Exception $e){
                print 'Error BD!: '. $e->getMessage().'<br>';
                die();
            }
        }
        public function setNames(){
            return $this->databaseHost->query("SET NAMES 'utf8'");
        }
    }
?>