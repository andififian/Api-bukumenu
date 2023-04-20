<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MigrasiBukuMenu extends Migration
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
            'jenis_menu' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
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
        $this->forge->createTable('kategoriMenu');
    }

    public function down()
    {
        $this->forge->dropTable('kategoriMenu');
    }
}
