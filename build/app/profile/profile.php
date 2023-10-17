<?php

if(isset($_SESSION['userData'])){
    $userName = $_SESSION['userData']['username'];
    $userId = $_SESSION['userData']['id'];
    $email = $_SESSION['userData']['email'];


    try {
        require_once('dbh.php');
        require_once('profileMODEL.php');
        
        $publishedPosts = getPublishedPosts($pdo , $userId);
        $customersInfos = getDemandsInfos($pdo , $userId);


    ?>

    <section class="max-w-7xl mx-auto mt-5 px-4 border border-solid">
        <div class="flex justify-between items-center p-4 mt-8">
            <div class="w-1/4 flex justify-between">
                <img src="imgs/user.png" class="w-[100px] border border-black p-3">
                <div>
                    <h2 class="font-semibold text-[#0c4a6e]"><?=$userName?></h2>
                    <p class="badge bg-gray-300 mt-2"><?=$email?></p>
                </div>
            </div>
            <div>
                <a href="" class="button-primary">Edit Profile</a>
            </div>
        </div>

        <div class="p-5 mt-5">
            <div class="flex justify-between items-center">
            <h2 class="text-3xl font-bold sm:text-3xl mb-6 text-cyan-900">Published products</h2>
            <?php
                if($publishedPosts){
                    ?>
                    <a href="index.php?section=addProduct" class="button-secondary">Publish a Product</a>
                    <?php
                }
            ?>
            </div>
            <div class="mt-8 flex flex-wrap justify-center items-center gap-10 max-w-7xl">
            <?php
                if($publishedPosts){
                    
                    foreach($publishedPosts as $row){

                        $price = (int)$row['productPrice'];
                        $date = explode(' ',$row["createdAt"]);

                        ?> 

        
        <div class="card border-2 border-yellow-600">
            <img class="w-full h-[300px] object-cover" src="productsImages/<?=$row['imgName']?>">
            <div class="p-5 flex-col gap-3">
                <h2 class="product-title"><?=$row['productName']?></h2>
                <div>
                    <span class="text-xl text-green-600 font-bold"><?=number_format($price, 2, '.', ',')?> Dh</span>
                </div>       
                <div class="mt-5 flex gap-2">
                    <a href="index.php?section=edit-product&id=<?=$row["id"]?>" class="button-primary w-full bg-emerald-700 hover:bg-emerald-600">Edit</a>
                    <a href="deleteProduct/deleteProduct.php?id=<?=$row["id"]?>" class="button-primary bg-red-600 hover:bg-red-500">Delete</a>
                                            
                </div>                      
                <div class="flex items-center gap-2 mt-4">
                    <span class="badge">You</span>
                    <span class="badge"><?=$date[0]?></span>
                </div>                 
            </div>
        </div>
           
            <?php
                    }

                    ?>
            
            <?php
                }
                else{
                    
                    ?>
                <div class="mt-5 flex flex-col justify-center items-center">
                    <p class="text-center">You Didn't Published Any Product!</p>
                    <a href="index.php?section=addProduct" class="button-secondary">Publish a Product</a>
                </div>
                <?php

                }
                ?>

            </div>
        </div>

        
        <div class="mt-10 mb-20">
             <h2 class="text-3xl font-bold sm:text-3xl mb-6 text-cyan-900">Your Products Dashboard</h2>

             <table class="min-w-full mt-4">
                <thead>
                    <tr>
                        <th class="border border-gray-400 px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Customers</th>
                        <th class="border border-gray-400 px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Products</th>
                        <th class="border border-gray-400 px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Count</th>
                        <th class="border border-gray-400 px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Price</th>
                    </tr>
                </thead>
                <tbody class="bg-white">

                <?php

                    foreach($customersInfos as $customerDemand){

                        $customerInfo = getCustomerInfos($pdo , $customerDemand["userId"]);
                        
                        $productInfo = getProductsInfos($pdo , $customerDemand["productId"]);
                       
                        $totalProductPrice = (int)$customerDemand["itemsCount"] * (int)$productInfo["productPrice"] ;
                        ?>

                        
                        

                    <tr>
                        <td class="border border-gray-400 px-6 py-4 whitespace-no-wrap">
                            <div class="flex flex-col">
                                <p class="font-semibold text-[#0c4a6e]"><?=$customerInfo["userName"]?></p>
                                <p><?=$customerInfo["email"]?></p>
                            </div>
                        </td>
                        <td class="border border-gray-400 px-6 py-4 whitespace-no-wrap w-1/4">
                            <div class="flex justify-between items-center">
                                <img class="w-[100px] h-[100px]" src="productsImages/<?=$productInfo["imgName"]?>">
                                <div>
                                    <p class="mb-5"><?=$productInfo["productName"]?></p>
                                    <p class="text-green-600"><?=$productInfo["productPrice"]?> Dh</p>
                                </div>
                            </div>
                        </td>
                        <td class="border border-gray-400 px-6 py-4 whitespace-no-wrap"><?=$customerDemand["itemsCount"]?></td>
                        <td class="border border-gray-400 px-6 py-4 whitespace-no-wrap text-green-700 font-bold"><?=$totalProductPrice?> Dh</td>
                    </tr>

                    <?php
                    }
                ?>
                    
                </tbody>
            </table>
        </div>


    </section>

    <?php

} catch (PDOException $e) {
    die("Query Faild " . $e->getMessage());
}

}
else{
    echo "who are u";
}

?>