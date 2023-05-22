<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Makanan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            
            'menu_makanan' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'desc_makanan' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'harga' => [
                'type'       => 'INT',
                'constraint' => '11',
            ],
            'gambar_makanan' => [
                'type'       => 'TEXT',
            ],
            'created_date' => [
                'type' => 'datetime',
            ],
            'update_date' => [
                'type' => 'datetime',
                'null' => true,
            ],
            'update_by' => [
                'type' => 'datetime',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        
        $this->forge->createTable('menumakanan');
    }

    public function down()
    {
        $this->forge->dropTable('menumakanan');
    }
}
