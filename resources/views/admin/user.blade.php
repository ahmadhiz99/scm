@extends ('layouts.main')
@section('content')

<section class="section">
          <div class="section-header">
            <h1>User - Admin</h1>
          </div>
        
          <div class="row">
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Data Product</h4>
                  <div class="card-header-action">
                    <!-- <div class="btn-group">
                      <a href="#" class="btn btn-primary">Prev</a>
                      <a href="#" class="btn">Next</a>
                    </div> -->
                  </div>
                </div>
                <div class="card-body">

                <!-- Table Data -->
                @include('component/table/table')
                
                <!-- Modal From Table Data -->
                @include('component/modal/modal')

                </div>
              </div>
            </div>
          </div>
         
        </section>

@endsection
