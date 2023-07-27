<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomersModel extends Model
{
    protected $table = 'customers';
    protected $useTimestamps = true;
    protected $allowedFields = ['name', 'email', 'photo'];

    public function getCustomer($id = false)
    {
        if (!$id) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
    public function search($keyword)
    {
        return $this->table('customers')->like('name', $keyword)->orLike('email', $keyword);
    }
}
