<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Leafletjs -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
    <!-- Leaflet search -->
    <link href="<?= base_url('/assets/js/leaflet-search/dist/leaflet-search.min.css'); ?>" rel="stylesheet">
    <script src="<?= base_url('/assets/js/leaflet-search/dist/leaflet-search.src.js'); ?>"></script>
    <!-- Extent -->
    <link href="<?= base_url('/assets/extent/leaflet.defaultextent.css'); ?>" rel="stylesheet">
    <script src="<?= base_url('/assets/extent/leaflet.defaultextent.js'); ?>"></script>
    <!-- Routing machine -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <!-- Ajax -->
    <script src="<?= base_url('/assets/js/leaflet.ajax.js'); ?>"></script>

    <title><?= $title; ?></title>
</head>
<style>
    #map {
        height: 440px;
    }

    body {
        background-color: whitesmoke;
    }

    .search-tip b {
        display: inline-block;
        clear: left;
        float: right;
        padding: 0 4px;
        margin-left: 4px;
    }

    .Rumah.search-tip b,
    .Rumah.leaflet-marker-icon {
        background: #E74C3C
    }

    .Puskesmas.search-tip b,
    .Puskesmas.leaflet-marker-icon {
        background: #3498DB
    }

    .Klinik.search-tip b,
    .Klinik.leaflet-marker-icon {
        background: #E67E22
    }

    .Dokter.search-tip b,
    .Dokter.leaflet-marker-icon {
        background: #1ABC9C
    }

    .Apotek.search-tip b,
    .Apotek.leaflet-marker-icon {
        background: #9B59B6
    }

    .LAB.search-tip b,
    .LAB.leaflet-marker-icon {
        background: #F1C40F
    }

    .BPJS.search-tip b,
    .BPJS.leaflet-marker-icon {
        background: #2ECC71
    }

    .legend {
        background: white;
        background: rgba(255, 255, 255, 0.8);
        padding: 10px;
    }
</style>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm" style="background: rgb(31,31,122);">
        <div class="container">
            <!-- <img src="<?= base_url('/assets/web/icon/logosrg.png'); ?>" width="50" alt=""> -->
            <a class="navbar-brand" href="#">SIGASTAN SRAGEN</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link <?= ($getsegment1 == '') ? 'active' : ''; ?>" href="/">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link <?= ($getsegment1 == 'kategori') ? 'active' : ''; ?> dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Pilih Kategori
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php foreach ($kategori as $data) : ?>
                                <li><a class="dropdown-item" href="/web/kategori/<?= $data->id_kategori; ?>"><?= $data->nama_kategori; ?></a></li>
                            <?php endforeach ?>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($getsegment1 == 'daftarfaskes') ? 'active' : ''; ?>" href="/web/daftarfaskes">Daftar Faskes</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col">
                <?= $this->renderSection('content'); ?>
            </div>
        </div>
    </div>

    <!-- footer -->
    <footer class="sticky-footer bg-dark mt-4">
        <div class="container my-auto p-3">
            <div class="copyright text-center my-auto">
                <span class="text-white">copyright &copy; SIG Fasilitas Kesehatan Kabupaten Sragen</span>
            </div>
        </div>
    </footer>

    <?= $this->renderSection('scripts'); ?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
</body>

</html>