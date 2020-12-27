<div class="row mt-5">
    <p><button type="button" onClick="showDevSection()" class="btn btn-warning">DEV SECTION</button></p>
</div>
<div id="devSection" class="row bg-success d-none text-white">
    <ol>
        <li>All results from the "songs" table</li>
        <small class="form-text"><a href="https://muzyka.damian-tomczak.pl/functions/selectsongs.php" target="_blank">SELECT * FROM songs;</a></small>

        <li>All results from the "performers" table</li>
        <small class="form-text"><a href="https://muzyka.damian-tomczak.pl/functions/selectperformers.php" target="_blank">SELECT * FROM performers;</a></small>

        <li>All results from the "details" table</li>
        <small class="form-text"><a href="https://muzyka.damian-tomczak.pl/functions/selectdetails.php" target="_blank">SELECT * FROM details;</a></small>

        <li>All results from the "proposed" table</li>
        <small class="form-text"><a href="https://muzyka.damian-tomczak.pl/functions/selectproposed.php" target="_blank">SELECT * FROM proposed;</a></small>

        <li>Checking who performed the song:</li>
        <small class="form-text">SELECT performers.name FROM details INNER JOIN performers on performers.id = details.idAuthor INNER JOIN songs ON songs.id = details.idSong WHERE songs.title LIKE "title";</small>
        <input type="text" id="first"></input><button id="firstbutton" class="btn btn-warning ml-1">Submit</button>
        <div id="firstresult"></div>

        <li>Adding a song:</li>
        <small class="form-text">INSERT INTO songs (id, title, duration, src, img) VALUES("666", "SZATAN SONG", "666", "https://szatan.devil/songs/belzebub.mp3", "https://szatan.devil/songs/belzebub.png");</small>

        <li>Adding the artist:</li>
        <small class="form-text">INSERT INTO performers (id, name) VALUES("666","DEVIL");</small>

        <li>Adding the artist of the song:</li>
        <small class="form-text">INSERT INTO details (idSong, idAuthor, id) VALUES(666, 666, 666);</small>

        <li>Search for songs by artist:</li>
        <small class="form-text">SELECT performers.name, songs.src, songs.title, songs.img FROM details INNER JOIN performers on performers.id = details.idAuthor INNER JOIN songs ON songs.id = details.idSong where performers.name LIKE "author";</small>
        
        <li>Trigger updating the proposed</li>
        <small class="form-text">CREATE DEFINER="********"@"localhost" TRIGGER "updatingProposed1" AFTER INSERT ON "details" FOR EACH ROW BEGIN INSERT INTO proposed(idDetails) VALUES(NEW.id); END</small>
        
        <li>Delete suggestions longer than 24 hours:</li>
        <small class="bg-danger text-white">Doesn't work in the project because the server provider doesn't allow me to access events!</small>
        <small class="form-text">CREATE DEFINER="*******"@"localhost" EVENT "deleteProposed" ON SCHEDULE EVERY 1 HOUR STARTS "2020-12-26 19:11:32" ON COMPLETION PRESERVE ENABLE DO DELETE FROM proposed WHERE created < DATE_SUB(NOW(), INTERVAL 1 DAY);</small>

        <li>Entiti relationship diagram</li>
        <img src="https://muzyka.damian-tomczak.pl/entitidiagram.png" class="rounded img-fluid column-margin" alt="ERROR: IMAGE NOT LOADED" id="coverArt"></img>

        <li>Database schema</li>
        <img src="https://muzyka.damian-tomczak.pl/diagram.png" class="rounded img-fluid column-margin" alt="ERROR: IMAGE NOT LOADED" id="coverArt"></img>
        
        <li>Instructions SQL</li>
        <ul>
            <li>CREATE TABLE `details` (`idSong` int(11) NOT NULL, `idAuthor` int(11) NOT NULL, `id` int(11) NOT NULL AUTO_INCREMENT, PRIMARY KEY (`id`), KEY `idAuthor` (`idAuthor`), KEY `idSong` (`idSong`), CONSTRAINT `details_ibfk_1` FOREIGN KEY (`idSong`) REFERENCES `songs` (`id`), CONSTRAINT `details_ibfk_2` FOREIGN KEY (`idAuthor`) REFERENCES `performers` (`id`)) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;</li>
            <li>CREATE TABLE `performers` ( `id` int(11) NOT NULL AUTO_INCREMENT, `name` varchar(256) NOT NULL, PRIMARY KEY (`id`)) ENGINE=InnoDB AUTO_INCREMENT=668 DEFAULT CHARSET=utf8;</li>
            <li>CREATE TABLE `proposed` ( `id` int(11) NOT NULL AUTO_INCREMENT, `idDetails` int(11) NOT NULL, `created` datetime NOT NULL DEFAULT current_timestamp(), PRIMARY KEY (`id`), KEY `idDetails` (`idDetails`), CONSTRAINT `proposed_ibfk_1` FOREIGN KEY (`idDetails`) REFERENCES `details` (`id`)) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;</li>
            <li>CREATE TABLE `songs` ( `id` int(11) NOT NULL AUTO_INCREMENT, `title` varchar(256) NOT NULL, `duration` int(11) NOT NULL, `src` varchar(256) NOT NULL, `img` varchar(256) NOT NULL, PRIMARY KEY (`id`)) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=utf8;</li>
        </ul>
    </ol>
</div>
