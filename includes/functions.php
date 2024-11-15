<?php
// Function to read .env file
function loadEnv($file)
{
    // To read the .env file and converts every row with their key-value
    $env = [];
    if (file_exists($file)) {
        $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {

            if (strpos(trim($line), '#') === 0) {
                continue;
            }
            // Divide the key and value with explode()
            list($key, $value) = explode('=', $line, 2);
            $env[trim($key)] = trim($value);
        }
    }
    return $env;
}

// Load the .env file
$envVariables = loadEnv('.env');


