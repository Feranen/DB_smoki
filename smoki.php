<!doctype html>
<html lang="pl">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Smoki</title>
  <link rel="stylesheet" href="styl.css" />
</head>

<body>
  <header>
    <h2>Poznaj smoki!</h2>
  </header>
  <nav>
    <div id="baza1">
      Baza
    </div>
    <div id="opisy1">
      Opisy
    </div>
    <div id="galeria1">
      Galeria
    </div>
  </nav>
  <main>
    <section id="baza">
      <h3>Baza Smoków</h3>
      <form action="" method="post">
        <select name="pochodzenie" id="">
          <?php
          $conn = mysqli_connect("localhost", "root", "", "smoki");
          $query = "SELECT DISTINCT `pochodzenie` FROM `smok` ORDER BY pochodzenie ASC;";
          $result = mysqli_query($conn, $query);
          while ($fetched = mysqli_fetch_array($result)) {
            echo "<option value='{$fetched["pochodzenie"]}'>{$fetched["pochodzenie"]}</option>";
          }
          mysqli_close($conn);
          ?>

        </select>
        <button type="submit">Szukaj</button>
      </form>
      <table>
        <tr>
          <th>Nazwa</th>
          <th>Długość</th>
          <th>Szerokosc</th>
          <?php
          if (isset($_POST["pochodzenie"])) {


            $conn = mysqli_connect("localhost", "root", "", "smoki");
            $query = "SELECT `nazwa`, `dlugosc`, `szerokosc` FROM `smok` WHERE smok.pochodzenie LIKE '{$_POST["pochodzenie"]}';";
            $result = mysqli_query($conn, $query);
            while ($fetched = mysqli_fetch_array($result)) {
              echo "<tr>
              <td>{$fetched["nazwa"]}</td>
              <td>{$fetched["dlugosc"]}</td>
              <td>{$fetched["szerokosc"]}</td>
            </tr>";
            }
            mysqli_close($conn);
          }
          ?>
        </tr>
      </table>
    </section>
    <section id="opisy">
      <h3>Opisy smoków</h3>
      <dl>
        <dt>Smok czerwony</dt>
        <dd>
          Pochodzi z Chin. Ma 1000 lat. Żywi się mniejszymi zwierzętami.
          Posiada łuski cenne na rynkach wschodnich do wyrabiania lekarstw.
          Jest dziki i groźny.
        </dd>
        <dt>Smok zielony</dt>
        <dd>
          Pochodzi z Bułgarii. Ma 10000 lat. Żywi się mniejszymi zwierzętami,
          ale tylko w kolorze zielonym. Jest kosmaty. Z sierści zgubionej
          przez niego, tka się najdroższe materiały.
        </dd>
        <dt>Smok niebieski</dt>
        <dd>
          Pochodzi z Francji. Ma 100 lat. Żywi się owocami morza. Jest
          natchnieniem dla najlepszych malarzy. Często im pozuje. Smok ten
          jest przyjacielem ludzi i czasami im pomaga. Jest jednak próżny i
          nie lubi się przepracowywać.
        </dd>
      </dl>
    </section>
    <section id="galeria">
      <h3>Galeria</h3>
      <article> <img src="smok1.JPG" alt="Smok czerwony" />
        <img src="smok2.JPG" alt="Smok wielki" />
        <img src="smok3.JPG" alt="Skrzydlaty łaciaty" />
      </article>

    </section>
  </main>
  <footer>
    <p>Stronę opracował: </p>
  </footer>
  <script>
    blok1 = document.getElementById('baza1');
    blok2 = document.getElementById('opisy1');
    blok3 = document.getElementById('galeria1');
    section1 = document.getElementById('baza');
    section2 = document.getElementById('opisy');
    section3 = document.getElementById('galeria');
    blok1.addEventListener('click', () => {
      blok1.style.backgroundColor = 'MistyRose';
      blok2.style.backgroundColor = '#FFAEA5';
      blok3.style.backgroundColor = '#FFAEA5';
      section1.style.display = "flex";
      section2.style.display = "none";
      section3.style.display = "none";
    });
    blok2.addEventListener('click', () => {
      blok1.style.backgroundColor = '#FFAEA5';
      blok2.style.backgroundColor = 'MistyRose';
      blok3.style.backgroundColor = '#FFAEA5';
      section1.style.display = "none";
      section2.style.display = "flex";
      section3.style.display = "none";
    });
    blok3.addEventListener('click', () => {
      blok1.style.backgroundColor = '#FFAEA5';
      blok2.style.backgroundColor = '#FFAEA5';
      blok3.style.backgroundColor = 'MistyRose';
      section1.style.display = "none";
      section2.style.display = "none";
      section3.style.display = "flex";
    });
  </script>
</body>

</html>