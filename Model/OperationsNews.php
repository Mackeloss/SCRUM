<?php
/*
*OperationsNews.php
* Regroupe toutes les opérations en lien avec les news
*
*/

//Permet de récupérer toutes les news dans un tableau
function get_allnews($offset,$limit){
 include('Model/ConnexionBD.php');
 include('Model/Class/News.class.php');
 $query=$bdd->prepare('SELECT * FROM news ORDER BY date LIMIT :offset,:limit');
 $query->bindParam(':offset', $offset, PDO::PARAM_INT);
 $query->bindParam(':limit', $limit, PDO::PARAM_INT);
 $query->execute();
 $tabNews=array();
 while($news=$query->fetch()){
   $tabNews[]=new News($news['id'],$news['titre'],$news['contenu'],$news['cover'],$news['auteur'],$news['date']);
 }
 return $tabNews;
}

//Retourne la news correspondante à l'ID fourni en paramètre
function getNews($id){
		include('Model/Class/News.class.php');
		include('Model/ConnexionBD.php');
		$query=$bdd->prepare('Select * From news Where id=?');
		$query->execute(array($id));
		$news=$query->fetch();
		$varNews=new News($news['id'],$news['titre'],$news['contenu'],$news['cover'],$news['auteur'],$news['date']);

		return $varNews;
	}

//Cette fonctionnalité est en cours d'implémentation et n'est pas encore opérationnelle.

/*
	function creerNews($id, $titre, $contenu, $cover, $auteur, $date){
	
	}

	function supprNews($id){
	
	}
*/
?>
