<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\ClientModel;
use App\Models\RendezvousModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;


class AdminController extends BaseController
{
    public function login()
    {
        $session = session();

        if ($session->get('isLoggedIn')) {
            return redirect()->to('/admin/dashboard');
        }

        return view('admin/login');
    }

    public function loginProcess()
    {
        $session = session();
        $model = new AdminModel();
    
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
    
        $admin = $model->where('email', $email)->first();
    
        if ($admin) {
            if (password_verify($password, $admin['password'])) {
                $session->set([
                    'id'         => $admin['id'],
                    'nom'        => $admin['nom'], 
                    'prenom'     => $admin['prenom'], 
                    'email'      => $admin['email'],
                    'role'       => $admin['role'],
                    'isLoggedIn' => true,
                ]);
    
                return redirect()->to('/admin/dashboard');
            } else {
                $session->setFlashdata('error', 'Mot de passe incorrect.');
            }
        } else {
            $session->setFlashdata('error', 'Email introuvable.');
        }
    
        return redirect()->to('/admin/login');
    }
    

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/admin/login');
    }

    public function dashboard()
    {
        $session = session();
    
        if (!$session->get('isLoggedIn')) {
            return redirect()->to('/admin/login')->with('error', 'Vous devez être connecté pour accéder à cette page.');
        }
    
        $view = $this->request->getGet('view') ?? 'default';
    
        $clientModel = new \App\Models\ClientModel();
        $feedbackModel = new \App\Models\FeedbackModel();
    
        // Récupérer les données nécessaires
        $totalClients = $clientModel->countAllResults();
        $feedbacks = $feedbackModel->findAll(); // Charger tous les feedbacks
    
        $data = [
            'totalClients' => $totalClients,
            'feedbacks' => $feedbacks, // Passer les feedbacks à la vue
        ];
    
        if ($view === 'users_table') {
            $data['clients'] = $clientModel->findAll();
        }
    
        return view('admin/dashboard', ['view' => $view, 'data' => $data]);
    }
    
    
    
public function addUser()
{
    $session = session();

    if (!$session->get('isLoggedIn')) {
        return redirect()->to('/admin/login')->with('error', 'Vous devez être connecté pour accéder à cette page.');
    }

    return view('admin/add_user', [
        'nom' => $session->get('nom'),
    ]);
}

public function saveUser()
{
    $model = new ClientModel();

    $data = [
        'nom'                   => $this->request->getPost('nom'),
        'prenom'                => $this->request->getPost('prenom'),
        'adresse'               => $this->request->getPost('adresse'),
        'ville'                 => $this->request->getPost('ville'),
        'telephone'             => $this->request->getPost('telephone'),
        'email'                 => $this->request->getPost('email'),
        'password'              => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
        'cin'                   => $this->request->getPost('cin'),
        'date_naissance'        => $this->request->getPost('date_naissance'),
        'date_obtention_permis' => $this->request->getPost('date_obtention_permis'),
    ];

    if ($model->insert($data)) {
        return redirect()->to('/admin/dashboard')->with('success', 'Utilisateur ajouté avec succès.');
    }

    return redirect()->back()->with('error', 'Erreur lors de l\'ajout de l\'utilisateur.');
}

public function usersTable()
{
    $session = session();

    if (!$session->get('isLoggedIn')) {
        return redirect()->to('/admin/login')->with('error', 'Vous devez être connecté pour accéder à cette page.');
    }

    $clientModel = new ClientModel();
    $clients = $clientModel->findAll();

    return view('admin/users_table', ['clients' => $clients]);
}



public function deleteUser($id)
{
    $clientModel = new ClientModel();

    if ($clientModel->delete($id)) {
        return redirect()->back()->with('success', 'Utilisateur supprimé avec succès.');
    }

    return redirect()->back()->with('error', 'Erreur lors de la suppression de l\'utilisateur.');
}

public function editUser($id)
{
    $clientModel = new ClientModel();
    $client = $clientModel->find($id);

    if (!$client) {
        return redirect()->to('/admin/usersTable')->with('error', 'Utilisateur non trouvé.');
    }

    return view('admin/edit_user', ['client' => $client]);
}


public function viewFeedbacks()
{
    $feedbackModel = new \App\Models\FeedbackModel();
    $feedbacks = $feedbackModel->findAll();

    return view('admin/feedbacks', ['feedbacks' => $feedbacks]);
}

public function hm(){
    return view('auto_infos');
}
// App\Controllers\Admin.php
// public function notifications()
// {
//     $rendezvousModel = new RendezvousModel();

//     // Compter les rendez-vous en attente
//     $pendingCount = $rendezvousModel->countPendingRendezVous();

//     // Récupérer les rendez-vous en attente
//     $pendingRendezVous = $rendezvousModel
//         ->select('rendez_vous.id, rendez_vous.date_rendez_vous, rendez_vous.heure_rendez_vous, clients.nom as client_nom, clients.prenom as client_prenom')
//         ->join('clients', 'rendez_vous.id_client = clients.id')
//         ->where('rendez_vous.statut', 'En attente')
//         ->findAll();

//     return view('admin/notifications', [
//         'pendingCount' => $pendingCount,
//         'pendingRendezVous' => $pendingRendezVous
//     ]);
// }
// App\Controllers\Admin.php
public function notifications()
{
    $rendezvousModel = new \App\Models\RendezvousModel();

    // Compter les nouveaux rendez-vous
    $newCount = $rendezvousModel->countNewRendezVous();

    // Récupérer les rendez-vous marqués comme nouveaux
    $newRendezVous = $rendezvousModel
        ->select('rendez_vous.id, rendez_vous.date_rendez_vous, rendez_vous.heure_rendez_vous, clients.nom as client_nom, clients.prenom as client_prenom')
        ->join('clients', 'rendez_vous.id_client = clients.id')
        ->where('rendez_vous.is_new', 1)
        ->findAll();

    return view('admin/notifications', [
        'newCount' => $newCount,
        'newRendezVous' => $newRendezVous
    ]);
}

// Marquer un rendez-vous comme lu (quand l'admin ouvre la page notifications)
public function markAsSeen($id = null)
{
    $rendezvousModel = new \App\Models\RendezvousModel();
    if ($id) {
        // Marquer un seul rendez-vous
        $rendezvousModel->update($id, ['is_new' => 0]);
    } else {
        // Marquer tous les rendez-vous comme vus
        $rendezvousModel->set(['is_new' => 0])->update();
    }

    return redirect()->to('admin/notifications');
}


}
