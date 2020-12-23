<?php include "templates/include/header.php" ?>

<script type="text/javascript">
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("Songs.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>

<div class="container mt-5">
  <div class="row">
        <div class="col">
          <p>Search for songs by artist</p>
          <div class="search-box">
          <input type="text" autocomplete="off" placeholder="Search songs..." />
          <div class="result"></div>
          </div>
        </div>
        <div class="col">
            <audio id="myAudio">
                <source src="" type="audio/mpeg">
                Your browser does not support the audio element.
            </audio>

            <button onclick="playAudio()" type="button">Play Audio</button>
            <button onclick="pauseAudio()" type="button">Pause Audio</button> 

            <script>
                
            var x = document.getElementById("myAudio"); 
            var address = "dsds";
            console.log(address);
            function playAudio(address) {
                console.log(address);
                x.play(); 
            } 

            function pauseAudio() { 
            x.pause(); 
            } 
            </script>
        </div>
  </div>
</div>

<?php include "templates/include/footer.php" ?>
