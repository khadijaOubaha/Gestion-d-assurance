<!DOCTYPE html>  
<html lang="en">  

<head>  
    <meta charset="utf-8">  
    <meta http-equiv="X-UA-Compatible" content="IE=edge">  
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title>Multi Step Form Js Demo</title>  

    <!--Bootstrap -->  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" type="text/css">  
    <link rel="stylesheet" href="<?= base_url('assets/css/form.css') ?>" type="text/css">  
     <style>  
        body {  
            background-color: #f8f9fa; 
        }  
        .msf-view {  
            background-color: white; 
            border-radius: 5px;  
            padding: 20px;  
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); 
            margin-top: 20px;   
        }  
        .form-group label {  
            font-weight: bold;  
        }  
        .row {  
            margin-bottom: 5px; 
        }  
        .info-title {  
            font-size: 1.5rem; 
            margin-bottom: 20px;  
        }  
        label{
            color:green;
        }
       
    </style>  
</head>  

<body>  

    <div id="wrapper">  

        <div id="container body-content">  

            <div class="progress">  
                <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">  
                    <span class="sr-only">0% Complete</span>  
                </div>  
            </div>  
             
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success'); ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error'); ?>
        </div>
    <?php endif; ?>
            <form class="form-horizontal msf" action="<?= base_url('rendezvous/store') ?>" method="POST">  
                <div class="msf-header">  
                    <div class="row text-center">  
                        <div class="msf-step col-md-4"><i class="fa fa-clipboard"></i> <span>Vos informations</span></div>  
                        <div class="msf-step col-md-4"><i class="fa fa-credit-card"></i><span>Votre voiture</span></div>  
                        <div class="msf-step col-md-4"><i class="fa fa-check"></i> <span>Review and Submit</span></div>  
                    </div>  
                </div>  

                <div class="msf-content">  
                    <div class="msf-view">  
                        <div class="row">  
                            <div class="col-md-6 col-md-offset-3">  
                            <div class="form-group">  
    <input 
        id="name" 
        name="name" 
        type="text" 
        class="form-control" 
        placeholder="Nom" 
        value="<?= isset($client['nom']) ? esc($client['nom']) : '' ?>" 
        required>  
</div>  
<div class="form-group">  
    <input 
        id="prenom" 
        name="prenom" 
        type="text" 
        class="form-control" 
        placeholder="Prénom" 
        value="<?= isset($client['prenom']) ? esc($client['prenom']) : '' ?>" 
        required>  
</div>  

<div class="form-group">  
    <input 
        id="cin" 
        name="cin" 
        type="text" 
        class="form-control" 
        placeholder="C.I.N" 
        value="<?= isset($client['cin']) ? esc($client['cin']) : '' ?>" 
        required>  
</div>  
<div class="form-group">  
    <input 
        id="phone" 
        name="phone" 
        type="text" 
        class="form-control" 
        placeholder="Numéro de téléphone" 
        value="<?= isset($client['telephone']) ? esc($client['telephone']) : '' ?>" 
        required>  
</div>  
<div class="form-group">  
    <input 
        id="date_permis" 
        name="date_permis" 
        type="date" 
        class="form-control" 
        placeholder="Date d’obtention du permis" 
        value="<?= isset($client['date_obtention_permis']) ? esc($client['date_obtention_permis']) : '' ?>" 
        required>  
</div>  
<div class="form-group">  
    <input 
        id="dob" 
        name="dob" 
        type="date" 
        class="form-control" 
        placeholder="Date de naissance" 
        value="<?= isset($client['date_naissance']) ? esc($client['date_naissance']) : '' ?>" 
        required>  
</div>
                            </div>  
                        </div>  
                    </div>  

                    <div class="msf-view">  
    <div class="row">  
        <div class="col-md-6 col-md-offset-3">  
        <div class="form-group">
    <input id="marque" name="marque" type="text" class="form-control" 
           placeholder="Marque" value="<?= esc($voiture['marque']) ?>" required>
</div>
<div class="form-group">
    <input id="puissance_fiscale" name="puissance_fiscale" type="number" class="form-control"
           placeholder="Puissance fiscale" value="<?= esc($voiture['puissance_fiscale']) ?>" required>
</div>
<div class="form-group">
    <select id="carburant" name="carburant" class="form-control" required>
        <option value="" disabled selected>Choisissez le carburant</option>
        <option value="Essence" <?= $voiture['carburant'] === 'Essence' ? 'selected' : '' ?>>Essence</option>
        <option value="Diesel" <?= $voiture['carburant'] === 'Diesel' ? 'selected' : '' ?>>Diesel</option>
        <option value="Électrique" <?= $voiture['carburant'] === 'Électrique' ? 'selected' : '' ?>>Électrique</option>
        
    </select>
