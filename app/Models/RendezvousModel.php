<?php

namespace App\Models;

use CodeIgniter\Model;

class RendezvousModel extends Model
{
    protected $table = 'rendez_vous';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_client', 'id_voiture', 'date_rendez_vous', 'heure_rendez_vous', 'statut', 'is_new'];

    public function getRendezVousById($id)
    {
        return $this->where('id', $id)->first();
    }

    public function getRendezVousByClient($clientId)
    {
        return $this->where('id_client', $clientId)->findAll();
    }
    
    public function storeRendezVous($data)
    {
        return $this->insert($data);
    }

    public function countPendingRendezVous()
    {
        return $this->where('statut', 'en attente')->countAllResults();
    }

    public function updateStatus($id, $status)
    {
        return $this->update($id, ['statut' => $status]);
    }

    public function getRendezvousWithDetails($id)
    {
        return $this->select('
            rendez_vous.id, 
            rendez_vous.date_rendez_vous, 
            rendez_vous.heure_rendez_vous, 
            clients.nom AS client_nom, 
            clients.prenom AS client_prenom, 
            clients.telephone AS client_telephone, 
            clients.adresse AS client_adresse, 
            voitures.marque AS voiture_marque, 
            voitures.modele AS voiture_modele, 
            voitures.carburant AS voiture_carburant, 
            voitures.immatriculation AS voiture_immatriculation
        ')
        ->join('clients', 'rendez_vous.id_client = clients.id', 'left')
        ->join('voitures', 'rendez_vous.id_voiture = voitures.id', 'left')
        ->where('rendez_vous.id', $id)
        ->first();
    }

    public function getNewRendezVous()
    {
        return $this->select('
            rendez_vous.id, 
            rendez_vous.date_rendez_vous, 
            rendez_vous.heure_rendez_vous, 
            clients.nom AS client_nom, 
            clients.prenom AS client_prenom, 
            clients.telephone AS client_telephone, 
            clients.adresse AS client_adresse, 
            voitures.marque AS voiture_marque, 
            voitures.modele AS voiture_modele, 
            voitures.carburant AS voiture_carburant, 
            voitures.immatriculation AS voiture_immatriculation
        ')
        ->join('clients', 'rendez_vous.id_client = clients.id', 'left')
        ->join('voitures', 'rendez_vous.id_voiture = voitures.id', 'left')
        ->where('rendez_vous.is_new', 1)
        ->findAll();
    }

    public function countNewRendezVous()
    {
        return $this->where('is_new', 1)->countAllResults();
    }
    public function getNewRendezvousCount()
{
    return $this->where('is_new', 1)->countAllResults();  // Exemple de méthode pour compter les nouveaux rendez-vous
}



}
