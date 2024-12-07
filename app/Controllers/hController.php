<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\ClientModel;
use App\Models\VoitureModel;
use CodeIgniter\Config\Services;
use App\Controllers\BaseController;

class hController extends BaseController
{
    public function addClient()
    {
        $clientModel = new ClientModel();

      
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
            'id_voiture'           => 1, 
        ];

        
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
       
        $voitureModel = new VoitureModel();

       
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

       
        if ($voitureModel->insert($data)) {
            return 'Voiture ajoutée avec succès !';
        } else {
            return 'Erreur lors de l\'ajout de la voiture.';
        }
    }
    public function hhh()
    {
       
        $clientModel = new ClientModel();
        $voitureModel = new VoitureModel();
        
       
        $clientData = [
            'nom' => $this->request->getPost('nom'),
            'prenom' => $this->request->getPost('prenom'),
            'adresse' => $this->request->getPost('adresse'),
            'ville' => $this->request->getPost('ville'),
            'telephone' => $this->request->getPost('telephone'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT), // Hash du mot de passe
            'cin' => $this->request->getPost('cin'),
            'date_naissance' => $this->request->getPost('date_naissance'),
            'date_obtention_permis' => $this->request->getPost('date_obtention_permis'),
        ];
    
       
        $voitureData = [
            'marque' => $this->request->getPost('marque'),
            'modele' => $this->request->getPost('modele'),
            'immatriculation' => $this->request->getPost('immatriculation'),
            'puissance_fiscale' => $this->request->getPost('puissance_fiscale'),
            'carburant' => $this->request->getPost('carburant'),
            'annee_fabrication' => $this->request->getPost('annee_fabrication'),
            'kilometrage' => $this->request->getPost('kilometrage'),
        ];
    var_dump($clientData);
  
        $voitureId = $voitureModel->insert($voitureData);
        if ($voitureId) {
            
            $clientData['id_voiture'] = $voitureId;
    
           
            $clientInsert = $clientModel->insert($clientData);
            if (!$clientInsert) {
                $errors = $clientModel->errors();
                return redirect()->to('/admin/dashboard')->with('error', 'Erreur lors de l\'ajout du client.')->withInput()->with('validationErrors', $errors);
            } else {
               
                return redirect()->to('/admin/dashboard')->with('success', 'Client et voiture ajoutés avec succès');
            }
        } else {
           
            return redirect()->to('/admin/dashboard')->with('error', 'Erreur lors de l\'ajout de la voiture.');
        }
    }
}
