
$("#button").click(function(){
    let entreprise = document.getElementById('siret').value;
    $.ajax({
    url: "model.php",
    type:"GET",
    data: "call=searchEntreprise&argument="+entreprise,
    success: function(response, textStatus, xhr){
      //si la requete a réussi
      if( xhr.status == 200 ){
          //on récupère le résultat au format JSON
        let data = JSON.parse(xhr.responseText);
        // on affiche les données
        $('#denomination').html(data.etablissement.unite_legale.denomination);
        $('#adresse').html(data.etablissement.geo_adresse);
        $('#date').html(data.etablissement.unite_legale.date_dernier_traitement.substr(0,10));

        // on crée la map en fonction des coordonnées de l'entreprise
        var mymap = L.map('mapid').setView([data.etablissement.latitude, data.etablissement.longitude], 13);
        
        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1,
        accessToken: 'pk.eyJ1IjoiYXJtYW5kNDUyNTAiLCJhIjoiY2ttdGU0ZzkzMG1qaDJ2cGM3amRlcGp5aCJ9.yFosZ_mbpSCCqfEmWvnlRQ'
        }).addTo(mymap);




        //si l'entreprise est inactive
        if (data.etablissement.etat_administratif != 'A'){
            //on place un marqueur rouge sur son emplacement
            $('#denomination').addClass("red");
            var myIcon = L.icon({
                iconUrl: 'https://www.pngfind.com/pngs/m/114-1147878_location-poi-pin-marker-position-red-map-google.png',
                iconSize: [38, 38],

            });
    
    
            var marker = L.marker([data.etablissement.latitude, data.etablissement.longitude],  {icon: myIcon}).addTo(mymap);
        }
        else{
            //sinon on place un marqueur bleu
            var marker = L.marker([data.etablissement.latitude, data.etablissement.longitude]).addTo(mymap);
        }
        
      }
    
      
    },
    error: function (xhr, ajaxOptions, thrownError){
      console.log('Error: ' + xhr.status);
      console.log(thrownError);}});
});