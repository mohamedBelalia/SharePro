
    <main class="flex justify-center flex-col  items-center h-screen">

        <div class="w-96 p-6 bg-slate-300 rounded-md">
            <h1 class="text-center font-semibold text-2xl text-[#0c4a6e]">Signup</h1>
            <hr class="mt-3">
            <form action="./signup/signup.php" method="post" >
                <div class="mt-3">
                <label for="username" class="block text-base mb-2">Username</label>
                <input type="text" name="username" id="username" class="border w-full text-base px-2 py-1 focus:outline-none focus:right-0 focus:border-gray-600" placeholder="Enter Username">
                </div>

                <div class="mt-3">
                <label for="email" class="block text-base mb-2">Email</label>
                <input type="email" name="email" id="email" class="border w-full text-base px-2 py-1 focus:outline-none focus:right-0 focus:border-gray-600" placeholder="Enter Email">
                </div>

                <div class="mt-3">
                <label for="password" class="block text-base mb-2">Password</label>
                <input type="password" name="password" id="password" class="border w-full text-base px-2 py-1 focus:outline-none focus:right-0 focus:border-gray-600" placeholder="Enter Password">
                </div>

                <div class="mt-10">
                    <button class="border border-white bg-[#0c4a6e] text-white w-full px-8 py-1 hover:bg-sky-800" type="submit">Signup</button>
                </div>
            </form>

            <div class="mt-6 flex justify-between items-center">
                <p>Allready have an Account ?</p>
                <a href="index.php?section=Login" class="text-[#232a6c]">Login</a>
            </div>
        </div>

        <?php

        if(isset($_SESSION['signupErrors'])){

            $errors = $_SESSION['signupErrors'] ;

            foreach($errors as $error){

             ?>   
            <div class="bg-red-400 border-2 border-red-700 sm:w-96 w-[90%] mx-auto my-5 text-white p-4 rounded-md shadow-md">
                <p><?=$error?></p>
            </div>
            <?php
            }
            unset($_SESSION['signupErrors']);
        }

    ?>

</main>

</body>
</html>