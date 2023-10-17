<?php
        if(isset($_SESSION['signupSuccess'])){
            ?>
            <span class="p-96"></span>
            <div class="bg-green-500 mx-auto w-[90%] text-white mb-10 p-4 rounded-md shadow-md">
                    <p class="font-bold"><?=$_SESSION['signupSuccess']?></p>
            </div>
            <?php
            unset($_SESSION['signupSuccess']);
        }

        if(isset($_SESSION['loginSuccessfully'])){

            $username = $_SESSION['userData']['username'];

            ?>
            <span class="p-96"></span>
            <div class="bg-green-500 mx-auto w-[90%] text-white mb-10 p-4 rounded-md shadow-md">
                    <p class="font-bold">Wellcome Back <?=$username?> !</p>
            </div>
            <?php
            unset($_SESSION['loginSuccessfully']);
        }

        if(isset($_SESSION["postingSuccessfully"])){
            ?>
            <span class="p-96"></span>
            <div class="bg-green-500 mx-auto w-[90%] text-white mb-10 p-4 rounded-md shadow-md">
                    <p class="font-bold"><?=$_SESSION['postingSuccessfully']?></p>
            </div>
            <?php

            unset($_SESSION["postingSuccessfully"]);
        }

        if(isset($_SESSION['productEdited'])){
            ?>
            <span class="p-96"></span>
            <div class="bg-green-500 mx-auto w-[90%] text-white mb-10 p-4 rounded-md shadow-md">
                    <p class="font-bold"><?=$_SESSION['productEdited']?></p>
            </div>
            <?php

            unset($_SESSION["productEdited"]);
        }

        if(isset($_SESSION['productDeleted'])){
            ?>
            <span class="p-96"></span>
            <div class="bg-green-500 mx-auto w-[90%] text-white mb-10 p-4 rounded-md shadow-md">
                <p class="font-bold"><?=$_SESSION['productDeleted']?></p>
            </div>
            <?php

            unset($_SESSION["productDeleted"]);
        }

        if(isset($_SESSION['addedSuccessfully'])){
            ?>
            <span class="p-96"></span>
            <div class="bg-green-500 mx-auto w-[90%] text-white mb-10 p-4 rounded-md shadow-md">
                <p class="font-bold"><?=$_SESSION['addedSuccessfully']?></p>
            </div>
            <?php

            unset($_SESSION["addedSuccessfully"]);
        }
       

    ?>