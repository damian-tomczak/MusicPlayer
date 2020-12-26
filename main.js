$("#devSection").on('click', '#firstbutton', function () {
    console.log(1);
});

$("#devSection").on('click', '#secondbutton', function () {
    console.log(2);
});

$("#devSection").on('click', '#thridbutton', function () {
    console.log(3);
});

$("#devSection").on('click', '#fourthbutton', function () {
    console.log(4);
});

function showDevSection() {
    if($("#devSection").hasClass("d-none")) {
        $("#devSection").removeClass('d-none');
        
    }
    else {
        $("#devSection").addClass('d-none');
    }
}

function playAudio(address) {
    document.getElementById("my-audio").setAttribute('src', address);
} 

$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.getJSON("functions/songs.php", {term: inputVal}).done(function(data){
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
