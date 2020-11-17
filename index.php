
<?php
require 'flight/Flight.php';
require 'jsonindent.php';
Flight::register('db', 'Database', array('rest'));
$json_podaci = file_get_contents("php://input");
Flight::set('json_podaci', $json_podaci );
Flight::route('/', function(){
    echo 'hello world!';
});

Flight::route('GET /novosti.json', function(){
	header ("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$db->select();
	$niz=array();
	while ($red=$db->getResult()->fetch_object()){
		$niz[] = $red;
	}
	//JSON_UNESCAPED_UNICODE parametar je uveden u PHP verziji 5.4
	//Omogućava Unicode enkodiranje JSON fajla
	//Bez ovog parametra, vrši se escape Unicode karaktera
	//Na primer, slovo č će biti \u010

	
	$json_niz = json_encode ($niz,JSON_UNESCAPED_UNICODE);

	echo indent($json_niz);


	return false;
});
Flight::route('GET /novosti/@id.json', function($id){
	header ("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$db->select("novosti", "*", "kategorije", "kategorija_id", "id", "novosti.id = ".$id, null);
	$red=$db->getResult()->fetch_object();

	

	//JSON_UNESCAPED_UNICODE parametar je uveden u PHP verziji 5.4
	//Omogućava Unicode enkodiranje JSON fajla
	//Bez ovog parametra, vrši se escape Unicode karaktera
	//Na primer, slovo č će biti \u010
	/*
	$json_niz = json_encode ($red,JSON_UNESCAPED_UNICODE);
	echo indent($json_niz);
	*/

	return false;
});
Flight::route('GET /kategorije.json', function(){
	header ("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$db->select("kategorije", "*", null, null, null, null, null);
	$niz=array();
	$i=0;
	while ($red=$db->getResult()->fetch_object()){
		
		$niz[$i]["id"] = $red->id;
		$niz[$i]["kategorija"] = $red->kategorija;
		$db_pomocna=new Database("rest");
		$db_pomocna->select("novosti", "*", null, null, null, "novosti.kategorija_id = ".$red->id, null);
		while ($red_pomocna=$db_pomocna->getResult()->fetch_object()){
			$niz[$i]["novosti"][]=$red_pomocna;
		}
		$i++;
	}
	//JSON_UNESCAPED_UNICODE parametar je uveden u PHP verziji 5.4
	//Omogućava Unicode enkodiranje JSON fajla
	//Bez ovog parametra, vrši se escape Unicode karaktera
	//Na primer, slovo č će biti \u010
	$json_niz = json_encode ($niz,JSON_UNESCAPED_UNICODE);
	echo indent($json_niz);
	return false;
});
Flight::route('GET /kategorije/@id.json', function($id){
	header ("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$db->select("kategorije", "*", null, null, null, "kategorije.id = ".$id, null);
	$niz=array();
	
	$red=$db->getResult()->fetch_object();
		
		$niz["id"] = $red->id;
		$niz["kategorija"] = $red->kategorija;
		$db_pomocna=new Database("rest");
		$db_pomocna->select("novosti", "*", null, null, null, "novosti.kategorija_id = ".$red->id, null);
		while ($red_pomocna=$db_pomocna->getResult()->fetch_object()){
		$niz["novosti"][]=$red_pomocna;
		}

	//JSON_UNESCAPED_UNICODE parametar je uveden u PHP verziji 5.4
	//Omogućava Unicode enkodiranje JSON fajla
	//Bez ovog parametra, vrši se escape Unicode karaktera
	//Na primer, slovo č će biti \u010
	$json_niz = json_encode ($niz,JSON_UNESCAPED_UNICODE);
	echo indent($json_niz);
	return false;


});


Flight::start();
?>


	
