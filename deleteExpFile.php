<?php
function deleteErrorLogs($dir)
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

        // If it's a directory, recursively delete error_log files inside it
        if (is_dir($filePath)) {
            deleteErrorLogs($filePath);
        }
        // If it's a file named "error_log", delete it
        elseif (is_file($filePath) && $file === 'error_log') {
            unlink($filePath); // Delete the file
            echo "Deleted: " . $filePath . "\n";
        }
    }
}

// Get the parent folder of the current directory
$parentDir = dirname(__DIR__);

// Start deleting error_log files in the current folder and the parent directory
deleteErrorLogs($parentDir);

echo "All error_log files deleted.";
