<!-- Show Data-->

@foreach($tableConfig['content'] as $data)
<!-- Modal Show -->
<div class="modal fade" data-backdrop="false" id="ModalDetail{{$data->id}}" tabindex="-1" aria-labelledby="ModalDetailTitle{{$data->id}}" aria-hidden="true" style="background: rgba(60, 60, 60, .3)">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalDetailTitle{{$data->id}}">Show Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <!-- Form Show -->
      <form method="POST" action="{{$tableConfig['action']['edit']['route']}}/{{$data->id}}">
                        @csrf
                        @foreach($tableConfig['form-detail'] as $key => $dataForm)

                        <!-- Input -->
                        @if($dataForm['tag'] == 'input')
                        <div class="row mb-3">
                            <label for="{{$tableConfig['form-detail'][$key]['name']}}" class="col-md-4 col-form-label text-md-end">{{$tableConfig['form-detail'][$key]['title']}}</label>

                            <div class="col-md-6">
                                <input 
                                readonly
                                id="{{$tableConfig['form-detail'][$key]['name']}}" 
                                type="text" 
                                class="form-control @error($tableConfig["form-detail"][$key]["name"]) is-invalid @enderror" 
                                name="{{$tableConfig['form-detail'][$key]['name']}}" 
                                value="{{ $data[$tableConfig['form-detail'][$key]['name']] }}" 
                                required 
                                autofocus
                                >

                                @error($tableConfig["form-detail"][$key]["name"])
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        @endif

                         <!-- Option -->
                         @if($dataForm['tag'] == 'option')
                        <div class="row mb-3">
                            <label for="{{$tableConfig['form-detail'][$key]['name']}}" class="col-md-4 col-form-label text-md-end">{{$tableConfig['form-detail'][$key]['title']}}</label>

                                <div class="col-md-6">
                                    <select disabled name="{{$tableConfig['form-detail'][$key]['name']}}" class="custom-select" aria-label="Default select example">
                                    
                                    @foreach ($tableConfig['form-detail'][$key]['option-config']['option-content'] as $dataOption)
                                        <option readonly {{($dataOption["id"] == $data["status"]) ?  "selected" : null}} value="{{$dataOption['id']}}">{{$dataOption[$tableConfig['form-detail'][$key]['option-config']['option-title']]}}</option>
                                    @endforeach                    
                                    </select>

                                    @error($tableConfig["form-detail"][$key]["name"])
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div>
                        @endif
                        <!-- Option -->


                         <!-- Date -->
                         @if($dataForm['tag'] == 'date')
                        <div class="row mb-3">
                            <label for="{{$tableConfig['form-detail'][$key]['name']}}" class="col-md-4 col-form-label text-md-end">{{$tableConfig['form-detail'][$key]['title']}}</label>

                            <div class="col-md-6">
                                <input 
                                    readonly
                                    /*value="2000-10-10"*/
                                    value="{{$data[$key]}}"
                                    id="{{$tableConfig['form-detail'][$key]['name']}}{{$data->id}}" 
                                    type="date"
                                    value="<?= date('d/m/Y', strtotime('10/11/2000')); ?>"
                                    name="{{$tableConfig['form-detail'][$key]['name']}}" 
                                    required 
                                    autofocus
                                    class="form-control @error($tableConfig["form-detail"][$key]["name"].$data->id) is-invalid @enderror" 

                                >

                                <script>
                                    // document.getElementById("date").value = "2014-02-09";

                                    const dateInput = document.getElementById('date');
                                    
                                    // Tambahkan event listener saat nilai input berubah
                                    dateInput.addEventListener('input', function() {
                                        // Mengganti semua simbol '/' dengan '-'
                                        this.value = this.value.replace(/\//g, '-');
                                    });
                                </script>

                                
                                @error($tableConfig["form-detail"][$key]["name"])
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        @endif
                        <!-- Date -->

                        @endforeach
        <!-- Form Edit -->
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button> -->
        <!-- <button type="submit" class="btn btn-primary">Ya</button> -->
      </div>
    </form>
    </div>
  </div>
</div>
@endforeach


<!-- Show Data -->

@foreach($tableConfig['content'] as $data)
<!-- Modal edit -->
<div class="modal fade" data-backdrop="false" id="ModalEdit{{$data->id}}" tabindex="-1" aria-labelledby="ModalEditTitle{{$data->id}}" aria-hidden="true" style="background: rgba(60, 60, 60, .3)">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalEditTitle{{$data->id}}">Hapus Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <!-- Form Edit -->
      <form method="POST" action="{{$tableConfig['action']['edit']['route']}}/{{$data->id}}" enctype="multipart/form-data">
                        @csrf
                        @foreach($tableConfig['form-edit'] as $key => $dataForm)

                        <!-- Input -->
                        @if($dataForm['tag'] == 'input')
                        <div class="row mb-3">
                            <label for="{{$tableConfig['form-edit'][$key]['name']}}" class="col-md-4 col-form-label text-md-end">{{$tableConfig['form-edit'][$key]['title']}}</label>

                            <div class="col-md-6">
                                <input 
                                id="{{$tableConfig['form-edit'][$key]['name']}}" 
                                type="text" 
                                class="form-control @error($tableConfig["form-edit"][$key]["name"]) is-invalid @enderror" 
                                name="{{$tableConfig['form-edit'][$key]['name']}}" 
                                value="{{ $data[$tableConfig['form-edit'][$key]['name']] }}" 
                                required 
                                autofocus
                                >

                                @error($tableConfig["form-edit"][$key]["name"])
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        @endif

                         <!-- Option -->
                         @if($dataForm['tag'] == 'option')
                        <div class="row mb-3">
                            <label for="{{$tableConfig['form-edit'][$key]['name']}}" class="col-md-4 col-form-label text-md-end">{{$tableConfig['form-edit'][$key]['title']}}</label>

                                <div class="col-md-6">
                                    <select name="{{$tableConfig['form-edit'][$key]['name']}}" class="custom-select" aria-label="Default select example">
                                    
                                    @foreach ($tableConfig['form-edit'][$key]['option-config']['option-content'] as $dataOption)
                                        <option {{($dataOption["id"] == $data["status"]) ?  "selected" : null}} value="{{$dataOption[$tableConfig['form-add'][$key]['option-config']['option-reference']]}}">{{$dataOption[$tableConfig['form-edit'][$key]['option-config']['option-title']]}}</option>
                                    @endforeach                    
                                    </select>

                                    @error($tableConfig["form-edit"][$key]["name"])
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div>
                        @endif
                        <!-- Option -->

                         <!-- Date -->
                         @if($dataForm['tag'] == 'date')
                        <div class="row mb-3">
                            <label for="{{$tableConfig['form-edit'][$key]['name']}}" class="col-md-4 col-form-label text-md-end">{{$tableConfig['form-edit'][$key]['title']}}</label>

                            <div class="col-md-6">
                                <input 
                                    /*value="2000-10-10"*/
                                    value="{{$data[$key]}}"
                                    id="{{$tableConfig['form-edit'][$key]['name']}}{{$data->id}}" 
                                    type="date"
                                    value="<?= date('d/m/Y', strtotime('10/11/2000')); ?>"
                                    name="{{$tableConfig['form-edit'][$key]['name']}}" 
                                    required 
                                    autofocus
                                    class="form-control @error($tableConfig["form-edit"][$key]["name"].$data->id) is-invalid @enderror" 

                                >

                                <script>
                                    // document.getElementById("date").value = "2014-02-09";

                                    const dateInput = document.getElementById('date');
                                    
                                    // Tambahkan event listener saat nilai input berubah
                                    dateInput.addEventListener('input', function() {
                                        // Mengganti semua simbol '/' dengan '-'
                                        this.value = this.value.replace(/\//g, '-');
                                    });
                                </script>
                                
                                @error($tableConfig["form-edit"][$key]["name"])
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        @endif
                        <!-- Date -->

                    <!-- Image Upload -->
                    @if($dataForm['tag'] == 'image')
                    <script type="text/javascript">
                        function readURL_edit(input) {
                            if (input.files && input.files[0]) {
                                preview = document.getElementById('bloh');
                                preview.style.display = 'block';

                                var reader = new FileReader();
                                
                                reader.onload = function (e) {
                                    $('#bloh').attr('src', e.target.result);
                                }

                                reader.readAsDataURL(input.files[0]);
                            }
                        }
                    </script>

                    <div class="row mb-3">
                        <label for="{{$tableConfig['form-edit'][$key]['name']}}" class="col-md-4 col-form-label text-md-end">{{$tableConfig['form-edit'][$key]['title']}}</label>

                        <div class="col-md-6">
                            <input 
                            onchange="readURL_edit(this);"
                            id="selectImage"
                            class="form-control @error($tableConfig["form-edit"][$key]["name"]) is-invalid @enderror" 
                            name="{{$tableConfig['form-edit'][$key]['name']}}" 
                            value="storage_path('public/' . {{ $data[$tableConfig['form-edit'][$key]['name']] }})" 
                            required 
                            autocomplete="{{$tableConfig['form-edit'][$key]['name']}}" 
                            autofocus
                            placeholder="{{$tableConfig['form-edit'][$key]['title']}}"
                            type="file" 
                            >

                            @error($tableConfig["form-add"][$key]["name"])
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    <div class="d-flex justify-content-center">
                            <img id="bloh" src="{{ URL::to('/') }}/images/{{$data[$tableConfig['form-edit'][$key]['name']]}}" width="300px" alt="">
                        </div>


                    <!-- <div class="mb-3">
                        <label for="{{$tableConfig['form-add'][$key]['name']}}" class="col-4 col-form-label text-md-end">{{$tableConfig['form-add'][$key]['title']}}</label>

                        <div class="col-6">
                        <input 
                            type="file" 
                            name="image" 
                            id="inputImage"
                            class="form-control @error('image') is-invalid @enderror">
        
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                    </div> -->
                    
                    @endif
                    <!-- Upload Image -->

                        @endforeach
        <!-- Form Edit -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
        <button type="submit" class="btn btn-primary">Ya</button>
      </div>
    </form>
    </div>
  </div>
</div>
@endforeach



@foreach($tableConfig['content'] as $data)
<!-- Modal Delete -->
<div class="modal fade" data-backdrop="false" id="ModalDelete{{$data->id}}" tabindex="-1" aria-labelledby="ModalDeleteTitle{{$data->id}}" aria-hidden="true" style="background: rgba(60, 60, 60, .3)">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalDeleteTitle{{$data->id}}">Hapus Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <p>Apakah Anda Yakin Menghapus Data Ini?</p>
      <form method="POST" action="{{$tableConfig['action']['delete']['route']}}/{{$data->id}}">
      @csrf
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
        <button type="submit" class="btn btn-primary">Ya</button>
      </div>
    </form>
    </div>
  </div>
</div>
@endforeach

