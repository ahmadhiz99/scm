
@extends ('layouts.main')

@section('content')

<section class="section">
          <div class="section-header">
            <h1>Dashboard Seller</h1>
          </div>
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Menu</h4>
                  </div>
                  <div class="card-body">
                    Produksi
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Menu</h4>
                  </div>
                  <div class="card-body">
                    Katalog
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

@endsection
