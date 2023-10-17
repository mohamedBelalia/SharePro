<main class="max-w-7xl mx-auto mt-5 px-4">
    <section class="border-2 rounded-lg border-sky-900 flex flex-col-reverse justify-center sm:flex-row p-6 items-center gap-8 mb-12">
               
    <article class="sm:w-1/2">
        <h2 class="max-w-md uppercase text-cyan-900 text-4xl font-bold text-center sm:text-5xl sm:text-left">
           there is <span class="text-red-400">every thing</span> that will makes you happy
        </h2>
        <p class="max-w-md text-[12px] mt-4 text-center sm:text-left">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Libero corrupti ea delectus voluptate! Deserunt, aspernatur ullam
        </p>
        </article>
        <img class="border-4 rounded-lg border-sky-900 w-1/2 sm:block" src="imgs/tech.jpeg" alt="">
    </section>
    <section id="products" class="p-6 my-12">
        <h2 class="text-4xl font-bold text-center sm:text-4xl mb-6 text-cyan-900">Last Products</h2>
        <div class="flex flex-wrap justify-center items-center gap-10 max-w-7xl">
   <?php
            require_once("dbh.php");
            require_once("showPosts/showPostsMODEL.php");

            $posts = showPosts($pdo);

            foreach($posts as $row){
                $img = "productsImages/" . $row["imgName"];
                $data = explode(' ',$row["createdAt"])

                ?>

                <div class="card">
                        <img class="w-full h-[300px] object-cover" src="<?=$img?>">

                        <div class="p-5 flex-col gap-3">

                            <h2 class="product-title"><?=$row["productName"]?></h2>

                            <div>
                                <span class="text-xl text-green-600 font-bold"><?=number_format($row["productPrice"], 2, '.', ',')?> Dh</span>
                            </div>

                            <?php
                            if(isset($_SESSION['userData']['username'])){
                                if($_SESSION['userData']['username'] == $row["ownerName"]){
                                    
                                    ?>
                                        <div class="mt-5 flex gap-2">
                                            <a href="index.php?section=edit-product&id=<?=$row["id"]?>" class="button-primary w-full bg-emerald-700 hover:bg-emerald-600">Edit</a>
                                            <a href="deleteProduct/deleteProduct.php?id=<?=$row["id"]?>" onclick="return confirm('Confirm that you want to delete this product')" class="button-primary bg-red-600 hover:bg-red-500">Delete</a>
                                            
                                        </div>
                                        
                                        <div class="flex items-center gap-2 mt-4">
                                            <span class="badge">You</span>
                                            <span class="badge"><?=$data[0]?></span>
                                        </div>
                                    <?php

                                }else{
                                    ?>
                                        <div class="mt-5 flex gap-2">
                                            <a href="shoppingCart/addToCart.php?source=index&productId=<?=$row["id"]?>&ownerId=<?=$row["ownerId"]?>" class="button-primary">Add to cart test</a>
                                            <a href="index.php?section=product-details&id=<?=$row["id"]?>" class="button-icon">👁️‍🗨️</a>
                                        </div>

                                        <div class="flex items-center gap-2 mt-4">
                                            <span class="badge"><?=$row["ownerName"]?></span>
                                            <span class="badge"><?=$data[0]?></span>
                                        </div>
                                    <?php
                                }
                            }
                            else{
                                ?>
                                        <div class="mt-5 flex gap-2">
                                            <a href="shoppingCart/addToCart.php?source=index&productId=<?=$row["id"]?>&ownerId=<?=$row["ownerId"]?>" class="button-primary">Add to cart</a>
                                            <a href="index.php?section=product-details&id=<?=$row["id"]?>" class="button-icon">👁️‍🗨️</a>
                                        </div>

                                        <div class="flex items-center gap-2 mt-4">
                                            <span class="badge"><?=$row["ownerName"]?></span>
                                            <span class="badge"><?=$data[0]?></span>
                                        </div>
                                <?php
                            }
                            ?>
                            
                           

                        </div>
                    </div>


                <?php
            }

        ?>
        </div>
            </section>

            
    </main>

    

