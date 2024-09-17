<?php
function deleteZipFiles($dir)
{
    // Get all files and directories inside the current directory
    $files = scandir($dir);

    foreach ($files as $file) {
        // Skip . and ..
        if ($file === '.' || $file === '..') {
            continue;
        }

        // Get the full path of the file/directory
        $filePath = $dir . DIRECTORY_SEPARATOR . $file;

        // If it's a directory, recursively delete .zip files inside it
        if (is_dir($filePath)) {
            deleteZipFiles($filePath);
        }
        // If it's a .zip file, delete it
        elseif (is_file($filePath) && pathinfo($filePath, PATHINFO_EXTENSION) === 'zip') {
            unlink($filePath); // Delete the file
            echo "Deleted: " . $filePath . "\n";
        }
    }
}

// Get the parent folder of the current directory
$parentDir = dirname(__DIR__);

// Start deleting .zip files in the current folder and the parent directory
deleteZipFiles($parentDir);

echo "All .zip files deleted.";
