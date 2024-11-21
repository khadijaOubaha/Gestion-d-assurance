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
    public function validateLogin()
    {
        $session = session();
        $model = new ClientModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $model->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            $session->set([
                'id' => $user['id'],
                'nom' => $user['nom'],
                'prenom' => $user['prenom'],
                'isLoggedIn' => true,
            ]);
            return redirect()->to('/dashboard');
        } else {
            $session->setFlashdata('error', 'Invalid login credentials.');
            return redirect()->back();
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy(); // Détruit la session
        return redirect()->to('/login'); // Retourne à la page de connexion
    }
}
