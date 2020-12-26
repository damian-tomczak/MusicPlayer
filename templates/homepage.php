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
            <img src="http://placekitten.com/300/300" class="img-rounded img-responsive column-margin" alt="ERROR: IMAGE NOT LOADED"></img>
            <audio id="my-audio" controls autoplay>
                <source src="" type="audio/mpeg">
            </audio>
        </div>
  </div>

  <?php include "templates/include/drozda.php" ?>

</div>

<?php include "templates/include/footer.php" ?>
