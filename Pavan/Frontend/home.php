<?php
// home.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>NCC - Home</title>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, Helvetica, sans-serif;
    }

    body {
        background-color: #f4f6f8;
        color: #222;
    }

    .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #003366; /* Blue navbar */
        padding: 15px 40px;
    }

    .navbar .brand {
        color: #ffffff;
        font-size: 26px;
        font-weight: bold;
        letter-spacing: 1px;
    }

    .navbar .nav-links {
        display: flex;
        align-items: center;
        gap: 25px;
    }

    .navbar .nav-links a {
        color: #ffffff;
        text-decoration: none;
        font-size: 17px;
        font-weight: 500;
        padding: 8px 14px;
        border-radius: 4px;
        transition: background-color 0.3s ease;
    }

    .navbar .nav-links a:hover {
        background-color: #ffffff;
        color: #003366;
    }

    .navbar .nav-links a.logout-btn {
        border: 2px solid #ffffff;
        padding: 6px 14px;
    }

    .navbar .nav-links a.logout-btn:hover {
        background-color: #cc3333;
        border-color: #cc3333;
        color: #ffffff;
    }

    .content {
        max-width: 900px;
        margin: 40px auto;
        background-color: #ffffff;
        padding: 30px 35px;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .content h1 {
        color: #003366;
        margin-bottom: 20px;
        text-align: center;
    }

    .content p {
        font-size: 16px;
        line-height: 1.8;
        text-align: justify;
        margin-bottom: 18px;
        color: #333;
    }
</style>
</head>
<body>

    <!-- Navigation Bar -->
    <nav class="navbar">
        <div class="brand">NCC</div>
        <div class="nav-links">
            <a href="Form.php">FORM</a>
            <a href="about.php">ABOUT</a>
            <a href="login.php" class="logout-btn">LOGOUT</a>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="content">
        <h1>National Cadet Corps (NCC)</h1>

        <p>National Cadet Corps (NCC) is a youth organization that aims to develop discipline, leadership, patriotism and a sense of responsibility among students. It was established in India to provide young people with opportunities to learn discipline and develop their personality. NCC is open to students from schools and colleges across the country.</p>

        <p>NCC provides various types of training, including drill, physical fitness, basic military training and map reading. Cadets also participate in camps, parades, sports and other activities. These activities help students improve their physical and mental strength and develop confidence.</p>

        <p>NCC also focuses on social service and community development. Cadets participate in activities such as cleanliness drives, tree plantation, awareness programs and helping people during emergencies. Through these activities, students learn the importance of teamwork, cooperation and serving society.</p>

        <p>The motto of NCC is "Unity and Discipline." NCC helps young people become responsible, confident and disciplined citizens. It develops qualities such as leadership, courage, self-confidence and patriotism, which are useful in both personal life and professional life. Therefore, NCC plays an important role in developing the youth of the nation.</p>
    </div>

</body>
</html>