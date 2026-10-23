<?php
require_once 'function.php';

$errors = "";
$basename="";
$employeeName = "";
$employeeId = "";
$gender = "";
$department = "";
$employmentType = "";
$basicSalary = "";
$allowance = "";
$deduction = "";
$yearsOfService = "";

if (isset($_POST['employeeName'])) {
	$employeeName = trim($_POST['employeeName']);
}
if (isset($_POST['employeeId'])) {
	$employeeId = trim($_POST['employeeId']);
}
if (isset($_POST['gender'])) {
	$gender = $_POST['gender'];
}
if (isset($_POST['department'])) {
	$department = $_POST['department'];
}
if (isset($_POST['employmentType'])) {
	$employmentType = $_POST['employmentType'];
}
if (isset($_POST['basicSalary'])) {
	$basicSalary = $_POST['basicSalary'];
}
if (isset($_POST['allowance'])) {
	$allowance = $_POST['allowance'];
}
if (isset($_POST['deduction'])) {
	$deduction = $_POST['deduction'];
}
if (isset($_POST['yearsOfService'])) {
	$yearsOfService = $_POST['yearsOfService'];
}
  if (isset($_POST["upload_single"])) {

        if (isset($_FILES["scertificate"])) {

            [$ok, $message] = uploadFile(
                $_FILES["scertificate"],
                $uploadDir,
                $allowedExtensions,
                $maxSize
            );

            if ($ok) {
                $messages[] = clean($message);
            } else {
                $errors[] = clean($message);
            }

        } else {
            $errors[] = "No file received.";
        }
    }

if (empty($employeeName)) {
	$errors .= "Employee name is required.\n";
}
if (empty($employeeId)) {
	$errors .= "Employee ID is required.\n";
}
if (empty($gender)) {
	$errors .= "Please select a gender.\n";
} elseif ($gender != "Male" && $gender != "Female") {
	$errors .= "Please select a valid gender.\n";
}
if (empty($department)) {
	$errors .= "Please select a department.\n";
} elseif ($department != "Human Resources" && $department != "Finance" && $department != "Information Technology" && $department != "Administration") {
	$errors .= "Please select a valid department.\n";
}
if (empty($employmentType)) {
	$errors .= "Please select an employment type.\n";
} elseif ($employmentType != "Full-Time" && $employmentType != "Part-Time") {
	$errors .= "Please select a valid employment type.\n";
}

$salaryInputsAreValid = true;

if (!is_numeric($basicSalary) || $basicSalary <= 0) {
	$errors .= "Basic salary must be greater than zero.\n";
	$salaryInputsAreValid = false;
}
if (!is_numeric($allowance) || $allowance < 0) {
	$errors .= "Allowance cannot be negative and must be a number.\n";
	$salaryInputsAreValid = false;
}
if (!is_numeric($deduction) || $deduction < 0) {
	$errors .= "Deduction cannot be negative and must be a number.\n";
	$salaryInputsAreValid = false;
}
if (!is_numeric($yearsOfService) || $yearsOfService < 0) {
	$errors .= "Years of service cannot be negative and must be a number.\n";
	$salaryInputsAreValid = false;
} elseif ((int) $yearsOfService != $yearsOfService) {
	$errors .= "Years of service must be a whole number.\n";
	$salaryInputsAreValid = false;
}

if ($salaryInputsAreValid) {
	$grossSalary = calculateGrossSalary($basicSalary, $allowance);
	$bonus = calculateBonus($basicSalary);
	$serviceBenefit = calculateServiceBenefit($basicSalary, $yearsOfService);
	$employmentAllowance = calculateEmploymentAllowance($basicSalary, $employmentType);
	$totalBenefits = calculateTotalBenefits($bonus, $serviceBenefit, $employmentAllowance);
	$netSalary = calculateNetSalary($grossSalary, $totalBenefits, $deduction);
	$salaryStatus = checkSalaryStatus($netSalary);
	$annualSalary = calculateAnnualSalary($netSalary);

	if ($deduction > $grossSalary + $totalBenefits) {
		$errors .= "Deduction cannot be more than gross salary plus total benefits.\n";
	}
} else {
	$grossSalary = 0;
	$bonus = 0;
	$serviceBenefit = 0;
	$employmentAllowance = 0;
	$totalBenefits = 0;
	$netSalary = 0;
	$salaryStatus = "";
	$annualSalary = 0;
}

