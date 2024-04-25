<?php
// Function to display code segments dynamically with JavaScript syntax highlighting

function displayCodeSegment($code, $label) {
    echo '<div class="code-segment">';
    echo '<pre><code class="language-javascript">' . htmlspecialchars($code) . '</code></pre>';
    echo '<button class="btn btn-info info-btn">Info</button>';
    echo '<div class="info-content" style="display: none;">';
    echo '<p><strong>Language:</strong> JavaScript</p>';
    echo '<p><strong>Label:</strong> ' . htmlspecialchars($label) . '</p>';
    echo '<p>This is a JavaScript code segment.</p>';
    echo '</div>';
    echo '</div>';
}

// Function to save code segment to a JSON file

function saveCodeSegment($code, $label) {
    $data = json_decode(file_get_contents('../data/code_segments.json'), true);
    $data[] = array(
        'code' => $code,
        'label' => $label
    );
    file_put_contents('../data/code_segments.json', json_encode($data, JSON_PRETTY_PRINT));
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $code = $_POST['code'];
    $label = $_POST['label'];
    saveCodeSegment($code, $label);
}
?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Code Segment Form</title>
    <!-- Bootstrap CSS -->
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet'>
    <!-- Include Prism.js for syntax highlighting -->
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/prismjs/themes/prism-vs.css'>
    <style>
        .code-segment {
            position: relative;
        }

        .info-btn {
            position: absolute;
            top: 5px;
            right: 5px;
        }

        .info-content {
            background-color: #f9f9f9;
            padding: 10px;
            margin-top: 10px;
            border: 1px solid #ddd;
        }
    </style>
</head>

<body>
    <?php include './navbar.php'; ?>
    <div class='container mt-5'>
        <h1>Code Segment Form</h1>
        <form method='post'>
            <div class='mb-3'>
                <label for='code' class='form-label'>Enter JavaScript Code Segment:</label>
                <textarea name='code' id='code' rows='10' cols='50' class='form-control'></textarea>
            </div>
            <div class='mb-3'>
                <label for='label' class='form-label'>Label:</label>
                <input type='text' name='label' id='label' class='form-control'>
            </div>
            <button type='submit' class='btn btn-primary'>Submit</button>
        </form>

        <!-- Display code segments stored in JSON file -->
        <?php
        $data = json_decode(file_get_contents('../data/code_segments.json'), true);
        if (!empty($data)) {
            echo '<h2 class="mt-5">Stored Code Segments</h2>';
            foreach ($data as $segment) {
                displayCodeSegment($segment['code'], $segment['label']);
            }
        }
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/prismjs/prism-core.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/prismjs/plugins/autoloader/prism-autoloader.min.js'></script>
    <script>
        $(document).ready(function () {
            $('.info-btn').click(function () {
                $(this).next('.info-content').toggle();
            });
        });
    </script>
</body>

</html>
