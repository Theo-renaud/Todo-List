<!doctype html>
<html>
	<head>
		<meta charset='utf-8'>
		<meta name='viewport' content='width=device-width, initial-scale=1'>
		<title>Accueil</title>
		<link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' rel='stylesheet'>
		<link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css' rel='stylesheet'>
		<link href='/vues/style/Liste.css' rel='stylesheet'>
        <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
	</head>
	
    <body className='snippet-body'>
    
    <a href='/'><button class="btn btn-primary font-weight-bold">Retour à l'accueil</button></a>

    <a href='/liste/deleteListe/ <?php $liste->getId() ?> '><button class="btn btn-primary font-weight-bold">Suppresion liste</button></a>
        <div class="page-content page-container" id="page-content">
            <div class="padding">
                <div class="row container d-flex justify-content-center">
                    <div class="col-md-12">
                        <div class="card px-3">
                            <div class="card-body">
                                
                                <h4 class="card-title"><?=$liste->getNom()?></h4>
                                <div class="add-items d-flex"> <input type="text" class="form-control todo-list-input" placeholder="Ajoutez un élément"> <button class="add btn btn-primary font-weight-bold todo-list-add-btn">Ajoutez</button> </div>
                                <div class="list-wrapper">
                                    <ul class="d-flex flex-column-reverse todo-list">
                                        <?php 
                                            foreach($liste->getLesTaches() as $tache):
                                        ?>
                                        <li>
                                            <div class="form-check"> <label class="form-check-label"> <input class="checkbox" type="checkbox"> <?= $tache->getNom() ?> <i class="input-helper"></i></label> </div> <i class="remove mdi mdi-close-circle-outline"></i>
                                        </li>
                                        <?php
                                            endforeach;
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js'></script>
        <script type='text/javascript' src='/vues/js/Accueil.js'></script>                           
	</body>
</html>