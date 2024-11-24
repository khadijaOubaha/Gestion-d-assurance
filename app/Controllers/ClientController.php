<?php

namespace App\Controllers;

use App\Models\ClientModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ClientController extends BaseController
{
    public function loginPage()
    {
        return view('Login_Client');
    }
    public function fillTable()
    {
        $clientModel = new ClientModel();

        // Données à insérer automatiquement
        $clients = [
            [
                'nom' => 'oubaha',
                'prenom' => 'khadija',
                'adresse' => '123 Rue Principale',
                'telephone' => '0691868294',
                'email' => 'oubahak28@gmail.com',
                'date_naissance' => '2004-10-01',
                'date_obtention_permis' => '2022-07-20',
            ],
            [
                'nom' => 'Belhoufert',
                'prenom' => 'Safae',
                'adresse' => '456 Avenue des Champs',
                'telephone' => '0623456789',
                'email' => 'safae22@gmail.com',
                'date_naissance' => '2005-01-25',
                'date_obtention_permis' => '2010-05-12',
            ],
            // [
            //     'nom' => 'Durand',
            //     'prenom' => 'Paul',
            //     'adresse' => '789 Boulevard Sud',
            //     'telephone' => '0634567890',
            //     'email' => 'paul.durand@example.com',
            //     'date_naissance' => '1975-03-10',
            //     'date_obtention_permis' => '1995-08-15',
            // ],
        ];

        // Insérer les données dans la table
        foreach ($clients as $client) {
            $clientModel->insert($client);
        }

        return 'La table clients a été remplie avec succès.';
    }
    protected $clientModel;  

    public function __construct()  
    {  
        $this->clientModel = new ClientModel();  
    }  
    public function validateLogin()  
    {  
        // Récupération des données du formulaire  
        $data = $this->request->getPost();  

        // Validation des données  
        $validationRules = [  
            'email' => 'required|valid_email',  
            'password' => 'required',  
        ];  

        if (!$this->validate($validationRules)) {  
            return view('login_client', [  
                'errors' => $this->validator->getErrors(),  
                'data' => $data  
            ]);  
        }  

        // Authentification de l'utilisateur  
        $client = $this->clientModel->where('email', $data['email'])->first();  

        if (!$client || !password_verify($data['password'], $client['password'])) {  
            return view('login_client', [  
                'errors' => ['auth' => 'Email ou mot de passe incorrect.'],  
                'data' => $data  
            ]);  
        }  

        // Si l'identification réussit, démarre une session  
        session()->set('loggedIn', true);  
        session()->set('clientId', $client['id']);  
        session()->set('clientName', $client['nom']); // Suppose que 'nom' est le champ pour le nom du client  

        // Redirection vers la page d'accueil ou une autre page  
        return redirect()->to('/');  
    }  
   

    public function logout()
    {
        $session = session();
        $session->destroy(); // Détruit la session
        return redirect()->to('/login_client'); // Retourne à la page de connexion
    }
}
