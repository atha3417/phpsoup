<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Welcome to PHPSOUP</title>

    <style type="text/css">
        ::selection {
            background-color: blue;
            color: white;
        }

        ::-moz-selection {
            background-color: blue;
            color: white;
        }

        body {
            background-color: #fff;
            margin: 40px;
            font: 13px/20px normal Helvetica, Arial, sans-serif;
            color: #4F5155;
        }

        a {
            color: #003399;
            background-color: transparent;
            font-weight: normal;
        }

        h1 {
            color: #444;
            background-color: transparent;
            border-bottom: 1px solid #D0D0D0;
            font-size: 19px;
            font-weight: normal;
            margin: 0 0 14px 0;
            padding: 14px 15px 10px 15px;
        }

        code {
            font-family: Consolas, Monaco, Courier New, Courier, monospace;
            font-size: 12px;
            background-color: #f9f9f9;
            border: 1px solid #D0D0D0;
            color: #002166;
            display: block;
            margin: 14px 0 14px 0;
            padding: 12px 10px 12px 10px;
        }

        #body {
            margin: 0 15px 0 15px;
        }

        #container {
            margin: 10px;
            border: 1px solid #D0D0D0;
            box-shadow: 0 0 8px #D0D0D0;
        }

        .error {
            margin: 10px;
            font-weight: 600;
            font-size: medium;
        }

        .error span {
            color: black;
            background-color: yellow;
            border-radius: 50%;
        }
    </style>
</head>

<body>

    <div id="container">
        <h1>Welcome to PHPSOUP!</h1>

        <div id="body">
            <p>The page you are looking at is being generated dynamically by PHPSOUP.</p>

            <p>If you would like to edit this page you'll find it located at:</p>
            <code>app/Views/default_view.php</code>

            <p>The corresponding controller for this page is found at:</p>
            <code>app/Controllers/DefaultController.php</code>

            <p>If you are exploring PHPSOUP for the very first time, you should start by reading the <a href="https://www.phpsoup.net" target="_blank">User Guide</a>.</p>
        </div>
    </div>

</body>

</html>

<?php die(); ?>
<div class="error">
    Something is wrong with the SOUP installation <span>☹</span>
</div>