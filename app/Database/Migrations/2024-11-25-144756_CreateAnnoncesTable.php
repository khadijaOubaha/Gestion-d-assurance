<?php
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAnnoncesTable extends Migration
{
    public function up()
    {
       
        $this->forge->addField([
            'annonceId' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'titre' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'description' => [
                'type' => 'TEXT',
            ],
            'datePublication' => [
                   'type' => 'DATE',
                'null' => true,
            ],
            'adminId' => [
                'type'     => 'INT',
                'unsigned' => true,
            ],
        ]);
        $this->forge->addKey('annonceId', true);
        $this->forge->addForeignKey('adminId', 'admins', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('annonces', true, ['engine' => 'InnoDB']);
    }

    public function down()
    {
        $this->forge->dropTable('annonces');
    }
}
