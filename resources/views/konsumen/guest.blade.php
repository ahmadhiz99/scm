
@extends ('layouts.guest')

@section('content')
<section class="section p-5">
          <div class="section-header">
        

    

          <div class="section-body">
            <h2 class="section-title"></h2>
            <div class="card">
              <!-- <div class="card-header">
                <h4>Catalog Umum</h4>
              </div> -->
              <div class="card-body">

              <form class="form" method="post" action="{{ route('searchGuest') }}">
                  @csrf
                  <div class="form-group w-100 mb-3">
                      <label for="search" class="d-block mr-2">Pencarian</label>
                      <input type="text" name="search" class="form-control w-75 d-inline" id="search" placeholder="">
                      <button type="submit" class="btn btn-primary mb-1">Cari</button>
                  </div>
              </form>

              <h3>Catalog</h3>
                
                <div class="flex-wrap d-flex ">
                  @foreach($dataContent as $data)
                  <div class="row p-1">
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
                      <!-- <a href="detail/{{$data->id}}" style="cursor:pointer;text-decoration:none; " class="m-0"  > 
                        -->
                      <a href="/login" style="cursor:pointer;text-decoration:none; " class="m-0"  >                    
                      <div class="col-12">
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
                                class="card-img-top" alt="Laptop" widht="200" height="200" />
                                
                              <div class="card-body">

                                <div class="d-flex justify-content-between">
                                  <p class="small">Tags: <a href="/login" class="text-muted">{{$data->catalog_category_name}}</a></p>
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
                                  <a href="/login" class="ms-auto text-primary text-bold" style="cursor:pointer;text-decoration:italic">
                                    <span class="font-weight-bold">{{$data->name}}</span>
                                  </a>
                                </div>

                              </div>
                            </div>   
                          </div>
                        </a>
                      </div>
                      @endforeach
                  </div>
               </div>
            </div>
          </div>
        </section>

@endsection
