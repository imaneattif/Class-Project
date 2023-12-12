<?php
$uploadDir = 'uploads/';

// Function to delete a file
function deleteFile($filename) {
    global $uploadDir;
    $filePath = $uploadDir . $filename;
    if (file_exists($filePath)) {
        unlink($filePath); // Delete the file
        echo "File deleted successfully.";
    } else {
        echo "File not found.";
    }
}

// Check if a delete request has been made
if (isset($_GET['delete'])) {
    deleteFile($_GET['delete']);
}

// List files in the uploads directory
$files = scandir($uploadDir);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Manager</title>
</head>
<body>
    <h1>File Manager</h1>
    <ul>
        <?php foreach ($files as $file): ?>
            <?php if ($file !== '.' && $file !== '..'): ?>
                <li>
                    <?php echo $file; ?>
                    - <a href="<?php echo $uploadDir . $file; ?>" target="_blank">View</a>
                    - <a href="?delete=<?php echo $file; ?>">Delete</a>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
</body>
</html>
