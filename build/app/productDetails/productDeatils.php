<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'] ;

        require_once('dbh.php');
        require_once('./productDetails/productMODEL.php');
        require_once("./addComment/addCommentModel.php");

        $productDetails = productDetails($pdo , $id);
        $data = explode(' ' ,$productDetails['createdAt']);

        $sameSeller = fromSameSeller($pdo , $productDetails['ownerId']) ;

        $comments = getProductComments($pdo , $id);

        ?>

    <section class="mt-10 sm:flex justify-center gap-5 items-center max-w-7x">
        <div class="border-4 border-[#0c4a6e] border-solid sm:w-1/3">
            <img src="productsImages/<?=$productDetails['imgName']?>" class="w-full">
        </div>

        <div class="sm:w-1/3 px-8 py-10">
            <h1 class="text-4xl md:text-5xl lg:text-6xl"><?=$productDetails['productName']?></h1>
            <p class="sm:my-10 my-5"><?=$productDetails['productDescription']?></p>
            <h2 class="text-3xl font-semibold text-green-600"><?=$productDetails['productPrice']?> Dh</h2>
            <p class="badge mt-24 bg-slate-300 flex justify-between">
                <span>Posted By <?=$productDetails['ownerName']?></span>
                <span><?=$data[0]?></span>
            </p>
        </div>

    </section>
    <?php
        if(isset($_SESSION['userData'])){
            ?>

    <section class="max-w-7xl mx-auto mt-5 px-4">
        <h3 class="text-2xl font-medium mb-5 mt-5">Add Comment</h3>
        <form action="./addComment/addComment.php" method="post">
            <div class="w-[100%] flex justify-center mx-auto">
            <textarea placeholder="Add Comment ..." class="p-2 border-2 border-[#0c4a6e] border-solid mx-auto bg-slate-300" name="comment" cols="120" rows="5"></textarea>
            </div>
            <input type="hidden" name="productId" value="<?=$productDetails["id"]?>">
            <div class="flex justify-end">
                <button class="button-primary" type="submit">Comment</button>
            </div>
        </form>
    </section>


    <?php
    }
    ?>


    <section class="max-w-7xl mx-auto mt-5 px-4">
        <h1 class="text-2xl font-medium mb-5 mt-5">Comments</h1>

        <?php
            if($comments){
                foreach($comments as $comment){
                    $date = substr($comment["created_at"], 0, -3);
                    ?>  

        <div class="w-[60%] border border-[#0c406e] border-solid rounded-md p-4 bg-slate-200 my-7">
            <div class="flex items-center gap-4">
                <img class="p-2 w-14 rounded-xl border border-[#0c406e] border-solid" src="./imgs/user.png">
                <h1 class="text-black font-medium text-2xl"><?=$comment["commentOwnerName"]?></h1>
            </div>
            <div class="py-3">
                <?=$comment["commentText"]?>
            </div>
            <div class="flex justify-end">
                <p class="badge bg-slate-400"><?=$date?></p>
            </div>
        </div>

        <?php
                }
            }
            else{
                ?>
            <p class="text-slate-500">There is no comments !</p>
                <?php
            }
        ?>

    </section>
    

        <h1 class="text-4xl md:text-5xl lg:text-4xl text-center uppercase text-blue-950 my-14">From Same Seller</h1>
    <section class="flex flex-wrap justify-center items-center gap-10 max-w-7xl mb-20 mx-auto">
        <?php
         foreach($sameSeller as $row){
            $img = "productsImages/" . $row["imgName"];
            $date = explode(' ',$row["createdAt"]);

            if($id != $row["id"]){
            ?> 

            <div class="card">
                    <img class="w-full h-[300px] object-cover" src="<?=$img?>">

                    <div class="p-5 flex-col gap-3">

                        <h2 class="product-title"><?=$row["productName"]?></h2>

                        <div>
                            <span class="text-xl text-green-600 font-bold"><?=$row["productPrice"]?> Dh</span>
                        </div>
                        <div class="mt-5 flex gap-2">
                            <a class="button-primary" href="shoppingCart/addToCart.php?source=shoppingCart&productId=<?=$row["id"]?>&ownerId=<?=$row["ownerId"]?>">Add to cart</a>
                            <a href="index.php?section=product-details&id=<?=$row["id"]?>" class="button-icon">👁️‍🗨️</a>
                        </div>

                        <div class="flex items-center gap-2 mt-4">
                            <span class="badge"><?=$row["ownerName"]?></span>
                            <span class="badge"><?=$date[0]?></span>
                        </div>

                    </div>
                </div>


            <?php
            }
        }
        ?>
        </section>
        <?php
    }

?>