<?php
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAnnoncesTable extends Migration
{
    public function up()
    {
        // Create annonces table
        $this->forge->addField([
            'annonceId' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'titre' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'description' => [
                'type' => 'TEXT',
            ],
            'datePublication' => [
                'type' => 'DATETIME',
                'default' => 'CURRENT_TIMESTAMP',
            ],
            'adminId' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
        ]);
        $this->forge->addKey('annonceId', true);
        
        // Ensure the tables are using InnoDB
        $this->forge->addForeignKey('adminId', 'admins', 'adminId', 'CASCADE', 'CASCADE');
        
        // Create table with InnoDB engine
        $this->forge->createTable('annonces', true, ['engine' => 'InnoDB']);
    }

    public function down()
    {
        $this->forge->dropTable('annonces');
    }
}
