<?php
include "header.php";
require "functions.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $fileName = uploadPortfolioFile($_FILES['portfolio']);
        $message = "File uploaded: " . $fileName;
    } catch (Exception $e) {
        $message = "Error: " . $e->getMessage();
    }
}
?>

<h3>Upload Portfolio</h3>

<form method="post" enctype="multipart/form-data">
    Select File:
    <input type="file" name="portfolio" required><br><br>
    <button type="submit">Upload</button>
</form>

<p><?php echo $message; ?></p>

<?php include "footer.php"; ?>
