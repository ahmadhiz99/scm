
@extends ('layouts.main')

@section('content')
<section class="section">
          <div class="section-header">
            <h1>Marketplace</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Order Page</a></div>
              <div class="breadcrumb-item"><a href="#">Layout</a></div>
              <div class="breadcrumb-item">Top Navigation</div>
            </div>
          </div>

        

          <div class="section-body">
            <h2 class="section-title">Order</h2>
            <!-- <p class="section-lead">This page is just an example for you to create your own page.</p> -->
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
                      <a href="detail/{{$data->id}}" style="cursor:pointer;text-decoration:none; " class="m-0" readonly>                    
                      <div class="col-12">
                       
                            <div class="card w-100 ">

                            <div class="row">

                            <div class="col-12">
                              <img  src="{{ asset('images/'.$data->image) }}"
                              class="card-img-top" alt="Laptop" width="10" height="180" />
                            </div>
                                  
                            <div class="col-8">
                              <div class="d-flex justify-content-between p-3">
                                <p class="lead mb-0">{{$data->product_name}}</p>
                                @if ($data->status == 0)
                                <div
                                  class="bg-info d-flex align-items-center justify-content-center shadow-1-strong p-2"
                                  style="">
                                  <p class="text-white mb-0 small">
                                      Barang Sedang Dikemas
                                    </p>
                                  </div>
                                  @endif
                                  @if ($data->status == 1)
                                <div
                                  class="bg-primary d-flex align-items-center justify-content-center shadow-1-strong p-2"
                                  style="">
                                  <p class="text-white mb-0 small">
                                      Barang Sedang Dikirim
                                    </p>
                                  </div>
                                  @endif
                                  @if ($data->status == 2)
                                <div
                                  class="bg-success d-flex align-items-center justify-content-center shadow-1-strong p-2"
                                  style="">
                                  <p class="text-white mb-0 small">
                                      Barang Diterima Pembeli
                                    </p>
                                  </div>
                                  @endif

                              </div>
                      
                              <div class="card-body">

                              <div class="d-flex justify-content-between mb-0">
                                  <p class="font-weight-bold text-muted mb-0">Quantity : </p>
                                  <div class="ms-auto text-warning">
                                    <p class="fw-bold mb-0">{{$data->quantity}}</p>
                                  </div>
                                </div>

                                <hr class="my-0" />

                                <div class="d-flex justify-content-between mb-0">
                                  <p class="font-weight-bold text-muted mb-0">Total Pembayaran : </p>
                                  <div class="ms-auto text-warning">
                                    <p class="fw-bold mb-0">{{$data->grand_total}}</p>
                                  </div>
                                </div>

                                <hr class="my-0" />

                                <div class="d-flex justify-content-between mb-0">
                                  <a class="ms-auto text-primary text-bold" style="cursor:pointer;text-decoration:italic">
                                  </a>
                                </div>

                                </div>
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