$documentName = "";
$documentType = "";
$documentSize = 0;
$documentTemp = "";
$uploadStatus = "";

if (!isset($_FILES['employeeDocument'])) {
	$errors .= "Please select an employee document.\n";
} elseif ($_FILES['employeeDocument']['error'] == 1) {
	$errors .= "The document is larger than 2 MB.\n";
} elseif ($_FILES['employeeDocument']['error'] != 0) {
	$errors .= "Please select an employee document.\n";
} else {
	$documentName = basename($_FILES['employeeDocument']['name']);
	$documentType = $_FILES['employeeDocument']['type'];
	$documentSize = $_FILES['employeeDocument']['size'];
	$documentTemp = $_FILES['employeeDocument']['tmp_name'];

	if (empty($documentName)) {
		$errors .= "Please select an employee document.\n";
	} elseif ($documentSize > 2 * 1024 * 1024) {
		$errors .= "The document is larger than 2 MB.\n";
	} elseif (file_exists("uploads/" . $documentName)) {
		$errors .= "A file with this name already exists. Choose another file.\n";
	}
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Employee Registration Results</title>
</head>
<body>
	<h1>Employee Registration Results</h1>

	<?php if (!empty($errors)) { ?>
		<h2>Please correct these errors:</h2>
		<pre><?php echo htmlspecialchars($errors); ?></pre>
	<?php } else { ?>
		<table border="1" cellpadding="6">
			<tr><th>Information</th><th>Result</th></tr>
			<tr><td>Employee Name</td><td><?php echo htmlspecialchars($employeeName); ?></td></tr>
			<tr><td>Employee ID</td><td><?php echo htmlspecialchars($employeeId); ?></td></tr>
			<tr><td>Gender</td><td><?php echo htmlspecialchars($gender); ?></td></tr>
			<tr><td>Department</td><td><?php echo htmlspecialchars($department); ?></td></tr>
			<tr><td>Employment Type</td><td><?php echo htmlspecialchars($employmentType); ?></td></tr>
			<tr><td>Years of Service</td><td><?php echo htmlspecialchars($yearsOfService); ?></td></tr>
			<tr><td>Basic Salary</td><td>$<?php echo $basicSalary; ?></td></tr>
			<tr><td>Allowance</td><td>$<?php echo $allowance; ?></td></tr>
			<tr><td>Gross Salary</td><td>$<?php echo $grossSalary; ?></td></tr>
			<tr><td>Bonus</td><td>$<?php echo $bonus; ?></td></tr>
			<tr><td>Service Benefit</td><td>$<?php echo $serviceBenefit; ?></td></tr>
			<tr><td>Employment Allowance</td><td>$<?php echo $employmentAllowance; ?></td></tr>
			<tr><td>Total Benefits</td><td>$<?php echo $totalBenefits; ?></td></tr>
			<tr><td>Deduction</td><td>$<?php echo $deduction; ?></td></tr>
			<tr><td>Net Salary</td><td>$<?php echo $netSalary; ?></td></tr>
			<tr><td>Salary Status</td><td><?php echo htmlspecialchars($salaryStatus); ?></td></tr>
			<tr><td>Annual Salary</td><td>$<?php echo $annualSalary; ?></td></tr>
			<tr><td>Uploaded Document Name</td><td><?php echo htmlspecialchars($documentName); ?></td></tr>
			<tr><td>Uploaded Document Type</td><td><?php echo htmlspecialchars($documentType); ?></td></tr>
			<tr><td>Uploaded Document Size</td><td><?php echo $documentSize; ?> bytes</td></tr>
			<tr><td>Upload Status</td><td><?php echo htmlspecialchars($uploadStatus); ?></td></tr>
		</table>
	<?php } ?>

	<p><a href="index.html">Back to Registration Form</a></p>
</body>
</html>
