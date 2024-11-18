<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAgenceTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
                'unsigned' => true
            ],
            'nom' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => false
            ],
            'adresse' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false
            ],
            'telephone' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => false
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false
            ],
            
        ]);
        $this->forge->addKey('id', true); // Primary key
        $this->forge->createTable('agence');
    }

    public function down()
    {
        $this->forge->dropTable('agence');
    }
}
