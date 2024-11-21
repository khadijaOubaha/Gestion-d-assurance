<?php


namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateClientsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nom' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false,
            ],
            'prenom' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false,
            ],
            'adresse' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'ville' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'telephone' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'null'       => true,
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false,
                'unique'     => true,
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'cin' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'null'       => false,
                'unique'     => true,
            ],
            'date_naissance' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'date_obtention_permis' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'id_voiture' => [
                'type'       => 'INT',
                'unsigned'   => true,
                'null'       => true,
            ],
           
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_voiture', 'voitures', 'id', 'SET NULL', 'CASCADE');
        $this->forge->createTable('clients');
       
    }

    public function down()
    {
        $this->forge->dropTable('clients');
    }
}
