<?php

namespace App\Controllers;

use App\Models\CustomersModel;

class Home extends BaseController
{
    protected $customers;
    public function __construct()
    {
        $this->customers = new CustomersModel();
    }
    public function index()
    {
        $customers = $this->customers->findAll();
        $data = [
            'title' => 'Dashboard',
            'customers' => $customers
        ];
        return view('pages/home', $data);
    }
}
