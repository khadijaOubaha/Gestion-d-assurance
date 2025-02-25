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
        if (!session()->get('loggedIn') || session()->get('userRole') !== 'client') {
            return redirect()->to('/login_client')->with('error', 'Vous devez être connecté pour réserver un rendez-vous.');
        }

        $clientId = session()->get('clientId');
        $clientModel = new ClientModel();
        $voitureModel = new VoitureModel();
        $client = $clientModel->find($clientId);

        if (!$client) {
            return redirect()->to('/error')->with('error', 'Client introuvable.');
        }

        $voitureId = $client['id_voiture'];
        $voiture = $voitureModel->find($voitureId);

        if (!$voiture) {
            return redirect()->to('/error')->with('error', 'Voiture introuvable.');
        }

        return view('rendez_vous', [
            'client' => $client,
            'voiture' => $voiture,
        ]);
    }

    public function store()
    {
        if (!session()->get('loggedIn') || session()->get('userRole') !== 'client') {
            return redirect()->to('/login_client')->with('error', 'Vous devez être connecté pour réserver un rendez-vous.');
        }

        $clientId = session()->get('clientId');
        $clientModel = new ClientModel();
        $voitureModel = new VoitureModel();
        $rendezVousModel = new RendezvousModel();
        $client = $clientModel->find($clientId);

        if (!$client) {
            return redirect()->to('/error')->with('error', 'Client introuvable.');
        }

        $voiture = $voitureModel->find($client['id_voiture']);

        if (!$voiture) {
            return redirect()->to('/error')->with('error', 'Aucune voiture associée à ce client.');
        }

        $dateRendezvous = $this->request->getPost('date_rendezvous');
        $heureRendezvous = $this->request->getPost('heure_rendezvous');
        $heure = ($heureRendezvous === 'matin') ? '09:00:00' : '14:00:00';
        $rendezVousData = [
            'id_client' => $clientId,
            'id_voiture' => $voiture['id'],
            'date_rendez_vous' => $dateRendezvous,
            'heure_rendez_vous' => $heure,
            'statut' => 'en attente',
        ];

        if (empty($dateRendezvous) || empty($heureRendezvous)) {
            return redirect()->back()->with('error', 'Tous les champs sont obligatoires.');
        }

        if ($rendezVousModel->insert($rendezVousData)) {
            return redirect()->to('http://localhost:8080')->with('success', 'Votre rendez-vous a été réservé avec succès.');
        } else {
            return redirect()->to('http://localhost:8080')->with('error', 'Une erreur est survenue lors de la réservation du rendez-vous.');
        }
    }

    public function list()
    {
        if (!session()->get('loggedIn') || session()->get('userRole') !== 'client') {
            return redirect()->to('/login_client')->with('error', 'Vous devez être connecté pour réserver un rendez-vous.');
        }

        $clientId = session()->get('clientId');
        $rendezvousModel = new \App\Models\RendezvousModel();

        if (!$clientId) {
            echo "Aucun client connecté.";
            return;
        }

        $rendezvous = $rendezvousModel
            ->select('rendez_vous.id, rendez_vous.date_rendez_vous, rendez_vous.heure_rendez_vous, rendez_vous.statut')
            ->where('rendez_vous.id_client', $clientId)
            ->findAll();

        return view('rendezvous_list', ['rendezvous' => $rendezvous]);
    }

    public function delete($id)
    {
        $rendezvousModel = new \App\Models\RendezvousModel();
        $rendezvous = $rendezvousModel->find($id);
        if (!$rendezvous) {
            session()->setFlashdata('error', 'Rendez-vous introuvable.');
            return redirect()->to('/client/rendezvous');
        }

        $rendezvousModel->delete($id);
        session()->setFlashdata('success', 'Rendez-vous supprimé avec succès.');
        return redirect()->to('/client/rendezvous');
    }

    public function valider($id)
    {
        $rendezvousModel = new \App\Models\RendezvousModel();
        $rendezvous = $rendezvousModel->getRendezvousWithDetails($id);

        if ($rendezvous) {
            $rendezvousModel->update($id, [
                'statut' => 'validé',
                'is_new' => 0
            ]);

            $pdf = new \TCPDF();
            $pdf->AddPage();
            $pdf->SetFont('helvetica', 'B', 16);
            $pdf->Cell(0, 10, 'Reçu', 0, 1, 'C');
            $pdf->Ln(10);
            $pdf->SetFont('helvetica', '', 12);
            $pdf->Cell(0, 10, 'AMANASS', 0, 1, 'R');
            $pdf->Ln(10);
            $pdf->SetFont('helvetica', 'I', 12);
            $pdf->Cell(0, 10, 'Bonjour, ' . $rendezvous['client_nom'] . ' ' . $rendezvous['client_prenom'], 0, 1);
            $pdf->Ln(5);
            $pdf->SetFont('helvetica', '', 12);
            $pdf->Write(0, 'Date du rendez-vous : ' . $rendezvous['date_rendez_vous']);
            $pdf->Ln(5);
            $pdf->Write(0, 'Heure : ' . $rendezvous['heure_rendez_vous']);
            $pdf->Ln(5);
            $pdf->Write(0, 'Voiture : ' . $rendezvous['voiture_marque'] . ' ' . $rendezvous['voiture_modele'] . ' - Immatriculation : ' . $rendezvous['voiture_immatriculation']);
            $pdf->Ln(10);
            $pdf->SetFont('helvetica', 'B', 12);
            $pdf->Write(0, 'Conseils pour éviter le retard :');
            $pdf->Ln(5);
            $pdf->SetFont('helvetica', '', 11);
            $pdf->Write(0, '1. Arrivez 10 minutes avant l\'heure prévue.');
            $pdf->Ln(5);
            $pdf->Write(0, '2. Vérifiez que votre voiture est prête et en état de marche.');
            $pdf->Ln(5);
            $pdf->Write(0, '3. En cas de retard, merci de nous prévenir à l\'avance.');
            $pdf->Ln(10);
            $pdf->SetFont('helvetica', 'B', 12);
            $pdf->Write(0, 'En cas de non-présentation :');
            $pdf->Ln(5);
            $pdf->SetFont('helvetica', '', 11);
            $pdf->Write(0, 'Si vous ne pouvez pas assister à ce rendez-vous, merci de prendre un nouveau rendez-vous en ligne.');
            $pdf->Ln(5);
            $pdf->Write(0, 'De plus, ce reçu doit être présenté à l\'agence pour toute assistance.');
            $pdf->Ln(15);
            $pdf->SetFont('helvetica', 'I', 12);
            $pdf->Write(0, 'Signé par : ________________');
            $pdf->Ln(10);
            $pdfDir = ROOTPATH . 'public/pdfs/';
            if (!is_dir($pdfDir)) {
                mkdir($pdfDir, 0755, true);
            }
            $pdfFileName = 'rendezvous_' . $rendezvous['id'] . '.pdf';
            $pdf->Output($pdfDir . $pdfFileName, 'F');
            return redirect()->back()->with('success', 'Le rendez-vous a été validé. <br> PDF généré pour ce rendez-vous : <a href="' . base_url('pdfs/' . $pdfFileName) . '" target="_blank">Voir le PDF</a>');
        } else {
            return redirect()->back()->with('error', 'Rendez-vous introuvable.');
        }
    }
    
    public function rejeter($id)
    {
        $rendezvousModel = new \App\Models\RendezvousModel();
        $rendezvousModel->updateStatus($id, 'rejeté');
        $rendezvousModel->update($id, ['is_new' => 0]);

        $newRendezVousCount = $rendezvousModel->getNewRendezvousCount(); 
        $newRendezVous = $rendezvousModel->getNewRendezvous(); 

        return redirect()->back()
                         ->with('success', 'Le rendez-vous a été rejeté.')
                         ->with('newRendezVousCount', $newRendezVousCount)
                         ->with('newRendezVous', $newRendezVous);
    }
      
}
