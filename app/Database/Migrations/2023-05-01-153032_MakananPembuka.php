<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MakananPembuka extends Migration
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
            'id_kategori' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
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
        $this->forge->addForeignKey('id_kategori', 'kategorimenu', 'id');
        $this->forge->createTable('menumakananpembuka');
    }

    public function down()
    {
        $this->forge->dropTable('menumakananpembuka');
    }
}
