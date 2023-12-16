<?php
require '../controller/constants.php';
require '../model/Database.php';

// Get signup form data if signup was clicked
if (isset($_POST['submit'])) {
    $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $createpassword = filter_var($_POST['createpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $confirmpassword = filter_var($_POST['confirmpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $avatar = $_FILES['avatar'];

    // Validate input values
    if (!$firstname || !$lastname || !$username || !$email || strlen($createpassword) < 8 || strlen($confirmpassword) < 8 || !$avatar['name']) {
        $_SESSION['signup'] = "Please fill in all the required fields.";
    } else {
        // Check if password doesn't match
        if ($createpassword !== $confirmpassword) {
            $_SESSION['signup'] = "Password do not match";
        } else {
            // Hash password
            $hashed_password = password_hash($createpassword, PASSWORD_DEFAULT);

            // Check if username or email already exist in database using UsersDB class
            $existingUsers = $users_database->displayUsersByUsernameOrEmail($username, $email);

            if (!empty($existingUsers)) {
                $_SESSION['signup'] = "Username or Email already exist";
            } else {
                // Work on avatar
                // Rename avatar
                $time = time(); // Make each image name unique using current timestamp
                $avatar_name = '../images/'.$avatar['name'];
                $avatar_tmp_name = $avatar['tmp_name'];
                $avatar_destination_path  = '../images/' . $avatar_name;

                // Make sure file is an image
                $allowed_files = ['png', 'jpg', 'jpeg'];
                $extention = explode('.', $avatar_name);
                $extention = end($extention);
                if (in_array($extention, $allowed_files)) {
                    // Make sure image is not too large (1mb +)
                    if ($avatar['size'] < 1000000){
                        // Update avatar ROOT_URL
                        move_uploaded_file($avatar_tmp_name, $avatar_destination_path);
                    } else {
                        $_SESSION['signup'] = "File size too big";
                    }
                } else {
                    $_SESSION['signup']= "File should be png, jpg or jpeg";
                }

                // Insert new user into users table using UsersDB class
                $users_database->insertUser($firstname, $lastname, $username, $email, $hashed_password, $avatar_name, 0);

                // Redirect to login page with success message
                $_SESSION['signup-success'] = "Registration successful. Please log in.";
                header('location: ' . ROOT_URL . 'signin.php');
                die();
            }
        }
    }

    // Redirect to signup page if there is a problem
    if (isset($_SESSION['signup']) && $_SESSION['signup']) {
        // Pass form data back to signup page
        $_SESSION['signup-data'] = $_POST;
        header('location: ' . ROOT_URL . 'signup.php');
        die();
    }
} else {
    // If button wasn't clicked, bounce back to signup page
    header('location: ' . ROOT_URL . 'signup.php');
    die();
}
?>
