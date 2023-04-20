<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class BukuMenuController extends ResourceController
{
    protected $modelName = 'App\Models\BukuMenu';
    protected $format = 'json';
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data = [
            'message' => 'berhasil',
            'kategori_menu' => $this->model->orderBy('id', 'DESC')->findall(),
        ];

        return $this->respond($data, 200);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $data = [
            'message' => 'berhasil',
            'kategori_menu_byid' => $this->model->find($id),
        ];
        if($data['kategori_menu_byid']==null){
            return $this->failNotFound('id tidak ditemukan');
        ;
        }

        return $this->respond($data, 200);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $rules= $this->validate([
            'jenis_menu' => 'required',
        ]);

        if(!$rules){
            $response = [
                'message' => $this->validator->getErrors(),
            ];
            return $this->failValidationErrors($response);
        };


        $this->model->insert([
            'jenis_menu' => esc($this->request->getVar('jenis_menu')),

        ]);
        $response =[
            'message' => 'data kategori masuk',
        ];

        return $this->respondCreated($response);
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $rules= $this->validate([
            'jenis_menu' => 'required',
        ]);

        if(!$rules){
            $response = [
                'message' => $this->validator->getErrors(),
            ];
            return $this->failValidationErrors($response);
        };


        $this->model->update($id,[
            'jenis_menu' => esc($this->request->getVar('jenis_menu')),

        ]);
        $response =[
            'message' => 'data kategori diubah',
        ];

        return $this->respondCreated($response, 200);
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->model->delete($id);

        $response =[
            'message' => 'data kategori dihapus!',
        ];

        return $this->respondDeleted($response);
    }
}
