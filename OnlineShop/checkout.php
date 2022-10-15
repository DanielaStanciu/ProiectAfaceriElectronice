<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_POST['order'])){

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $number = mysqli_real_escape_string($conn, $_POST['number']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $method = mysqli_real_escape_string($conn, $_POST['method']);
    $address = mysqli_real_escape_string($conn, 'flat no. '. $_POST['flat'].', '. $_POST['street'].', '. $_POST['city'].', '. $_POST['country'].' - '. $_POST['pin_code']);
    $placed_on = date('d-M-Y');

    $cart_total = 0;
    $cart_products[] = '';

    $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('Interogare esuata!');
    if(mysqli_num_rows($cart_query) > 0){
        while($cart_item = mysqli_fetch_assoc($cart_query)){
            $cart_products[] = $cart_item['name'].' ('.$cart_item['quantity'].') ';
            $sub_total = ($cart_item['price'] * $cart_item['quantity']);
            $cart_total += $sub_total;
        }
    }

    $total_products = implode(', ',$cart_products);

    $order_query = mysqli_query($conn, "SELECT * FROM `orders` WHERE name = '$name' AND number = '$number' AND email = '$email' AND method = '$method' AND address = '$address' AND total_products = '$total_products' AND total_price = '$cart_total'") or die('Interogare esuata!');

    if($cart_total == 0){
        $message[] = 'your cart is empty!';
    }elseif(mysqli_num_rows($order_query) > 0){
        $message[] = 'Comanda a fost deja plasata!';
    }else{
        mysqli_query($conn, "INSERT INTO `orders`(user_id, name, number, email, method, address, total_products, total_price, placed_on) VALUES('$user_id', '$name', '$number', '$email', '$method', '$address', '$total_products', '$cart_total', '$placed_on')") or die('Interogare esuata!');
        mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('Interogare esuata!');
        $message[] = 'Comanda a fost plasata cu succes!';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Checkout</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php @include 'header.php'; ?>

<section class="heading">
    <h3>Checkout comanda</h3>
    <p> <a href="home.php">Acasa</a> / Checkout </p>
</section>

<section class="display-order">
    <?php
        $grand_total = 0;
        $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
        if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = ($fetch_cart['price'] * $fetch_cart['quantity']);
            $grand_total += $total_price;
    ?>    
    <p> <?php echo $fetch_cart['name'] ?> <span>(<?php echo 'RON '.$fetch_cart['price'].'/-'.' x '.$fetch_cart['quantity']  ?>)</span> </p>
    <?php
        }
        }else{
            echo '<p class="empty">Cosul tau este gol!</p>';
        }
    ?>
    <div class="grand-total">Total de plata: <span>RON <?php echo $grand_total; ?>/-</span></div>
</section>

<section class="checkout">

    <form action="" method="POST">

        <h3>Plaseaza comanda</h3>

        <div class="flex">
            <div class="inputBox">
                <span>Numele tau :</span>
                <input type="text" name="name" placeholder="Introduceti numele:">
            </div>
            <div class="inputBox">
                <span>Numarul de telefon :</span>
                <input type="number" name="number" min="0" placeholder="Introduceti numarul de telefon:">
            </div>
            <div class="inputBox">
                <span>Email-ul :</span>
                <input type="email" name="email" placeholder="Introduceti email-ul:">
            </div>
            <div class="inputBox">
                <span>Metoda de plata :</span>
                <select name="method">
                    <option value="cash on delivery">Plata la livrare</option>
                    <option value="credit card">Card de credit</option>
                    <option value="paypal">PayPal</option>
                </select>
            </div>
            <div class="inputBox">
                <span>Numarul :</span>
                <input type="text" name="flat" placeholder="ex: Numarul xx">
            </div>
            <div class="inputBox">
                <span>Strada :</span>
                <input type="text" name="street" placeholder="ex: Numele strazii">
            </div>
            <div class="inputBox">
                <span>Orasul :</span>
                <input type="text" name="city" placeholder="ex: Buzau">
            </div>
            <div class="inputBox">
                <span>Judetul :</span>
                <input type="text" name="state" placeholder="ex: Buzau">
            </div>
            <div class="inputBox">
                <span>Tara :</span>
                <input type="text" name="country" placeholder="ex: Romania">
            </div>
            <div class="inputBox">
                <span>Cod postal :</span>
                <input type="number" min="0" name="pin_code" placeholder="ex: 120036">
            </div>
        </div>

        <input type="submit" name="order" value="Comanda acum" class="btn">

    </form>

</section>






<?php @include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>