<?php
include "header.php";

if (!file_exists("students.txt")) {
    echo "No student records found.";
    include "footer.php";
    exit;
}

$lines = file("students.txt");
?>

<h3>Student List</h3>

<?php foreach ($lines as $line): ?>
    <?php
    list($name, $email, $skills) = explode("|", trim($line));
    $skillsArray = explode(",", $skills);
    ?>
    <p>
        <strong>Name:</strong> <?php echo $name; ?><br>
        <strong>Email:</strong> <?php echo $email; ?><br>
        <strong>Skills:</strong>
        <ul>
            <?php foreach ($skillsArray as $skill): ?>
                <li><?php echo $skill; ?></li>
            <?php endforeach; ?>
        </ul>
    </p>
<?php endforeach; ?>

<?php include "footer.php"; ?>
