<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersTable extends Migration
{
    public function up()
{
    $this->forge->addField([
        'member_id'   => [
            'type'           => 'INT',
            'constraint'     => 11,
            'unsigned'       => true,
            'auto_increment' => true,
        ],
        'user_id' => [
            'type'           => 'VARCHAR',
            'constraint'     => 100,
        ],
        'kode_user' => [
            'type'           => 'VARCHAR',
            'constraint'     => 50,
        ],
        'hak' => [
            'type'           => 'VARCHAR',
            'constraint'     => 50,
        ],
        'password' => [
            'type'           => 'VARCHAR',
            'constraint'     => 255,
        ],
        'updated_at' => [
            'type'           => 'TIMESTAMP WITH TIME ZONE', // Ubah tipe data menjadi TIMESTAMP WITH TIME ZONE
            'null'           => true,
        ],
        'created_at' => [
            'type'           => 'TIMESTAMP WITH TIME ZONE', // Ubah tipe data menjadi TIMESTAMP WITH TIME ZONE
            'null'           => true,
        ],

    ]);

    $this->forge->addKey('member_id', true);
    $this->forge->createTable('users');
}

public function down()
{
    $this->forge->dropTable('users');
}


    public function down()
    {
        $this->forge->dropTable('users');
    }
}
