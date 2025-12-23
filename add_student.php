<?php
include "header.php";
require "functions.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $name = formatName($_POST['name']);
        $email = $_POST['email'];
        $skills = cleanSkills($_POST['skills']);

        if (!$name || !validateEmail($email)) {
            throw new Exception("Invalid input");
        }

        saveStudent($name, $email, $skills);
        $message = "Student saved successfully!";
    } catch (Exception $e) {
        $message = "Error: " . $e->getMessage();
    }
}
?>

<h3>Add Student</h3>

<form method="post">
    Name: <input type="text" name="name" required><br><br>
    Email: <input type="email" name="email" required><br><br>
    Skills : <input type="text" name="skills" required><br><br>
    <button type="submit">Submit</button>
</form>

<p><?php echo $message; ?></p>

<?php include "footer.php"; ?>
