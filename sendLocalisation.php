<?php
    include("conn.php");
    header('Content-type: application/json ');
    ini_set('display_errors','On');
    $id_user = $_POST['id_user'];
    $longitude = $_POST['longitude'];
    $latitude = $_POST['latitude'];
    $date = date("Y-m-d H:i:s");
    $user=array();
    $response = array("success" => 0, "error" => 0);
    $sql = "INSERT INTO localisation(id_user, localisation_long, localisation_lat, localisation_date) 
    VALUES(:id_user, :longitude, :latitude, :dat) ";

    $req = $pdo->prepare($sql);    
    $resultat = $req->execute(array(
        'id_user' => $id_user,
        'longitude' => $longitude,
        'latitude' => $latitude,
        'dat' => $date
        ));
    print_r("Resultat : ".$resultat);
    if ($resultat == 1) {
        $response["success"] = 1;
        $response["msg"] = "Insertion éffectuée avec succès";
        echo json_encode($response);
    }else{
        $response["success"] = 0;
        $response["msg"] = "Erreur lors de l'insertion";
        echo json_encode($response);
    }
            
?>