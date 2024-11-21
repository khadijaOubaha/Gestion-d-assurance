<?php
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'userId' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            // Other fields
        ]);
        $this->forge->addKey('userId', true); // Make userId a primary key
        $this->forge->createTable('users', true, ['engine' => 'InnoDB']);
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}