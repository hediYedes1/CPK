<?php

session_start();

if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];

} else {
    header('Location: login.php');
    exit;
}

$user1 = new userC();

if ($user1->getStateById($userId)!="Admin") {
    header('Location: login.php');
    exit;
}




$users = $user1->getAllUsers();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user1 = new userC();

    if (isset($_POST['addUser'])) {
       
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $state = $_POST['state'];

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $user1->addUser(0, $nom, $email, $hashedPassword, $state);
        header('Location: ' . $_SERVER['PHP_SELF']);

    } elseif (isset($_POST['deleteUserId'])) {
        $userId = $_POST['deleteUserId'];
        $user1->deleteUser($userId);
        header('Location: ' . $_SERVER['PHP_SELF']);

    } elseif (isset($_POST['updateUser'])) {
        $id_user = $_POST['id_user'];
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $state = $_POST['state'];

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $user1->updateUser($id_user, $nom, $email, $hashedPassword, $state);
        header('Location: ' . $_SERVER['PHP_SELF']);

    }elseif (isset($_POST['trier'])){

        $users=$user1->triUsers();

    }

    // Redirect back to the same page after form submission
    $userActual = $user1->getUserById($userId);

}

$userActual = $user1->getUserById($userId);

?>