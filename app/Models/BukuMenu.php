<?php

namespace App\Models;

use CodeIgniter\Model;

class BukuMenu extends Model
{
    
    protected $table            = 'kategorimenu';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['jenis_menu','created_date','update_date'];

     // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_date';
    protected $updatedField  = 'update_date';
    protected $deletedField  = 'deleted_by';
    
}
