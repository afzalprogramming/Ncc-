<?php
// about.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>NCC - About</title>
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

    .topbar {
        display: flex;
        align-items: center;
        background-color: #003366;
        padding: 15px 40px;
    }

    .back-btn {
        color: #ffffff;
        text-decoration: none;
        font-size: 16px;
        font-weight: 500;
        padding: 8px 16px;
        border: 2px solid #ffffff;
        border-radius: 4px;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .back-btn:hover {
        background-color: #ffffff;
        color: #003366;
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
        margin-bottom: 25px;
        text-align: center;
    }

    .content h2 {
        color: #003366;
        margin-top: 25px;
        margin-bottom: 12px;
        border-left: 4px solid #003366;
        padding-left: 10px;
    }

    .content p {
        font-size: 16px;
        line-height: 1.8;
        text-align: justify;
        margin-bottom: 15px;
        color: #333;
    }

    .content ol {
        margin: 10px 0 15px 25px;
    }

    .content ol li {
        font-size: 16px;
        line-height: 1.8;
        margin-bottom: 10px;
        text-align: justify;
    }

    .student-info {
        margin-top: 35px;
        padding: 20px 25px;
        background-color: #eef3f9;
        border: 1px solid #cddcea;
        border-radius: 6px;
    }

    .student-info h2 {
        color: #003366;
        margin-bottom: 15px;
        border: none;
        padding-left: 0;
    }

    .student-info table {
        width: 100%;
        border-collapse: collapse;
    }

    .student-info table td {
        padding: 8px 5px;
        font-size: 16px;
    }

    .student-info table td.label {
        font-weight: bold;
        width: 150px;
        color: #003366;
    }
</style>
</head>
<body>

    <!-- Top Bar with Back Button -->
    <div class="topbar">
        <a href="home.php" class="back-btn">&#8592; Back</a>
    </div>

    <!-- Page Content -->
    <div class="content">
        <h1>About NCC Registration System</h1>

        <h2>1. Introduction</h2>
        <p>The NCC Registration System is a web-based application developed to make the process of registering for the National Cadet Corps (NCC) easier and more organized. Through this system, students can fill in their NCC registration form digitally and submit their required information. The system also allows students to view their registration details, preview the completed form, and download the form in PDF format for future use.</p>
        <p>The project is developed using various web technologies, including HTML5, CSS3, JavaScript, PHP, and MySQL. HTML5 is used to create the structure of the web pages, CSS3 is used for designing and styling the interface, and JavaScript is used to provide interactive functionality. PHP is used for the server-side processing and handling of registration data, while MySQL is used to store and manage student registration information. The system provides a simple and user-friendly interface for students to complete the NCC registration process.</p>

        <h2>2. Problem Statement</h2>
        <p>The traditional NCC registration process can involve filling out forms manually, maintaining physical records, and checking registration information through separate procedures. This can be time-consuming and may increase the chances of errors or loss of important information.</p>
        <p>The main objective of this project is to develop a digital NCC Registration System where students can easily fill out their NCC registration form and submit their information online. The system should also provide students with the ability to check their registration details, preview their completed form, and download the registration form as a PDF. This makes the registration process faster, more convenient, and better organized.</p>

        <h2>3. Data Analysis and Interpretation</h2>
        <p>The NCC Registration System collects and manages information provided by students during the registration process. The collected data may include details such as the student's name, contact information, educational details, personal information, and other required NCC registration details.</p>
        <p>The registration data is stored in a MySQL database, which allows the system to efficiently manage and retrieve student records. When a student submits the registration form, the information is stored in the database and can later be retrieved for viewing or previewing.</p>
        <p>The system interprets the submitted data and displays it in an organized format. Students can verify their information before downloading the final PDF. This reduces manual errors and provides a structured way to maintain NCC registration records.</p>

        <h2>4. Methodology</h2>
        <p>The development of the NCC Registration System was carried out in several stages:</p>
        <ol>
            <li><strong>Requirement Analysis</strong> – The requirements of the NCC registration process were identified, including form filling, registration, data storage, preview, and PDF generation.</li>
            <li><strong>Frontend Development</strong> – HTML5 and CSS3 were used to create the structure and design of the registration pages. JavaScript was used to add interactive features and improve user experience.</li>
            <li><strong>Backend Development</strong> – PHP was used to process the registration form, validate the submitted information, and communicate with the database.</li>
            <li><strong>Database Development</strong> – MySQL was used to store student registration information securely and systematically.</li>
            <li><strong>Registration Process</strong> – Students enter their required details through the online NCC registration form and submit the information.</li>
            <li><strong>Data Retrieval and Preview</strong> – The system retrieves the stored registration details and displays them in a proper format so that students can check their information.</li>
            <li><strong>PDF Generation</strong> – After previewing the registration details, students can generate and download their completed NCC registration form in PDF format.</li>
            <li><strong>Testing</strong> – The system was tested to ensure that form submission, database storage, data retrieval, preview, and PDF generation work correctly.</li>
        </ol>

        <h2>5. Conclusions and Result</h2>
        <p>The NCC Registration System successfully provides a digital platform for students to complete their NCC registration process. The system reduces the need for manual paperwork and makes it easier to store, retrieve, and manage registration information.</p>
        <p>The project provides important features such as online form filling, registration, viewing registration details, form preview, and PDF download. By using technologies such as HTML5, CSS3, JavaScript, PHP, and MySQL, the system provides a simple, efficient, and user-friendly solution for NCC registration. Overall, the project demonstrates how web technology can be used to digitize and simplify a traditional registration process.</p>

        <!-- Student Details -->
        <div class="student-info">
            <h2>Project & Student Details</h2>
            <table>
                <tr>
                    <td class="label">Name:</td>
                    <td>Pavan Rajbhar</td>
                </tr>
                <tr>
                    <td class="label">Roll No.:</td>
                    <td>26SYCS22</td>
                </tr>
                <tr>
                    <td class="label">Class:</td>
                    <td>SYCS</td>
                </tr>
                <tr>
                    <td class="label">Project:</td>
                    <td>NCC Registration Form</td>
                </tr>
            </table>
        </div>
    </div>

</body>
</html>