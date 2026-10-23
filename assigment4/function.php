<?php

// Add the basic salary and allowance.
function calculateGrossSalary($basicSalary, $allowance)
{
	return $basicSalary + $allowance;
}

// Calculate bonus using the basic salary.
function calculateBonus($basicSalary)
{
	if ($basicSalary >= 1000) {
		return $basicSalary * 0.10;
	} elseif ($basicSalary >= 500) {
		return $basicSalary * 0.05;
	} else {
		return 0;
	}
}

// Calculate service benefit using years of service.
function calculateServiceBenefit($basicSalary, $yearsOfService)
{
	if ($yearsOfService >= 5) {
		return $basicSalary * 0.08;
	} elseif ($yearsOfService >= 3) {
		return $basicSalary * 0.05;
	} else {
		return 0;
	}
}

// Calculate the extra allowance for the employment type.
function calculateEmploymentAllowance($basicSalary, $employmentType)
{
	if ($employmentType == "Full-Time") {
		return $basicSalary * 0.06;
	} elseif ($employmentType == "Part-Time") {
		return $basicSalary * 0.03;
	} else {
		return 0;
	}
}

// Add all three benefits together.
function calculateTotalBenefits($bonus, $serviceBenefit, $employmentAllowance)
{
	return $bonus + $serviceBenefit + $employmentAllowance;
}

// Subtract deduction from gross salary and total benefits.
function calculateNetSalary($grossSalary, $totalBenefits, $deduction)
{
	return $grossSalary + $totalBenefits - $deduction;
}

// Give the salary status based on net salary.
function checkSalaryStatus($netSalary)
{
	if ($netSalary >= 1500) {
		return "High Salary";
	} elseif ($netSalary >= 800) {
		return "Medium Salary";
	} else {
		return "Low Salary";
	}
}

// Multiply net salary by 12. The default value demonstrates a default parameter.
function calculateAnnualSalary($netSalary = 0)
{
	return $netSalary * 12;
}
?>