<?php
// Assuming you have included your database connection code here

// Fetch the user's ID (You'll need to implement your own authentication/user ID retrieval)
$user_id = $authenticated_user_id; // Replace with actual user ID retrieval code
session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    // Redirect the user to the login page or show an error message
    header("Location: login.php");
    exit();
}

// Fetch suggestions submitted by the user
$query = "SELECT * FROM suggestion WHERE user_id = '$user_id'";
$result = mysqli_query($connection, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Suggestions Report</title>
    <!-- Include your CSS links here -->
</head>
<body>
    <div class="view-suggestions-container">
        <h1>View Your Suggestions</h1>
        <a href="userSuggestions.php">View Your Suggestions Report</a>
    </div>

    <div class="suggestions-report-container">
        <h1>Your Suggestions Report</h1>
        <?php if (mysqli_num_rows($result) > 0) : ?>
        <table>
            <thead>
                <tr>
                    <th>Area / Equipment</th>
                    <th>Present Status</th>
                    <!-- Add other table headers here -->
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <td><?php echo $row['area_equipment']; ?></td>
                    <td><?php echo $row['present_status']; ?></td>
                    <!-- Add other table cells here -->
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <?php else : ?>
        <p>No suggestions found.</p>
        <?php endif; ?>
    </div>
    <!-- Include any other HTML elements here -->
</body>
</html>

<?php
// Close the database connection
mysqli_close($connection);
?>
