
@extends ('layouts.main')

@section('content')


<section class="section">
          <div class="section-header">
            <h1>Detail Catalog</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Detail</a></div>
              <div class="breadcrumb-item"><a href="#">Layout</a></div>
              <div class="breadcrumb-item">Top Navigation</div>
            </div>
          </div>
          <!-- @if($errors->any())
    {!! implode('', $errors->all('<div>:message</div>')) !!}
@endif
          @if (session()->has('success'))
          <div class="alert alert-success text-center animated fadeIn">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
              <strong>
                  {!! session()->get('success') !!}
              </strong>
          </div>
      @endif 

    {!! Session::has('msg') ? Session::get("msg") : '' !!}


@if (Session::has('message'))
   <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif -->
<meta name="csrf-token" content="{{ csrf_token() }}">



          <div class="section-body">
            <h2 class="section-title">Detail</h2>
            <!-- <p class="section-lead">This page is just an example for you to create your own page.</p> -->
            <div class="card">
              <!-- <div class="card-header">
                <h4>Catalog Umum</h4>
              </div> -->
              <div class="card-body ">
                  <div class="d-flex flex-wrap">
                    <div class="row">
                      <div class="col col-4">
                        <div class="card m-0">
                          <img class="card-img-top" src="{{ asset('images/'.$data->image) }}" alt="Card image cap">
                          <div class="card-body">
                            <div class="row">
                              <div class="col-3">
                                  <a href="">
                                  <img class="card-img-top" src="{{ asset('images/'.$data->image) }}" alt="Card image cap">
                                </a>
                              </div>
                              <div class="col-3">
                                  <a href="">
                                  <img class="card-img-top" src="{{ asset('images/'.$data->image) }}" alt="Card image cap">
                                </a>
                              </div>
                              <div class="col-3">
                                  <a href="">
                                  <img class="card-img-top" src="{{ asset('images/'.$data->image) }}" alt="Card image cap">
                                </a>
                              </div>
                              <div class="col-3">
                                  <a href="">
                                  <img class="card-img-top" src="{{ asset('images/'.$data->image) }}" alt="Card image cap">
                                </a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                     
                      <div class="col col-5">
                          <p class="card-text">
                                <h3 style="font-family: Times New Roman, Times, serif;color:#000"><b>{{$data->product_name}}</b><h3>
                                <hr class="my-0" />
                                  <h3 style="font-family: Times New Roman, Times, serif;color:#000">
                                    Rp. {{$data->unit_price}}
                                  </h3>  
                          </p>

                            <hr class="my-0" />

                            <div class="d-flex justify-content-between mb-0">
                              <p class="font-weight-bold text-muted mb-0">Stock Available : </p>
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

                            <br/>

                          <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Detail</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Informasi Penting</a>
                            </li>
                          </ul>
                          <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                {{$data->description}}
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                {{$data->description}}
                            </div>
                          </div>
                      </div>
                      
                      <script>
                        	$(document).ready(function(){
                              $('.count').width('30', true);
                              $('.count').height('15', true);
                              $('.count').prop('enabled', true);
                              
                              $(document).on('click','.plus',function(){
                                $('.count').val(parseInt($('.count').val()) + 1 );
                              });
                                
                              $(document).on('click','.minus',function(){
                                $('.count').val(parseInt($('.count').val()) - 1 );
                                  if ($('.count').val() == 0) {
                                  $('.count').val(1);
                                }
                              });


                              $(document).on('click','.cart',function(){
                                var count = $('.count').val();

                                // window.location = "/konsumen/detail/" + <#?php echo $data->id ?> + "/cart/"+count;

                                //   $.ajax({
                                //       type: "GET",
                                //       url: "/konsumen/detail/{{$data->id}}/cart/".count,
                                //       data: {countertje: count},
                                //       success:function(data){
                                //           $('#main').html(data);
                                //           console.log(count);
                                //       }

                                //   });
                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });
                                
                                $.ajax({
                                  method: 'POST',
                                  url: '{{$data->id}}/cart',
                                  data: {
                                    id:'{{$data->id}}',
                                    count:count,
                                   
                                  }
                                  
                              }).done(function () {
                                alert('Data Berhasil Dimasukan Ke Keranjang')
                              });
                              })
                              $(document).ready(function(){

                              });

                              $(document).ready(function(){
                                  $(document).on('click','.payment',function(){
                                    var count = $('.count').val();

                                    window.location = "/konsumen/detail/" + <?php echo $data->id ?> + "/payment/"+count;

                                      $.ajax({
                                          type: "GET",
                                          url: "/konsumen/detail/{{$data->id}}/payment/".count,
                                          data: {countertje: count},
                                          success:function(data){
                                              $('#main').html(data);
                                              console.log(count);
                                          }
                                      });
                                  })
                              });

                          });
                      </script>

                      <div class="col col-3">
                        <div class="card m-0 border rounded" >
                          <div class="card-body">
                          <p class="card-text">
                                <b>{{$data->product_name}}</b><br/>
                            </p>

                            <div class="row">
                                <button class="minus m-1 btn btn-primary">-</button>
                                <input type="number" class="form-control input-sm count" name="qty" value="1">
                                <button class="plus m-1 btn btn-primary">+</button>
                            </div>
                          
                              Stock: <b>{{$data->stock}}</b>

                            <div class="my-3" >
                              <a href="">Tambahan Catatan</a>
                            </div>

                            <div class="my-3">
                              <span class="h6">
                                Subtotal:
                               <b>{{$data->unit_price}}</b>
                              </span>
                            </div>
                              
                              
                            <a class="cart m-1 btn btn-warning w-100" 
                            >Keranjang +</a>
                            <a class="payment m-1 btn btn-success w-100">Bayar</a>

                            <!-- <div class="my-3 d-flex justify-content-center" >
                              <a class="mx-2" href="">
                                Chat 
                              </a>
                                | 
                              <a class="mx-2" href="">
                                Wishlist 
                              </a>
                                |
                              <a class="mx-2" href="">
                                 Share
                              </a>
                            </div> -->

                          </div>
                        </div>
                      </div>

                    </div>
                    <div>
                    </div>
                  </div>

                  <a href="chart" style="cursor:pointer; text-decoration:none;  box-shadow: 1px 1px 1px 1px;" class="m-2"  >                    
                      <div class="card m-2" style="width: 12rem;">
                        <img class="card-img-top" src="https://dummyimage.com/600x400/cfcfcf/ffffff" alt="Card image cap">
                        <div class="card-body">
                          <p class="card-text">
                              <b>Payment</b><br/>
                                </p>
                        </div>
                      </div>
                    </a>


               </div>
            </div>
          </div>
        </section>

@endsection
