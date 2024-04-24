<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\blank.css">
    <title>Payment OG</title>
</head>

<body>
    <?php include('header.php')?>
<?php
    if (isset($_GET['carts']) && isset($_GET['bill'])) {
        $cart = $_GET['carts'];
        $totalPrice = $_GET['bill'];
        $data = unserialize(urldecode($cart));
        print_r($data);
        echo $totalPrice;

        
    }
    ?>

    <div class="central_div">

        <div class="main_div">

            <div class="right">

                <div class="list_card">
                    <div><img src="image\Product\orange.jpg" width="100px"></div>
                    <div>Name</div>
                    <div>Quantity</div>
                    <div>price</div>
                    <div>Total</div>
                </div>

            </div>



            <div class="left">
                
                <form action="blank.php" method="post">
                     <!-- Serialize the cart data and pass it as a hidden input -->
                     <input type="hidden" name="carts" value="<?php echo isset($data) ? urlencode(serialize($data)) : ''; ?>">
                    <!-- Pass the total price as a hidden input -->
                    <input type="hidden" name="bill" value="<?php echo isset($totalPrice) ? $totalPrice : ''; ?>">

                    <label>Mobile Banking</label>
                    <div class="banking_div">

                        <div class="option_div">
                            <input type="radio" name="payment_option" value="bkash">
                            <img src="image\Icon\bkash.jpg" width="100px" alt="">
                        </div>

                        <div class="option_div">
                            <input type="radio" name="payment_option" value="nagad">
                            <img src="image\Icon\Nagad.png" width="100px" alt="">
                        </div>

                        <div class="option_div">
                            <input type="radio" name="payment_option" value="rocket">
                            <img src="image\Icon\rocket.png" width="100px" alt="">
                        </div>

                    </div>

                    <label>Card Banking</label>
                    <div class="banking_div">

                        <div class="option_div">
                            <input type="radio" name="payment_option" value="master">
                            <img src="image\Icon\master card.png" width="100px" alt="">
                        </div>

                        <div class="option_div">
                            <input type="radio" name="payment_option" value="visa">
                            <img src="image\Icon\visa card.jpg" width="100px" alt="">
                        </div>

                    </div>


                    <label>Wallet Banking</label>
                    <div class="banking_div">

                        <div class="option_div">
                            <input type="radio" name="payment_option" value="wallet">
                            <div class="wallet">
                                <input type="text" value="20000" disabled>
                            </div>
                        </div>

                    </div>


                    <label>Cash On Delivery</label>
                    <div class="banking_div">

                        <div class="option_div">
                            <input type="radio" name="payment_option" value="cod">
                            <img src="image\Icon\cod.png" width="100px">
                        </div>

                    </div>


                    <div>Error</div>
                    <div class="banking_div">

                        <div class="option_div">
                            <div style="font-size: 20px; padding-top: 5px">Payable Amount</div>
                            <input type="text">
                            <button name="payment">Payment</button>
                        </div>

                    </div>



                </form>

                <?php
                    if (isset($_POST['payment'])) {
                        if (isset($_POST['payment_option'])) {

                            if ($_POST['payment_option'] === 'bkash') {
                                $info = "bkash";
                                echo "<script>window.location.href = 'PaymentConfirm.php?img=$info&carts={$_POST['carts']}&bill={$_POST['bill']}';</script>";

                            }elseif ($_POST['payment_option'] === 'nagad') {
                                $info = "nagad";
                                echo "<script>window.location.href = 'PaymentConfirm.php?img=$info&carts={$_POST['carts']}&bill={$_POST['bill']}';</script>";

                            }elseif ($_POST['payment_option'] === 'rocket') {
                                $info = "rocket";
                                echo "<script>window.location.href = 'PaymentConfirm.php?img=$info&carts={$_POST['carts']}&bill={$_POST['bill']}';</script>";
                                
                            }elseif ($_POST['payment_option'] === 'master') {
                                $info = "master";
                                echo "<script>window.location.href = 'PaymentConfirm.php?img=$info&carts={$_POST['carts']}&bill={$_POST['bill']}';</script>";

                            }elseif ($_POST['payment_option'] === 'visa') {
                                $info = "visa";
                                echo "<script>window.location.href = 'PaymentConfirm.php?img=$info&carts={$_POST['carts']}&bill={$_POST['bill']}';</script>";


                            }elseif ($_POST['payment_option'] === 'wallet') {
                                $data = unserialize(urldecode($_POST['carts']));
                                $totalPrice = $_POST['bill'];

                                foreach($data as $cart_id){
                                    include('template\db_connect.php');
                                    $sql = "SELECT * FROM cart WHERE cart_id = $cart_id";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        $row = $result->fetch_assoc();

                                        $product_id = $row['product_id'];
                                        $quantity = $row['quantity'];

                                        $sql_1 = "SELECT * FROM product WHERE product_id = $product_id";
                                        $result_1 = $conn->query($sql_1);
                                        if ($result_1->num_rows > 0) {
                                            $row_1 = $result_1->fetch_assoc();

                                            $seller_id = $row_1['user_id'];
                                        }

                                    } //result checking if clause.


                                    // Prepare the SQL statement
                                    $insertSql = "INSERT INTO `order_table`(buyer_id, seller_id, product_id, quantity, delivery_status, payment_method) 
                                    VALUES ($user_id, $seller_id, $product_id, $quantity, 'pending', 'wallet')";

                                    if ($conn->query($insertSql) === TRUE) {

                                        $deleteSql = "DELETE FROM `cart` WHERE cart_id = $cart_id";
                                        if ($conn->query($deleteSql) === TRUE) {
                                            echo "Success";

                                        }else {
                                        echo "Error: " . $sql . "<br>" . $conn->error;

                                        }  //delete

                                    } else {
                                        echo "Error: " . $sql . "<br>" . $conn->error;

                                    }  //insert


                                } //foreach Loop




                                
                            } //else if closing






                        } //Payment option



                    }
                ?>


            </div>







        </div>

    </div>

</body>

</html>