<?php
// Database connection settings
$servername = "localhost";
$username = "root"; // Replace with your DB username
$password = ""; // Replace with your DB password
$dbname = "restaurant application";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $named_insured = $_POST['named_insured'];
    $trading_as = $_POST['trading_as'];
    $website = $_POST['website'];
    $tax_status = $_POST['tax_status'];
    $abn = $_POST['abn'];
    $occupation = $_POST['occupation'];
    $hours_of_operation = $_POST['hours_of_operation'];
    $years_in_operation = $_POST['years_in_operation'];
    $insurance_from = $_POST['insurance_from'];
    $insurance_to = $_POST['insurance_to'];
    
    // Checkbox fields
    $declined_insurance = isset($_POST['declined_insurance']) ? 1 : 0;
    $refused_renewal = isset($_POST['refused_renewal']) ? 1 : 0;
    $special_conditions = isset($_POST['special_conditions']) ? 1 : 0;
    $special_excess = isset($_POST['special_excess']) ? 1 : 0;
    $claim_rejected = isset($_POST['claim_rejected']) ? 1 : 0;
    $bankruptcy = isset($_POST['bankruptcy']) ? 1 : 0;
    $criminal_offence = isset($_POST['criminal_offence']) ? 1 : 0;
    $other_matters = isset($_POST['other_matters']) ? 1 : 0;
    
    // Claim history
    $claim_date = $_POST['claim_date'];
    $insurer = $_POST['insurer'];
    $claim_details = $_POST['claim_details'];
    
    // SQL query to insert data
    $sql = "INSERT INTO application_form (
                named_insured, trading_as, website, tax_status, abn, occupation, 
                hours_of_operation, years_in_operation, insurance_from, insurance_to, 
                declined_insurance, refused_renewal, special_conditions, special_excess, 
                claim_rejected, bankruptcy, criminal_offence, other_matters, 
                claim_date, insurer, claim_details
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    // Prepare and bind
    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "sssssssiissssssssssss",
        $named_insured, $trading_as, $website, $tax_status, $abn, $occupation,
        $hours_of_operation, $years_in_operation, $insurance_from, $insurance_to,
        $declined_insurance, $refused_renewal, $special_conditions, $special_excess,
        $claim_rejected, $bankruptcy, $criminal_offence, $other_matters,
        $claim_date, $insurer, $claim_details
    );

    // Execute the query
    if ($stmt->execute()) {
        echo "Application submitted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close connections
    $stmt->close();
    $conn->close();
}
?>
