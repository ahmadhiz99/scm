
@extends ('layouts.main')

@section('content')
<section class="section">
          <div class="section-header">
            <h1>Payment Information</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Detail</a></div>
              <div class="breadcrumb-item"><a href="#">Layout</a></div>
              <div class="breadcrumb-item">Top Navigation</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Payment</h2>
            <!-- <p class="section-lead">This page is just an example for you to create your own page.</p> -->
            <div class="card">
              <!-- <div class="card-header">
                <h4>Catalog Umum</h4>
              </div> -->
              <div class="card-body">
                <h5 class="text-black">Items Information</h5>

                    <div class="row d-flex justify-content-center">
                      <div class="col-12">
                        <div class="card m-2 d-flex">
                          <div class="card-body">
                            <div class="row">
                              <div class="col-3">
                                <img class="card-img-top" src="{{ asset('images/'.$data->image) }}" alt="Card image cap">
                              </div>
                              <div class="col-8">
                                <p class="card-text">
                                  <h5>
                                    <b class>{{$data->product_name}}</b>
                                  </h5>  
                                    {{$data->description}}
                                </p>
                              </div>
                              <div class=" col-1 d-flex justify-content-center align-items-center">
                                <a href="">
                                  <i style="font-size:24px;" class="fa">&#xf00d;</i>
                                </a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <h5 class="mt-5">Payment Method</h5>

                    <form class="m-4" action="/konsumen/detail/{{$data->id}}/finish-payment">
                      <div class="form-row">
                      
                       <div class="form-group col-md-4">
                          <label for="unitPrice">Unit Price</label>
                          <input readonly required type="text" name="unitPrice" class="form-control" id="unitPrice" value="{{$data->unit_price}}">
                        </div>
                        <div class="form-group col-md-4">
                          <label for="quantity">Quantity</label>
                          <input readonly required type="text" name="quantity" class="form-control" id="quantity" value="{{$count}}">
                        </div>
                        <div class="form-group col-md-4">
                          <label for="total">Jumlah</label>
                          <input readonly required type="text" name="total" class="form-control" id="total" value="{{$count* $data->unit_price}}">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="customerName">Name</label>
                          <input required type="text" name="customerName" class="form-control" id="customerName" placeholder="Jhon Doe">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputEmail4">Email</label>
                          <input required type="email" name="email" class="form-control" id="inputEmail4" placeholder="Example@mail.com">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputTelp">No Telp</label>
                        <input required type="text" name="telp" class="form-control" id="inputTelp" placeholder="08xxxxx">
                      </div>
                      <div class="form-group">
                        <label for="inputAddress">Address</label>
                        <input required type="text" name="address" class="form-control" id="inputAddress" placeholder="1234 Main St">
                      </div>
                      <div class="form-group">
                        <div class="form-check">
                          <input required class="form-check-input" type="checkbox" id="gridCheck">
                          <label class="form-check-label" for="">
                            Saya Setuju Dengan <a href="#"><b>User Agreement</b></a> dan <a href="#"><b>Privacy Policy</b></a>
                          </label>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary">Bayar Sekarang</button>
                      <!-- <a class="m-1 btn btn-primary" href="https://wa.me/+62{{$user->phone}}">Bayar Sekarang</a> -->
                      <!-- <a class="m-1 btn btn-primary" href="">Bayar Sekarang</a> -->
                    </form>



               </div>
            </div>
          </div>
        </section>

@endsection
