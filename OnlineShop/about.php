<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Despre</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php @include 'header.php'; ?>

<section class="heading">
    <h3>Despre noi</h3>
    <p> <a href="home.php">Acasa</a> / Despre </p>
</section>

<section class="about">

    <div class="flex">

        <div class="image">
            <img src="images/img10.jpg" alt="">
        </div>

        <div class="content">
            <h3>De ce sa ne alegeti pe noi?</h3>
            <p>Incercam sa dam tot ce avem mai bun pentru a le oferi clientilor creatii florale unice, cu un design in acord cu tendintele din lumea modei internationale.</p>
            <a href="shop.php" class="btn">Cumpara acum!</a>
        </div>

    </div>

    <div class="flex">

        <div class="content">
            <h3>Ce va oferim?</h3>
            <p>O gama extrem de larga de plante verzi, buchete si aranjamente potrivite pentru orice ocazie.</p>
            <a href="contact.php" class="btn">Contacteaza-ne!</a>
        </div>

        <div class="image">
            <img src="images/img11.jpg" alt="">
        </div>

    </div>

    <div class="flex">

        <div class="image">
            <img src="images/img12.jpg" alt="">
        </div>

        <div class="content">
            <h3>Cine suntem noi?</h3>
            <p>Suntem o mana de oameni care vor sa realizeze, impreuna cu clientii sai, cele mai frumoase surprize. </p>
            <a href="#reviews" class="btn">Recenzii clienti</a>
        </div>

    </div>

</section>

<section class="reviews" id="reviews">

    <h1 class="title">Recenziile clientilor</h1>

    <div class="box-container">

        <div class="box">
            <img src="images/pic-1.png" alt="">
            <p>Planta a fost conform asteptarilor (bogata si frumoasa), iar sarbatorita a fost extrem de incantata de aceasta. Livrarea extrem de rapida si sigura! Felicitari!</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Albert Cojocaru</h3>
        </div>

        <div class="box">
            <img src="images/pic-2.png" alt="">
            <p>Planta este foarte frumoasa, iar serviciul vostru de mare calitate. Sunteti oameni deosebiti si plini de respect pentru clienti. Mama a fost fericita si incantata de surpriza. 
                Sigur am sa mai revin la serviciile voastre si am sa va recomand si prietenilor.</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Georgiana Cristea</h3>
        </div>

        <div class="box">
            <img src="images/pic-3.png" alt="">
            <p>Florile, felicitarea si serviciile dvs sunt minunate. Florile sunt exact ca in poza, buchetul este aranjat intr un mod delicat si profesionist.
                Va multumesc pentru buna calitate pe care o oferiti prin tot ceea ce faceti. Ati castigat un client loial.</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Ionut Dumitrache</h3>
        </div>

    </div>

</section>




<?php @include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>