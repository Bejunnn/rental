<?php
include('../../koneksi.php');

$id_mobil = $_GET['id_mobil'];
$status = $_GET['status'];

// Create a prepared statement
$updateQuery = "UPDATE mobil SET status = ? WHERE id_mobil = ?";
$stmt = mysqli_prepare($koneksi, $updateQuery);

if ($stmt) {
    // Bind the parameters
    mysqli_stmt_bind_param($stmt, "ii", $status, $id_mobil);

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        // Redirect to index.php
        header('Location: index.php');
        exit();
    } else {
        // Handle the SQL error, if any
        echo "Error executing the query: " . mysqli_error($koneksi);
    }

    // Close the statement
    mysqli_stmt_close($stmt);
} else {
    // Handle the statement creation error, if any
    echo "Error creating the prepared statement: " . mysqli_error($koneksi);
}

// Close the database connection
mysqli_close($koneksi);
?>
