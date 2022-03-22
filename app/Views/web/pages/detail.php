<?= $this->extend('web/layouts/template'); ?>

<?= $this->section('content'); ?>
<div class="mt-3 mb-3">
    <h1 class="text-center"><?= $title; ?></h1>
</div>

<div class="row mx-auto">
    <div class="row">
        <div class="col-md-3">
            <?= input_text('latNow', '') ?>
        </div>
        <div class="col-md-3">
            <?= input_text('lngNow', '') ?>
        </div>
        <div class="col-md-6">
            <butto class="dariSini btn btn-primary">My Location</button>
        </div>
    </div>
    <div class="col-sm-12 mt-3">
        <div class="card">
            <div id="map"></div>
        </div>
    </div>
</div>

<div class="row mx-auto">
    <div class="col-sm-6 mt-5">
        <div class="card">
            <div class="card-body">
                <?php foreach ($detailfaskes as $row) : ?>
                    <img class="img-fluid" src="<?= base_url('assets/uploads/faskes/' . $row->foto); ?>" width="510px" height="410px">
                <?php endforeach ?>
            </div>
        </div>
    </div>
    <div class="col-sm-6 mt-5">
        <div class="card">
            <table class="table">
                <?php foreach ($detailfaskes as $row) : ?>
                    <tr>
                        <td>Nama Fasilitas</td>
                        <td>:</td>
                        <td><?= $row->nama_faskes; ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td><?= $row->alamat; ?></td>
                    </tr>
                    <tr>
                        <td>Telephone</td>
                        <td>:</td>
                        <td><?= $row->telp; ?></td>
                    </tr>
                    <tr>
                        <td>Layanan</td>
                        <td>:</td>
                        <td><?= $row->layanan; ?></td>
                    </tr>
                <?php endforeach ?>
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
    var peta1 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    });

    // mengambil titik
    getLocation();

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

    function showPosition(position) {
        $("[name=latNow]").val(position.coords.latitude);
        $("[name=lngNow]").val(position.coords.longitude);
    }

    // map default
    let latLng = [-7.427229479486918, 111.02338789673547];
    var map = L.map('map', {
        center: latLng,
        zoom: 15,
        layers: [peta1]
    });


    // marker
    var myIcon = L.Icon.extend({
        options: {
            iconSize: [38, 40],
        }
    });

    <?php foreach ($detailfaskes as $row) : ?>
        var marker = L.marker([<?= $row->latitude; ?>, <?= $row->longitude; ?>], {
            icon: new myIcon({
                iconUrl: '<?= base_url('assets/uploads/marker/' . $row->marker); ?>'
            })
        }).addTo(map).bindPopup("<?= $row->nama_kategori; ?><br><?= $row->nama_faskes; ?><br><br><button class='btn btn-success d-grid mx-auto' onclick='return keSini(<?= $row->latitude; ?>,<?= $row->longitude; ?>)'>Lokasi</button>");
    <?php endforeach ?>

    // rute
    var control = L.Routing.control({
        waypoints: [
            latLng
        ],
        geocoder: L.Control.Geocoder.nominatim(),
        routeWhileDragging: true,
        reverseWaypoints: true,
        showAlternatives: true,
        altLineOptions: {
            styles: [{
                    color: 'black',
                    opacity: 0.15,
                    weight: 9
                },
                {
                    color: 'white',
                    opacity: 0.8,
                    weight: 6
                },
                {
                    color: 'blue',
                    opacity: 0.5,
                    weight: 2
                }
            ]
        },
        createMarker: function(i, waypoint, n) {
            let urlIcon;
            console.log(i + ", " + n);
            var pos = i + 1;
            if (pos == 1) {
                urlIcon = '<?= '/assets/web/icon/icon-user.png' ?>';
            } else if (pos == n) {
                urlIcon = '<?= '/assets/web/icon/icon-dest.gif' ?>';
            }

            const marker = L.marker(waypoint.latLng, {
                draggable: true,
                bounceOnAdd: false,
                bounceOnAddOptions: {
                    duration: 1000,
                    height: 800,
                    function() {
                        (bindPopup(myPopup).openOn(map))
                    }
                },
                icon: L.icon({
                    iconUrl: urlIcon,
                    iconSize: [38, 45]
                })
            });
            return marker;
        }
    })
    control.addTo(map);

    // posisi faskes
    function keSini(latitude, longitude) {
        var latLng = L.latLng(latitude, longitude)
        control.spliceWaypoints(control.getWaypoints().length - 1, 1, latLng);
    }

    // posisi mulai
    $(document).on("click", ".dariSini", function() {
        let latLng = [$("[name=latNow]").val(), $("[name=lngNow]").val()];
        control.spliceWaypoints(0, 1, latLng);
        map.panTo(latLng);
    })
</script>
<?= $this->endSection(); ?>