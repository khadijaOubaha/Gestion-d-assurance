<?php  

namespace App\Models;  

use CodeIgniter\Model;  

class ClientModel extends Model  
{  
    protected $table      = 'clients'; 
    protected $primaryKey = 'id';      

    protected $useAutoIncrement = true; 

    
    protected $allowedFields = [  
        'nom',   
        'prenom',   
        'adresse',   
        'ville',   
        'telephone',   
        'email',   
        'password',   
        'cin',   
        'date_naissance',   
        'date_obtention_permis',   
        'id_voiture'  
    ];  
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField = 'updated_at';
    protected $validationRules = [  
        'nom' => 'required|max_length[100]',  
        'prenom' => 'required|max_length[100]',  
        'adresse' => 'max_length[255]',  
        'ville' => 'max_length[100]',  
        'telephone' => 'max_length[10]|regex_match[/^[0-9\-\+\s()]+$/]',  
        'email' => 'required|valid_email|is_unique[clients.email,id,{id}]',  
        'password' => 'required|max_length[255]',  
        'cin' => 'required|is_unique[clients.cin,id,{id}]',  
        'date_naissance' => 'valid_date[Y-m-d]',  
        'date_obtention_permis' => 'valid_date[Y-m-d]',  
        'id_voiture' => 'permit_empty|is_natural_no_zero',  
    ];
    
    protected $validationMessages = [  
        'email' => [  
            'is_unique' => 'Cet email est déjà utilisé.',  
        ],  
        'cin' => [  
            'is_unique' => 'Ce CIN est déjà utilisé.',  
        ],  
    ];  

    protected $skipValidation = false; 

    // Méthodes personnalisées peuvent être ajoutées ici  

    /**  
     * Récupérer tous les clients  
     */  
    public function getAllClients()  
    {  
        return $this->findAll(); 
    }  

    /**  
     * Récupérer un client par son ID  
     */  
    public function getClientById($id)  
    {  
        return $this->find($id); 
    }  

    /**  
     * Ajouter un nouveau client  
     */  
    public function addClient($data)  
    {  
        return $this->insert($data); 
    }  

    /**  
     * Mettre à jour un client  
     */  
    public function updateClient($id, $data)  
    {  
        return $this->update($id, $data); 
    }  

    /**  
     * Supprimer un client  
     */  
    public function deleteClient($id)  
    {  
        return $this->delete($id);
}}