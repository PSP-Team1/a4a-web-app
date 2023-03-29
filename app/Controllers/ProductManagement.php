<?php

namespace App\Controllers;

use App\Models\ProductsModel;
use App\Models\PromoCodesModel;

class ProductManagement extends BaseController
{

    public function index()
    {
        $prodModel = new ProductsModel();
        $codeModel = new PromoCodesModel();

        $data['products'] = $prodModel->getAllProducts();
        $data['promo_codes'] = $codeModel->getPromoCodes();


        return view('ProductManagement', $data);
    }

    public function activate($id)
    {
        $model = new ProductsModel();
        $model->setLive($id, true);
        return redirect()->to('/ProductManagement');
    }

    public function deactivate($id)
    {
        $model = new ProductsModel();
        $model->setLive($id, false);
        return redirect()->to('/ProductManagement');
    }

    public function delete($id)
    {
        $model = new ProductsModel();
        $model->deleteProduct($id);
        return redirect()->to('/ProductManagement');
    }


    public function addProduct()
    {
        $model = new ProductsModel();

        $productName = $this->request->getPost('productName');
        $productPrice = $this->request->getPost('productPrice');
        $productDescription = $this->request->getPost('productDescription');
        $productUnits = $this->request->getPost('productUnits');

        $data = [
            'product_name' => $productName,
            'price' => $productPrice,
            'description' => $productDescription,
            'units' => $productUnits
        ];

        $model->insert($data);

        return redirect()->to('/ManageProducts');
    }

    public function addPromoCode()
    {
        $model = new PromoCodesModel();

        $data = [
            'product_id' => $this->request->getPost('product_id'),
            'code' => $this->request->getPost('code'),
            'promo_name' => $this->request->getPost('promo_name'),
            'start' => $this->request->getPost('start'),
            'end' => $this->request->getPost('end')
        ];

        $model->insert($data);

        return redirect()->to('/ManageProducts');
    }
}
