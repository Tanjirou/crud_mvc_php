<?php 
    class Product extends Conecction{
        protected $conecction;
        public function __construct() {
            $this->conecction = parent::conecction();
            parent::setNames();
        }
        public function getProducts(int $status){
            $sql = 'SELECT * FROM products where status = ?';
            $sql = $this->conecction->prepare($sql);
            $sql->bindParam(1,$status);
            $sql->execute();
            return $result = $sql->fetchAll();
        }

        public function getProductId(int $id){
            $sql = 'SELECT * FROM products where id = ?';
            $sql = $this->conecction->prepare($sql);
            $sql->bindValue(1, $id);
            $sql->execute();
            return $result = $sql->fetchAll();
        }

        public function deleteProduct(int $id){
            $sql = "UPDATE products set status = 0, deleted_at = now() where id = ?";
            $sql = $this->conecction->prepare($sql);
            $sql->bindParam(1,$id);
            $sql->execute();
            return $result = $sql->fetchAll();
        }

        public function insertProduct(string $description){
            $sql = "INSERT INTO products (description, created_at, updated_at, deleted_at, status) value(?, now(),now(),null,1 )";
            $sql = $this->conecction->prepare($sql);
            $sql->bindParam(1, $description);
            $sql->execute();
            return $result = $sql->fetchAll();
        }

        public function updateProduct(int $id,string $description){
            $sql = "UPDATE products set description = ? , updated_at = now() where id = ?";
            $sql = $this->conecction->prepare($sql);
            $sql->bindParam(1,$description);
            $sql->bindParam(2,$id);
            $sql->execute();
            return $result = $sql->fetchAll();
        }
    }
?>