<?php
    include("conn.php");
    header('Content-type: application/json ');
    ini_set('display_errors','On');
    $number=$_POST['numero'];
    $user=array();
    $response = array("success" => 0, "error" => 0);
    $sql="SELECT * FROM user WHERE numero='$number'";
    $req = $pdo->prepare($sql);
    $req->execute();
    $user = $req->fetchALL();
    //print_r($user);
    $nb = count($user);
    if ($nb==1) {
            $id = $user[0]["id_user"];
            $pin = mt_rand(100000,999999);
            $sql = "UPDATE user SET pin = :pin
            WHERE id_user = :id";
            $stmt = $pdo->prepare($sql);                                  
            $stmt->bindParam(':pin', $pin, PDO::PARAM_INT);   
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);   
            $resultat = $stmt->execute(); 
            print_r("Resultat : ".$resultat);
            if ($resultat == 1) {
                $response["success"] = 1;
                $response["msg"] = "Vous allez recevoir un message";
                $response["pin"] = $pin;
                echo json_encode($response);
            }else{
                $response["success"] = 0;
                $response["msg"] = "Erreur dans la génération du mot de passe";
                echo json_encode($response);
            }
            
        } else {
            $response["success"] = 0;
            $response["msg"] = "Numéro invalide";
            echo json_encode($response);
        }
?>