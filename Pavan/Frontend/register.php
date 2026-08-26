<?php
session_start();
$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $mobile_number = trim($_POST['mobile_number']);
    $email_id = trim($_POST['email_id']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    require '../include/db.php';

    // Check if username or email already exists
    $check = $conn->prepare("SELECT * FROM users WHERE username = ? OR email_id = ?");
    $check->bind_param("ss", $username, $email_id);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {
        $error = "Username or Email already exists!";
        $check->close();
    } else {
        $check->close();
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO users (name, mobile_number, email_id, username, password) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $name, $mobile_number, $email_id, $username, $hashed_password);

        if ($stmt->execute()) {
            $stmt->close();
            $conn->close();
            header("Location: login.php");
            exit();
        } else {
            $error = "Something went wrong. Please try again!";
        }
        $stmt->close();
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Join NCC - Register</title>
</head>
<body style="margin:0; padding:0; min-height:100vh; display:flex; align-items:center; justify-content:center; background: linear-gradient(135deg, #00072d, #001a5e); font-family: 'Segoe UI', Arial, sans-serif;">

    <div style="background-color:#ffffff; padding:40px 35px; border-radius:12px; box-shadow: 0 10px 30px rgba(0,0,0,0.4); width:380px; text-align:center;">

        <h1 style="color:#001a5e; margin-bottom:5px; font-size:28px; letter-spacing:1px;">JOIN NCC</h1>
        <p style="color:#555; margin-top:0; margin-bottom:25px; font-size:14px;">Create your new account</p>

        <?php if ($error != "") { ?>
            <p style="background-color:#ffe0e0; color:#cc0000; padding:8px; border-radius:6px; font-size:13px; margin-bottom:15px;"><?php echo $error; ?></p>
        <?php } ?>

        <form method="POST" action="register.php">

            <input type="text" name="name" placeholder="Full Name" required
                style="width:90%; padding:12px; margin-bottom:15px; border:2px solid #001a5e; border-radius:8px; font-size:14px; outline:none;">

            <input type="text" name="mobile_number" placeholder="Mobile Number" required pattern="[0-9]{10}" maxlength="10"
                style="width:90%; padding:12px; margin-bottom:15px; border:2px solid #001a5e; border-radius:8px; font-size:14px; outline:none;">

            <input type="email" name="email_id" placeholder="Email ID" required
                style="width:90%; padding:12px; margin-bottom:15px; border:2px solid #001a5e; border-radius:8px; font-size:14px; outline:none;">

            <input type="text" name="username" placeholder="Username" required
                style="width:90%; padding:12px; margin-bottom:15px; border:2px solid #001a5e; border-radius:8px; font-size:14px; outline:none;">

            <input type="password" name="password" placeholder="Password" required
                style="width:90%; padding:12px; margin-bottom:20px; border:2px solid #001a5e; border-radius:8px; font-size:14px; outline:none;">

            <button type="submit"
                style="width:100%; padding:12px; background-color:#001a5e; color:#ffffff; border:none; border-radius:8px; font-size:16px; font-weight:bold; cursor:pointer;">
                SUBMIT
            </button>

        </form>

        <p style="margin-top:20px; font-size:13px; color:#333;">
            Already have an account?
            <a href="login.php" style="color:#0044cc; text-decoration:none; font-weight:bold;">Login here</a>
        </p>

    </div>

</body>
</html>