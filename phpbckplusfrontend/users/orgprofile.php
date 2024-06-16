<?php
include '../cors.php';
include '../dbconnection.php';
session_name('validuser');
session_start();

// Check if user is not logged in, redirect to login page
if (!isset($_SESSION['userloggedin']) || $_SESSION['userloggedin'] !== 'true') {
    header('Location: ./index.php');
    exit();
}

$user_id = $_SESSION['user_id']; // Assuming user_id is stored in session

// Fetch organization details from database
$sql = "SELECT * FROM organizations WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $organization = $result->fetch_assoc();
} else {
    echo "Organization not found.";
    exit();
}

// Functionality to add credit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //call the web3 function if approved then update the creditscore in the database adding the credits



}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link href="../dist/output.css" rel="stylesheet" />
</head>

<body>

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-4">User Profile</h1>
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-2">Organization Details</h2>
            <p><strong>Organization Name:</strong> <?php echo htmlspecialchars($organization['full_name']); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($organization['email']); ?></p>
            <p><strong>Address:</strong> <?php echo htmlspecialchars($organization['address']); ?></p>
            <p><strong>Phone:</strong> <?php echo htmlspecialchars($organization['phone_number']); ?></p>
            <p><strong>Credit Score:</strong> <?php echo htmlspecialchars($organization['creditscore']); ?></p>

            <!-- Form to add credit -->
            <form action="orgprofile.php" method="POST" class="mt-4">
                <label for="credits" class="block text-gray-700">Add Credits:</label>
                <input type="number" name="credits" id="credits" class="border rounded-lg py-2 px-3 text-gray-700" required>
                <button type="submit" name="add_credit" class="bg-blue-500 text-white px-4 py-2 rounded-lg mt-2">Add Credit</button>
            </form>
        </div>
    </div>

</body>

</html>