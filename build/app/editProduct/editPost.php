<?php
// session_start();
    if(isset($_GET["id"]) && isset($_SESSION['userData'])){
        require_once("dbh.php");
        require_once("editProduct/editPostMODEL.php");
    
            $postData = getPostData($pdo,$_GET["id"]);
        ?>

    <main class="max-w-7xl mx-auto mt-5 px-4">
    <form action="editProduct/editProduct.php" method="post" enctype="multipart/form-data">
        <input type="text" name="id" value="<?=$_GET["id"]?>" class="hidden">
        <section class="flex flex-col justify-center sm:flex-row p-6 items-center gap-8 ">
                <div class="">
                        <label for="productImg">
                            <div class="border-2 border-dashed border-black w-[300px] cursor-pointer">
                                <img src="productsImages/<?=$postData['imgName']?>" class="w-full h-full opacity-75">
                            </div>
                        </label>
                        <input type="file" name="productImg" id="productImg" class="hidden">
                        <input type="text" name="oldImgPath" class="hidden" value="<?=$postData['imgName']?>">
                        <?php
                            if(isset($_SESSION["editingErrors"])){
                               $errors = $_SESSION["editingErrors"];

                               if(isset($errors['imgNotValid'])){
                                    ?>
                                    <div class="border-2 border-red-600 border-solid bg-red-400 text-white rounded-xl my-5 p-[10px]">
                                        <p><?=$errors['imgNotValid']?></p>
                                    </div>
                                    <?php
                               }
                               unset($_SESSION["editingErrors"]);
                            }
                        
                        ?>
                </div>

                <div class="p-10">
                    <div class="mt-3 w-[300px]">
                        <input value="<?=$postData['productName']?>" type="text" name="name" class="border-2 border-blue-950 border-solid w-full text-base px-2 py-1 focus:outline-none focus:right-0 focus:border-gray-600" placeholder="Product Name">
                    </div>
                    <div class="mt-3 w-[300px]">
                        <textarea name="description" placeholder="Product Description" class="border-2 border-blue-950 border-solid w-full text-base px-2 py-1 focus:outline-none focus:right-0 focus:border-gray-600" cols="30" rows="10"><?=$postData['productDescription']?></textarea>
                    </div>
                    <div class="mt-3 w-[300px]">
                        <input value="<?=$postData['productPrice']?>" type="number" name="price" class="border-2 border-blue-950 border-solid w-full text-base px-2 py-1 focus:outline-none focus:right-0 focus:border-gray-600" placeholder="Product Price">
                    </div>
                    
                </div>

            </section>
                            
            <?php
                if(isset($_SESSION["editingErrors"])){
                    $errors = $_SESSION["editingErrors"];

                    if(isset($errors['inputsEmpty'])){
                    ?>
                    <div class="border-2 border-red-600 border-solid bg-red-400 text-white rounded-xl my-5 p-[10px] max-w-xl mx-auto">
                        <p><?=$errors['inputsEmpty']?></p>
                    </div>
                    <?php
                    }

                    unset($_SESSION["editingErrors"]);

                    }
                        
                        ?>

            <div class="w-[300px] mx-auto flex justify-center">
                <button class="w-[100%] h-[30px] bg-[#0c4a6e] text-white" type="submit">Edit</button>
            </div>
            
        </form>
        </main>

        <?php
    }
    else{
        header('location: index.php');
    }

?>
