<?php 

namespace App\Services;

use App\Core\Validation;
use App\Models\Product;

abstract class ProductService
{
    private function model()
    {
       return new Product();
    }

    public function retrieve()
    {
        return $this->model()->getProducts();
    }

    public function storeProduct($data)
    {
        $attributes = null;
        if(!empty($data['size'])) {
            $attributes = ['size' => $data['size'].' MB'];
        }

        if(!empty($data['weight'])) {
            $attributes = ['weight' => $data['weight'].' KG'];
        }

        if(!empty($data['width']) && !empty($data['height']) && !empty($data['length'])){
            $attributes = ['dimensions' => $data['height'].'x'.$data['width'].'x'.$data['length']];
        }
         
        $product = $this->model()->create(
            ['sku', 'name', 'price', 'type', 'attributes'],
            [$data['sku'], $data['name'], $data['price'], $data['type'], json_encode($attributes)]
        );

        return $product;
    }

    public function deleteProducts($data)
    {
        if(!empty($data)) {
            return $this->model()->delete($data);
        }
    }

    /***************************************************/
    public function validate() 
    {
        $validator = new Validation();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $sku = $validator->check_input('sku', $_POST["sku"], ['required', 'max' => 255, 'unique' => ['products', 'sku']]);
            $name = $validator->check_input('name', $_POST["name"], ['required', 'max' => 255]);
            $price = $validator->check_input('price', $_POST["price"], ['required', 'numeric']);
            $type = $validator->check_input('productType', $_POST["type"], ['required', 'in_array' => ['dvd', 'book', 'furniture']]);
            if($_POST["type"] == 'dvd') {
                $size = $validator->check_input('size', $_POST["size"], ['required', 'numeric']);
            }
            elseif($_POST["type"] == 'book') {
                $weight = $validator->check_input('weight', $_POST["weight"], ['required', 'numeric']);
            }
            elseif($_POST["type"] == 'furniture') {
                $width = $validator->check_input('width', $_POST["width"], ['required', 'numeric']);
                $length = $validator->check_input('length', $_POST["length"], ['required', 'numeric']);
                $height = $validator->check_input('height', $_POST["height"], ['required', 'numeric']);
            }
        }

        $errors = $validator->get_errors();
        if(!empty($errors)) {
            session_start();
            foreach($errors as $key => $value) {
                $_SESSION[$key.'_error'] = $value;    
            }
        }

        return $errors;
    }

}