</div>
<div class="form-group">
    <input id="immatriculation" name="immatriculation" type="text" class="form-control"
           placeholder="Immatriculation" value="<?= esc($voiture['immatriculation']) ?>" required>
</div>

        </div>  
    </div>  
</div>    

<div class="msf-view">
    
    <div class="vvvvvv">
        <br>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <label>Nom</label>: <span><?= esc($client['nom']) ?></span>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <label>Prénom</label>: <span><?= esc($client['prenom']) ?></span>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <label>Ville</label>: <span><?= esc($client['ville']) ?></span>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <label>C.I.N</label>: <span><?= esc($client['cin']) ?></span>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <label>Numéro de téléphone</label>: <span><?= esc($client['telephone']) ?></span>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <label>Date d’obtention du permis</label>: <span><?= esc($client['date_obtention_permis']) ?></span>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <label>Date de naissance</label>: <span><?= esc($client['date_naissance']) ?></span>
        </div>
    </div>
    

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <label>Marque</label>: <span><?= esc($voiture['marque']) ?></span>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <label>Puissance fiscale</label>: <span><?= esc($voiture['puissance_fiscale']) ?></span>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <label>Carburant</label>: <span><?= esc($voiture['carburant']) ?></span>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <label>Immatriculation</label>: <span><?= esc($voiture['immatriculation']) ?></span>
        </div>
    </div>
    </div>
    <br>
    <div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="form-group">
            <label for="date_rendezvous" style="color:black">Date du rendez-vous</label>
            <input id="date_rendezvous" name="date_rendezvous" type="date" class="form-control" required>
        </div>
    </div>
</div>
   

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="form-group">
                <label for="heure_rendezvous" style="color:black">Heure du rendez-vous</label>
                <select id="heure_rendezvous" name="heure_rendezvous" class="form-control" required>
                    <option value="" disabled selected>Choisissez l'heure</option>
                    <option value="matin">Matin</option>
                    <option value="apres-midi">Après-midi</option>
                </select>
            </div>
        </div>
    </div>

</div>

                </div>  

                <div class="msf-navigation">  
                    <div class="row">  
                        <div class="col-md-3">  
                            <button type="button" data-type="back" class="btn btn-default msf-nav-button"><i class="fa fa-chevron-left"></i> Back </button>  
                        </div>  

                        <div class="col-md-3 col-md-offset-6">  
                            <button type="button" data-type="next" class="btn btn-default msf-nav-button">Next <i class="fa fa-chevron-right"></i></button>  
                            <button type="submit" data-type="submit" class="btn btn-primary msf-nav-button">Submit</button>  
                        </div>  
                    </div>  
                </div>  
            </form>  
        </div>  
    </div>  

  
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>  
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/knockout/3.4.2/knockout-min.js"></script>  
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>  
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validation-unobtrusive/3.2.6/jquery.validate.unobtrusive.min.js"></script>  

    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
    <script type="text/javascript" src="<?= base_url('assets/js/form.js') ?>"></script>  

    <script type="text/javascript">  
      function ViewModel() {  
    var self = this;  

    self.Name = ko.observable('');  
    self.Prenom = ko.observable('');  
    self.Ville = ko.observable('');  
    self.Cin = ko.observable('');  
    self.Phone = ko.observable('');  
    self.DatePermis = ko.observable('');  
    self.Dob = ko.observable('');  
    self.AdditionalDetails = ko.observable('');  
    
 
    self.Marque = ko.observable('');  
    self.PuissanceFiscale = ko.observable('');  
    self.Carburant = ko.observable('');  
    self.Immatriculation = ko.observable('');  
    self.availableTypes = ko.observableArray(['New', 'Open', 'Closed']);  
    self.chosenType = ko.observable('');  

    // Ajout des carburants disponibles  
    self.availableCarburants = ko.observableArray(['Essence', 'Diesel', 'Électrique', 'Hybride']);  
    self.chosenCountries = ko.observableArray([]);  

    // Countries example, if needed.  
    self.availableCountries = ko.observableArray(['France', 'Germany', 'Spain', 'United States', 'Mexico']);  
} 

        var viewModel = new ViewModel();  
        ko.applyBindings(viewModel);  

        $(document).on("msf:viewChanged", function(event, data) {  
            var progress = Math.round((data.completedSteps / data.totalSteps) * 100);  
            $(".progress-bar").css("width", progress + "%").attr('aria-valuenow', progress);  
        });  

        $(".msf:first").multiStepForm({  
            activeIndex: 0,  
            validate: {},  
            hideBackButton: false,  
            allowUnvalidatedStep: false,  
            allowClickNavigation: true  
        });  

   
    document.getElementById('date_rendezvous').setAttribute('min', new Date().toISOString().split('T')[0]);

    </script>  

</body>  
</html>