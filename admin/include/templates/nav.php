<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="dashbord.php">Home</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo lang('PRESENTATION') ?><span class="caret"></span></a>
                  <ul class="dropdown-menu">
                  <li><a href="#"><?php echo lang('CCUNA') ?></a></li>
                  <li><a href="#"><?php echo lang('MOTPRESIDENT') ?></a></li>
                  <li><a href="#"><?php echo lang('MISSION') ?></a></li>
                  <li><a href="#"><?php echo lang('CHARTES') ?></a></li>    
              </ul>
              </li>
                  <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo lang('PROJET') ?><span class="caret"></span></a>
                  <ul class="dropdown-menu">
                  <li><a href="#"><?php echo lang('LISTPROJET') ?></a></li>
                  <li><a href="#"><?php echo lang('SOUM_PROJET') ?></a></li>
              </ul>
              </li>
              <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo lang('FORMATION') ?><span class="caret"></span></a>
                  <ul class="dropdown-menu">
                  <li><a href="#"><?php echo lang('ETUDIENT') ?></a></li>
                  <li><a href="#"><?php echo lang('PROFESSEUR') ?></a></li>
              </ul>
              </li>
              <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo lang('PARTENAIRES') ?><span class="caret"></span></a>
              </li>
              <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo lang('CONTACT') ?><span class="caret"></span></a>
              </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Med Salem <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="members.php?do=Edit&userID=<?php echo $_SESSION['ID'];?>">Edit Page</a></li>
            <li><a href="members.php"><?php echo lang('MEMBERS') ?></a></li>
            <li><a href="#">Settings</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="logout.php">logout</a></li>
            <li role="separator" class="divider"></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
      </form>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-globe"></i><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#ar"><span class="fas fa-flag-usa"></span>AR</a></li>
            <li><a href="#fr">FR</a></li>
            <li><a href="#en">EN</a></li>
            <!-- <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li> -->
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>













