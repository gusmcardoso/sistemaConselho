<?php
    require ('vendor/autoload.php');
    
    use App\AD\ActiveDirectory;
    use App\Session\User;
    
    //if(isset($_POST['login'],$_POST['senha'])){
        $activeDirectory = new ActiveDirectory();
        
        if($activeDirectory->authUser($_POST['login'] , $_POST['senha'])){
            User::loginAD($_POST['login']);
            header('location: index.php');
        } else {
            header('location: index.php?mensagem=<div class="alert alert-danger">Usuário ou senha incorretos;!</div>');
        }
        
       
    //}
    echo "aki1";

    include ('includes/header.php');
    
    include ('includes/loginAD.php');
    
    include ('includes/footer.php');

?>

