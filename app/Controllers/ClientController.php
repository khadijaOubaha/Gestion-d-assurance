<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\ClientModel;
use App\Models\VoitureModel;
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
        session()->set('userRole', 'client'); 
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

    public function profile()  
{  
    // Vérifier si l'utilisateur est connecté  
    if (!session()->get('loggedIn')) {  
        return redirect()->to('login_client'); // Rediriger vers la page de connexion si non connecté  
    }  

    // Déterminer si l'utilisateur est un client ou un admin  
    $userRole = session()->get('userRole'); // Récupérer le rôle de l'utilisateur dans la session  

    if ($userRole === 'client') {  
        $clientModel = new ClientModel();  
        $voitureModel = new VoitureModel();  // Model pour la voiture
        $userId = session()->get('clientId');  
        
        // Récupérer le client par son ID
        $user = $clientModel->find($userId);  

        // Vérifier si le client a été trouvé  
        if (!$user) {  
            return redirect()->to('login_client'); // Rediriger si le client n'est pas trouvé  
        }

        // Récupérer les informations du véhicule lié au client (via id_voiture)
        $vehicle = null;
        if ($user['id_voiture']) {
            $vehicle = $voitureModel->find($user['id_voiture']);
        }

    } else {  
        // Si aucun rôle valide n'est trouvé  
        return redirect()->to('login_client');  
    }  

    // Passer les données à la vue  
    return view('profile', ['user' => $user, 'vehicle' => $vehicle]);  
}
public function modifierProfilEtVoiture()
{
    // Vérifier si l'utilisateur est connecté
    if (!session()->get('loggedIn')) {
        return redirect()->to('login_client'); // Rediriger vers la page de connexion si non connecté
    }

    // Déterminer si l'utilisateur est un client
    $userRole = session()->get('userRole');
    if ($userRole !== 'client') {
        return redirect()->to('login_client'); // Rediriger si ce n'est pas un client
    }

    // Charger les modèles ClientModel et VoitureModel
    $clientModel = new ClientModel();
    $vehicleModel = new VoitureModel();
    $userId = session()->get('clientId');
    
    // Récupérer les informations du client et de son véhicule
    $user = $clientModel->find($userId); // Récupérer le profil du client
    $vehicle = $vehicleModel->where('id', $user['id_voiture'])->first(); // Récupérer le véhicule du client

    // Vérifier si l'utilisateur ou le véhicule existe
    if (!$user || !$vehicle) {
        return redirect()->to('login_client'); // Rediriger si l'utilisateur ou le véhicule n'existe pas
    }

    // Si le formulaire est soumis, mettre à jour les informations du client et du véhicule
    if ($this->request->getMethod() === 'post') {
        // Récupérer les données du formulaire pour le client
        $clientData = [
            'nom' => $this->request->getPost('nom'),
            'prenom' => $this->request->getPost('prenom'),
            'email' => $this->request->getPost('email'),
            'telephone' => $this->request->getPost('telephone'),
            'adresse' => $this->request->getPost('adresse'),
            'ville' => $this->request->getPost('ville'),
            'date_naissance' => $this->request->getPost('date_naissance'),
            'date_obtention_permis' => $this->request->getPost('date_obtention_permis'),
        ];

        // Récupérer les données du formulaire pour le véhicule
        $vehicleData = [
            'marque' => $this->request->getPost('marque'),
            'modele' => $this->request->getPost('modele'),
            'annee_fabrication' => $this->request->getPost('annee_fabrication'),
            'immatriculation' => $this->request->getPost('immatriculation'),
            'carburant' => $this->request->getPost('carburant'),
            'puissance_fiscale' => $this->request->getPost('puissance_fiscale'),
        ];

        // Mettre à jour les informations du client
        $clientModel->update($userId, $clientData);

        // Mettre à jour les informations du véhicule
        $vehicleModel->update($vehicle['id'], $vehicleData);

        // Ajouter un message flash de succès
        session()->setFlashdata('success', 'Vos informations ont été mises à jour avec succès.');

        // Rediriger vers la page de profil après la mise à jour
        return redirect()->to('profil');
    }

    // Afficher la vue avec les informations actuelles du client et du véhicule
    return view('profile', ['user' => $user, 'vehicle' => $vehicle]);
}


public function modifierProfil(){
    if (!session()->get('loggedIn')) {  
        return redirect()->to('login_client'); // Rediriger vers la page de connexion si non connecté  
    }  

    // Déterminer si l'utilisateur est un client ou un admin  
    $userRole = session()->get('userRole'); // Récupérer le rôle de l'utilisateur dans la session  

    if ($userRole === 'client') {  
        $clientModel = new ClientModel();  
        $voitureModel = new VoitureModel();  // Model pour la voiture
        $userId = session()->get('clientId');  
        
        // Récupérer le client par son ID
        $user = $clientModel->find($userId);  

        // Vérifier si le client a été trouvé  
        if (!$user) {  
            return redirect()->to('login_client'); // Rediriger si le client n'est pas trouvé  
        }

        // Récupérer les informations du véhicule lié au client (via id_voiture)
        $vehicle = null;
        if ($user['id_voiture']) {
            $vehicle = $voitureModel->find($user['id_voiture']);
        }

    } else {  
        // Si aucun rôle valide n'est trouvé  
        return redirect()->to('login_client');  
    }  


    return view('modifier_profil_et_voiture',['user' => $user, 'vehicle' => $vehicle]);
}
    public function auto(){
        return view('rendez_vous');
    }
}
