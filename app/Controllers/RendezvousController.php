<?php

namespace App\Controllers;

use App\Models\ClientModel;
use App\Models\VoitureModel;
use App\Models\RendezvousModel;
use TCPDF;
class RendezvousController extends BaseController
{
    public function create()
    {
        // Vérifie si l'utilisateur est connecté et est un client
        if (!session()->get('loggedIn') || session()->get('userRole') !== 'client') {
            return redirect()->to('/login_client')->with('error', 'Vous devez être connecté pour réserver un rendez-vous.');
        }
    
        $clientId = session()->get('clientId'); // Récupération de l'ID du client connecté
    
        // Modèles nécessaires
        $clientModel = new ClientModel();
        $voitureModel = new VoitureModel();
    
        // Récupération des informations du client
        $client = $clientModel->find($clientId);
    
        if (!$client) {
            return redirect()->to('/error')->with('error', 'Client introuvable.');
        }
    
        // Récupération de la voiture associée au client
        $voitureId = $client['id_voiture']; // Récupère l'ID de la voiture associée au client
        $voiture = $voitureModel->find($voitureId); // Trouve la voiture en utilisant l'ID récupéré
    
        if (!$voiture) {
            return redirect()->to('/error')->with('error', 'Voiture introuvable.');
        }
    // var_dump($voiture);
        // Affiche le formulaire de réservation avec les informations du client et de sa voiture
        return view('rendez_vous', [
            'client' => $client,
            'voiture' => $voiture,
        ]);
    }
    

