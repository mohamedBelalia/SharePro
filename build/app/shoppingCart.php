<?php

require_once('dbh.php');
require_once('shoppingCart/shoppingCartMODEL.php');
require_once('shoppingCart/addToCartMODEL.php');

$userId = $_SESSION['userData']['id'];

$productIds = getProductsId($pdo , $userId);

$items = count($productIds);

$priceTotal = 0 ;


?>

    <main class="max-w-7xl mx-auto mt-5 px-4">
        <h1 class="text-2xl md:text-2xl lg:text-3xl uppercase text-blue-950">Your Shopping Cart</h1>

        <section class="max-w-7xl grid grid-cols-5 grid-rows-5 gap-4 my-12">
            <div class="sm:col-span-4 col-span-5">
                <div class="px-4 flex justify-between items-center">
                    <h1>Continue Shopping</h1>
                    <p><?=$items?> items</p>
                </div>
                <div class="border border-t-gray-500 border-solid my-3 px-5 py-5">

                <?php
                    foreach($productIds as $row){
                    $productDetails = getProductDetails($pdo , $row['productId']);
                    $itemCount = duplicateItem($pdo , $userId , $row['productId']);
                    $totalItem = (int)$itemCount * (float)$productDetails['productPrice'] ;
                    $priceTotal += $totalItem ;
                    $price = number_format($productDetails['productPrice'], 2, '.', ',');
                    $totalFormated = number_format($totalItem, 2, '.', ',');
                ?>

                    <div class="mb-5 border border-black border-solid p-3 flex justify-between items-center">
                        <div class="sm:w-1/4 w-1/3 ">
                            <img src="productsImages/<?=$productDetails['imgName']?>" class="w-full">
                        </div>
                        <div class="w-full flex flex-col gap-5 px-10">
                            <div class="flex justify-between items-center h-full">
                                <h1 class="font-bold"><?=$productDetails['productName']?></h1>
                                <h1 class=" text-green-700">Eatch : <?=$price?> Dh</h1>
                                <h1 class="font-bold text-green-700">Total : <?=$totalFormated?> Dh</h1>
                            </div>
                            <div class="flex justify-between items-center">
                                <h1 class="font-bold text-teal-900">items <?=$itemCount?></h1>
                                <div>
                                    <a href="shoppingCart/addToCart.php?source=shoppingCart&productId=<?=$row['productId']?>" class="bg-green-400 text-white border-2 border-green-800 border-solid font-bold px-2">+</a>
                                    <a href="deleteProduct/deleteShopping.php?productId=<?=$row['productId']?>" class="bg-red-400 text-white border-2 border-red-800 border-solid font-bold px-2">x</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                        }
                    ?>

                </div>
            </div>
            <div class="sm:col-start-5 col-span-5 h-[350px] border-2 border-yellow-600 border-solid px-5 pt-5">
                <div class="border border-b-1 border-b-black">
                    <h1>Your Ticket</h1>
                </div>

                <div class="flex justify-between mt-5">
                    <h1>Total : </h1>
                    <h1 class="text-teal-800"><?=number_format($priceTotal, 2, '.', ',')?> Dh</h1>
                </div>
                <div class="flex justify-between mt-5">
                    <h1>TVA : </h1>
                    <h1 class=" text-teal-800">20%</h1>
                </div>
                <div class="flex justify-between mt-5">
                    <h1>VR : </h1>
                    <h1 class="text-teal-800">10%</h1>
                </div>
                <?php
                    $completeTotal = $priceTotal + $priceTotal * 0.1 ;
                ?>
                <div class="flex justify-between mt-5 border border-b-1 border-t-black pt-5">
                    <h1>Complete Total : </h1>
                    <h1 class="font-bold text-teal-800"><?=number_format($completeTotal, 2, '.', ',')?> Dh</h1>
                </div>

                <div class="py-10 flex justify-center items-center">
                    <a href="#" class="button-primary">CHECKOUT</a>
                </div>
            </div>
        </section>
    </main>

</body>
</html>

