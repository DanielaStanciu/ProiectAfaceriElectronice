<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_POST['send'])){

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $number = mysqli_real_escape_string($conn, $_POST['number']);
    $msg = mysqli_real_escape_string($conn, $_POST['message']);

    $select_message = mysqli_query($conn, "SELECT * FROM `message` WHERE name = '$name' AND email = '$email' AND number = '$number' AND message = '$msg'") or die('Interogare esuata!');

    if(mysqli_num_rows($select_message) > 0){
        $message[] = 'Mesajul a fost deja trimis!';
    }else{
        mysqli_query($conn, "INSERT INTO `message`(user_id, name, email, number, message) VALUES('$user_id', '$name', '$email', '$number', '$msg')") or die('Interogare esuata!');
        $message[] = 'Mesajul a fost trimis cu succes!';
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Contact</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php @include 'header.php'; ?>

<section class="heading">
    <h3>Contacteaza-ne</h3>
    <p> <a href="home.php">Acasa</a> / Contact </p>
</section>

<section class="contact">

    <form action="" method="POST">
        <h3>Trimite-ne un mesaj!</h3>
        <input type="text" name="name" placeholder="Introduceti numele dumneavoastra" class="box" required> 
        <input type="email" name="email" placeholder="Introduceti emailul" class="box" required>
        <input type="number" name="number" placeholder="Introduceti numarul de telefon" class="box" required>
        <textarea name="message" class="box" placeholder="Introduceti mesajul dumneavoastra" required cols="30" rows="10"></textarea>
        <input type="submit" value="Trimite mesaj" name="send" class="btn">
    </form>

</section>






<?php @include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>