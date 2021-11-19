<?php

function lang($phrase){
    static $lang =array(
    
        // NavBar 
        'HOME_ADMIN' 		    => 'Home',
        'PRESENTATION' 		    => 'Presentation',
            'CCUNA'        => 'The CCUNA',
            'MOTPRESIDENT' => 'President\'s Word',
            'MISSION'      => 'Mission and Objective',
            'CHARTES'      => 'Charters',
        'PROJET' 			    => 'Projects',
            'LISTPROJET'   => 'Liste des Projets',
            'SOUM_PROJET'  => 'Submit a Project',
        'FORMATION' 			=> 'Training',
            'ETUDIENT'     => 'Student training',
            'PROFESSEUR'   => 'Teacher training',
        'PARTENAIRES' 			=> 'Partners',
        'CONTACT' 		  	    => 'Contact Us',
        
        'MEMBERS'           => 'Members'

		
          );
    return $lang[$phrase];
}

?>