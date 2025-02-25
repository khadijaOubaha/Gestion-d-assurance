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
        ];

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
        $data = $this->request->getPost();

        $validationRules = [
            'email' => 'required|valid_email',
            'password' => 'required|min_length[8]',
        ];
        if (!$this->validate($validationRules)) {
            return view('login_client', [
                'errors' => $this->validator->getErrors(),
                'data' => $data
            ]);
        }

        $client = $this->clientModel->where('email', $data['email'])->first();

        if (!$client || !password_verify($data['password'], $client['password'])) {
            return view('login_client', [
                'errors' => ['auth' => 'Email ou mot de passe incorrect.'],
                'data' => $data
            ]);
        }

        session()->set('loggedIn', true);
        session()->set('clientId', $client['id']);
        session()->set('userRole', 'client');
        session()->set('clientName', $client['nom']);

        return redirect()->to('http://localhost:8080');
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('http://localhost:8080');
    }

    public function profile()
    {
        if (!session()->get('loggedIn')) {
            return redirect()->to('login_client');
        }

        $userRole = session()->get('userRole');

        if ($userRole === 'client') {
            $clientModel = new ClientModel();
            $voitureModel = new VoitureModel();
            $userId = session()->get('clientId');

            $user = $clientModel->find($userId);

            if (!$user) {
                return redirect()->to('login_client');
            }

            $vehicle = null;
            if ($user['id_voiture']) {
                $vehicle = $voitureModel->find($user['id_voiture']);
            }
        } else {
            return redirect()->to('login_client');
        }

        return view('profile', ['user' => $user, 'vehicle' => $vehicle]);
    }

    public function auto()
    {
        return view('rendez_vous');
 
       }
       public function accee(){
        return view('details_plante1');
       }
}
