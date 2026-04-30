<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="final_task1.php" method="get">
        <label for="name">Enter name:</label>
        <input type="text" name="name" required><br><br>
        <input type="submit" name="submit">
        <input type="reset" name="reset">

        
    </form>
</body>
</html>

<?php

$students = [
    ["id" => "S101", "name" => "Rashed", "marks" => 75],
    ["id" => "S102", "name" => "Karim",  "marks" => 48],
    ["id" => "S103", "name" => "Rahim",  "marks" => 90],
    ["id" => "S104", "name" => "Sadia",  "marks" => 62],
    ["id" => "S105", "name" => "Nusrat", "marks" => 55]
];


echo "<h2>Student Information:</h2>";
foreach ($students as $student) {
    echo "ID: {$student['id']} | Name: {$student['name']} | Marks: {$student['marks']}<br>";
}


function calculateAverage($students) {
    $total = 0;
    foreach ($students as $s) {
        $total += $s['marks'];
    }
    return $total / count($students);
}




$total = 0;
$max = $students[0]['marks'];
$min = $students[0]['marks'];
$pass = 0;
$fail = 0;

// Type casting
$average = (float) calculateAverage($students);

$marksOnly = array_column($students, 'marks');
sort($marksOnly);


foreach ($students as $s) {
    $mark = $s['marks'];
    $total += $mark;

    if ($mark > $max) $max = $mark;
    if ($mark < $min) $min = $mark;

    if ($mark >= 50) {
        $pass++;
    } else {
        $fail++;
    }


}


echo "<h3>Results:</h3>";
echo "Total Marks: $total <br>";
echo "Average Marks: $average <br>";
echo "Maximum Marks: $max <br>";
echo "Minimum Marks: $min <br>";



echo "------------------------------------------------------- <br>";
  $marks=[75,48,90,62,55];
   sort($marks);

echo "Sorted mark: ";
foreach($marks as $val){
    echo "$val ";
}

echo "<br>------------------------------------------------------- <br>";
    echo "Student Passed:{$pass}<br>";
     echo "Student Failed:{$fail}<br>";


   



if(isset($_GET["name"])){

$name=$_GET["name"];
echo "------------------------------------------------------- <br>";
echo "Searched name: {$name} <br>";

$upname=strtoupper($name);
echo "Searched name in uppercase: {$upname}<br>";

}


?>