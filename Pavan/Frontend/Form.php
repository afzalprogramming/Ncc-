<?php
session_start();
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = trim($_POST['full_name']);
    $date_of_birth = trim($_POST['date_of_birth']);
    $nationality = trim($_POST['nationality']);
    $father_guardian_name = trim($_POST['father_guardian_name']);
    $mother_name = trim($_POST['mother_name']);
    $full_address = trim($_POST['full_address']);
    $mobile_number = trim($_POST['mobile_number']);
    $email_id = trim($_POST['email_id']);
    $gender = trim($_POST['gender']);
    $educational_qualification = trim($_POST['educational_qualification']);
    $marks = trim($_POST['marks']);

    require '../include/db.php';

    $stmt = $conn->prepare("INSERT INTO registration (full_name, date_of_birth, nationality, father_guardian_name, mother_name, full_address, mobile_number, email_id, gender, educational_qualification, marks) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssssss", $full_name, $date_of_birth, $nationality, $father_guardian_name, $mother_name, $full_address, $mobile_number, $email_id, $gender, $educational_qualification, $marks);

    if ($stmt->execute()) {
        $new_id = $stmt->insert_id;
        $stmt->close();
        $conn->close();
        header("Location: preview.php?id=" . $new_id);
        exit();
    } else {
        $error = "Something went wrong. Please try again!";
    }
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Join NCC - Registration Form</title>
</head>
<body style="margin:0; padding:30px 0; min-height:100vh; background: linear-gradient(135deg, #00072d, #001a5e); font-family: 'Segoe UI', Arial, sans-serif;">

    <div style="background-color:#ffffff; padding:40px 35px; border-radius:12px; box-shadow: 0 10px 30px rgba(0,0,0,0.4); width:420px; margin:0 auto; text-align:center;">

        <h1 style="color:#001a5e; margin-bottom:5px; font-size:28px; letter-spacing:1px;">NCC REGISTRATION FORM</h1>
        <p style="color:#555; margin-top:0; margin-bottom:25px; font-size:14px;">Fill your details to join NCC</p>

        <?php if ($error != "") { ?>
            <p style="background-color:#ffe0e0; color:#cc0000; padding:8px; border-radius:6px; font-size:13px; margin-bottom:15px;"><?php echo $error; ?></p>
        <?php } ?>

        <form method="POST" action="Form.php" style="text-align:left;">

            <label style="font-size:13px; color:#001a5e; font-weight:bold;">Full Name</label>
            <input type="text" name="full_name" required
                style="width:94%; padding:12px; margin:6px 0 15px 0; border:2px solid #001a5e; border-radius:8px; font-size:14px; outline:none;">

            <label style="font-size:13px; color:#001a5e; font-weight:bold;">Date of Birth</label>
            <input type="date" name="date_of_birth" required
                style="width:94%; padding:12px; margin:6px 0 15px 0; border:2px solid #001a5e; border-radius:8px; font-size:14px; outline:none;">

            <label style="font-size:13px; color:#001a5e; font-weight:bold;">Nationality</label>
            <input type="text" name="nationality" required value="Indian"
                style="width:94%; padding:12px; margin:6px 0 15px 0; border:2px solid #001a5e; border-radius:8px; font-size:14px; outline:none;">

            <label style="font-size:13px; color:#001a5e; font-weight:bold;">Father / Guardian Name</label>
            <input type="text" name="father_guardian_name" required
                style="width:94%; padding:12px; margin:6px 0 15px 0; border:2px solid #001a5e; border-radius:8px; font-size:14px; outline:none;">

            <label style="font-size:13px; color:#001a5e; font-weight:bold;">Mother's Name</label>
            <input type="text" name="mother_name" required
                style="width:94%; padding:12px; margin:6px 0 15px 0; border:2px solid #001a5e; border-radius:8px; font-size:14px; outline:none;">

            <label style="font-size:13px; color:#001a5e; font-weight:bold;">Full Address</label>
            <textarea name="full_address" required rows="3"
                style="width:94%; padding:12px; margin:6px 0 15px 0; border:2px solid #001a5e; border-radius:8px; font-size:14px; outline:none; font-family:inherit; resize:none;"></textarea>

            <label style="font-size:13px; color:#001a5e; font-weight:bold;">Mobile Number</label>
            <input type="text" name="mobile_number" required pattern="[0-9]{10}" maxlength="10"
                style="width:94%; padding:12px; margin:6px 0 15px 0; border:2px solid #001a5e; border-radius:8px; font-size:14px; outline:none;">

            <label style="font-size:13px; color:#001a5e; font-weight:bold;">Email ID</label>
            <input type="email" name="email_id" required
                style="width:94%; padding:12px; margin:6px 0 15px 0; border:2px solid #001a5e; border-radius:8px; font-size:14px; outline:none;">

            <label style="font-size:13px; color:#001a5e; font-weight:bold;">Gender</label>
            <select name="gender" required
                style="width:100%; padding:12px; margin:6px 0 15px 0; border:2px solid #001a5e; border-radius:8px; font-size:14px; outline:none; background-color:#fff;">
                <option value="">Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>

            <label style="font-size:13px; color:#001a5e; font-weight:bold;">Educational Qualification</label>
            <input type="text" name="educational_qualification" required placeholder="e.g. B.Sc. Computer Science"
                style="width:94%; padding:12px; margin:6px 0 15px 0; border:2px solid #001a5e; border-radius:8px; font-size:14px; outline:none;">

            <label style="font-size:13px; color:#001a5e; font-weight:bold;">Marks (%)</label>
            <input type="text" name="marks" required placeholder="e.g. 78%"
                style="width:94%; padding:12px; margin:6px 0 20px 0; border:2px solid #001a5e; border-radius:8px; font-size:14px; outline:none;">

            <button type="submit"
                style="width:100%; padding:12px; background-color:#001a5e; color:#ffffff; border:none; border-radius:8px; font-size:16px; font-weight:bold; cursor:pointer;">
                SUBMIT
            </button>

        </form>

    </div>

</body>
</html>