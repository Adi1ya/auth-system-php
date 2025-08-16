<?php

if (isset($_POST['submit']) && $_POST['submit'] == 'signup') {

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['pass']);
    $confirmPassword = trim($_POST['confirm_pass']);

    if (!empty($name) && !empty($email) && !empty($password) && !empty($confirmPassword)) {

        // check if user already exists
        $userExists = $conn->prepare("SELECT * FROM `users` WHERE `email` = ?");
        $userExists->bind_param("s", $email);
        $userExists->execute();
        $result = $userExists->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);

        if (empty($data)) {
            if ($password === $confirmPassword) {

                // if not then register
                $password = password_hash($password, PASSWORD_DEFAULT);
                $signupQuery = $conn->prepare("INSERT INTO `users` (`name`, `email`, `password`, `status`, `isDeleted`, `created`)
                        VALUES(?, ?, ?, 1, 0, NOW())");

                if (!$signupQuery) {
                    $response = ['status' => 'error', 'message' => 'Something went wrong, during signup.'];
                    $_SESSION['message'] = $response;
                }

                $signupQuery->bind_param("sss", $name, $email, $password);
                if ($signupQuery->execute()) {
                    $response = ['status' => 'success', 'message' => 'You are signed up successfully.'];
                    $_SESSION['message'] = $response;
                } else {
                    $response = ['status' => 'error', 'message' => 'Something went wrong, during signup.'];
                    $_SESSION['message'] = $response;
                }
            } else {
                $response = ['status' => 'error', 'message' => 'Password and confirm password mismatched.'];
                $_SESSION['message'] = $response;
            }
        } else {
            $response = ['status' => 'error', 'message' => 'This email is already registered.'];
            $_SESSION['message'] = $response;
        }
    } else {
        $response = ['status' => 'error', 'message' => 'Please fill all the details.'];
        $_SESSION['message'] = $response;
    }

    if ($response['status'] == 'error') {
        header("Location: " . BASE_URL . "signup");
        exit;
    } else {
        header("Location: " . BASE_URL . "login");
        exit;
    }
} else if (isset($_POST['submit']) && $_POST['submit'] == 'login') {

    $email = trim($_POST['email']);
    $password = trim($_POST['pass']);

    if (!empty($email) && !empty($password)) {
        $checkUser = $conn->prepare("SELECT * FROM `users` WHERE `email` = ? AND `status` = 1");
        $checkUser->bind_param("s", $email);

        // Execute the query
        $checkUser->execute();

        // Get the result
        $result = $checkUser->get_result();

        // Fetch all rows
        $data = $result->fetch_all(MYSQLI_ASSOC);

        // echo "<pre>";
        // var_dump($data);die;

        if (!empty($data)) {
            $dbPassword = $data[0]['password'];

            if (password_verify($password, $dbPassword)) {

                $_SESSION = [
                    'userId' => $data[0]['userId'],
                    'name' => $data[0]['name']
                ];

                $response = ['status' => 'success', 'message' => 'You are logged in successfully.'];
                $_SESSION['message'] = $response;
            } else {
                $response = ['status' => 'error', 'message' => 'Invalid password.'];
                $_SESSION['message'] = $response;
            }
        } else {
            $response = ['status' => 'error', 'message' => 'Invalid email.'];
            $_SESSION['message'] = $response;
        }
    } else {
        $response = ['status' => 'error', 'message' => 'Please fill all the details.'];
        $_SESSION['message'] = $response;
    }

    if ($response['status'] == 'error') {
        header("Location: " . BASE_URL . "login");
        exit;
    } else {
        header("Location: " . BASE_URL . "dashboard");
        exit;
    }
} else if (isset($_GET['logout']) && $_GET['logout'] == 1) {

    // Unset all session variables
    session_unset();

    // Destroy the session
    session_destroy();

    header("Location: " . BASE_URL . "login");
    exit;
} else {
    $response = ['status' => 'error', 'message' => 'Unidentified request.'];
    $_SESSION['message'] = $response;
    header("Location: " . BASE_URL . "login");
    exit;
}
