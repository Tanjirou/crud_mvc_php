<?php 
    require_once '../config/connection.php';
    require_once '../models/product.php';
    $product = new Product();
    switch($_GET['option']){
        case 'list':
            $datum =$product->getProducts(1);
            $data = array();
            foreach($datum as $row){
                $subArray = [];
                $subArray[] = $row['description'];
                $subArray[] = '<button type="button" onclick="edit('.$row['id'].');" id="'.$row['id'].'" class="btn btn-outline-primary btn-icon"><i class="fa fa-edit"></i></button>';
                $subArray[] = '<button type="button" onclick="delete('.$row['id'].');" id="'.$row['id'].'" class="btn btn-outline-danger btn-icon"><i class="fa fa-trash"></i></button>';
                $data[] = $subArray;
            }
            $results = [
                'sEcho' =>1,
                'iTotalRecords' => count($data),
                'iTotalDisplayRecords' => count($data),
                'aaData' => $data
            ];
            echo json_encode($results);
            break;
    }
?>