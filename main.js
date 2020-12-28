$(document).on('click', '#firstbutton', function() {
    var inputVal = $("#first").val();
    if($("#first").val()) {
        $.getJSON("functions/first.php", {term: inputVal}).done(function(data){
            if(data[0]=="0") {
                $("#firstresult").html("<span class='text-white bg-danger'>Entry does not exist in the database!</span>");
            } else {
                var suma="";
                for(i=0;i<data.length;i++){
                    suma  +=  "<span class='text-white bg-danger'>"+data[i]+"</span> ";
                }
                $("#firstresult").html(suma);
            }
        });
    } else{
        $("#firstresult").html("<span class='text-white bg-danger'>Input empty!</span>");
    }

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

function changeImage(address) {
    document.getElementById("coverArt").setAttribute('src', address);
}

$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.getJSON("functions/songs.php", {term: inputVal}).done(function(data){
                if(data=="0") {
                    resultDropdown.html("<p>No matches found</p>");
                } else {
                    var suma="";
                    for(i=0;i<data.length;i+=4){
                        suma  +=  '<a href="#" onclick=playAudio("'+data[i]+'");changeImage("'+data[i+3]+'")>'+data[i+2]+' | '+data[i+1]+'</a><br>';
                    }
                    resultDropdown.html(suma);
                }
            });
        } else {
            resultDropdown.empty();
        }
    });
});
