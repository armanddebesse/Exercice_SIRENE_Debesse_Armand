<!doctype html> 
<html lang="fr"> 
   <head> 
      <meta charset="utf-8">
      <meta name="theme-color" content="red"> 
      <title>exercice</title>
      <link rel="stylesheet" type="text/css" href="style.css" media="all" />
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
   integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
   crossorigin=""/>

   </head> 

   <body> 
    <header>

    </header>
    <main>
        <!-- saisie -->
        <div>
            <label for="siret">Saisir SIRET</label>
            <input type="text" id="siret" name="siret" maxlength="14" minlength="14" pattern="[0-9]" placeholder="Saisir 14 Chiffres">
            <input type="submit" id="button" value="Go">
        </div>

        <!-- retour -->
        <div>
        <h2 id="denomination"></h2>
        </div>

        <div>

        <p id="adresse"></p>
        </div>

        <div>

        <p id="date"></p>
        </div>

        <div id="mapid"></div>

    </main>
    <footer>

    </footer>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
   integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
   crossorigin=""></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="script.js"></script>

   </body> 
</html> 
