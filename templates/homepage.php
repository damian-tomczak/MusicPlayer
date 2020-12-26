<?php include "templates/include/header.php" ?>

<div class="container mt-5">
  <div class="row">
        <div class="col">
          <p>Search for songs by artist:</p>
          <div class="search-box">
          <input type="text" autocomplete="off" placeholder="Search songs..." />
          <div class="result"></div>
          </div>
        </div>
        <div class="col">
            <img src="https://muzyka.damian-tomczak.pl/welcome.png" class="rounded img-fluid column-margin" alt="ERROR: IMAGE NOT LOADED" id="coverArt"></img>
            <audio id="my-audio" controls autoplay>
                <source src="" type="audio/mpeg">
            </audio>
        </div>
  </div>

  <?php include "templates/include/drozda.php" ?>

</div>

<?php include "templates/include/footer.php" ?>
