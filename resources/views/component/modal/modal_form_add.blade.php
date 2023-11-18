@foreach($tableConfig['form-edit'] as $key => $dataForm)
<!-- Modal tambah -->
<div class="modal fade" data-backdrop="false" id="ModalAdd" tabindex="-1" aria-labelledby="ModalAddTitle" aria-hidden="true" style="background: rgba(60, 60, 60, .3)">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalAddTitle">Add Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <!-- Form Insert -->
      <form method="POST" action="{{$tableConfig['action']['add']['route']}}" enctype="multipart/form-data">
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
                                    <option value="{{$dataOption[$tableConfig['form-add'][$key]['option-config']['option-reference']]}}">{{$dataOption[$tableConfig['form-add'][$key]['option-config']['option-title']]}}</option>
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
                                id="{{$tableConfig['form-add'][$key]['name']}}" 
                                type="date"
                                class="form-control @error($tableConfig["form-add"][$key]["name"]) is-invalid @enderror" 
                                name="{{$tableConfig['form-add'][$key]['name']}}" value="{{ old($tableConfig["form-add"][$key]["name"]) }}" 
                                required 
                                autocomplete="{{$tableConfig['form-add'][$key]['name']}}" 
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

                    <!-- Image Upload -->
                    @if($dataForm['tag'] == 'image')

                    <script type="text/javascript">
                        function readURL(input) {
                            if (input.files && input.files[0]) {
                                preview = document.getElementById('add-image');
                                preview.style.display = 'block';

                                var reader = new FileReader();
                                
                                reader.onload = function (e) {
                                    $('#add-image').attr('src', e.target.result);
                                }

                                reader.readAsDataURL(input.files[0]);
                            }
                        }
                    </script>

                    <div class="row mb-3">
                        <label for="{{$tableConfig['form-add'][$key]['name']}}" class="col-md-4 col-form-label text-md-end">{{$tableConfig['form-add'][$key]['title']}}</label>

                        <div class="col-md-6">
                            <input 
                            onchange="readURL(this);"
                            class="form-control @error($tableConfig["form-add"][$key]["name"]) is-invalid @enderror" 
                            name="{{$tableConfig['form-add'][$key]['name']}}" value="{{ old($tableConfig["form-add"][$key]["name"]) }}" 
                            required 
                            autocomplete="{{$tableConfig['form-add'][$key]['name']}}" 
                            autofocus
                            placeholder="{{$tableConfig['form-add'][$key]['title']}}"
                            type="file" 
                            >
                      
                            @error($tableConfig["form-add"][$key]["name"])
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            
                        </div>

                    </div>

                    <div class="d-flex justify-content-center" >
                        <img id="add-image" src="#" alt="your image" width="300px" class="mt-3" style="display:none;" />
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