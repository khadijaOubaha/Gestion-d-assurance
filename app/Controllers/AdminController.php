<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\ClientModel;
use App\Models\VoitureModel;
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
        return redirect()->to('http://localhost:8080/');
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
    $rendezvousModel = new \App\Models\RendezvousModel();


    $totalClients = $clientModel->findAll();
    $feedbacks = $feedbackModel->findAll();
    $Rendezvous = $rendezvousModel->findAll();

    
    $newRendezVousCount = $rendezvousModel->countNewRendezVous();
    $newRendezVous = $rendezvousModel->getNewRendezVous();

    $data = [
        'totalClients' => $totalClients,
        'feedbacks' => $feedbacks,
        'rendezvous' => $Rendezvous,
        'newRendezVousCount' => $newRendezVousCount, 
        'newRendezVous' => $newRendezVous, 
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


    return view('admin/FFF', [
        'nom' => $session->get('nom'),
    ]);
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

public function viewFeedbacks()
{
    $feedbackModel = new \App\Models\FeedbackModel();
    $feedbacks = $feedbackModel->findAll();

    return view('admin/feedbacks', ['feedbacks' => $feedbacks]);
}

public function hm(){
    return view('auto_infos');
}

public function notifications()
{
    $rendezvousModel = new \App\Models\RendezvousModel();

    $newCount = $rendezvousModel->countNewRendezVous();

    $newRendezVous = $rendezvousModel
        ->select('
            rendez_vous.id,
            rendez_vous.date_rendez_vous,
            rendez_vous.heure_rendez_vous,
            clients.nom as client_nom,
            clients.prenom as client_prenom,
            clients.telephone as client_telephone,
            clients.adresse as client_adresse,
            voitures.marque as voiture_marque,
            voitures.modele as voiture_modele,
            voitures.carburant as voiture_carburant,
            voitures.immatriculation as voiture_immatriculation
        ')
        ->join('clients', 'rendez_vous.id_client = clients.id') 
        ->join('voitures', 'clients.id_voiture = voitures.id', 'left') 
        ->where('rendez_vous.is_new', 1)
        ->findAll();

    return view('admin/notifications', [
        'newCount' => $newCount,
        'newRendezVous' => $newRendezVous
    ]);
}




public function markAsSeen($id = null)
{
    $rendezvousModel = new \App\Models\RendezvousModel();
    if ($id) {
       
        $rendezvousModel->update($id, ['is_new' => 0]);
    } else {
      
        $rendezvousModel->set(['is_new' => 0])->update();
    }

    return redirect()->to('admin/notifications');
}

}
