<?php

namespace App\Models;

use CodeIgniter\Model;

class Product_model extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'product_id';
    protected $useTimestamps = true;
    protected $allowedFields = ['product_id', 'name', 'price', 'image', 'description'];

    public function rules()
    {
        return [
            ['field' => 'name', 'label' => 'Name', 'rules' => 'required'],
            ['field' => 'price', 'label' => 'Price', 'rules' => 'numeric'],
            ['field' => 'descriptiion', 'label' => 'Descriptiion', 'rules' => 'required']
        ];
    }

    public function getAll()
    {
        $db = \Config\Database::connect();
        $query = $db->table('products')->get();

        return $query->getResult();
    }

    public function getByid($id = false)
    {
        if ($id == false) {
            return false;
        }

        return $this->getWhere(['product_id' => $id])->getResult();
    }

    public function delete_data($id)
    {
        $db      = \Config\Database::connect();
        return $db->table('products')->delete(['product_id' => $id]);
    }
}
