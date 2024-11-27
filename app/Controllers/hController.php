<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\ClientModel;
use App\Models\VoitureModel;

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
            'id_voiture'           => 1, // ou un id valide de la table voitures
        ];

        // Insertion dans la base de données
        if ($clientModel->insert($data)) {
            return 'Client ajouté avec succès !';
        } else {
            return 'Erreur lors de l\'ajout du client.';
        }
    }
    public function addAdmin()
    {
        $adminModel = new AdminModel();

        $data = [
            'nom'     => 'Super',
            'prenom'  => 'Admin',
            'email'   => 'safae28@gmail.com',
            'password'=> password_hash('safa123', PASSWORD_DEFAULT),
            'role'    => 'superadmin',
        ];

        if ($adminModel->insert($data)) {
            return 'Administrateur ajouté avec succès !';
        } else {
            return 'Erreur lors de l\'ajout de l\'administrateur.';
        }
    }
    public function addVoiture()
    {
        // Crée une instance du modèle VoitureModel
        $voitureModel = new VoitureModel();

        // Exemple de données à insérer directement dans la base de données
        $data = [
            'marque'             => 'Audi',
            'modele'             => 'A4',
            'puissance_fiscale'  => 10,
            'carburant'          => 'Diesel',
            'immatriculation'    => 'AB123CD',
            'annee_fabrication'  => 2020,
            'kilometrage'        => 35000,
            'statut_assurance'   => 'Assurée',
        ];

        // Insère les données dans la table "voitures"
        if ($voitureModel->insert($data)) {
            return 'Voiture ajoutée avec succès !';
        } else {
            return 'Erreur lors de l\'ajout de la voiture.';
        }
    }

}
