<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chapter 4 - PHP Forms</title>
</head>
<body>

<h2>Chapter 4: PHP Forms and File Uploads</h2>

<?php
$errors = [];
$messages = [];

$allowedExtensions = ["jpg", "jpeg", "png", "pdf"];
$maxSize = 5 * 1024 * 1024;
$uploadDir = __DIR__ . "/Docs/";

function clean($value) {
    return htmlspecialchars(
        (string)$value,
        ENT_QUOTES,
        "UTF-8"
    );
}

function uploadFile(
    $file,
    $uploadDir,
    $allowedExtensions,
    $maxSize
) {
    if ($file["error"] === UPLOAD_ERR_NO_FILE) {
        return [false, "Please select a file."];
    }

    if ($file["error"] !== UPLOAD_ERR_OK) {
        return [false, "File upload failed."];
    }

    // File size validation
    if ($file["size"] > $maxSize) {
        return [false, "File is too large. Maximum 5 MB."];
    }

    // File extension validation
    $ext = strtolower(
        pathinfo($file["name"], PATHINFO_EXTENSION)
    );

    if (!in_array($ext, $allowedExtensions, true)) {
        return [false, "File extension is not allowed."];
    }

    // Validate image contents
    if (
        in_array($ext, ["jpg", "jpeg", "png"], true)
        && @getimagesize($file["tmp_name"]) === false
    ) {
        return [false, "Invalid image file."];
    }

    // Create Docs directory
    if (
        !is_dir($uploadDir)
        && !mkdir($uploadDir, 0755, true)
        && !is_dir($uploadDir)
    ) {
        return [false, "Could not create Docs folder."];
    }

    // Generate a unique filename
    $newName = bin2hex(random_bytes(8)) . "." . $ext;
    $destination = $uploadDir . $newName;

    // Check file existence
    if (file_exists($destination)) {
        return [false, "File already exists."];
    }

    // Move file from temporary to final location
    if (
        move_uploaded_file(
            $file["tmp_name"],
            $destination
        )
    ) {
        return [true, "File uploaded successfully: " . $newName];
    }

    return [false, "Could not save the uploaded file."];
}


// PROCESS FORM DATA
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // CHECKBOX FIELDS
    if (isset($_POST["submit_fields"])) {

        $validFaculties = [
            "Engineering",
            "Medicine",
            "Computer Sciences"
        ];

        $faculties = $_POST["faculties"] ?? [];

        if (is_array($faculties)) {
            $faculties = array_values(
                array_intersect(
                    $faculties,
                    $validFaculties
                )
            );
        } else {
            $faculties = [];
        }

        $messages[] = "Faculties: " .
            (
                empty($faculties)
                ? "None selected"
                : clean(implode(", ", $faculties))
            );


        // DROP-DOWN MENU
        $validPlaces = [
            "Muqdisho",
            "Hargeysa",
            "Kismayo",
            "Marko"
        ];

        $pob = $_POST["pob"] ?? "";

        if (in_array($pob, $validPlaces, true)) {
            $messages[] = "Place of birth: " . clean($pob);
        } else {
            $errors[] = "Please select a valid place.";
        }


        // LISTBOX - MULTIPLE CHOICE
        $residence = $_POST["residence"] ?? [];

        if (!is_array($residence)) {
            $residence = [];
        }

        $residence = array_values(
            array_intersect($residence, $validPlaces)
        );

        $messages[] = "Residence: " .
            (
                empty($residence)
                ? "None selected"
                : clean(implode(", ", $residence))
            );
    }


    // SINGLE FILE UPLOAD
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


    // MULTIPLE FILE UPLOAD
    if (isset($_POST["upload_multiple"])) {

        if (
            isset($_FILES["myFiles"])
            && is_array($_FILES["myFiles"]["name"])
        ) {
            $count = count($_FILES["myFiles"]["name"]);
            $uploaded = 0;

            for ($i = 0; $i < $count; $i++) {

                $file = [
                    "name" => $_FILES["myFiles"]["name"][$i],
                    "type" => $_FILES["myFiles"]["type"][$i],
                    "tmp_name" => $_FILES["myFiles"]["tmp_name"][$i],
                    "error" => $_FILES["myFiles"]["error"][$i],
                    "size" => $_FILES["myFiles"]["size"][$i]
                ];

                if ($file["error"] === UPLOAD_ERR_NO_FILE) {
                    continue;
                }

                [$ok, $message] = uploadFile(
                    $file,
                    $uploadDir,
                    $allowedExtensions,
                    $maxSize
                );

                if ($ok) {
                    $uploaded++;
                    $messages[] = clean($file["name"]) .
                        ": " . clean($message);
                } else {
                    $errors[] = clean($file["name"]) .
                        ": " . clean($message);
                }
            }

            if ($uploaded === 0 && empty($errors)) {
                $errors[] = "Please select at least one file.";
            }

        } else {
            $errors[] = "Please select files.";
        }
    }
}
?>

<!-- DISPLAY SUCCESS MESSAGES -->
<?php foreach ($messages as $message): ?>
    <p style="color:green;">
        <?= $message ?>
    </p>
<?php endforeach; ?>

<!-- DISPLAY ERROR MESSAGES -->
<?php foreach ($errors as $error): ?>
    <p style="color:red;">
        <?= $error ?>
    </p>
<?php endforeach; ?>


<!-- CHECKBOX, DROP-DOWN AND LISTBOX -->
<form method="post">

    <h3>Checkbox Fields</h3>

    <input type="checkbox"
           name="faculties[]"
           value="Engineering">
    Engineering

    <input type="checkbox"
           name="faculties[]"
           value="Medicine">
    Medicine

    <input type="checkbox"
           name="faculties[]"
           value="Computer Sciences">
    Computer Sciences


    <h3>Drop-down Menu</h3>

    <select name="pob">
        <option value="">Select Place</option>
        <option value="Muqdisho">Muqdisho</option>
        <option value="Hargeysa">Hargeysa</option>
        <option value="Kismayo">Kismayo</option>
        <option value="Marko">Marko</option>
    </select>


    <h3>Listbox - Multiple Choice</h3>

    <select name="residence[]" multiple size="4">
        <option value="Muqdisho">Muqdisho</option>
        <option value="Hargeysa">Hargeysa</option>
        <option value="Kismayo">Kismayo</option>
        <option value="Marko">Marko</option>
    </select>

    <br><br>

    <button type="submit" name="submit_fields">
        Submit Form
    </button>

    <button type="reset">Reset</button>

</form>


<!-- SINGLE FILE UPLOAD -->
<form method="post"
      enctype="multipart/form-data">

    <h3>File Upload</h3>

    <input type="file"
           name="scertificate"
           accept=".jpg,.jpeg,.png,.pdf"
           required>

    <button type="submit" name="upload_single">
        Upload File
    </button>

</form>


<!-- MULTIPLE FILE UPLOAD -->
<form method="post"
      enctype="multipart/form-data">

    <h3>Uploading Multiple Files</h3>

    <input type="file"
           name="myFiles[]"
           accept=".jpg,.jpeg,.png,.pdf"
           multiple
           required>

    <button type="submit" name="upload_multiple">
        Upload Multiple Files
    </button>

</form>


<h3>$_FILES Information</h3>

<ul>
    <li>name: Original filename</li>
    <li>size: File size in bytes</li>
    <li>tmp_name: Temporary file location</li>
    <li>type: Browser-reported file type</li>
</ul>

</body>
</html>