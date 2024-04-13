<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="css\Home Page.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css\footer.css">
</head>

<body>

    <?php 
    include('header.php');
    include("template\db_connect.php");
    ?>

    <div class="main_div">


        <div class="first_div">

            <div class="first_div_1">
                <a href="#"><div>Fruits</div></a>
                <a href="#"><div>Vegetable</div></a>
                <a href="#"><div>Grain Product</div></a>
                <a href="#"><div>Dairy Product</div></a>
                <a href="#"><div>Spices</div></a>
                
                <a href="#"><div>Farming Tools</div></a>
                <a href="#"><div>Fertilize</div></a>
                <a href="#"><div>Pesticide</div></a>
                <a href="#"><div>Seeds</div></a>
            </div>

            <div class="first_div_2"></div>

        </div><!--First Div End -->




        <div class="grand_1">
        
            <?php
            // SQL query to fetch data
            $sql = "SELECT product_id, name, price, image FROM product LIMIT 6";
            $result = $conn->query($sql);
            $product_id = array();

            if ($result->num_rows > 0) {
            // Output data of each row.
                while($row = $result->fetch_assoc()) {
                    $product_id[] = $row['product_id'];
                    $name = $row['name'];
                    $image = $row['image'];
                    $price = $row['price'];
                    echo '
                    <div class="parent">

                        <div class="child-1">
                            <img src="'.$image.'" alt="" width="100%" height="100%">
                        </div>

                        <div class="child-2">   
                            <div class="child-2-1-1">'.$name.'</div>
                            <div class="child-2-1-2">৳' .$price.' /kg</div>
                        </div>

                    </div>';

                }//while end

            } else {
            echo "0 results";
            }

            // Close connection
            $conn->close();
            ?>

        </div> <!--Grand Div End -->


        <div class="all_product_btn">
            <a href="AllProduct.php"><div>All Product</div></a>
        </div>

        <div style="margin:10px; background: white; letter-spacing: 10px;
                word-spacing: 15px; text-align: center; border-top: 3px solid;
                border-bottom: 3px solid;"> 
            <h1>Selective  Category</h1>
        </div>



        
        <!--................Product Category Start .....................-->
        <div class="grand">


            <!--.............Consumer Section...............-->

            <div class="product_parent">

                <div class="product_child_1">
                    <div style="padding-bottom: 5px;">
                        <img src="image\Category\consumer.png" width="70px" height="70px">
                    </div>
                    <h2>Consumer</h2>
                </div>

                <div class="product_child_2">

                    <div class="product_child_2_1">
                        <div><img src="image\Category\fruits.png"></div>
                        <div>Fruits</div>
                    </div>

                    <div class="product_child_2_1">
                        <div><img src="image\Category\vegetable.png" alt=""></div>
                        <div>Vegetable</div>
                    </div>

                    <div class="product_child_2_1">
                        <div><img src="image\Category\grain food.png" alt=""></div>
                        <div>Grain Product</div>
                    </div>

                    <div class="product_child_2_1">
                        <div><img src="image\Category\dairy-products.png" alt=""></div>
                        <div>Dairy</div>
                    </div>

                    <div class="product_child_2_1">
                        <div><img src="image\Category\spice.png"></div>
                        <div>Spices</div>
                    </div>


                </div> <!-- product_child_2 End-->


            </div> <!-- Parent End-->


            <!--......................Consumer Section.......................-->


            <div class="product_parent">

                <div class="product_child_1">
                    <div style="padding-bottom: 5px;">
                        <img src="image\Category\farmer.png" width="70px" height="70px">
                    </div>
                    <h2>Consumer</h2>
                </div>

                <div class="product_child_2">

                    <div class="product_child_2_1">
                        <div><img src="image\Category\fruits.png"></div>
                        <div>Fruits</div>
                    </div>

                    <div class="product_child_2_1">
                        <div><img src="image\Category\vegetable.png" alt=""></div>
                        <div>Vegetable</div>
                    </div>

                    <div class="product_child_2_1">
                        <div><img src="image\Category\grain food.png" alt=""></div>
                        <div>Grain Product</div>
                    </div>

                    <div class="product_child_2_1">
                        <div><img src="image\Category\dairy-products.png" alt=""></div>
                        <div>Dairy</div>
                    </div>

                    <div class="product_child_2_1">
                        <div><img src="image\Category\spice.png"></div>
                        <div>Spices</div>
                    </div>


                </div> <!-- product_child_2 End-->


            </div> <!-- Parent End-->

        </div> <!-- Grand End-->
        <!--.....................Product Category End .......................-->


        <div style="margin: 60px 0 10px;background: white; letter-spacing: 10px;
                word-spacing: 15px; text-align: center; border-top: 3px solid;
                border-bottom: 3px solid;"> 
            <h1>Farmer Of The Month</h1>
        </div>
        
        <!--Card Model start-->
        <div class="farmer-parent">

            <?php
                for ($i=0; $i < 5; $i++) { 
                    echo '
                    <div class="farmer-child">

                        <div><img class="farmer-child-1" src="image/Farmer/Karim Mia.jpg" alt=""></div>
                        <div class="farmer-child-2">করিম মিয়া</div>
                        <div class="farmer-child-3">পাবনা</div>

                    </div>
                    ';
                }
            ?>

        </div> <!--Card Model End-->


        


    </div> <!-- Main Div End -->
    


    <?php include('footer.php')?>

</body>

</html>