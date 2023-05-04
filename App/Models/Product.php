<?php 

namespace App\Models;

use App\Core\Model;

class Product extends Model
{
    public $table_name = 'products';

    public function __construct()
    {
        parent::__construct($this->table_name);
    }

    public function getProducts()
    {
        return $this->all(Self::class);
    }

    public function getProductAttributes($prod_attributes)
    {
        return json_decode($prod_attributes, true);
    }
}