<?php
session_start();

if (!isset($_GET['id'])) {
    header("Location: Form.php");
    exit();
}

$id = intval($_GET['id']);

require '../include/db.php';

$stmt = $conn->prepare("SELECT * FROM registration WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    header("Location: Form.php");
    exit();
}

$data = $result->fetch_assoc();
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Join NCC - Form Preview</title>
</head>
<body style="margin:0; padding:30px 0; min-height:100vh; background: linear-gradient(135deg, #00072d, #001a5e); font-family: 'Segoe UI', Arial, sans-serif;">

    <div style="background-color:#ffffff; padding:40px 35px; border-radius:12px; box-shadow: 0 10px 30px rgba(0,0,0,0.4); width:420px; margin:0 auto; text-align:center;">

        <h1 style="color:#001a5e; margin-bottom:5px; font-size:26px; letter-spacing:1px;">WELCOME TO NCC</h1>
        <p style="color:#555; margin-top:0; margin-bottom:25px; font-size:14px;">Please review your details below</p>

        <div style="text-align:left; font-size:14px; color:#222; line-height:1.9;">
            <p style="margin:0; padding:8px 0; border-bottom:1px solid #eee;"><strong style="color:#001a5e;">Full Name:</strong> <?php echo htmlspecialchars($data['full_name']); ?></p>
            <p style="margin:0; padding:8px 0; border-bottom:1px solid #eee;"><strong style="color:#001a5e;">Date of Birth:</strong> <?php echo htmlspecialchars($data['date_of_birth']); ?></p>
            <p style="margin:0; padding:8px 0; border-bottom:1px solid #eee;"><strong style="color:#001a5e;">Nationality:</strong> <?php echo htmlspecialchars($data['nationality']); ?></p>
            <p style="margin:0; padding:8px 0; border-bottom:1px solid #eee;"><strong style="color:#001a5e;">Father/Guardian Name:</strong> <?php echo htmlspecialchars($data['father_guardian_name']); ?></p>
            <p style="margin:0; padding:8px 0; border-bottom:1px solid #eee;"><strong style="color:#001a5e;">Mother's Name:</strong> <?php echo htmlspecialchars($data['mother_name']); ?></p>
            <p style="margin:0; padding:8px 0; border-bottom:1px solid #eee;"><strong style="color:#001a5e;">Full Address:</strong> <?php echo htmlspecialchars($data['full_address']); ?></p>
            <p style="margin:0; padding:8px 0; border-bottom:1px solid #eee;"><strong style="color:#001a5e;">Mobile Number:</strong> <?php echo htmlspecialchars($data['mobile_number']); ?></p>
            <p style="margin:0; padding:8px 0; border-bottom:1px solid #eee;"><strong style="color:#001a5e;">Email ID:</strong> <?php echo htmlspecialchars($data['email_id']); ?></p>
            <p style="margin:0; padding:8px 0; border-bottom:1px solid #eee;"><strong style="color:#001a5e;">Gender:</strong> <?php echo htmlspecialchars($data['gender']); ?></p>
            <p style="margin:0; padding:8px 0; border-bottom:1px solid #eee;"><strong style="color:#001a5e;">Educational Qualification:</strong> <?php echo htmlspecialchars($data['educational_qualification']); ?></p>
            <p style="margin:0; padding:8px 0;"><strong style="color:#001a5e;">Marks:</strong> <?php echo htmlspecialchars($data['marks']); ?></p>
        </div>

        <a href="generate_pdf.php?id=<?php echo $data['id']; ?>"
            style="display:block; margin-top:25px; padding:14px; background-color:#1fa855; color:#ffffff; border:none; border-radius:8px; font-size:16px; font-weight:bold; text-decoration:none;">
            DOWNLOAD AS PDF
        </a>

    </div>

</body>
</html>