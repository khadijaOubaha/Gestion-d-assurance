<?php  

namespace App\Models;  

use CodeIgniter\Model;  

class ClientModel extends Model  
{  
    protected $table      = 'clients'; // Nom de la table  
    protected $primaryKey = 'id';      // Clé primaire  

    protected $useAutoIncrement = true; // Utiliser l'auto-incrément  

    // Données qui peuvent être insérées/mises à jour  
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

    protected $validationRules = [  
        'nom' => 'required|max_length[100]',                              // Le nom est requis et ne peut pas dépasser 100 caractères  
        'prenom' => 'required|max_length[100]',                           // Le prénom est requis et ne peut pas dépasser 100 caractères  
        'adresse' => 'max_length[255]',                                   // L'adresse ne peut pas dépasser 255 caractères (pas requis)  
        'ville' => 'max_length[100]',                                     // La ville ne peut pas dépasser 100 caractères (pas requis)  
        'telephone' => 'max_length[20]|regex_match[/^[0-9\-\+\s()]+$/]', // Le téléphone peut avoir jusqu'à 20 caractères et doit être un numéro valide  
        'email' => 'required|valid_email|is_unique[clients.email,id,{id}]', // L'email est requis, doit être valide et unique  
        'password' => 'required|max_length[255]',                        // Le mot de passe est requis et ne peut pas dépasser 255 caractères  
        'cin' => 'required|is_unique[clients.cin,id,{id}]',             // Le CIN est requis et doit être unique  
        'date_naissance' => 'valid_date[Y-m-d]',                         // La date de naissance doit être au format valide (ex : 2024-11-23)  
        'date_obtention_permis' => 'valid_date[Y-m-d]',                 // La date d'obtention du permis doit être au format valide  
        'id_voiture' => 'permit_empty|is_natural_no_zero',              // L'id_voiture peut être vide ou doit être un nombre naturel différent de zéro  
    ];

    protected $validationMessages = [  
        'email' => [  
            'is_unique' => 'Cet email est déjà utilisé.',  
        ],  
        'cin' => [  
            'is_unique' => 'Ce CIN est déjà utilisé.',  
        ],  
    ];  

    protected $skipValidation = false; // Définit à true si la validation doit être ignorée  

    // Méthodes personnalisées peuvent être ajoutées ici  

    /**  
     * Récupérer tous les clients  
     */  
    public function getAllClients()  
    {  
        return $this->findAll(); // Retourne tous les enregistrements  
    }  

    /**  
     * Récupérer un client par son ID  
     */  
    public function getClientById($id)  
    {  
        return $this->find($id); // Retourne un enregistrement par ID  
    }  

    /**  
     * Ajouter un nouveau client  
     */  
    public function addClient($data)  
    {  
        return $this->insert($data); // Ajoute un nouvel enregistrement  
    }  

    /**  
     * Mettre à jour un client  
     */  
    public function updateClient($id, $data)  
    {  
        return $this->update($id, $data); // Met à jour l'enregistrement spécifié  
    }  

    /**  
     * Supprimer un client  
     */  
    public function deleteClient($id)  
    {  
        return $this->delete($id); // Supprime l'enregistrement spécifié  
    }  
}