<!-- <ul class="nav nav-pills" id="mainNav">
              <li class=""> <a href="http://www.utm.rnu.tn/utm/fr/"> Accueil</a> </li>
              <li class="dropdown dropdown-mega"> <a class="dropdown-toggle" href="#"> Université <i class="fa fa-caret-down"></i></a>
                <ul class="dropdown-menu">
                  <li>
                    <div class="dropdown-mega-content">
                      <div class="row">
                        <div class="col-md-4"> <span class="dropdown-mega-sub-title">L'université</span>
                          <ul class="dropdown-mega-sub-nav">
                            <li><a href="http://www.utm.rnu.tn/utm/fr/universite--presentation">Présentation</a></li>
                            <li><a href="http://www.utm.rnu.tn/utm/fr/universite--mot-du-president">Mot du Président</a></li>
                            <li><a href="http://www.utm.rnu.tn/utm/fr/universite--missions-et-objectifs">Missions et Objectifs</a></li>
                            <li><a href="http://www.utm.rnu.tn/utm/fr/universite--chiffres-cles">Chiffres Clés</a></li>
                          </ul>
                        </div>
                        <div class="col-md-4"> <span class="dropdown-mega-sub-title">Organisation générale</span>
                          <ul class="dropdown-mega-sub-nav">
                            <li><a href="http://www.utm.rnu.tn/utm/fr/universite--organigramme">Organigramme</a></li>
                            <li><a href="http://www.utm.rnu.tn/utm/fr/universite--conseil-universite">Conseil de l'Université</a></li>
                            <li><a href="http://www.utm.rnu.tn/utm/fr/universite--conseils-scientifiques">Conseils Scientifiques</a></li>
                            <li><a href="http://www.utm.rnu.tn/utm/fr/universite--contacts">Contacts</a></li>
                            <li><a href="http://www.utm.rnu.tn/utm/fr/universite--comptes-institutionnels">Comptes Institutionnels</a></li>
                            <li><a href="http://www.utm.rnu.tn/utm/fr/universite--acces-a-l-information">Accès à l'Information</a></li>
                          </ul>
                        </div>
                        <div class="col-md-4"> <span class="dropdown-mega-sub-title">Visiter l'UTM</span>
                          <ul class="dropdown-mega-sub-nav">
                            <li><a href="http://www.utm.rnu.tn/utm/fr/universite--plan-acces">Plan d'accès</a></li>
                            <li><a href="http://www.utm.rnu.tn/utm/fr/universite--carte-universitaire">Carte Universitaire</a></li>
                            <li><a href="http://www.utm.rnu.tn/utm/fr/universite--visite-virtuelle">Visite Virtuelle</a></li>
                            <li><a href="http://www.utm.rnu.tn/utm/fr/galerie">Galerie Photos &amp; Vidéos</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </li>
                </ul>
              </li>
              <li class="dropdown dropdown-mega"> <a class="dropdown-toggle" href="#"> établissements <i class="fa fa-caret-down"></i></a>
                <ul class="dropdown-menu">
                  <li>
                    <div class="dropdown-mega-content">
                      <div class="row">
                        <div class="col-md-4"> <span class="dropdown-mega-sub-title">Institut</span>
                          <ul class="dropdown-mega-sub-nav">
                            <li><a href="http://www.utm.rnu.tn/utm/fr/etablissements--institut-bourguiba-des-langues-vivantes">Institut Bourguiba des Langues Vivantes</a></li>
                            <li><a href="http://www.utm.rnu.tn/utm/fr/etablissements--institut-pasteur-de-tunis">Institut Pasteur de Tunis</a></li>
                            <li><a href="http://www.utm.rnu.tn/utm/fr/etablissements--institut-de-recherche-veterinaire-de-tunis">Institut de Recherche Vétérinaire de Tunis</a></li>
                            <li><a href="http://www.utm.rnu.tn/utm/fr/etablissements--institut-preparatoire-aux-eudes-d-ingenieurs-el-manar">Institut Préparatoire aux Eudes d'Ingénieurs el Manar</a></li>
                            <li><a href="http://www.utm.rnu.tn/utm/fr/etablissements--institut-superieur-d-informatique">Institut Supérieur d'Informatique</a></li>
                            <li><a href="http://www.utm.rnu.tn/utm/fr/etablissements--institut-superieur-des-sciences-biologiques-appliquees-de-tunis">Institut Supérieur des Sciences Biologiques Appliquées de Tunis</a></li>
                            <li><a href="http://www.utm.rnu.tn/utm/fr/etablissements--institut-superieur-des-sciences-humaines-de-tunis">Institut Supérieur des Sciences Humaines de Tunis</a></li>
                            <li><a href="http://www.utm.rnu.tn/utm/fr/etablissements--institut-superieur-des-sciences-infirmieres-de-tunis">Institut Supérieur des Sciences Infirmières de Tunis</a></li>
                            <li><a href="http://www.utm.rnu.tn/utm/fr/etablissements--institut-superieur-des-technologies-medicales-de-tunis">Institut Supérieur des Technologies Médicales de Tunis</a></li>
                          </ul>
                        </div>
                        <div class="col-md-4"> <span class="dropdown-mega-sub-title">Faculté</span>
                          <ul class="dropdown-mega-sub-nav">
                            <li><a href="http://www.utm.rnu.tn/utm/fr/etablissements--faculte-de-droit-et-des-sciences-politiques-de-tunis">Faculté de Droit et des Sciences Politiques de Tunis</a></li>
                            <li><a href="http://www.utm.rnu.tn/utm/fr/etablissements--faculte-de-medecine-de-tunis">Faculté de Médecine de Tunis</a></li>
                            <li><a href="http://www.utm.rnu.tn/utm/fr/etablissements--faculte-des-sciences-economiques-et-de-gestion-de-tunis">Faculté des Sciences Economiques et de Gestion de Tunis</a></li>
                            <li><a href="http://www.utm.rnu.tn/utm/fr/etablissements--faculte-des-sciences-mathematiques-physiques-et-naturelles-de-tunis">Faculté des Sciences Mathématiques Physiques et Naturelles de Tunis</a></li>
                          </ul>
                        </div>
                        <div class="col-md-4"> <span class="dropdown-mega-sub-title">Ecole</span>
                          <ul class="dropdown-mega-sub-nav">
                            <li><a href="http://www.utm.rnu.tn/utm/fr/etablissements--ecole-nationale-d-ingenieurs-de-tunis">Ecole Nationale d'Ingénieurs de Tunis</a></li>
                            <li><a href="http://www.utm.rnu.tn/utm/fr/etablissements--ecole-superieure-des-sciences-et-techniques-de-la-sante-de-tunis">Ecole Supérieure des Sciences et Techniques de la Santé de Tunis</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </li>
                </ul>
              </li>
              <li class="dropdown dropdown-mega"> <a class="dropdown-toggle" href="#"> Formation <i class="fa fa-caret-down"></i></a>
                <ul class="dropdown-menu">
                  <li>
                    <div class="dropdown-mega-content">
                      <div class="row">
                        <div class="col-md-4"> <span class="dropdown-mega-sub-title">Schéma des Etudes</span>
                          <ul class="dropdown-mega-sub-nav">
                            <li><a href="http://www.utm.rnu.tn/utm/fr/formation--presentation-schema-des-etudes">Présentation</a></li>
                          </ul>
                          <span class="dropdown-mega-sub-title">Formation LMD</span>
                          <ul class="dropdown-mega-sub-nav">
                            <li><a href="http://www.utm.rnu.tn/utm/fr/formation--presentation-lmd">Présentation</a></li>
                            <li><a href="http://www.utm.rnu.tn/utm/fr/formation--licence">Licence</a></li>
                            <li><a href="http://www.utm.rnu.tn/utm/fr/formation--mastere">Mastère</a></li>
                            <li><a href="http://www.utm.rnu.tn/utm/fr/formation--doctorat">Doctorat</a></li>
                          </ul>
                        </div>
                        <div class="col-md-4"> <span class="dropdown-mega-sub-title">Formation Diplômante</span>
                          <ul class="dropdown-mega-sub-nav">
                            <li><a href="http://www.utm.rnu.tn/utm/fr/formation--cycle-preparatoire">Cycle Préparatoire</a></li>
                            <li><a href="http://www.utm.rnu.tn/utm/fr/formation--diplome-national-d-ingenieur">Diplôme National d'Ingénieur</a></li>
                            <li><a href="http://www.utm.rnu.tn/utm/fr/formation--habilitation-universitaire">Habilitation Universitaire</a></li>
                            <li><a href="http://www.utm.rnu.tn/utm/fr/formation--professeur-emerite">Professeur Emérite</a></li>
                          </ul>
                        </div>
                        <div class="col-md-4"> 
                        <span class="dropdown-mega-sub-title">EAD</span>
                         <ul class="dropdown-mega-sub-nav">
                        <li><a href="http://www.utm.rnu.tn/utm/fr/formation--enseignement-a-distance">Enseignement à distance</a></li>
                        <li><a href="http://www.utm.rnu.tn/utm/fr/formation--plateforme-de-cours-a-distance">Plateforme de cours à distance</a></li>
                         </ul>
                        <span class="dropdown-mega-sub-title">Divers</span>
                          <ul class="dropdown-mega-sub-nav">
                            <li><a href="http://www.utm.rnu.tn/utm/fr/formation--formation-continue">Formation Continue</a></li>
                            
                            <li><a href="http://www.utm.rnu.tn/utm/fr/formation--paq">PAQ</a></li>
                            <li><a href="http://www.utm.rnu.tn/utm/fr/formation--departements-d-enseignement">Départements d'Enseignement</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </li>
                </ul>
              </li>
              <li class="dropdown dropdown-mega"><a class="dropdown-toggle" href="#">Recherche et Coopération<i class="fa fa-caret-down"></i></a>
                <ul class="dropdown-menu">
                  <li>
                    <div class="dropdown-mega-content">
                      <div class="row">
                        <div class="col-md-4"> <span class="dropdown-mega-sub-title">Coopération</span>
                          <ul class="dropdown-mega-sub-nav">
                            <li><a href="http://www.utm.rnu.tn/utm/fr/cooperation--accords-cadres">Accords Cadres</a></li>
                            <li><a href="http://www.utm.rnu.tn/utm/fr/cooperation--accords-specifiques">Accords Spécifiques</a></li>
                            <li><a href="http://www.utm.rnu.tn/utm/fr/cooperation--conventions-de-cotutelles">Conventions de Cotutelles</a></li>
                            <li><a href="http://www.utm.rnu.tn/utm/fr/cooperation--etudiants-etrangers">Etudiants Etrangers</a></li>
                          </ul>
                        </div>
                        <div class="col-md-4"> <span class="dropdown-mega-sub-title">Projets</span>
                          <ul class="dropdown-mega-sub-nav">
                            <li><a href="http://www.utm.rnu.tn/utm/fr/cooperation--projets-h2020">Projets H2020</a></li>
                            <li><a href="http://www.utm.rnu.tn/utm/fr/cooperation--projets-erasmus-plus">Projets Erasmus +</a></li>
                          </ul>
                        </div>
                        <div class="col-md-4"> <span class="dropdown-mega-sub-title">Recherche</span>
                          <ul class="dropdown-mega-sub-nav">
                          	<li><a href="http://www.utm.rnu.tn/utm/fr/recherche--butt">BuTT</a></li>
                            <li><a href="http://www.utm.rnu.tn/utm/fr/recherche--visirech">Visirech</a></li>
                            <li><a href="http://www.utm.rnu.tn/utm/fr/recherche--systeme-antiplagiat">Système Antiplagiat</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </li>
                </ul>
              </li>
              <li class="dropdown dropdown-mega"><a class="dropdown-toggle" href="#">Vie Etudiante<i class="fa fa-caret-down"></i></a>
                <ul class="dropdown-menu">
                  <li>
                    <div class="dropdown-mega-content">
                      <div class="row">
                        <div class="col-md-6"> <span class="dropdown-mega-sub-title">Vie Etudiante</span>
                          <ul class="dropdown-mega-sub-nav">
                            <li><a href="http://www.utm.rnu.tn/utm/fr/vie-etudiante--sante-et-solidarite">Santé et Solidarité</a></li>
                            <li><a href="http://www.utm.rnu.tn/utm/fr/vie-etudiante--hebergement-et-restauration">Hébergement et Restauration</a></li>
                            <li><a href="vie-etudiante--activites-culturelles-et-sportives">Activités Culturelles et Sportives</a></li>
                            <li><a href="http://www.utm.rnu.tn/utm/fr/vie-etudiante--aide-psychologique">Aide Psychologique</a></li>
                          </ul>
                        </div>
                        <div class="col-md-6"> <span class="dropdown-mega-sub-title">Bourses</span>
                          <ul class="dropdown-mega-sub-nav">
                            <li><a href="http://www.utm.rnu.tn/utm/fr/vie-etudiante--bourses-nationales-de-3eme-cycle">Bourses Nationales de 3ème Cycle</a></li>
                            <li><a href="http://www.utm.rnu.tn/utm/fr/vie-etudiante--bourses-a-l-etranger">Bourses à l'Etranger</a></li>
                            <li><a href="http://www.utm.rnu.tn/utm/fr/vie-etudiante--bourses-en-alternance">Bourses en Alternance</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </li>
                </ul>
              </li>
              <li class="dropdown dropdown-mega"><a class="dropdown-toggle" href="#">Observatoire et Employabilité<i class="fa fa-caret-down"></i></a>
                <ul class="dropdown-menu">
                  <li>
                    <div class="dropdown-mega-content">
                      <div class="row">
                        <div class="col-md-6"> <span class="dropdown-mega-sub-title">Observatoire</span>
                          <ul class="dropdown-mega-sub-nav">
                            <li><a href="http://www.utm.rnu.tn/utm/fr/observatoire-et-employabilite--presentation-de-l-observatoire">Présentation de l'Observatoire</a></li>
                            <li><a href="http://www.utm.rnu.tn/utm/fr/observatoire-et-employabilite--statistiques">Statistiques</a></li>
                            <li><a href="http://www.utm.rnu.tn/utm/fr/observatoire-et-employabilite--sondages">Sondages</a></li>
                          </ul>
                        </div>
                        <div class="col-md-6"> <span class="dropdown-mega-sub-title">Employabilité</span>
                          <ul class="dropdown-mega-sub-nav">
                            <li><a href="http://www.utm.rnu.tn/utm/fr/observatoire-et-employabilite--centre-de-carrieres">Centre de Carrières</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </li>
                </ul>
              </li>
            </ul> -->