<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Utilisateur - Multi-Step Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .step {
            display: none;
        }
        .step.active {
            display: block;
        }
        .is-invalid {
            border-color: red;
        }
        .progress-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .progress-step {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .progress-step .circle {
            width: 40px;
            height: 40px;
            background: #e0e0e0;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }
        .progress-step.active .circle {
            background: #1977cc;
            color: white;
        }
        .progress-bar {
            flex: 1;
            height: 4px;
            background: #e0e0e0;
        }
        .progress-bar.active {
            background: #1977cc;
        }
    </style>
</head>
<body>
    <div class="container mt-3">
        <!-- Barre de progression -->
        <div class="progress-container">
            <div class="progress-step active">
                <div class="circle">1</div>
                <p>Informations</p>
            </div>
            <div class="progress-bar"></div>
            <div class="progress-step">
                <div class="circle">2</div>
                <p>Contact</p>
            </div>
            <div class="progress-bar"></div>
            <div class="progress-step">
                <div class="circle">3</div>
                <p>Final</p>
            </div>
        </div>

        <?php if (session()->getFlashdata('success')): ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Succès',
                    text: '<?= session()->getFlashdata('success') ?>',
                    confirmButtonColor: '#1977cc'
                });
            </script>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Erreur',
                    text: '<?= session()->getFlashdata('error') ?>',
                    confirmButtonColor: '#1977cc'
                });
            </script>
        <?php endif; ?>

        <form id="multiStepForm" action="<?= base_url('/admin/saveUser') ?>" method="post">
            <?= csrf_field() ?>

            <!-- Étape 1 -->
            <div class="step active">
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom" required>
                </div>
                <div class="mb-3">
                    <label for="prenom" class="form-label">Prénom</label>
                    <input type="text" class="form-control" id="prenom" name="prenom" required>
                </div>
                <div class="mb-3">
                    <label for="adresse" class="form-label">Adresse</label>
                    <input type="text" class="form-control" id="adresse" name="adresse" required>
                </div>
                <div class="mb-3">
                    <label for="ville" class="form-label">Ville</label>
                    <input type="text" class="form-control" id="ville" name="ville" required>
                </div>
                <button type="button" class="btn btn-primary next-step">Suivant</button>
            </div>

            <!-- Étape 2 -->
            <div class="step">
                <div class="mb-3">
                    <label for="telephone" class="form-label">Téléphone</label>
                    <input type="text" class="form-control" id="telephone" name="telephone" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="button" class="btn btn-secondary prev-step">Précédent</button>
                <button type="button" class="btn btn-primary next-step">Suivant</button>
            </div>

            <!-- Étape 3 -->
            <div class="step">
                <div class="mb-3">
                    <label for="cin" class="form-label">CIN</label>
                    <input type="text" class="form-control" id="cin" name="cin" required>
                </div>
                <div class="mb-3">
                    <label for="date_naissance" class="form-label">Date de Naissance</label>
                    <input type="date" class="form-control" id="date_naissance" name="date_naissance" required>
                </div>
                <div class="mb-3">
                    <label for="date_obtention_permis" class="form-label">Date d'Obtention du Permis</label>
                    <input type="date" class="form-control" id="date_obtention_permis" name="date_obtention_permis" required>
                </div>
                <button type="button" class="btn btn-secondary prev-step">Précédent</button>
                <button type="submit" class="btn btn-success">Enregistrer</button>
            </div>
        </form>
    </div>

    <script>
        const steps = document.querySelectorAll('.step');
        const progressSteps = document.querySelectorAll('.progress-step');
        const progressBars = document.querySelectorAll('.progress-bar');
        let currentStep = 0;

        document.querySelectorAll('.next-step').forEach(button => {
            button.addEventListener('click', () => {
                const inputs = steps[currentStep].querySelectorAll('input');
                let valid = true;

                inputs.forEach(input => {
                    if (!input.checkValidity()) {
                        valid = false;
                        input.classList.add('is-invalid');
                    } else {
                        input.classList.remove('is-invalid');
                    }
                });

                if (valid && currentStep < steps.length - 1) {
                    steps[currentStep].classList.remove('active');
                    progressSteps[currentStep].classList.remove('active');
                    if (currentStep < progressBars.length) {
                        progressBars[currentStep].classList.add('active');
                    }
                    currentStep++;
                    steps[currentStep].classList.add('active');
                    progressSteps[currentStep].classList.add('active');
                }
            });
        });

        document.querySelectorAll('.prev-step').forEach(button => {
            button.addEventListener('click', () => {
                if (currentStep > 0) {
                    steps[currentStep].classList.remove('active');
                    progressSteps[currentStep].classList.remove('active');
                    if (currentStep - 1 < progressBars.length) {
                        progressBars[currentStep - 1].classList.remove('active');
                    }
                    currentStep--;
                    steps[currentStep].classList.add('active');
                    progressSteps[currentStep].classList.add('active');
                }
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
