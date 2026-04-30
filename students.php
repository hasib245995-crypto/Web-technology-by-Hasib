<?php
header("Content-Type: application/json");

// Create an array of students
$students = array(
    array(
        "name" => "Rahim Ahmed",
        "id" => "CSE101",
        "department" => "Computer Science",
        "cgpa" => "3.75"
    ),
    array(
        "name" => "Karim Uddin",
        "id" => "EEE102",
        "department" => "Electrical Engineering",
        "cgpa" => "3.60"
    ),
    array(
        "name" => "Ayesha Rahman",
        "id" => "BBA103",
        "department" => "Business Administration",
        "cgpa" => "3.85"
    )
);

// Convert array to JSON and send response
echo json_encode($students);
?>