```html
<!DOCTYPE html>
<html>
<head>
    <title>Register Form</title>
</head>

<body>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 40px 20px;
            background: linear-gradient(135deg, #eef4ff, #f9fbff);
            font-family: Arial, sans-serif;
            color: #1f2937;
        }

        .container {
            max-width: 700px;
            margin: 0 auto;
            display: grid;
            gap: 28px;
        }

        .form-box {
            background: #ffffff;
            border: 1px solid #dbe3f0;
            border-radius: 16px;
            padding: 24px 22px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.06);
        }

        .field {
            display: block;
            margin-bottom: 18px;
        }

        .field span {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #374151;
        }

        input[type="text"],
        input[type="password"],
        textarea {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            outline: none;
            transition: 0.2s ease;
            font-size: 14px;
        }

        input[type="text"]:focus,
        input[type="password"]:focus,
        textarea:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.15);
        }

        textarea {
            resize: vertical;
            min-height: 120px;
        }

        .buttons {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-top: 8px;
        }

        button {
            border: none;
            border-radius: 10px;
            padding: 10px 18px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s ease;
        }

        button[type="submit"] {
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            color: #fff;
        }

        button[type="submit"]:hover {
            background: linear-gradient(135deg, #1d4ed8, #1e40af);
        }

        button[type="reset"] {
            background: #e5e7eb;
            color: #1f2937;
        }

        button[type="reset"]:hover {
            background: #d1d5db;
        }

        .radio-group {
            display: flex;
            gap: 20px;
            align-items: center;
            margin-top: 12px;
        }

        .radio-group label {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-weight: 500;
            color: #374151;
        }

        input[type="radio"] {
            accent-color: #2563eb;
            width: 16px;
            height: 16px;
        }
    </style>
</head>
<body>
    <div class="container">

        <?php
        // PARAMETERS VS ARGUMENTS
        function showNumber($number) {
            echo "Number: " . $number . "<br>";
        }
        showNumber(5);

        // RETURNING A VALUE / FACTORIAL
        function factorialValue($a) {
            $result = 1;
            for ($i = 1; $i <= $a; $i++) {
                $result *= $i;
            }
            return $result;
        }
        echo "Factorial of 5 is: " . factorialValue(5) . "<br>";

        // PASSING BY VALUE VS PASSING BY REFERENCE
        function increaseByValue($x) {
            $x++;
            return $x;
        }
        $a = 5;
        increaseByValue($a);
        echo "Original value after pass-by-value: " . $a . "<br>";

        function increaseByReference(&$x) {
            $x++;
        }
        increaseByReference($a);
        echo "Value after pass-by-reference: " . $a . "<br>";

        // DEFAULT ARGUMENT VALUE
        function greet($name = "Student") {
            echo "Hello, " . $name . "<br>";
        }
        greet();
        greet("Ahmed");

        // SCOPE OF VARIABLES
        $globalNumber = 10;
        function showGlobalNumber() {
            global $globalNumber;
            echo "Global number: " . $globalNumber . "<br>";
        }
        showGlobalNumber();

        // TEXTBOX AND PASSWORD FIELD (POST)
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["register_text"])) {
            $name = htmlspecialchars($_POST["name"] ?? "");
            $password = htmlspecialchars($_POST["pass"] ?? "");
            echo "User name: " . $name . "<br>";
            echo "Password: " . $password . "<br>";
        }
        ?>

        <form method="post" class="form-box">
            <label class="field">
                <span>Enter Full Name</span>
                <input type="text" name="name">
            </label>

            <label class="field">
                <span>Enter Password</span>
                <input type="password" name="pass">
            </label>

            <div class="buttons">
                <button type="reset">Reset form</button>
                <button type="submit" name="register_text">Register</button>
            </div>
        </form>

        <?php
        // TEXTBOX, PASSWORD, AND TEXTAREA
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["register_comment"])) {
            echo "User name: " . htmlspecialchars($_POST["fullName"] ?? "") . "<br>";
            echo "Comment: " . nl2br(htmlspecialchars($_POST["comment"] ?? "")) . "<br>";
        }
        ?>

        <form method="post" class="form-box">
            <label class="field">
                <span>Full name</span>
                <input type="text" name="fullName" placeholder="Full name">
            </label>

            <label class="field">
                <span>Password</span>
                <input type="password" name="pinCode" placeholder="Password">
            </label>

            <label class="field">
                <span>Comment</span>
                <textarea name="comment" cols="30" rows="6"></textarea>
            </label>

            <div class="buttons">
                <button type="reset">Reset form</button>
                <button type="submit" name="register_comment">Register</button>
            </div>
        </form>

        <?php
        // CHAPTER 4: RADIO BUTTON FIELDS
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["register_sex"])) {
            if (!empty($_POST["sex"])) {
                echo "Sex: " . htmlspecialchars($_POST["sex"]) . "<br>";
            } else {
                echo "Please select an option.<br>";
            }
        }
        ?>

        <form method="post" class="form-box">
            <label><span>Gender</span></label>
            <div class="radio-group">
                <label><input type="radio" name="sex" value="male"> Male</label>
                <label><input type="radio" name="sex" value="female"> Female</label>
            </div>

            <div class="buttons" style="margin-top: 18px;">
                <button type="submit" name="register_sex">Register</button>
            </div>
        </form>

    </div>
</body>
</html>

</body>
</html>
```