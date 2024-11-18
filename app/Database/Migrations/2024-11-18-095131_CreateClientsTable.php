<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateClientsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'nom' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'prenom' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'adresse' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'telephone' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'unique' => true,
            ],
            'date_naissance' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'date_obtention_permis' => [
                'type' => 'DATE',
                'null' => true,
            ],
       

        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('clients');
    }

    public function down()
    {
        $this->forge->dropTable('clients');
    }
}
