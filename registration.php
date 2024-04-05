<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>registration</title>
    <link rel="stylesheet" href="css\registration.css">
</head>
<body>
   <div class="login" >
    <form class="form" action="functions/signup.php" enctype="multipart/form-data" method="post">
        <img class="logo" src="image/image.jpg" alt=""><br>

        <?php
    session_start();
    // Check for error messages
    if(isset($_SESSION['signup_errors'])) {
        foreach($_SESSION['signup_errors'] as $error) {
            echo "<p style='color:red;  text-align: center;'>$error</p>";
        }
        // Clear the error messages after displaying
        unset($_SESSION['signup_errors']);
    } elseif(isset($_SESSION['registration_success'])) {
        echo "<p style='color:green;  text-align: center;'>{$_SESSION['registration_success']}</p>";
        // Clear the success message after displaying
        unset($_SESSION['registration_success']);
    }
?>
<div class="head">
<label for="phone_number">মোবাইল-নম্বর :</label>
        <div class="input-container">
            <input type="text" placeholder="ex:+88017********" name="phone_number" id="phone_number">
            <i class="bx bxs-phone"></i>
        </div>

        <label for="password">পাসওয়ার্ড নিশ্চিত করুন : </label>
        <div class="input-container">
            <input type="text" name="password" id="password">
            <i class="bx bxs-lock"></i>
        </div>

        <label for="re_password">পাসওয়ার্ড পুনরায় নিশ্চিত করুন : </label>
        <div class="input-container">
            <input type="text" name="re_password" id="re_password">
            <i class="bx bxs-edit-alt"></i>
        </div>
    </div>
        <div class="checkbox-container">
            <input type="checkbox" id="farmer" name="farmer">
            <label for="farmer">কৃষক</label>
            <input type="checkbox" id="customer" name="customer">
            <label for="customer">ক্রেতা</label>
        </div>

        <div class="mrg">
            <div>
                <input type="checkbox">
            </div>
            <div>
                <p>তথ্য মনে রাখুন</p>
            </div>
        </div>

        <button class="btn" type="submit">জমা দিন</button>
        <p style="margin-left: 20px;  margin-top: 25px; padding-bottom: 10px;">Already have an account?<a class="a2" href="login.php" target="_blank">প্রবেশ করুন</a></p>
        <p></p>
    </form>
   </div>
</body>
</html>

