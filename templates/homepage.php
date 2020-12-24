<?php include "templates/include/header.php" ?>

<script type="text/javascript">
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.getJSON("Songs.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                console.log(data);
                var suma="";
                for(i=0;i<data.length;i+=3){
                    suma  +=  '<a onclick=playAudio("'+data[i]+'")>'+data[i+2]+' '+data[i+1]+'</a><br>';
                }
                resultDropdown.html(suma);
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
        <audio id="my-audio" controls>
            <source src="" type="audio/mpeg">
        </audio>

            <script>    
                var x = document.getElementById("myAudio"); 
                function playAudio(address) {
                    console.log(address);
                    document.getElementById("my-audio").setAttribute('src', address);
                } 

                function pauseAudio() { 
                x.pause(); 
                } 
            </script>
        </div>
  </div>
</div>

<?php include "templates/include/footer.php" ?>
