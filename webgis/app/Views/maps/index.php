<?= $this->extend('layout') ?>

<?= $this->section('head') ?>
<script src="<?= base_url('leaflet/leaflet.js') ?>"></script>
<link rel="stylesheet" href="<?= base_url('leaflet/leaflet.css') ?>" />
<style>
    #maps {
        height: 500px;
    }

    .info {
        padding: 6px 8px;
        font: 14px/16px Arial, Helvetica, sans-serif;
        background: white;
        background: rgba(255, 255, 255, 0.8);
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        border-radius: 5px;
    }

    .info h4 {
        margin: 0 0 5px;
        color: #777;
    }

    .legend {
            line-height: 68px;
            color: #555;
            word-wrap: break-word;
    }
    
    .legend i {
        width: 18px;
        height: 18px;
        float: left;
        margin-right: 8px;
        opacity: 0.7;
    }
    
    .legend .circlepadding {
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.8);
    }  
</style>
<?= $this->endSection() ?>

<?= $this->section('sidebar') ?>
<div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active">
            <a class="nav-link " href="<?= site_url('maps/index') ?>">
              <i class="material-icons">dashboard</i>
              <p>Maps</p>
            </a>
          </li>
          <!-- your sidebar here -->
          <li class="nav-item">
            <a class="nav-link" href="<?= site_url('KodeWilayah/index') ?>">
              <i class="material-icons">bubble_chart</i>
              <p>Kode Wilayah</p>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?= site_url('Data/index') ?>">
              <i class="material-icons">bar_chart</i>
              <p>Data</p>
            </a>
          </li>
        </ul>
      </div>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h1>Peta Bandar Lampung</h1>
<div id="maps"></div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    var data = <?= json_encode($data) ?>;
    var nilaiMax = <?= $nilaiMax ?>;

    var map = L.map('maps').setView({
        lat: -5.420000,
        lon: 105.266670
    }, 12);

    function getColor(d) {
        return  d == 1 ? '#FB9300' :
                d == 2 ? '#BD0026' :
                d == 3 ? '#E31A1C' :
                d == 4 ? '#FC4E2A' :
                d == 5 ? '#FFAAA7' :
                d == 6 ? '#FEB24C' :
                d == 7 ? '#FED976':
                d == 8 ? '#A93199' :
                d == 9 ? '#C03546' :            
                d == 10 ? '#D5441C' :            
                d == 11 ? '#FF5C5C' :            
                d == 12 ? '#CF0000' :            
                d == 13 ? '#FFC300' :            
                d == 14 ? '#E01171' :            
                d == 15 ? '#303481' :            
                d == 16 ? '#5BAAEC' :            
                d == 17 ? '#A3A847' :            
                d == 18 ? '#04009A' :            
                d == 19 ? '#0C2233' :            
            '#FEDDA0';
    }



    function style(feature) {
        return {
            weight: 2,
            opacity: 1,
            color: getColor(parseInt(feature.properties.kode)),
            dashArray: '',
            fillOpacity: 0.7,
        };
    }

    function getRadius(y) {
        r = Math.sqrt(y / Math.PI);
        if (r >= 70 && r <= 120) {
            return r * 0;
        } else if (r >= 121 && r <= 170) {
            return r * 0;
        } else {
            return r * 1;
        }
    }

    function setRadius(y) {
        r = y;
        if (r <= 6) {
            return 5;
        } else if (r <= 8) {
            return 12;
        } else {
            return 30;
        }
    }
    // function setRadius(x){
    //     let i = 0;
    //     
    //     let nilai = 0;
    //     while (i<20) {
    //         if(x == ''){
    //            
    //             break;
    //         }else{
    //             i++;
                
    //             continue;
    //         }
    //     }
    //     if(nilai <= 6){
    //         return 300;
    //     }else if(nilai <= 8){
    //         return 400;
    //     }else {
    //         return 500;
    //     }
    // }
    function getWarna1(f) {
		return '#ff4c00';
    }
    function newstyle(feature){
        return{
            weight : 1,
            opacity : 1,
            fillOpacity : 0.7,
            dashArray: '',
            fillColor : getWarna1(parseInt(feature.properties.nilai)),
            radius: setRadius(feature.properties.nilai),
        };
    }
 


    function onEachFeature(feature, layer) {
        layer.bindPopup("<h4>Jumlah Kelurahan di Kecamatan</h4><br>" + feature.properties.kecamatan + " : " + feature.properties.nilai + " kelurahan");
        layer.on({
            mouseover: highlightFeature,
            mouseout: resetHighlight,
        });
    }
    


    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="https://openstreetmap.org/copyright">OpenStreetMap contributors</a>'
    }).addTo(map);

    var geojson = L.geoJson(data, {
        style: style,
        pointToLayer: function (feature, latlng) {
            return L.circleMarker(latlng, newstyle(feature));
        },
        onEachFeature: onEachFeature
    }).addTo(map);

    function highlightFeature(e) {
        var layer = e.target;

        layer.setStyle({
            weight: 2,
            color: '#2842eb',
            dashArray: '',
        });

        // if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
        //     layer.bringToFront();
        // }

        info.update(layer.feature.properties);
    }

    function resetHighlight(e) {
        geojson.resetStyle(e.target);
        info.update();
    }

    var info = L.control();

    info.onAdd = function(map) {
        this._div = L.DomUtil.create('div', 'info'); // create a div with a class "info"
        this.update();
        return this._div;
    };

    // method that we will use to update the control based on feature properties passed
    info.update = function(props) {
        this._div.innerHTML = '<h4><?= $masterData->nama ?></h4>' + (props ?
            '<b>' + props.kecamatan + '</b><br>' + (props.popupContent ? props.nilai + ' kelurahan <br>' : 'Hover di atas circle') :
            'Hover di atas wilayah');
    };
    info.addTo(map);

    var sizelegend = L.control({
        position: 'bottomright'
    });

    sizelegend.onAdd = function (map) {
        //set up legend grades and labels
        var div = L.DomUtil.create('div', 'info legend'),
            //grades = [5, Math.floor(nilaiMax/4)*1, Math.floor(nilaiMax/4)*2, Math.floor(nilaiMax/4)*3, Math.floor(nilaiMax/4)*4],
            grades = [50, 200, 1000],
            labels = ['<p style="text-align:center;margin-bottom:-85px;margin-top:-20px;"><strong>Size</strong></p>'],
            from, to,
            size = ['5 - 6','7 - 8',' 9 '] 
        //iterate through grades and create a scaled circle and label for each
        for (var i = 0; i < grades.length; i++) {
            from = grades[i];
            to = grades[i + 1];
            labels.push(
                '<i class="circlepadding" style=";width: '+Math.max(0,(19-1.8*getRadius(from)))+
                'px;"></i> <i style="background: #ff4c00;width: '+getRadius(from)*2+'px; height: '+
                getRadius(from)*2+'px; border-radius: 50%; margin-top:18px; '+
                Math.max(0,(getRadius(from)))+'px;"></i> ' + size[i]);
        }
        div.innerHTML = labels.join('<br>');
        return div;
    };
    sizelegend.addTo(map);

</script>
<?= $this->endSection() ?>