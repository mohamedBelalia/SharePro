<?php

?>

<header class="bg-[#0c4a6e] text-white sticky top-0 z-10">
        <section class="max-w-8xl px-12 mx-auto p-4 flex justify-between items-center">
            <h1 class="text-2xl font-medium">SharePro</h1>
            <div>
                <button id="mobile-open-button" class="text-2xl sm:hidden focus:outline-none">&#9776;</button>
                <nav class="hidden sm:block space-x-8 text-[17px]" aria-label="main">
                    <a  href="index.php" class="text-red-400">Home</a>
                    <a  href="index.php?section=search" class="">Search</a>
                    <?php
                         if(isset($_SESSION['userData'])){
                            $userData = $_SESSION['userData'];
                            ?>
                            <a href="index.php?section=profile"><?=$userData['username']?></a>
                            <a href="index.php?section=addProduct" class="bg-white p-1 rounded-full">➕</a>
                            <a href="index.php?section=shoppingCart" class="bg-white p-1 rounded-full">🛒</a>
                            <a href="index.php?section=Logout" class="text-white rounded-xl px-5 py-2 bg-red-400" >Logout</a>
                            <?php
                        }
                        else{
                            ?>
                            <a href="index.php?section=Signup">Signup</a>
                            <a href="index.php?section=Login">Login</a>
                            <?php
                        }

                    ?>
                </nav>
            </div>
        </section>
    </header>

    <?php
?>