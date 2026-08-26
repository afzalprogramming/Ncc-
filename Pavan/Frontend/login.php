<?php
session_start();
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Admin login check
    if ($username == "pavanbhaya" && $password == "12ka442ka1") {
        $_SESSION['username'] = $username;
        header("Location: admin.php");
        exit();
    }

    require '../include/db.php';

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            header("Location: home.php");
            exit();
        } else {
            $error = "Incorrect password!";
        }
    } else {
        $error = "User not found!";
    }
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Join NCC - Login</title>
</head>
<body style="margin:0; padding:0; min-height:100vh; display:flex; align-items:center; justify-content:center; background: linear-gradient(135deg, #00072d, #001a5e); font-family: 'Segoe UI', Arial, sans-serif;">

    <div style="background-color:#ffffff; padding:40px 35px; border-radius:12px; box-shadow: 0 10px 30px rgba(0,0,0,0.4); width:350px; text-align:center;">

        <h1 style="color:#001a5e; margin-bottom:5px; font-size:28px; letter-spacing:1px;">JOIN NCC</h1>
        <p style="color:#555; margin-top:0; margin-bottom:25px; font-size:14px;">National Cadet Corps Login</p>

        <?php if ($error != "") { ?>
            <p style="background-color:#ffe0e0; color:#cc0000; padding:8px; border-radius:6px; font-size:13px; margin-bottom:15px;"><?php echo $error; ?></p>
        <?php } ?>

        <form method="POST" action="login.php">

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
            Don't have an account?
            <a href="register.php" style="color:#0044cc; text-decoration:none; font-weight:bold;">Create new account</a>
        </p>

    </div>

</body>
</html>