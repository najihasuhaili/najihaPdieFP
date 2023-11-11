<?php
include('header.php');
include('connection.php');

if (isset($_GET['dcsCode'])) {
    $dcsCode = $_GET['dcsCode'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Handle form submission and update the book information in the database
        $newSemester = $_POST['newSemester'];
        $newBookName = $_POST['newBookName'];
        $newPrice = $_POST['newPrice'];

        // Perform the database update
        $update_sql = "UPDATE dcslist SET dcsSem='$newSemester', bookName='$newBookName', price='$newPrice' WHERE dcsCode='$dcsCode'";
        if (mysqli_query($condb, $update_sql)) {
            // Redirect back to the main page after updating
            header('Location: adminDcsBookList.php');
            exit();
        } else {
            echo "Error updating record: " . mysqli_error($condb);
        }
    } else {
        // Retrieve the existing book information for editing
        $select_sql = "SELECT * FROM dcslist WHERE dcsCode='$dcsCode'";
        $result = mysqli_query($condb, $select_sql);
        $row = mysqli_fetch_assoc($result);
        ?>
        
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <!-- Your head content here -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css">
        </head>
        <body>
            <div class="container">
                <h1 class="my-4">Update Book Information</h1>
                <form method="post">
                    <div class="form-group">
                        <label for="newSemester">New Semester:</label>
                        <input type="text" class="form-control" name="newSemester" value="<?php echo $row['dcsSem']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="newBookName">New Book Name:</label>
                        <input type="text" class="form-control" name="newBookName" value="<?php echo $row['bookName']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="newPrice">New Price:</label>
                        <input type="text" class="form-control" name="newPrice" value="<?php echo $row['price']; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </body>
        </html>
        <?php
    }
} else {
    echo "Invalid request. Please provide a dcsCode parameter.";
}
?>
