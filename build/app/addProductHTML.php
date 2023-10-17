<?php

    if(isset($_SESSION['userData'])){
        ?>
  
  <main class="max-w-7xl mx-auto mt-5 px-4">
    <form action="addProduct/addProduct.php" method="post" enctype="multipart/form-data">
     <section class="flex flex-col justify-center sm:flex-row p-6 items-center gap-8 ">
       <div class="">
          <label for="productImg">
          <div class="border-2 border-dashed border-black p-[90px] cursor-pointer">
          <img src="imgs/file.png" class=" w-[100px]">
          </div>
          </label>
          <input type="file" name="productImg" id="productImg" class="hidden">
    <?php
            if(isset($_SESSION["postingErrors"])){
                $errors = $_SESSION["postingErrors"];

                if(isset($errors['imgNotValid'])){
    ?>
            <div class="border-2 border-red-600 border-solid bg-red-400 text-white rounded-xl my-5 p-[10px]">
                <p><?=$errors['imgNotValid']?></p>
            </div>
    <?php
         }

    }
                        
    ?>
    </div>

    <div class="p-10">
        <div class="mt-3 w-[300px]">
        <input type="text" name="name" class="border-2 border-blue-950 border-solid w-full text-base px-2 py-1 focus:outline-none focus:right-0 focus:border-gray-600" placeholder="Product Name">
        </div>
        <div class="mt-3 w-[300px]">
            <textarea name="description" placeholder="Product Description" class="border-2 border-blue-950 border-solid w-full text-base px-2 py-1 focus:outline-none focus:right-0 focus:border-gray-600" cols="30" rows="10"></textarea>
        </div>
        <div class="mt-3 w-[300px]">
            <input type="number" name="price" class="border-2 border-blue-950 border-solid w-full text-base px-2 py-1 focus:outline-none focus:right-0 focus:border-gray-600" placeholder="Product Price">
        </div>
                    
    </div>

    </section>
                            
    <?php
        if(isset($_SESSION["postingErrors"])){
            $errors = $_SESSION["postingErrors"];

            if(isset($errors['fieldsEmpty'])){
    ?>
        <div class="border-2 border-red-600 border-solid bg-red-400 text-white rounded-xl my-5 p-[10px] max-w-xl mx-auto">
            <p><?=$errors['fieldsEmpty']?></p>
        </div>
    <?php
        }

    }
                        
    ?>

    <div class="w-[300px] mx-auto flex justify-center">
        <button class="w-[100%] h-[30px] bg-[#0c4a6e] text-white" type="submit">Post</button>
    </div>
            
    </form>
    </main>
    
<?php
   unset($_SESSION["postingErrors"]);
?>

</body>
</html>


<?php
    }
    else{
        header('location: index.php');
    }

?>