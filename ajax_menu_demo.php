<?php
// Simple demo page for jQuery AJAX menu, red selectors, scroll-to-top, and response headers.
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>jQuery AJAX Demo</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            line-height: 1.6;
        }
        nav a {
            display: inline-block;
            margin-right: 12px;
            padding: 10px 16px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        nav a:hover {
            background: #0056b3;
        }
        .box {
            border: 1px solid #ccc;
            padding: 16px;
            margin-top: 12px;
            border-radius: 6px;
            background: #f9f9f9;
        }
        button {
            margin: 8px 0;
            padding: 10px 18px;
            font-size: 15px;
        }
        pre {
            white-space: pre-wrap;
            background: #222;
            color: #e8e8e8;
            padding: 12px;
            border-radius: 6px;
        }
    </style>
</head>
<body>
    <h1>jQuery AJAX Demo</h1>

    <h2>1. Navigation menu + dynamic AJAX loading</h2>
    <nav>
        <a href="#" class="ajax-link" data-section="home">Home</a>
        <a href="#" class="ajax-link" data-section="products">Products</a>
        <a href="#" class="ajax-link" data-section="blog">Blog</a>
        <a href="#" class="ajax-link" data-section="contact">Contact</a>
    </nav>

    <div id="ajaxContent" class="box">
        <p>Click a menu item above to load section content here without refreshing the page.</p>
    </div>

    <h2>2. Change element background colors with jQuery selectors</h2>
    <p class="selectable">Paragraph one: this will be turned red using a tag selector.</p>
    <p>Paragraph two: this will also be turned red using a class selector.</p>
    <h3>Heading example: only this heading is selected with a pseudoselector.</h3>
    <button id="setRed">Set selected element backgrounds to red</button>

    <h2>3. Smooth scroll to top</h2>
    <p>Scroll down and use the button to animate the page back to the top smoothly.</p>
    <button id="scrollTop">Scroll to Top</button>

    <h2>4. Retrieve response header values with xhr.getResponseHeader</h2>
    <button id="fetchHeaders">Fetch resource headers</button>
    <div class="box">
        <strong>Response headers from <code>ajax_headers.php</code>:</strong>
        <pre id="headersOutput">Headers will appear here.</pre>
    </div>

    <script>
        $(document).ready(function () {
            $('.ajax-link').on('click', function (event) {
                event.preventDefault();
                const section = $(this).data('section');
                $('#ajaxContent').fadeTo(100, 0.3);

                $.get('ajax_content.php', { section: section }, function (response) {
                    $('#ajaxContent').html(response).fadeTo(200, 1);
                });
            });

            $('#setRed').on('click', function () {
                // Tag selector: all paragraphs
                $('p').css('background-color', 'red');
                // Class selector: any element with class selectable
                $('.selectable').css('color', 'white');
                // Element selector: the first heading under the second section
                $('h3').css('background-color', 'red');
            });

            $('#scrollTop').on('click', function () {
                $('html, body').animate({ scrollTop: 0 }, 500);
            });

            $('#fetchHeaders').on('click', function () {
                $.ajax({
                    url: 'ajax_headers.php',
                    method: 'GET',
                    success: function (data, status, xhr) {
                        const contentType = xhr.getResponseHeader('Content-Type');
                        const contentLength = xhr.getResponseHeader('Content-Length');
                        const lastModified = xhr.getResponseHeader('Last-Modified');
                        const etag = xhr.getResponseHeader('ETag');

                        $('#headersOutput').text(
                            'Content-Type: ' + contentType + '\n' +
                            'Content-Length: ' + contentLength + '\n' +
                            'Last-Modified: ' + lastModified + '\n' +
                            'ETag: ' + etag + '\n\n' +
                            'Response body:\n' + data
                        );
                    },
                    error: function (xhr, status, error) {
                        $('#headersOutput').text('Error fetching headers: ' + error);
                    }
                });
            });
        });
    </script>
</body>
</html>
