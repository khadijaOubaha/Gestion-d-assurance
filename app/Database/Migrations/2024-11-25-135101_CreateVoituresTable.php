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
            'annee_fabrication' => [
                'type'       => 'YEAR',
                'null'       => false,
            ],
            'kilometrage' => [
                'type'       => 'INT',
                'unsigned'   => true,
                'null'       => true,
            ],
            'statut_assurance' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
                'comment'    => 'Description ou statut actuel de l’assurance',
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
