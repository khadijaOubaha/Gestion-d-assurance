<?php
namespace App\Controllers;

use App\Models\RendezvousModel;
use CodeIgniter\Controller;

class NotificationController extends Controller
{
    public function getNotifications()
    {
        $rendezVousModel = new RendezvousModel();

    
        $notifications = $rendezVousModel->where('statut', 'en attente')->findAll();

        return $this->response->setJSON($notifications);
    }
}
