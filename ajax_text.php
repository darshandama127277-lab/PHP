<!DOCTYPE html>
<html>
<head>
    <title>Load Text File Using Ajax</title>
</head>
<body>
    <h2>Load Text File Using Ajax</h2>

    <button id="loadBtn">Load Text</button>
    <div id="content"></div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#loadBtn').click(function () {
                $('#content').load('sample.txt');
            });
        });
    </script>
</body>
</html>
