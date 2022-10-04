<?php
    session_start();
    if(isset($_POST['action'])){
        switch($_POST['action']){
            case 'create': 
                $name = strip_tags($_POST['name']);
                $slug = strip_tags($_POST['slug']);
                $description = strip_tags($_POST['description']);
                $features = strip_tags($_POST['features']);
                $brand_id = strip_tags($_POST['brand_id']);

                $img = $_FILES["imagen"]["tmp_name"];

                $productController = new ProductsController();

                $productController->createProducts($name,$slug,$description,$features,$brand_id,$img);

            break;
        }
    }

    Class ProductsController{

        public function getProducts($token){
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer $token",
                'Cokie: XSRF-TOKEN=eyJpdiI6InRGV1l6NTZNMXlsQUFuMkJrU2ZKOEE9PSIsInZhbHVlIjoiVWc5WWxGM2ZhbzlLRlhYYzB2ZnZ6MDRHVVJWaHJWNFdkMzVsLzZXZ1FyUGxtNVZnZ0h3Z2VMQmtZQnZBVHVJeEZONWU0dkFqcVVkSDVQdHpOMnM1YWJtd2RBalIxSW1XSUpPOHBqeE1SYzZvUk55M3VueVRZWXhlRFQ2VnoxNkwiLCJtYWMiOiIwZjQ0MTM5ZTYwMmJkMjJkMTkxNzUwZTMzZDdjZTNiMGUzMDY1YTE3NTM5MGJjMjg0ZjYxYTFkZjQyOWFjZTI1IiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6InVkMU5jMzdneWZ0NmV6aWg5blZUQlE9PSIsInZhbHVlIjoic29DK2NXNGRBQ3JTYlZjdmxzVGFYL3FIM0pnRnI1T3FDdXRvMm8xOTZlOXVnZG04Rjc2TlpJVll3aW40OGd5Ny9Rdm9ublRYdTVrc1pFVytWQWtRUHhOTmhrWkRjTGQvRWo4bVQ4UGFtUXBlNlBScWFvcmEvUVlVMFAxZE14NUEiLCJtYWMiOiI0ZDUxZjhmZmMxNDliMjM4YWY1YmE2OTZmOWNlYjY2ZWFiYjZmZjAyM2NjM2U4MzlhZmJmMDMxMmZhNzk3MWY1IiwidGFnIjoiIn0%3D'
            ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
    
            $response = json_decode($response, true);

            return $response['data'];
        }


        public function createProducts($name,$slug,$description,$features,$brand_id,$img){

            // if (isset($_FILES['imagen'])) {
            //     $img = $_FILES['imagen']['tmp_name'];
            //     $picture = file_get_contents($img);
            // }

            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer '.$_SESSION['token']
            ),
            CURLOPT_POSTFIELDS => array(
                'name' => $name,
                'slug' => $slug,
                'description' => $description,
                'features' => $features,
                'brand_id' => $brand_id,
                'cover'=> new CURLFILE($img)
            ),
               
            ));

            $response = curl_exec($curl);
            curl_close($curl);
            $response = json_decode($response);
            echo $img;

            if(isset($response->code) && $response->code > 0){
                //var_dump($response);
                //var_dump($img);
                header("Location: ../products?success=true");
            }else{

                //var_dump($response);
                //var_dump($img);
                header("Location: ../products?error=true");
                
            }

            
        }

    }


?>