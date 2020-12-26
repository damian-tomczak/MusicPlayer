<div class="row mt-5">
    <p><button type="button" onClick="showDevSection()" class="btn btn-warning">DEV SECTION</button></p>
</div>
<div id="devSection" class="row bg-success d-none text-white">
    <ol>
        <li>Checking who performed the song:</li>
        <small class="form-text">SELECT performers.name FROM details INNER JOIN performers on performers.id = details.idAuthor INNER JOIN songs ON songs.id = details.idSong WHERE songs.title LIKE "title";</small>
        <input type="text" id="first"></input><button id="firstbutton" class="btn btn-danger ml-1">Submit</button>
        
        <li>Adding a song:</li>
        <small class="form-text">INSERT INTO songs (id, title, duration, src) VALUES("666", "SZATAN SONG", "666", "https://szatan.devil/songs/belzebub.mp3")</small>
        <input type="text" id="second"></input><button id="secondbutton" class="btn btn-danger ml-1">Submit</button>

        <li>Adding the artist:</li>
        <small class="form-text">INSERT INTO performers (id, name) VALUES("666","DEVIL")</small>
        <input type="text" id="thrid"></input><button id="thridbutton" class="btn btn-danger ml-1">Submit</button>
        
        <li>Adding the artist of the song:</li>
        <small class="form-text">INSERT INTO details (idSong, idAuthor) VALUES(666, 666);</small>
        <input type="text" id="fourth"></input><button id="fourthbutton" class="btn btn-danger ml-1">Submit</button>
        
        <li>Search for songs by artist:</li>
        <small class="form-text">SELECT performers.name, songs.src, songs.title FROM details INNER JOIN performers on performers.id = details.idAuthor INNER JOIN songs ON songs.id = details.idSong where performers.name LIKE "author";</small>
    </ol>
</div>
