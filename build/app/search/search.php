
<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
        require_once('dbh.php');
        require_once("searchModel.php");

        $value = $_POST["value"];
        $products = searching($pdo , $value);

    }

?>

<div class=" mt-10">
    <h1 class="text-center text-4xl">Search And Find What You Need</h1>
    <form action="" method="post" class="px-56 mt-20">
        <div class="w-[40%] h-[40px] mx-auto">
            <input name="value" type="text" placeholder="Search" class="border-2 border-sky-800 rounded-md w-[100%] h-[100%] px-5 outline-none bg-transparent">
        </div>
        <div class=" w-[40%] mx-auto mt-5">
            <input type="submit" value="Search" class="w-[100%] h-[40px] cursor-pointer rounded-md bg-amber-400 ">
        </div>
    </form>

    <div class="mx-auto flex flex-wrap justify-center items-center gap-10 max-w-7xl mt-20">

        <?php

        if($_SERVER["REQUEST_METHOD"] == "POST"){

            if($products && $value != ""){
                
            

    foreach($products as $row){
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

        }
        else{

            ?>
            <p>Sorry there are no products with "<?=$value?>"</p>
            <?php

        }

    }


        ?>

    </div>

</div>