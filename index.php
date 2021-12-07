<!DOCTYPE html>
<html lang="en">

<head>
    <link href="logo_circle.png" rel="icon" type="image">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Saira+Condensed:wght@100;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhaijaan+2:wght@700&display=swap" rel="stylesheet">


    <title>Projek UAS PW2 Lab5</title>

    <!-- CSS -->
    <link rel="stylesheet" href="maincss.css">

    <style>

    </style>

</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">
            <h4>X-X</h4>
        </div>
        <ul>
            <li><a href="#home">Laman Utama</a></li>
            <li><a href="#tujuan">Tujuan Proyek</a></li>
            <li><a href="#isi">Isi Proyek</a></li>
        </ul>
    </div>

    <!-- Konten -->
    <section id="home" class="home">
    </section>

    <section id="tujuan" class="tujuan">

        <h1 style="padding: 20px;">Tujuan Proyek</h1>
        <h3 style="padding: 20px;">Tujuan kami membuat website ini adalah untuk menyelesaikan Ujian Akhir Semester pada lab PW2.
            <p>Pada website ini kami membuat list 5 Marketplaces dengan pengunjung terbanyak di Indonesia
            </p>
        </h3>

        <h4 class="anggota">Anggota Kelompok</h4>
        <div class="nama-nim">
            <h5>Ahmad Alwan Lubis<p>201401105</p>
            </h5>
            <h5>Lumongga Nicola Lumban Tobing<p>201401100</p>
            </h5>
        </div>
    </section>

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#d6d6d6" fill-opacity="1" d="M0,128L80,160C160,192,320,256,480,266.7C640,277,800,235,960,218.7C1120,203,1280,213,1360,218.7L1440,224L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z"></path>
    </svg>

    <section class="isi" id="isi">
        <h1>TOP 5 Marketplaces Indonesia 2021</h1>



        <?php
        require_once("sparqllib.php");
        $db = sparql_connect("http://localhost:3030/uaspw2/sparql");
        if (!$db) {
            print sparql_errno() . " : " . sparql_error() . "\n";
            exit;
        }

        $sparql =

            "
            PREFIX db: <http://dbpedia.org/>
            prefix dbo: <http://dbpedia.org/ontology/>
            prefix dbp: <http://dbpedia.org/property/>
                                                    
            SELECT ?name ?abstract ?website
            WHERE{
            ?subject dbp:name ?name.
            ?subject dbp:abstract ?abstract.
            ?subject dbp:website ?website.
            }ORDERBY ?name
				";

        $result = sparql_query($sparql);
        $fields = sparql_field_array($result);

        while ($row = sparql_fetch_array($result)) {
            print "<div class='marketp'>";
            print "<h4 style='padding: 20px'>$row[name]</h4>";
            print "<p style='padding: 20px'>$row[abstract]</p>";
            print "<a href='$row[website]' style='padding: 10px; font-size: 12px'>Link Website</a>";
            print "</div>";
        }
        ?>
    </section>
</body>