<?php
# Include the 'header.php' file if needed
include('header.php');

# Check if GET data is not empty
if (!empty($_GET)) {
    # Include the 'connection.php' file for the database connection
    include('connection.php');

    # Retrieve data from GET
    $table = $_GET['table'];
    $medan_code = $_GET['medan_code'];
    $deleteidDia = $_GET['code']; // Update the variable name

    # Construct the SQL DELETE query with proper syntax
    $arahan_sql_hapus = "DELETE FROM $table WHERE $medan_code = '$deleteidDia'";

    # Execute the SQL query and check for errors
    if (mysqli_query($condb, $arahan_sql_hapus)) {
        echo "<script>alert('Successfully deleted');
              window.history.back();</script>";
    } else {
        echo "<script>alert('Failed to delete data: " . mysqli_error($condb) . "');
              window.history.back();</script>";
    }
}
?>
