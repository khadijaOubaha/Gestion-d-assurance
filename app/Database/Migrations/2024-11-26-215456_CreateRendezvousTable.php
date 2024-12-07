<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateRendezVousTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_client' => [
                'type'       => 'INT',
                'unsigned'   => true,
                'null'       => false,
            ],
            'id_voiture' => [
                'type'       => 'INT',
                'unsigned'   => true,
                'null'       => false,
            ],
            'date_rendez_vous' => [
                'type' => 'DATE',
                'null' => false,
            ],
            'heure_rendez_vous' => [
                'type' => 'TIME',  
                'null' => false,
            ],
            'statut' => [
                'type'       => 'ENUM',
                'constraint' => ['en attente', 'validé', 'rejeté'],
                'default'    => 'en attente',
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_client', 'clients', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_voiture', 'voitures', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('rendez_vous');
    }

    public function down()
    {
        $this->forge->dropTable('rendez_vous');
    }
}
