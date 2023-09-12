<?php
include "koneksi.php"; // Include your database connection file.

// Check if the 'id' parameter exists in the POST request.
if(isset($_POST['id'])) {
    $id = $_POST['id'];

    // Use prepared statements to prevent SQL injection.
    $stmt = mysqli_prepare($koneksi, "SELECT * FROM mobil WHERE id = ?");
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'i', $id); // Assuming 'id' is an integer.

        // Execute the prepared statement.
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            
            if ($result) {
                $data = mysqli_fetch_assoc($result);

                // Check if data was found.
                if ($data !== null) {
                    echo json_encode($data);
                } else {
                    echo json_encode(array('error' => 'No data found for the given id.'));
                }
            } else {
                echo json_encode(array('error' => 'Error fetching data.'));
            }
        } else {
            echo json_encode(array('error' => 'Error executing the query.'));
        }

        mysqli_stmt_close($stmt);
    } else {
        echo json_encode(array('error' => 'Error preparing the query.'));
    }
} else {
    echo json_encode(array('error' => 'No "id" parameter received in POST.'));
}

// Close the database connection.
mysqli_close($koneksi);
?>
