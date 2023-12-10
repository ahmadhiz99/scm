
@extends ('layouts.main')

@section('content')
<section class="section">
          <div class="section-header">
            <h1>Marketplace</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Layout</a></div>
              <div class="breadcrumb-item">Top Navigation</div>
            </div>
          </div>

  <!-- profile -->
  <div class="row">
            <div class="col-lg-12 col-md-6 col-sm-6 col-3">
              <div class="card card-statistic-1">
              
                <div class="card-wrap">
                  <div class="card-header">
                    <h4></h4>
                  </div>

                  <div class="card-body">
                    <div class="d-flex justify-content-center">
                      <img class="mr-3 rounded-circle" width="80" src="../stisla/assets/img/avatar/avatar-1.png" alt="avatar">
                    </div>
                  <ul class="list-unstyled list-unstyled-border">
                    <li class="media d-flex justify-content-center">
                      <div class="media-body">
                        <div class="media-title">

                          <form action="/konsumen/edit-profile" method="POST">
                            @csrf
                            <div class="form-group">
                              <label for="exampleInputName1">Name</label>
                              <input disabled name="name" type="text" class="form-control" id="exampleInputName1" aria-describedby="NameHelp" value="{{$user->name}}" placeholder="Enter Name">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPhone1">Phone</label>
                              <input disabled name="phone" type="text" class="form-control" id="exampleInputPhone1" aria-describedby="PhoneHelp" value="{{$user->phone}}" placeholder="Enter Phone">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Email</label>
                              <input disabled name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="EmailHelp" value="{{$user->email}}" placeholder="Enter Email">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputAddress1">Alamat</label>
                              <input disabled name="address" type="text" class="form-control" id="exampleInputAddress1" aria-describedby="AddressHelp" value="{{$user->address}}" placeholder="Enter Address">
                            </div>
                            <!-- <div class="form-group">
                              <label for="exampleInputPassword1">Password</label>
                              <input disabled name="password" type="password" class="form-control" id="exampleInputPassword1" value="{{$user->password}}" placeholder="Password">
                            </div> -->
                            <div class="form-group">
                              <label for="exampleInputRekening1">Rekening</label>
                              <input disabled name="rekening" type="text" class="form-control" id="exampleInputRekening1" aria-describedby="RekeningHelp" value="{{$user->rekening}}" placeholder="Enter Rekening">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputBank1">Bank</label>
                              <input disabled name="bank" type="text" class="form-control" id="exampleInputBank1" aria-describedby="BankHelp" value="{{$user->bank}}" placeholder="Enter Bank">
                            </div>
                            <!-- <button type="submit" class="btn btn-primary">Simpan</button> -->
                          </form>

                        </div>
                        <!-- <span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</span> -->
                      </div>
                    </li>
                    
                  </ul>
                  
                  </div>
                </div>
              </div>
            </div>
          </div>
  <!-- profile -->

          <div class="section-body">
            <h2 class="section-title">Catalog {{$user->name}}</h2>
            <div class="card">
              <!-- <div class="card-header">
                <h4>Catalog Umum</h4>
              </div> -->
              <div class="card-body ">
                  <div class="d-flex flex-wrap">

                  <div class="row">
                    @foreach($dataContent as $data)
                      <!-- <a href="detail/{{$data->id}}" style="cursor:pointer; text-decoration:none;  box-shadow: 1px 1px 1px 1px;" class="m-2"  >                    
                        <div class="card m-2" style="width: 12rem;">
                          <img class="card-img-top" src="https://dummyimage.com/600x400/cfcfcf/ffffff" alt="Card image cap">
                          <div class="card-body">
                            <p class="card-text">
                                <b>{{$data->product_name}}</b><br/>
                                    {{$data->description}}
                            </p>
                          </div>
                        </div>
                      </a> -->
                      <a href="detail/{{$data->id}}" style="cursor:pointer;text-decoration:none; " class="m-0"  >                    
                      <div class="col-3">
                            <div class="card">
                              <div class="d-flex justify-content-between p-3">
                                <p class="lead mb-0">{{$data->product_name}}</p>
                                <div
                                  class="bg-info rounded-circle d-flex align-items-center justify-content-center shadow-1-strong"
                                  style="width: 35px; height: 35px;">
                                  <p class="text-white mb-0 small">{{$data->stock}}</p>
                                </div>
                              </div>
                              <img 
                                src="{{ asset('images/'.$data->image) }}"
                                class="card-img-top" alt="Laptop" />
                                
                              <div class="card-body">

                                <div class="d-flex justify-content-between">
                                  <p class="small">Tags: <a href="searchCatalog/{{$data->catalog_category_name}}" class="text-muted">{{$data->catalog_category_name}}</a></p>
                                  <!-- <p class="small text-danger"><s>$1099</s></p> -->
                                </div>

                                <div class="d-flex justify-content-between mb-2">
                                  <!-- <h5 class="mb-0">{{$data->product_name}}</h5> -->
                                  <h5 class="text-dark mb-0">Rp. {{$data->unit_price}}</h5>
                                </div>

                                <hr class="my-0" />

                                <div class="d-flex justify-content-between mb-0">
                                  <p class="font-weight-bold text-muted mb-0">Available : </p>
                                  <div class="ms-auto text-warning">
                                    <p class="fw-bold mb-0">{{$data->stock}}</p>
                                  </div>
                                </div>

                                <hr class="my-0" />

                                <div class="d-flex justify-content-between mb-0">
                                  <p class="font-weight-bold text-muted mb-0">Rating : </p>
                                  <div class="ms-auto text-warning">
                                  <p class="fw-bold mb-0">4.5 <i class="fa fa-star"></i></p>
                                  </div>
                                </div>

                                <hr class="my-0" />

                                <div class="d-flex justify-content-between mb-0">
                                  <p class="font-weight-bold text-muted mb-0 ">Store: <span class="fw-bold"></span></p>
                                </div>

                                <div class="d-flex justify-content-between mb-0">
                                  <a href="store/{{$data->user_id}}" class="ms-auto text-primary text-bold" style="cursor:pointer;text-decoration:italic">
                                    <span class="font-weight-bold">{{$data->name}}</span>
                                  </a>
                                </div>

                              </div>
                            </div>   
                          </div>
                        </a>
                      @endforeach
                    </div>
                  </div>
               </div>
            </div>
          </div>
        </section>

@endsection
