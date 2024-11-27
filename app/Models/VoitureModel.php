<?php

namespace App\Models;

use CodeIgniter\Model;

class VoitureModel extends Model
{
    protected $table = 'voitures';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'marque',
        'modele',
        'puissance_fiscale',
        'carburant',
        'immatriculation',
        'annee_fabrication',
        'kilometrage',
        'statut_assurance',
    ];

    protected $useTimestamps = false;  // Si vous avez des champs timestamp (comme created_at), mettez à true.
}