    public function store()
{
    // Vérifie si l'utilisateur est connecté et est un client
    if (!session()->get('loggedIn') || session()->get('userRole') !== 'client') {
        return redirect()->to('/login_client')->with('error', 'Vous devez être connecté pour réserver un rendez-vous.');
    }

    // Récupérer l'ID du client connecté
    $clientId = session()->get('clientId'); 

    // Charger les modèles
    $clientModel = new ClientModel();
    $voitureModel = new VoitureModel();
    $rendezVousModel = new RendezvousModel();  // Vérifiez que vous avez bien le bon modèle

    // Récupérer les informations du client
    $client = $clientModel->find($clientId);

    if (!$client) {
        return redirect()->to('/error')->with('error', 'Client introuvable.');
    }

    // Récupérer la voiture associée au client
    $voiture = $voitureModel->find($client['id_voiture']);
    
    if (!$voiture) {
        return redirect()->to('/error')->with('error', 'Aucune voiture associée à ce client.');
    }

    // Récupérer les données du formulaire
    $dateRendezvous = $this->request->getPost('date_rendezvous');
    $heureRendezvous = $this->request->getPost('heure_rendezvous'); // matin ou après-midi

    // Construire la date et l'heure pour le rendez-vous
    $heure = ($heureRendezvous === 'matin') ? '09:00:00' : '14:00:00'; // 9h pour matin, 14h pour après-midi
    $rendezvousDate = $dateRendezvous; // La date sans l'heure
    $rendezvousHeure = $heure; // L'heure choisie

    // Préparer les données pour l'insertion dans la base de données
    $rendezVousData = [
        'id_client' => $clientId,
        'id_voiture' => $voiture['id'],
        'date_rendez_vous' => $rendezvousDate,  // Date sans l'heure
        'heure_rendez_vous' => $rendezvousHeure, // Heure (matin ou après-midi)
        'statut' => 'en attente',  // Le statut du rendez-vous par défaut
    ];

    // Validation des données du formulaire
    if (empty($dateRendezvous) || empty($heureRendezvous)) {
        return redirect()->back()->with('error', 'Tous les champs sont obligatoires.');
    }

    // Insérer les données dans la base de données
    if ($rendezVousModel->insert($rendezVousData)) {
        return redirect()->to('/rendezvous/create')->with('success', 'Votre rendez-vous a été réservé avec succès.');
    } else {
        return redirect()->to('/rendezvous/create')->with('error', 'Une erreur est survenue lors de la réservation du rendez-vous.');
    }
}


public function list()
{
    if (!session()->get('loggedIn') || session()->get('userRole') !== 'client') {
        return redirect()->to('/login_client')->with('error', 'Vous devez être connecté pour réserver un rendez-vous.');
    }

    // Récupérer l'ID du client connecté
    $clientId = session()->get('clientId'); 
    $rendezvousModel = new \App\Models\RendezvousModel();
  

    // Vérification de l'ID du client
    if (!$clientId) {
        echo "Aucun client connecté.";
        return;
    }

    // Récupérer tous les rendez-vous du client avec les informations nécessaires
    $rendezvous = $rendezvousModel
        ->select('rendez_vous.id, rendez_vous.date_rendez_vous, rendez_vous.heure_rendez_vous, rendez_vous.statut')
        ->where('rendez_vous.id_client', $clientId)  // Filtre les rendez-vous du client connecté
        ->findAll();

    // var_dump($rendezvous);  // Vérifiez si les données sont récupérées

    return view('rendezvous_list', ['rendezvous' => $rendezvous]);
}
// Exemple de méthode pour supprimer un rendez-vous
public function delete($id)
{
    // Créer une instance du modèle
    $rendezvousModel = new \App\Models\RendezvousModel();

    // Vérifier si le rendez-vous existe avant de le supprimer
    $rendezvous = $rendezvousModel->find($id);
    if (!$rendezvous) {
        // Si le rendez-vous n'existe pas, rediriger avec un message d'erreur
        session()->setFlashdata('error', 'Rendez-vous introuvable.');
        return redirect()->to('/client/rendezvous'); // redirige vers la liste des rendez-vous
    }

    // Supprimer le rendez-vous
    $rendezvousModel->delete($id);

    // Ajouter un message de succès et rediriger vers la liste des rendez-vous
    session()->setFlashdata('success', 'Rendez-vous supprimé avec succès.');
    return redirect()->to('/client/rendezvous');
}

public function valider($id)
{
    $rendezvousModel = new \App\Models\RendezvousModel();
    $rendezvous = $rendezvousModel->getRendezvousWithDetails($id);

    // Vérifier si le rendez-vous existe
    if ($rendezvous) {
        // Mettre à jour le statut du rendez-vous
        $rendezvousModel->update($id, [
            'statut' => 'validé',
            'is_new' => 0
        ]);

        // Générer le PDF
        $pdf = new \TCPDF();
        $pdf->AddPage();

        // Ajouter des informations au PDF (client, voiture, rendez-vous)
        $pdf->Write(0, "Client : " . $rendezvous['client_nom'] . ' ' . $rendezvous['client_prenom']);
        $pdf->Write(0, "Date : " . $rendezvous['date_rendez_vous']);
        $pdf->Write(0, "Heure : " . $rendezvous['heure_rendez_vous']);
        $pdf->Write(0, "Voiture : " . $rendezvous['voiture_marque'] . ' ' . $rendezvous['voiture_modele']);

        // Définir le répertoire de destination (sans 'public/' supplémentaire)
        // Vérifier si le répertoire existe, sinon le créer
$pdfDir = ROOTPATH . 'public/pdfs/';
if (!is_dir($pdfDir)) {
    mkdir($pdfDir, 0755, true); // Créer le répertoire si nécessaire
}

// Nom du fichier PDF
$pdfFileName = 'rendezvous_' . $rendezvous['id'] . '.pdf';

// Enregistrer le PDF sur le disque dans le dossier public/pdfs/
$pdf->Output($pdfDir . $pdfFileName, 'F');


        // Retourner le chemin du PDF généré
        return redirect()->back()->with('success', 'Le rendez-vous a été validé. <br> PDF généré pour ce rendez-vous : <a href="' . base_url('pdfs/' . $pdfFileName) . '" target="_blank">Voir le PDF</a>');
    } else {
        return redirect()->back()->with('error', 'Rendez-vous introuvable.');
    }
}





private function generatePDF($client, $voiture, $rendezvous)
{
    // Charger la bibliothèque TCPDF
    $pdf = new TCPDF();

    // Ajouter une page
    $pdf->AddPage();

    // Définir la police pour le titre
    $pdf->SetFont('helvetica', 'B', 16);
    $pdf->Cell(0, 10, 'Rendez-vous Validé', 0, 1, 'C');

    // Définir la police pour le contenu
    $pdf->SetFont('helvetica', '', 12);

    // Ajouter les informations du client
    $pdf->Ln(10);
    $pdf->Cell(0, 10, 'Informations du Client:', 0, 1);
    $pdf->Cell(0, 10, 'Nom: ' . $client['nom'] . ' ' . $client['prenom'], 0, 1);
    $pdf->Cell(0, 10, 'Email: ' . $client['email'], 0, 1);
    $pdf->Cell(0, 10, 'Téléphone: ' . $client['telephone'], 0, 1);
    $pdf->Cell(0, 10, 'Adresse: ' . $client['adresse'], 0, 1);

    // Ajouter les informations de la voiture
    $pdf->Ln(10);
    $pdf->Cell(0, 10, 'Informations de la Voiture:', 0, 1);
    $pdf->Cell(0, 10, 'Marque: ' . $voiture['marque'], 0, 1);
    $pdf->Cell(0, 10, 'Modèle: ' . $voiture['modele'], 0, 1);
    $pdf->Cell(0, 10, 'Année de Fabrication: ' . $voiture['annee_fabrication'], 0, 1);
    $pdf->Cell(0, 10, 'Immatriculation: ' . $voiture['immatriculation'], 0, 1);

    // Ajouter les informations du rendez-vous
    $pdf->Ln(10);
    $pdf->Cell(0, 10, 'Informations du Rendez-vous:', 0, 1);
    $pdf->Cell(0, 10, 'Date: ' . $rendezvous['date_rendez_vous'], 0, 1);
    $pdf->Cell(0, 10, 'Heure: ' . $rendezvous['heure_rendez_vous'], 0, 1);

    // Spécifier le répertoire de stockage du PDF
    $uploadPath = WRITEPATH . 'uploads/pdfs/'; // Répertoire public ou writable

    // Créer le répertoire s'il n'existe pas
    if (!is_dir($uploadPath)) {
        mkdir($uploadPath, 0777, true);
    }

    // Nom du fichier PDF (par exemple : 'Rendezvous_123.pdf')
    $pdfFileName = 'Rendezvous_' . $rendezvous['id'] . '.pdf';

    // Sauvegarder le fichier PDF sur le serveur
    $pdf->Output($uploadPath . $pdfFileName, 'F'); // 'F' pour enregistrer le fichier

    // Retourner le nom du fichier PDF pour un usage ultérieur
    return $pdfFileName;
}

public function rejeter($id)
{
    $rendezvousModel = new \App\Models\RendezvousModel();
    $rendezvousModel->updateStatus($id, 'rejeté');
    $rendezvousModel->update($id, ['is_new' => 0]);

    return redirect()->to('admin/notifications')->with('success', 'Le rendez-vous a été rejeté.');
}



public function markSeen($id)
{
    $rendezvousModel = new RendezvousModel();

    // Mettre à jour le champ 'is_new' pour marquer la notification comme vue
    $rendezvousModel->update($id, ['is_new' => 0]);

    return redirect()->to('admin/notifications')->with('success', 'La notification a été marquée comme vue.');
}






}
