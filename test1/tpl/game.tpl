<!DOCTYPE html>
<html>
<head>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 30px;
        }

        div.result {
            text-align: center;
            margin-left: auto;
            margin-right: auto;
        }

        h2 {
            text-align: center;
        }

        th, td {
            padding: 5px;
            text-align: center;
            width: 5em;
            height: 5em;
        }

        td.s {
            background-image: url(/images/start.png);
            background-size: cover;
        }

        td.win {
            background-image: url(/images/finish.png);
            background-size: cover;
        }

        td.fail {
            background-image: url(/images/wrong2.png);
            background-size: cover;
        }
    </style>
</head>
<body>

<h2>Лабиринт</h2>

<table class="game">
    {field}
</table>
<div class="result">
    <table>
        {path}
    </table>
</div>

<script src="js/jquery-latest.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>