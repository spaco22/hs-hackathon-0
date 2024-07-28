<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    
    // Validate and sanitize input (you may want to add more robust validation)
    $first_name = htmlspecialchars(strip_tags($first_name));
    $last_name = htmlspecialchars(strip_tags($last_name));
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    
    // Prepare data for CSV
    $data = array($first_name, $last_name, $email);
    
    // Open or create the CSV file
    $file = fopen('email_list.csv', 'a');
    
    // Write the data to the CSV file
    fputcsv($file, $data);
    
    // Close the file
    fclose($file);
    
    // Redirect back to the main page with a success message
    header("Location: index.html?signup=success#five");
    exit();
} else {
    // If not a POST request, redirect to the main page
    header("Location: index.html");
    exit();
}
?>