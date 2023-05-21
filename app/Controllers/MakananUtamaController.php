<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class MakananUtamaController extends ResourceController
{
    protected $modelName = 'App\Models\MenuMakananUtamaModel';
    protected $format = 'json';
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data = [
            'message'=> 'data menu makanan utama terbaca!',
            'menu_makanan'=>$this->model->orderBy('id', 'ASCD')->findall(),
            
        ];

        return $this->respond($data,200);
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
            'menumakanan_byid' => $this->model->find($id),
        ];
        if($data['menumakanan_byid']==null){
            return $this->failNotFound('id tidak ditemukan');
        ;
        }

        return $this->respond($data, 200);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $rules= $this->validate([
            'id_kategori' => 'required',
            'menu_makanan' => 'required',
            'desc_makanan' => 'required',
            'harga' => 'required',
            'gambar_makanan' => 'required',
            //'gambar_makanan' => 'uploaded[gambar_makanan]|max_size[gambar_makanan,2048]|is_image[gambar_makanan]|mime_in[gambar_makanan,image/jpg,image/jpeg,image/png]',
        ]);

        if(!$rules){
            $response = [
                'message' => $this->validator->getErrors(),
            ];
            return $this->failValidationErrors($response);
        };

        //uploading gambar 
        /*$gambar_makanan = $this->request->getFile('gambar_makanan');
        $namaGambar= $gambar_makanan->getRandomName();
        $gambar_makanan->move('gambarMakanan', $namaGambar);*/


        $this->model->insert([
            'id_kategori' => esc($this->request->getVar('id_kategori')),
            'menu_makanan' => esc($this->request->getVar('menu_makanan')),
            'desc_makanan' => esc($this->request->getVar('desc_makanan')),
            'harga' => esc($this->request->getVar('harga')),
            'gambar_makanan' => esc($this->request->getVar('gambar_makanan')),
            //'gambar_makanan' => $namaGambar,

        ]);
        $response =[
            'message' => 'data makanan masuk',
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
            'id_kategori' => 'required',
            'menu_makanan' => 'required',
            'desc_makanan' => 'required',
            'harga' => 'required',
            'gambar_makanan' => 'required',
            //'gambar_makanan' => 'max_size[gambar_makanan,2048]|is_image[gambar_makanan]|mime_in[gambar_makanan,image/jpg,image/jpeg,image/png]',

        ]);

        if(!$rules){
            $response = [
                'message' => $this->validator->getErrors(),
            ];
            return $this->failValidationErrors($response);
        };

        //uploading gambar 
        /*$gambar_makanan = $this->request->getFile('gambar_makanan');
        if($gambar_makanan){
            $namaGambar= $gambar_makanan->getRandomName();
            $gambar_makanan->move('gambarMakanan', $namaGambar);

            $gambarDb = $this ->model->find($id);
            if($gambarDb['gambar_makanan'] == $this->request->getPost('gambarLama')){
                unlink('gambarMakanan/'.$this->request->getPost('gambarLama'));
            };
            
        }else{
            $namaGambar = $this->request->getPost('gambarLama');
        };*/
        
        

        $this->model->update($id,[
            'id_kategori' => esc($this->request->getVar('id_kategori')),
            'menu_makanan' => esc($this->request->getVar('menu_makanan')),
            'desc_makanan' => esc($this->request->getVar('desc_makanan')),
            'harga' => esc($this->request->getVar('harga')),
            'gambar_makanan' => esc($this->request->getVar('gambar_makanan')),
            //'gambar_makanan' => $namaGambar,

        ]);
        $response =[
            'message' => 'data makanan diubah',
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
            'message' => 'data makanan dihapus!',
        ];

        return $this->respondDeleted($response);
    }
}
