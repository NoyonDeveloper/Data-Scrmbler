<?php
include_once "functions-datascrmbler.php";

$task = "encode";
if (isset($_GET['task']) && $_GET['task'] != '') {
	$task = $_GET['task'];
	//Check Task
//	$task = $_GET['task'] ?? 'encode';
}

$key = "abcdefghijklmnopqrstuvwxyz1234567890";
if ("key" == $task) {
	$key_orgnial = str_split($key);
	shuffle($key_orgnial);
	$key = join('', $key_orgnial);
} elseif (isset($_POST['key']) && $_POST['key'] != '') { //Genrage Key Reatne
	$key = $_POST['key'];
}

$scrmblerData = '';
if ("encode" == $task) {
	$data = $_POST['data'] ?? '';
	if ($data != '') {
		$scrmblerData = scrmblerData($data, $key);
	}
}

//Decode
if ("decode" == $task) {
	$data = $_POST['data'] ?? '';
	if ($data != '') {
		$scrmblerData = decodeData($data, $key);
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DATA SCRMBLER</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.css">
    <style>
        body {
            margin-top: 30px;
        }

        #data {
            width: 100%;
            height: 160px;
        }

        #result {
            width: 100%;
            height: 160px;
        }

        .hidden {
            display: none;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="column column-60 column-offset-20">
            <h2>Data Scrambler</h2>
            <p>Use This Applaction to Scrambler Your Data.</p>
            <p>
                <a href="/datascrmbler/index.php?task=encode">Encode</a> |
                <a href="/datascrmbler/index.php?task=decode">Decode</a> |
                <a href="/datascrmbler/index.php?task=key">Generate Key</a>
            </p>
        </div>
    </div>
    <div class="row">
        <div class="column column-60 column-offset-20">
            <form method="POST" action="index.php<?php if ('decode' == $task) {
				echo "?task=decode";
			} ?>">
                <label for="key">Key</label>
                <input type="text" id="key" name="key" <?php displayKey($key); ?>>
                <label for="data">Data</label>
                <textarea name="data" id="data"><?php if (isset($_POST['data'])) { echo $_POST['data']; } ?></textarea>
                <label for="result">Result</label>
                <textarea name="result" id="result"><?php echo $scrmblerData; ?></textarea>
                <button type="submit">Do It for Me</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
