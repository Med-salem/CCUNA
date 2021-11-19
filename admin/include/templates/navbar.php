<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-nav" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href=""><?php echo lang('HOME_ADMIN') ?></a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="app-nav">
      <ul class="nav navbar-nav">
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo lang('PRESENTATION') ?><span class="caret"></span></a>
                  <ul class="dropdown-menu">
                  <li role="separator" class="divider"></li>
                  <li><a href="#"><?php echo lang('CCUNA') ?></a></li>
                  <li><a href="#"><?php echo lang('MOTPRESIDENT') ?></a></li>
                  <li><a href="#"><?php echo lang('MISSION') ?></a></li>
                  <li><a href="#"><?php echo lang('CHARTES') ?></a></li>    
              </ul>
              </li>
                  <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo lang('PROJET') ?><span class="caret"></span></a>
                  <ul class="dropdown-menu">
                  <li role="separator" class="divider"></li>
                  <li><a href="#"><?php echo lang('LISTPROJET') ?></a></li>
                  <li><a href="#"><?php echo lang('SOUM_PROJET') ?></a></li>
              </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo lang('FORMATION') ?><span class="caret"></span></a>
                  <ul class="dropdown-menu">
                  <li role="separator" class="divider"></li>
                  <li><a href="#"><?php echo lang('ETUDIENT') ?></a></li>
                  <li><a href="#"><?php echo lang('PROFESSEUR') ?></a></li>
              </ul>
              </li>
              <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo lang('PARTENAIRES') ?><span class="caret"></span></a>
              </li>
              <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo lang('CONTACT') ?><span class="caret"></span></a>
              </li>
        <!-- <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
          <li role="separator" class="divider"></li>
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li> -->
      </ul>
      <ul class="nav navbar-nav navbar-right">
      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
      </form>
      <!-- <div style="display: inline;padding-top:20px;">
                <div class="dropdown" style="display: inline;">
                    <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Welcome, [NAME] <span class="caret"></span></button>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                        <li role="presentation">
                            <a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp; My Profile</a>
                        </li>
                        <li role="presentation">
                            <a href="#"><span class="glyphicon glyphicon-envelope"></span>&nbsp; Messages <span class="badge pull-right">5</span></a>
                        </li>
                        <li role="presentation">
                            <a href="#"><span class="glyphicon glyphicon-usd"></span>&nbsp; Make A Payment</a>
                        </li>
                        <li role="presentation" class="divider"></li>
                        <li role="presentation"><a href="/?Action=Logoff" ><span class="glyphicon glyphicon-off"></span>&nbsp; Sign Out</a></li>
                    </ul>
                </div>

            </div> -->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-globe"></i><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#ar">Arabe</a></li>
            <li><a href="#fr">Français</a></li>
            <li><a href="#en">English</a></li>
            <!-- <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li> -->
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>



<!-- 
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
              </li> -->