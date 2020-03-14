<?php

namespace App\Events;

use App\Product;

class ProductsCreating
{
    public $model;
    public $info = 'Creating';

    public function __construct(Product $product)
    {
        $this->model = $product;
    }

}
