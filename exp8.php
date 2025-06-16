<!DOCTYPE html>
<html>
<head>
    <title>Job Portal</title>
</head>
<body>
    <h2>Job Seeker Registration</h2>
    
    <form action="process_job.php" method="POST" enctype="multipart/form-data">
        <label>Full Name:</label><br>
        <input type="text" name="fullname" required><br><br>
        
        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>
        
        <label>Phone:</label><br>
        <input type="tel" name="phone" required><br><br>
        
        <label>Experience (years):</label><br>
        <input type="number" name="experience"><br><br>
        
        <label>Upload Resume:</label><br>
        <input type="file" name="resume" accept=".pdf,.doc,.docx"><br><br>
        
        <input type="submit" value="Register">
    </form>
</body>
</html>
<!-- process_job.php -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $experience = $_POST["experience"];
    
    $uploadDir = __DIR__ . '/uploads/';
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    
    $resumeName = uniqid() . '_' . basename($_FILES["resume"]["name"]);
    $targetFile = $uploadDir . $resumeName;
    
    if (move_uploaded_file($_FILES["resume"]["tmp_name"], $targetFile)) {
        $resumeStatus = "Resume uploaded successfully!";
    } else {
        $resumeStatus = "Sorry, there was an error uploading your resume.";
    }

    // Display results
    echo "Registration Successful!<br>";
    echo "Name: " . htmlspecialchars($fullname) . "<br>";
    echo "Email: " . htmlspecialchars($email) . "<br>";
    echo "Phone: " . htmlspecialchars($phone) . "<br>";
    echo "Experience: " . htmlspecialchars($experience) . " years<br>";
    echo $resumeStatus;
}
?>
