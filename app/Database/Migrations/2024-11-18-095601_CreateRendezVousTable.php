<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateRendezVousTable extends Migration
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
                'null' => false,
            ],
            'date_rdv' => [
                'type' => 'DATETIME',
                'null' => false,
            ],
            'statut' => [
                'type' => 'ENUM',
                'constraint' => ['en_attente', 'confirme', 'annule'],
                'default' => 'en_attente',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('client_id', 'clients', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('rendez_vous');
    }

    public function down()
    {
        $this->forge->dropTable('rendez_vous');
    }
}
