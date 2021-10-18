@extends('master.index')
@section('content')
    <section class="section">
        <div class="row ">
            <div class="col-xl-5 col-lg-5 col-md-6 col-sm-6 col-xs-12">
                <div class="card">
                <div class="card-statistic-4">
                    <div class="align-items-center justify-content-between">
                    <div class="row ">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                            <h5 class="font-15">Total Surat Izin</h5>
                            <br>
                            <p class="mb-0" style="font-size: 15pt"><span class="col-green">{{$izin}}</span> Surat</p>
                        </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                            <img src="assets/img/banner/1.png" alt="">
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-xl-5 col-lg-5 col-md-6 col-sm-6 col-xs-12">
                <div class="card">
                <div class="card-statistic-4">
                    <div class="align-items-center justify-content-between">
                    <div class="row ">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                            <h5 class="font-15"> Total Surat Lamaran </h5>
                            <br>
                            <p class="mb-0" style="font-size: 15pt"><span class="col-orange">{{$lamar}}</span> surat</p>
                        </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                            <img src="assets/img/banner/2.png" alt="">
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>
@endsection
