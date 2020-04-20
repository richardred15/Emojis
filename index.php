<?php

$pngs = [];

foreach(scandir("./Emojis") as $file){
    if($file != "." && $file != ".."){
        $parts = explode(".", $file);
        if($parts[1] == "png"){
            $pngs[] = $parts[0];
        }
    }
}

$out = "";

foreach($pngs as $png){
    $out .= "<div class='box'><a target='_blank' href='Emojis/$png.png'><img src='Emojis/$png.png'/></a><div class='name'>$png</div></div>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emojis</title>
    <meta property="og:title" content="Emojis" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://richard.works/projects/Emojis" />
    <meta property="og:image" content="https://richard.works/projects/Emojis/Media/03072020.png" />

    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div class="title">
        <h2>Richard's Emojis</h2>
        <h4>Download Here: <a href="zip.php">Zip Archive</a></h4>
    </div>
    <?php echo $out; ?>
    <script src="script.js"></script>
</body>
</html>