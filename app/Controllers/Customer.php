<?php

namespace App\Controllers;

use App\Models\CustomersModel;

class Customer extends BaseController
{
    protected $customers;
    public function __construct()
    {
        $this->customers = new CustomersModel();
    }
    public function index()
    {
        $customers = $this->customers->getCustomer();
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $customers = $this->customers->search($keyword);
        }
        $data = [
            'title' => 'Dashboard',
            'customers' => $customers
        ];
        return view('pages/home', $data);
    }
    public function detail($id)
    {
        $data = [
            'title' => 'Detail Customer',
            'customer' => $this->customers->getCustomer($id)
        ];

        if (empty($data['customer'])) {
            return view('pages/notfound', $data);
        }

        return view('pages/detail', $data);
    }
    public function create()
    {
        $data = [
            'title' => 'Tambah Data'
        ];
        return view('pages/create', $data);
    }
    public function save()
    {
        if (!$this->validate([
            'name' => [
                'rules' => 'required'
            ],
            'email' => [
                'rules' => 'required'
            ],
            'photo' => [
                'rules' => 'uploaded[photo]',
                'max_size[photo,1024]',
                'is_image[photo]',
                'mime_in[photo,image/jpg,image/jpeg,image/png]'
            ],
        ])) {
            return redirect()->to('/')->withInput();
        }
        $file_photo = $this->request->getFile('photo');
        $file_photo->move('dist/img', $file_photo->getName());

        $this->customers->save([
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'photo' => $file_photo->getName(),
        ]);
        session()->setFlashdata('message', 'Data successfully added!');
        return redirect()->to('/');
    }
    public function delete($id)
    {
        $this->customers->delete($id);
        session()->setFlashdata('message', 'Data successfully deleted!');
        return redirect()->to('/');
    }
    public function edit($id)
    {
        $data = [
            'title' => 'Edit Customer',
            'customer' => $this->customers->getCustomer($id)
        ];
        return view('pages/edit', $data);
    }
    public function update($id)
    {
        if (!$this->validate([
            'name' => [
                'rules' => 'required'
            ],
            'email' => [
                'rules' => 'required'
            ],
            'photo' => [
                'rules' => 'uploaded[photo]',
                'max_size[photo,1024]',
                'is_image[photo]',
                'mime_in[photo,image/jpg,image/jpeg,image/png]'
            ],
        ])) {
            return redirect()->to('/')->withInput();
        }
        $file_photo = $this->request->getFile('photo');
        $file_photo->move('dist/img', $file_photo->getName());

        $this->customers->save([
            'id' => $id,
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'photo' => $file_photo->getName(),
        ]);
        session()->setFlashdata('message', 'Data successfully edited!');
        return redirect()->to('/');
        // if (!$this->validate([
        //     'name' => [
        //         'rules' => 'required'
        //     ],
        //     'email' => [
        //         'rules' => 'required'
        //     ],
        //     'photo' => [
        //         'rules' => 'uploaded[photo]',
        //         'max_size[photo,1024]',
        //         'is_image[photo]',
        //         'mime_in[photo,image/jpg,image/jpeg,image/png]'
        //     ],
        // ])) {
        //     return redirect()->to('/')->withInput();
        // }
        // $file_photo = $this->request->getFile('photo');
        // $file_photo->move('dist/img', $file_photo->getName());
        // $this->customers->save([
        //     'id' => $id,
        //     'name' => $this->request->getVar('name'),
        //     'email' => $this->request->getVar('email'),
        //     'photo' => $file_photo->getName(),
        // ]);
        // session()->setFlashdata('message', 'Data successfully Edited!');
        // return redirect()->to('/');
    }
}
