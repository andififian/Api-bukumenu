<?php

namespace App\Models;

use CodeIgniter\Model;

class MenuMakanan extends Model
{
    protected $table            = 'menumakanan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['menu_makanan', 'desc_makanan', 'harga', 'gambar_makanan'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_date';
    protected $updatedField  = 'update_date';
    protected $deletedField  = 'deleted_at';

}
