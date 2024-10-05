<?php
header("Content-Type: application/json");

// Set the default timezone to Chicago CST
date_default_timezone_set('America/Chicago');

function logMessage($message)
{
    $logFile = __DIR__ . '/logfile.log';

    if (!file_exists($logFile)) {
        touch($logFile);
        chmod($logFile, 0666); // Sets RW permissions for everyone
        chown($logFile, www-data);
    }
    // Format the log message with a timestamp
    $logMessage = ('Time Sync [' . date('Y-m-d H:i:s') . '] ' . $message) . PHP_EOL;
    // Append the log message to the log file
    file_put_contents($logFile, $logMessage, FILE_APPEND);
}

logMessage('Client Connected!');

try {
    // Get the current server time as a timestamp
    $timestamp = time();
    logMessage('Time was: ' . $timestamp);
    if ($timestamp === false) {
        throw new Exception("Failed to retrieve the current time.");
    }

    // Prepare the response in JSON format
    $response = ["time" => $timestamp];
    echo json_encode($response, JSON_PRETTY_PRINT);
    logMessage('Sent current time: ' . $response);
} catch (Exception $e) {
    // Handle any exceptions and return an error message in JSON format
    http_response_code(500);
    echo json_encode(["error" => $e->getMessage()]);
    logMessage('Error sending time to client: ' . $e->getMessage());
}
?>
