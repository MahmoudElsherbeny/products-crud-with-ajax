<?php 

namespace App\Classes;

use App\Core\CsrfToken;
use App\Core\View;
use App\Services\ProductService;

class ProductsClass extends ProductService
{
	private function csrf() {
		return new CsrfToken();
	}
	
	public function list()
	{
        $csrf_token = CsrfToken::generateToken('delete_products_token');
        $products = $this->retrieve();
        return View::display('products/list.php', 'Products List', ['products' => $products]);
	}

	public function create()
	{
        $csrf_token = CsrfToken::generateToken('create_product_token');
        return View::display('products/create.php', 'Create Product');
	}

    public function store()
	{
        try {
            $csrfTokenValidate = $this->csrf()->validateToken('create_product_token', $_POST['_token']);

            if($csrfTokenValidate) {
                $validateData = $this->validate();
                if($validateData != null) {
                    echo json_encode(['errors' => $validateData, 'redirect' => $_SERVER['HTTP_REFERER']]);
                } else{
                    $product = $this->storeProduct($_POST);
                    echo json_encode(['errors' => null, 'redirect' => '/']);
                }
            }
        } catch (\Exception $e) { }
	}

    public function delete_multiple()
	{
        try {
            $csrfTokenValidate = $this->csrf()->validateToken('delete_products_token', $_POST['_token']);

            if($csrfTokenValidate) {
                $delete_products = $this->deleteProducts($_POST['delete_products']);
            }
        } catch (\Exception $e) {}

        echo json_encode(['redirect' => $_SERVER['HTTP_REFERER']]);
	}
}