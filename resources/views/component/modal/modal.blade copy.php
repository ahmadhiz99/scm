

@foreach($tableConfig['content'] as $data)
<!-- Modal tambah -->
<div class="modal fade" data-backdrop="false" id="ModalAdd{{$data->id}}" tabindex="-1" aria-labelledby="ModalAddTitle{{$data->id}}" aria-hidden="true" style="background: rgba(60, 60, 60, .3)">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalAddTitle{{$data->id}}">Add Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <!-- Form Insert -->
      <form method="POST" action="{{$tableConfig['action']['add']['route']}}">
                        @csrf
                        @foreach($tableConfig['form-add'] as $key => $dataForm)

                        @if($dataForm['tag'] == 'input')
                        <div class="row mb-3">
                            <label for="{{$tableConfig['form-add'][$key]['name']}}" class="col-md-4 col-form-label text-md-end">{{$tableConfig['form-add'][$key]['title']}}</label>

                            <div class="col-md-6">
                                <input 
                                id="{{$tableConfig['form-add'][$key]['name']}}" 
                                type="text" 
                                class="form-control @error($tableConfig["form-add"][$key]["name"]) is-invalid @enderror" 
                                name="{{$tableConfig['form-add'][$key]['name']}}" value="{{ old($tableConfig["form-add"][$key]["name"]) }}" 
                                required 
                                autocomplete="{{$tableConfig['form-add'][$key]['name']}}" 
                                autofocus
                                placeholder="{{$tableConfig['form-add'][$key]['title']}}"
                                >

                                @error($tableConfig["form-add"][$key]["name"])
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
                            <label for="{{$tableConfig['form-add'][$key]['name']}}" class="col-md-4 col-form-label text-md-end">{{$tableConfig['form-add'][$key]['title']}}</label>

                                <div class="col-md-6">
                                    <select name="{{$tableConfig['form-add'][$key]['name']}}" class="custom-select" aria-label="Default select example">
                                    
                                    @foreach ($tableConfig['form-add'][$key]['option-config']['option-content'] as $dataOption)
                                        <option value="{{$dataOption->id}}">{{$dataOption[$tableConfig['form-add'][$key]['option-config']['option-title']]}}</option>
                                    @endforeach                    
                                    </select>

                                    @error($tableConfig["form-add"][$key]["name"])
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
                            <label for="{{$tableConfig['form-add'][$key]['name']}}" class="col-md-4 col-form-label text-md-end">{{$tableConfig['form-add'][$key]['title']}}</label>

                            <div class="col-md-6">
                                <input 
                                    id="{{$tableConfig['form-add'][$key]['name']}}{{$data->id}}" 
                                    type="date"
                                    class="form-control @error($tableConfig["form-add"][$key]["name"].$data->id) is-invalid @enderror" 
                                    name="{{$tableConfig['form-add'][$key]['name']}}" value="{{ old($tableConfig["form-add"][$key]["name"].$data->id) }}" 
                                    required 
                                    autocomplete="{{$tableConfig['form-add'][$key]['name']}}{{$data->id}}" 
                                    autofocus
                                    placeholder="{{$tableConfig['form-add'][$key]['title']}}"
                                >

                                <script>
                                    const dateInput = document.getElementById('date');
                                    
                                    // Tambahkan event listener saat nilai input berubah
                                    dateInput.addEventListener('input', function() {
                                        // Mengganti semua simbol '/' dengan '-'
                                        this.value = this.value.replace(/\//g, '-');
                                    });
                                </script>

                                
                                @error($tableConfig["form-add"][$key]["name"])
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        @endif
                        <!-- Date -->


                        @endforeach
        <!-- Form Insert -->

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
      <form method="POST" action="{{$tableConfig['action']['edit']['route']}}">
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
                            <label for="{{$tableConfig['form-add'][$key]['name']}}" class="col-md-4 col-form-label text-md-end">{{$tableConfig['form-add'][$key]['title']}}</label>

                                <div class="col-md-6">
                                    <select name="{{$tableConfig['form-add'][$key]['name']}}" class="custom-select" aria-label="Default select example">
                                    
                                    @foreach ($tableConfig['form-add'][$key]['option-config']['option-content'] as $dataOption)
                                        <option value="{{$dataOption->id}}">{{$dataOption[$tableConfig['form-add'][$key]['option-config']['option-title']]}}</option>
                                    @endforeach                    
                                    </select>

                                    @error($tableConfig["form-add"][$key]["name"])
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
                            <label for="{{$tableConfig['form-add'][$key]['name']}}" class="col-md-4 col-form-label text-md-end">{{$tableConfig['form-add'][$key]['title']}}</label>

                            <div class="col-md-6">
                                <input 
                                    id="{{$tableConfig['form-add'][$key]['name']}}{{$data->id}}" 
                                    type="date"
                                    class="form-control @error($tableConfig["form-add"][$key]["name"].$data->id) is-invalid @enderror" 
                                    name="{{$tableConfig['form-add'][$key]['name']}}" value="{{ old($tableConfig["form-add"][$key]["name"].$data->id) }}" 
                                    required 
                                    autocomplete="{{$tableConfig['form-add'][$key]['name']}}{{$data->id}}" 
                                    autofocus
                                    placeholder="{{$tableConfig['form-add'][$key]['title']}}"
                                >

                                <script>
                                    const dateInput = document.getElementById('date');
                                    
                                    // Tambahkan event listener saat nilai input berubah
                                    dateInput.addEventListener('input', function() {
                                        // Mengganti semua simbol '/' dengan '-'
                                        this.value = this.value.replace(/\//g, '-');
                                    });
                                </script>

                                
                                @error($tableConfig["form-add"][$key]["name"])
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

