<?php
    include("conn.php");
    header('Content-type: application/json ');
    ini_set('display_errors','On');
    $number=$_POST['numero']; //49431937
    $codePin=$_POST['password']; //"0101";
    $user=array();
    $response = array("success" => 0, "error" => 0);
    $sql="SELECT * FROM user u, profils p, pays pa WHERE u.id_profil = p.id_profils AND u.id_pays = pa.id_pays AND
    numero='$number' AND pin='$codePin'";
    $req = $pdo->prepare($sql);
    $req->execute();
    $user = $req->fetchALL();
    //print_r($user);
    $nb = count($user);
    if ($nb==1) {
        // marchand trouvé
            // retourne json avec la variable success = 1
            $response["success"] = 1;
            $response["msg"] = "Vous êtes connecté";
            $response["user"]["user_id"] = $user[0]["id_user"];
            $response["user"]["nom"] = $user[0]["nom"];
            $response["user"]["pays_id"] = $user[0]["id_pays"];
            $response["user"]["email"] = $user[0]["email"];
            $response["user"]["numero"] = $user[0]["numero"];
            $response["user"]["profil"] = $user[0]["id_profil"];
            $response["user"]["pin"] = $user[0]["pin"];
            $response["user"]["etat"] = $user[0]["etat"];
            $response["user"]["commission"] = $user[0]["commission"];
            $response["user"]["seuil"] = $user[0]["seuil"];
            $response["user"]["devise"] = $user[0]["devise"];
            echo json_encode($response);
        } else {
            // marchand non trouvé
            // retourne json avec un message d'erreur et la variable erreur = 1
            $response["success"] = 0;
            $response["msg"] = "Téléphone ou mot de passe invalide";
            echo json_encode($response);
        }
?>