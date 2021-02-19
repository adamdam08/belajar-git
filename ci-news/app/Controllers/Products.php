<?php

namespace App\Controllers;

use App\Models\Product_model;


class Products extends BaseController
{
    public function __construct()
    {
        $this->product_model = new \App\Models\Product_model();
    }

    public function index()
    {
        $data["products"] = $this->product_model->getAll();
        return view("admin/product/list", $data);
    }

    public function add()
    {
        $data['validation'] = \Config\Services::validation();
        return view("admin/product/new_form", $data);
    }

    public function savedata()
    {
        $product = $this->product_model;
        $validation =  \Config\Services::validation();
        $validation->setRules($product->rules());
        $isDataValid = $validation->withRequest($this->request)->run();

        $data = [
            'validation' => \Config\Services::validation()
        ];

        $db = \Config\Database::connect();

        $data = [
            "product_id" => uniqid(),
            "name" => $this->request->getVar('name'),
            "price" => $this->request->getVar('price'),
            "image" => "default.jpg",
            "description" => $this->request->getVar('description'),
        ];

        $db->table('products')->insert($data);

        return redirect()->to('index');
    }

    public function edit($id = null)
    {
        $data = [
            'validation' => \Config\Services::validation()
        ];
        $data["products"] = $this->product_model->getByid($id);
        return view("admin/product/edit_form", $data);
    }

    public function update($id = null)
    {
        $product = $this->product_model;
        $validation =  \Config\Services::validation();
        $validation->setRules($product->rules());
        $isDataValid = $validation->withRequest($this->request)->run();

        $data = [
            'validation' => \Config\Services::validation()
        ];

        $db = \Config\Database::connect();

        $data = [
            "name" => $this->request->getVar('name'),
            "price" => $this->request->getVar('price'),
            "image" => "default.jpg",
            "description" => $this->request->getVar('description'),
        ];

        $db->table('products')->where('product_id', $id)->update($data);

        return redirect()->to('../products');
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->product_model->delete($id)) {
            return redirect()->to('../products');
        }
    }
}
