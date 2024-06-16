<?php
include "../cors.php";
include 'otpfunction.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['otp']) && !empty($_POST['otp'])) {
        if (isset($_SESSION['signupemail'])) {
            if (isset($_SESSION['signupname'])) {
                if (isset($_SESSION['signupaddress'])) {
                    if (isset($_SESSION['signupphone'])) {
                        if (isset($_SESSION['signuppassword'])) {
                            verifyotp();
                        }
                    }
                }
            }
        }
    } else {
        echo "<script>alert('Please enter otp')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="../dist/output.css" rel="stylesheet" />
</head>

<body>

    <section class="bg-white dark:bg-gray-900">
        <div class="container flex items-center justify-center min-h-screen px-6 mx-auto">
            <form method="POST" action="verifyotp.php" class="w-full max-w-md">
                <img class="w-auto h-7 sm:h-8" src="../logo.jpg" alt="">

                <h1 class="mt-3 text-2xl font-semibold text-gray-800 capitalize sm:text-3xl dark:text-white">Enter the OTP</h1>

                <div class="relative flex items-center mt-4">
                    <span class="absolute">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mx-3 text-gray-300 dark:text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </span>

                    <input type="text" class="block w-full px-10 py-3 text-gray-700 bg-white border rounded-lg dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40" placeholder="OTP" name="otp" id="otp" required style="margin-right: 8px">
                </div>

                <div class="mt-6">
                    <button class="w-full px-6 py-4 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-500 rounded-lg hover:bg-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                        Verify OTP
                    </button>
                </div>
            </form>
            <form method="POST" action="destroyotpsession.php">
                <div class="mt-6">
                    <button name="changeemail" class="px-6 py-3 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform rounded-lg hover:bg-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-50" style="background-color: rgb(206 32 32)">
                        Change Email
                    </button>
                </div>
            </form>
        </div>
    </section>
</body>

</html>