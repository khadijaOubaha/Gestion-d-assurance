<?php

namespace App\Controllers;

use App\Models\ClientModel;

class hController extends BaseController
{
    public function addClient()
    {
        $clientModel = new ClientModel();

        // Exemple de données à insérer
        $data = [
            'nom'                  => 'Oubaha',
            'prenom'               => 'Khadija',
            'adresse'              => 'Ain Leuh',
            'ville'                => 'Ifrane',
            'telephone'            => '0678909876',
            'email'                => 'khadija28@gmail.com',
            'password'             => password_hash('khadi123', PASSWORD_DEFAULT),
            'cin'                  => 'JH98587',
            'date_naissance'       => '2008-11-08',
            'date_obtention_permis'=> '2024-11-08',
            'id_voiture'           => null, // ou un id valide de la table voitures
        ];

        // Insertion dans la base de données
        if ($clientModel->insert($data)) {
            return 'Client ajouté avec succès !';
        } else {
            return 'Erreur lors de l\'ajout du client.';
        }
    }
}
