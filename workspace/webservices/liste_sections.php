<?php
	/**** SESSION ****/
	session_start();

	/**** CLASS CONTROLEUR ****/
	require_once('controleur/class/c_session.php');
	require_once('controleur/class/t_texte.php');
	require_once('controleur/class/c_utilisateur.php');
	require_once('controleur/class/f_formulaire.php');

	/**** MODELE ****/
	require_once('modele/m_session.php');
	require_once('modele/m_section.php');


	/**** OBJETS ****/
	$t_text = new t_texte();
	$f_formulaire = new f_formulaire();
	$m_session = new m_session($database);
	$c_session = new c_session($m_session, $t_text);
	$m_section = new m_section($database);


	if(isset($_POST['valeur'])){
		if($_POST['valeur'] == 'Seconde'){
			$section = $m_section->get_section_generale();
			echo '<option value="'.$section->id. '">'.$section->libelle.'</option>';
			
		}else{
			$sections = $m_section->lister_sections();
			foreach ($sections as $section) {
				if($section->libelle != 'Generale') {
	                echo '<option value="'.$section->id. '">'.$section->libelle.'</option>';
				}
            }
		}
	}
	

?>