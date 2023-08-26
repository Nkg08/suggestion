<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "suggestionform";

$connection = mysqli_connect($servername, $username, $password, $dbname);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

error_reporting(E_ALL);
ini_set('display_errors', '1');

function uploadSupportingDocument($targetDir) {
    if (isset($_FILES["supporting_document"]) && !empty($_FILES["supporting_document"]["name"])) {
        $fileName = basename($_FILES["supporting_document"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        if (move_uploaded_file($_FILES["supporting_document"]["tmp_name"], $targetFilePath)) {
            return $targetFilePath;
            echo "File uploaded successfully!";
        } else {
            return "Upload Failed";
        }
    } else {
        return "";
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $area_equipment = $_POST['area_equipment'];
    $present_status = $_POST['present_status'];
    $suggested_solution = $_POST['suggested_solution'];
    $impact_options = isset($_POST['impact_options']) ? $_POST['impact_options'] : [];
    $impact_options_str = implode(", ", $impact_options);
    $any_other_improvement = $_POST['any_other_improvement'];
    $saving_status = $_POST['saving_status'];
    $suggestion_details = $_POST['suggestion_details'];
    $supporting_document = uploadSupportingDocument("uploads/");
    
    $sql = "INSERT INTO suggestion (
        area_equipment, 
        present_status, 
        suggested_solution, 
        
        impact_options,
        any_other_improvement, 
        saving_status, 
        suggestion_details,
        supporting_document
    ) VALUES (
        '$area_equipment', 
        '$present_status', 
        '$suggested_solution', 
        
        '$impact_options_str',
        '$any_other_improvement', 
        '$saving_status', 
        '$suggestion_details',
        '$supporting_document'
    )";
 if ($connection->query($sql) === TRUE) {
    echo "Form submitted successfully!";
 } else {
     echo "Error: " . $sql . "<br>" . $connection->error;
 }

mysqli_close($connection);
}
?>  
