<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>spotify</title>
</head>
<body>
    
<div id="main">
        <?php
            $url = "https://dd-wtlab2020.netlify.app/pre-final/ezquiz.json";
            $response = file_get_contents($url);
            $result = json_decode($response);
            $tracks = $result -> tracks;
            $items = $tracks -> items;

            echo '<div class="container">';
            echo '<div class="row">';

            foreach ($items as $data) {
                $album = $data -> album;
                $album_type = $album -> album_type;
                $nameArtist = $album->artists[0]->name;
                $release_date = $album->release_date;
                $available_markets = $album->available_markets;
                $pic = $album -> images[0] -> url;
              
                echo '<div class="col-4 py-5">';
                echo '<div class="card py-0 my-0" style="width: 18rem;">';
                echo '<img class="w-100 h-100 card-img-top rounded"  src="'.$pic.'"/>' . "<br>";
                echo '<div class="card-body">';
                echo '<h5 class="card-title font-weight-bold">';
                echo $album->name . '</h5>' . '<hr>';
                echo '<div class="card-text module">';
                echo "Artists: " .$nameArtist . "<br>";
                echo "Release Date: " .$release_date . "<br>";
                echo "Avariable: " .count($available_markets). " countries";
                echo '</div>' . '</div>' . '</div>' . '</div>';         
            }
            echo '</div>' . '</div>';
        ?>
    </div>
</body>
</html>