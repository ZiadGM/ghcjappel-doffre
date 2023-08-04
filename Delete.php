<?php
session_start();
include "BASE.php";
$E = $_SESSION["K"];

// Use backticks around the table name to avoid conflicts with reserved keywords
$sql = "DELETE FROM `add` WHERE NM = ?";

// Prepare the statement
$stmt = mysqli_prepare($conn, $sql);

if ($stmt) {
    // Bind the parameter to the statement
    mysqli_stmt_bind_param($stmt, "s", $E);

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        // Redirect after successful deletion
        header("location: admine.php");
        exit;
    } else {
        // Handle the error if the deletion failed
        echo "Error: " . mysqli_error($conn);
    }

    // Close the statement
    mysqli_stmt_close($stmt);
} else {
    // Handle the error if the statement couldn't be prepared
    echo "Error: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
