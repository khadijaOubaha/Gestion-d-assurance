<?php

namespace App\Models;

use CodeIgniter\Model;

class RendezvousModel extends Model
{
    protected $table = 'rendez_vous';
    protected $primaryKey = 'id';
    // protected $allowedFields = ['id_client', 'id_voiture', 'date_rendez_vous', 'heure_rendez_vous', 'statut'];
    protected $allowedFields = ['id_client', 'id_voiture', 'date_rendez_vous', 'heure_rendez_vous', 'statut', 'is_new'];

    // Méthode pour récupérer un rendez-vous par son ID
    public function getRendezVousById($id)
    {
        return $this->where('id', $id)->first();
    }

    // Méthode pour récupérer tous les rendez-vous d'un client
    public function getRendezVousByClient($clientId)
    {
        return $this->where('id_client', $clientId)->findAll();
    }
    
    // Méthode pour insérer un rendez-vous
    public function storeRendezVous($data)
    {
        return $this->insert($data);
    }
    // App\Models\RendezvousModel.php
public function countPendingRendezVous()
{
    return $this->where('statut', 'en attente')->countAllResults();
}
public function countNewRendezVous()
{
    return $this->where('is_new', 1)->countAllResults();
}

public function getNewRendezVous()
{
    return $this->where('is_new', 1)->findAll();
}
public function updateStatus($id, $status)
{
    return $this->update($id, ['statut' => $status]);
}
public function getRendezvousWithDetails($id)
{
    return $this->select('rendez_vous.*, clients.nom AS client_nom, clients.prenom AS client_prenom, voitures.marque AS voiture_marque, voitures.modele AS voiture_modele')
                ->join('clients', 'rendez_vous.id_client = clients.id', 'left')  // Assurez-vous que 'clients.id' est correct
                ->join('voitures', 'rendez_vous.id_voiture = voitures.id', 'left')  // Assurez-vous que 'voitures.id' est correct
                ->where('rendez_vous.id', $id)
                ->first();
}

}
