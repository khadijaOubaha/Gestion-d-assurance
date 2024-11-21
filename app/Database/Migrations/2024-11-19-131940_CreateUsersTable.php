<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'userId' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nom' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true, // Nom facultatif pour les feedbacks anonymes
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true, // Email facultatif pour feedbacks anonymes
            ],
            'telephone' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'null'       => true, // Optionnel, uniquement s'il est fourni
            ],
            'message' => [
                'type'       => 'TEXT',
                'null'       => false, // Obligatoire pour les feedbacks
            ],
            
        ]);
        $this->forge->addKey('userId', true);
        $this->forge->createTable('users');
     
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
