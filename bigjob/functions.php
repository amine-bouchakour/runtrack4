<?php

try{
    $db_host="localhost";
    $db_name="bigJob";
    $db_user="root";
    $db_pass="";

    $DB = new PDO ('mysql:host='.$db_host.';dbname='.$db_name,$db_user,$db_pass); 
    // echo "Connexion à la base de donnée réussie</br>";
    return $DB;
}

catch(PDOException $e){
    echo "Echec connexion à la base de donnée</br>";
}



function inscription($login,$password,$confPassword,$email){
        global $DB;

    // recherche si login déjà existant
        $sql ="SELECT * FROM `users` WHERE login='".$login."'";
        $res= $DB -> query($sql);
        $info = $res ->fetch(PDO::FETCH_OBJ);

        $mailParts = explode('@', $email);
        

    if(isset($login) && isset($password) && isset($confPassword) && isset($email)){

        // inscription si login inexistant
        if(empty($info)){
            
            $passhash=password_hash($password,PASSWORD_DEFAULT);

            if($password==$confPassword){

                if ($mailParts[1] == "laplateforme.io"){

                    try{
                        $infoUser= array('login'=>$login,'password'=>$passhash,'email'=>$email);

                        $req = $DB ->prepare('INSERT INTO `users` (`login`,`password`,`email`) VALUE (:login,:password,:email)');
                        $req -> execute($infoUser);
                        header("location:connexion.php?login=$login");
                    }
                    catch(PDOException $e){
                        echo "La requete d'inscription à échoué</br>";
                    }
                }
                else{
                    echo "Seul les étudiants de la Plateforme ont le droit de s'inscrire.";
                }
            }
            else{
                echo "Le mot de passe et la confirmation de mot de passe doivent être identiques</br></br>";
            }
        }

        else{
            echo "Login déjà pris</br></br>";
        }
    }
    else{
        "Veuillez saisir toutes les informations demandées</br></br>";
    }
}


function connexion ($login,$password){
        global $DB;

    try{
        $sql="SELECT id as id_user,login,password FROM `users` WHERE login='".$login."'";
        $res = $DB->query($sql);
        $info = $res->fetch(PDO::FETCH_OBJ);
        // print_r($info);
    }

    catch(PDOException $e){
        echo "La requete de connexion à votre compte à échoué</br>";
    }

    if($info){
        $passverify=password_verify($password,$info->password); 

        if($passverify==$info->password){
            $_SESSION['id_user']=$info->id_user;
            $_SESSION['login']=$info->login;
            header('location:index.php');
        }
        else{
            echo "Password incorrecte</br></br>";
        }
    }

    else{
        echo "Login inexistant</br></br>";
    }

}


function updateProfil($login,$password,$confPassword){
        global $DB;

    $sqlRecup="SELECT login FROM `users` WHERE login='".$_SESSION['login']."'";
    $res = $DB -> query($sqlRecup);
    $info = $res -> fetch(PDO::FETCH_OBJ);

    if($password==$confPassword){

        $passhash=password_hash($password,PASSWORD_DEFAULT);

        try{
            $sql=("UPDATE `users` SET login='".$login."', password='".$passhash."' WHERE login='".$_SESSION['login']."'");
            $req = $DB-> query($sql);
            $res = $req ->fetch(PDO::FETCH_OBJ);

            $_SESSION['login']=$login;

            header('location:profil.php');
        }

        catch(PDOException $e){
            echo "La modification de profil à échoué</br>";
        }
    }
    else{
        echo "Le mot de passe et la confirmation de mot de passe doivent être identiques</br></br>";
    }
    return $info;
}




function infoUser($login){
        global $DB;
        
    try{
        $sql="SELECT * FROM `users` WHERE login='".$login."'";
        $req = $DB->query($sql);
        $res = $req ->fetch(PDO::FETCH_OBJ);
    }

    catch(PDOException $e){
        echo "La requête 'récupéréré toutes les infos de l'utilisateurs à échoué</br>";
    }

    return $res;
}











?>