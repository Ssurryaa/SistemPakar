<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Hasil Diagnosa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <h2 class="mb-2 mt-5" align="center"><b>Hasil Diagnosa Penyakit Mata</b></h2>
            <div class="col-md-12 col-lg-9 col-xl-9">
                <hr class="mb-2">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group col-md-12 mt-3">
                            <h6><strong>Data Diagnosa :</strong></h6>
                        </div>
                        <div class="col-md-12 ml-2">
                            <table class="table" rules="none">
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td class="col-md-10">{{ $diagnosa->pasien->nama }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td class="col-md-10">{{ $diagnosa->pasien->lokasi }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal</td>
                                    <td>:</td>
                                    <td class="col-md-10">{{ $diagnosa->created_at->format('F j, Y, g:i a') }}</td>
                                </tr>
                            </table>
                        </div>
                        <hr>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group col-md-12">
                            <h6><strong>Gejala-gejala yang dirasakan :</strong></h6>
                        </div>
                    </div>
                    <div class="col-md-12 ml-2">
                        <ol>
                        @foreach ($gejalaPasien as $gejala)
                            <li> {{ $gejala->gejala->name }}</li>
                        @endforeach
                        </ol>
                    </div>
                    <div class="col-md-12">
                        <hr>    
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group col-md-12">
                            <h6><strong>Hasil Diagnosa :</strong></h6>
                        </div>
                        <div class="col-md-12 ml-2">
                            <p><strong>Anda kemungkinan besar terkena penyakit {{ $diagnosa->penyakit->name }}.</strong></p>
                            <table class="table" rules="none">
                                <!--<tr>
                                    <td>Persentase</td>
                                    <td>:</td>
                                    <td class="col-md-10">{{ $diagnosa->persen }}%</td>
                                </tr>-->
                                <tr>
                                    <td>Definisi</td>
                                    <td>:</td>
                                    <td class="col-md-10">{!! $diagnosa->penyakit->definisi !!}</td>
                                </tr>
                                <tr>
                                    <td>Penyebab</td>
                                    <td>:</td>
                                    <td class="col-md-10">{!! $diagnosa->penyakit->penyebab !!}</td>
                                </tr>
                                <tr>
                                    <td>Solusi</td>
                                    <td>:</td>
                                    <td class="col-md-10">{!! $diagnosa->penyakit->solusi !!}</td>
                                </tr>
                            </table>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        window.print();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>