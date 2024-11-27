<?php

namespace App\Controllers;

use App\Models\FeedbackModel;

class FeedbackController extends BaseController
{
    public function submit()
    {
        $feedbackModel = new FeedbackModel();

        $data = [
            'message' => $this->request->getPost('message'),
            'rating' => $this->request->getPost('rating'),
        ];

        if ($feedbackModel->insert($data)) {
            return redirect()->back()->with('success', 'Merci pour votre feedback !');
        } else {
            return redirect()->back()->with('error', 'Erreur lors de la soumission de votre feedback.');
        }
    }

    public function sendFeedback()
{
    $feedbackModel = new \App\Models\FeedbackModel();

    // Récupérer les données envoyées par le formulaire
    $message = $this->request->getPost('message');
    $rating = $this->request->getPost('rating');

    // Valider les données (facultatif, mais recommandé)
    if (empty($message) || empty($rating)) {
        return redirect()->back()->with('error', 'Veuillez remplir tous les champs.');
    }

    // Sauvegarder le feedback
    $feedbackData = [
        'message' => $message,
        'rating' => $rating,
    ];

    if ($feedbackModel->insert($feedbackData)) {
        // Retourner un message de succès sans redirection
        return redirect()->back()->with('success', 'Votre message a été envoyé avec succès. Merci pour votre avis !');
    } else {
        return redirect()->back()->with('error', 'Une erreur est survenue. Veuillez réessayer.');
}
}



}
