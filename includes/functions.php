<?php
// Function to read .env file
/**
 * @throws Exception
 */
function loadEnv($filePath): array
{
    // Condition to check the file existence
    if (!file_exists($filePath)) {
        throw new Exception("File .env cannot be found!");
    }

    // Read the .env file on every single lines
    $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $envVariables = [];

    // Proceed every lines inside .env file
    foreach ($lines as $line) {
        // Condition to ignore comment lines
        if (str_starts_with(trim($line), '#')) {
            continue;
        }

        // Split the key and value based on '=' sign
        list($key, $value) = explode('=', $line, 2);

        // Stored key and it values into an array
        $envVariables[trim($key)] = trim($value);
    }

    // Returns an array containing environment variables
    return $envVariables;
}





