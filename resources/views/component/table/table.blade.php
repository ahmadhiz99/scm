@foreach($tableConfig['action'] as $key => $dataAction)
@if( $key == 'add')

  <a data-toggle="modal" data-target="{{$dataAction['modal']}}" class="{{$dataAction['class']}}" style="cursor:pointer">
      <i class="{{$dataAction['icon']}}"></i>
      {{$dataAction['name']}}
  </a>    
@endif

@endforeach

@include('component/modal/modal_form_add')

<table id="table_master"class="table text-sm h6 center mt-4 table-responsive ">
    <thead>
      <tr >
        <th scope="col">No.</th>
        @foreach($data_table as $data)
              <th scope="col" >{{$data}}</th>
        @endforeach
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>

      @foreach($tableConfig['content'] as $data)

        <tr>
        <td>{{$loop->iteration}}</td>

          @foreach($data_table as $key => $dataColumn)
            @if( array_search($key,$tableConfig['field_block']) == false)
                <td>{{$data->$key}}</td>
            @endif
          @endforeach
          <td>
            @foreach($tableConfig['action'] as $key => $dataAction)
            @if($key != 'add')
              <a data-toggle="modal" data-target="{{$dataAction['modal']}}{{$data->id}}" class="{{$dataAction['class']}}" style="cursor:pointer">
                <i class="{{$dataAction['icon']}}"></i>
                {{$dataAction['name']}}
              </a>    
              @endif                  
            @endforeach
          </td> 
        </tr>

      @endforeach
      
    </tbody>
</table>

