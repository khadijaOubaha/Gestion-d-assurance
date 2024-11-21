<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateVoituresTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'marque' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false,
            ],
            'modele' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false,
            ],
            'puissance_fiscale' => [
                'type'       => 'INT',
                'unsigned'   => true,
                'null'       => false,
            ],
            'carburant' => [
                'type'       => 'ENUM',
                'constraint' => ['Essence', 'Diesel', 'Electrique', 'Hybride'],
                'null'       => false,
            ],
            'immatriculation' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'null'       => false,
                'unique'     => true,
            ],
            
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('voitures');
      
    }

    public function down()
    {
        $this->forge->dropTable('voitures');
    }
}
