
@extends ('layouts.main')

@section('content')

<section class="section w-100">
          <div class="section-header">
            <h1>Profile</h1>
          </div>
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
                              <input name="name" type="text" class="form-control" id="exampleInputName1" aria-describedby="NameHelp" value="{{$user->name}}" placeholder="Enter Name">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPhone1">Phone</label>
                              <input name="phone" type="text" class="form-control" id="exampleInputPhone1" aria-describedby="PhoneHelp" value="{{$user->phone}}" placeholder="Enter Phone">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Email</label>
                              <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="EmailHelp" value="{{$user->email}}" placeholder="Enter Email">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputAddress1">Alamat</label>
                              <input name="address" type="text" class="form-control" id="exampleInputAddress1" aria-describedby="AddressHelp" value="{{$user->address}}" placeholder="Enter Address">
                            </div>
                            <!-- <div class="form-group">
                              <label for="exampleInputPassword1">Password</label>
                              <input name="password" type="password" class="form-control" id="exampleInputPassword1" value="{{$user->password}}" placeholder="Password">
                            </div> -->
                            <div class="form-group">
                              <label for="exampleInputRekening1">Rekening</label>
                              <input name="rekening" type="text" class="form-control" id="exampleInputRekening1" aria-describedby="RekeningHelp" value="{{$user->rekening}}" placeholder="Enter Rekening">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputBank1">Bank</label>
                              <input name="bank" type="text" class="form-control" id="exampleInputBank1" aria-describedby="BankHelp" value="{{$user->bank}}" placeholder="Enter Bank">
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
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
          </div>
        </section>

@endsection
