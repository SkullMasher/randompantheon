<?php 

require_once 'settings.php'; // Contains the artist list

$random_band = array_rand($band_list);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Square Circle random pantheon</title>
  <meta name="description" content="Bandcamp pantheon of all the best prog artist cassified by Square Circle.">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="wrapper">
  <header>
    <h1 class="main-title">Square Circle Random Pantheon</h1>
    <h2>Bandcamp pantheon of all the best prog artist cassified by Square Circle.</h2>
  </header>
  <main>
    <h3>Here's your random band to listen to :</h3>
    <a href="<?php echo $band_list[$random_band] ?>" class="btn"><?php echo $random_band ?></a>
    <h4>Unfiltered list of all the artist</h4>
    <div class="artist-list">
    <?php foreach ($band_list as $artist_name => $artist_value): ?>
      <a href="<?php echo $artist_value ?>" class="btn"><?php echo $artist_name ?></a>
    <?php endforeach; ?>
    </div>
  </main>
  <footer>
    <hr>
    <p>Initiative made by a great group of friends who listen to some weird ass shit.</p>
    <p><small><em>* Band order may have been altered in some logical way</em></small></p>
    <p><small><em>* May or may not contain actual prog or djent</em></small></p>
  </footer>
</div>
</body>
</html>
