<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateVehiclesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'client_id' => [
                'type' => 'INT',
            ],
            'marque' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'puissance_fiscale' => [
                'type' => 'INT',
            ],
            'carburant' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'date_mise_en_circulation' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'nombre_places' => [
                'type' => 'INT',
            ],
            'valeur_a_neuf' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'valeur_venale' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'immatriculation' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'unique' => true,
            ],
       

        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('client_id', 'clients', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('vehicles');
    }

    public function down()
    {
        $this->forge->dropTable('vehicles');
    }
}
