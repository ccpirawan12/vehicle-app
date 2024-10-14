@extends('layouts.app')
@section('title')
@section('content-header')
@section('content-section')
  @include('layouts.partial.navbar_edit')
@endsection
@section('content_page')
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit Contract</h4>
        <p class="card-description">Insert new Contract details</p>
        <form action="{{ route('contracts.update', $contract->id) }}" method="POST" class="forms-sample" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="contractDate">Contract Date</label>
            <input type="date" class="form-control" id="contractDate" name="contractDate" value="{{$contract->contractDate}}" placeholder="Contract Date" />
          </div>
          <div class="form-group">
            <label for="contractEnd">Contract End</label>
            <input type="date" class="form-control" id="contractEnd" name="contractEnd" value="{{$contract->contractEnd}}" placeholder="Contract End" />
          </div>
          <div class="form-group">
            <label for="file">File</label>
            <iframe src="{{$contract->file}}" frameborder="0"></iframe>
            <input type="text" class="file-upload-default" />
            <div class="input-group col-xs-12">
              <input type="file" class="form-control file-upload-info" id="file" name="file" value="{{$contract->file}}"  placeholder="Upload File" />
            </div>
          </div>
          <div class="form-group">
            <label for="ownerId">Owner</label>
            <select id="ownerId" type="text" name="ownerId"
                class="form-control">
                <option value="">Select</option>
                @foreach ($owners as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $contract->ownerId ? "selected" : "" }}>{{ $item->name }}</option>
                @endforeach
                {{-- <option value="Owner"></option> --}}
            </select>
          </div>
          <div class="form-group">
            <label for="vehicleId">Vehicle</label>
            <select id="vehicleId" type="text" name="vehicleId" 
                class="form-control">
            </select>
          </div>
          <button type="submit" class="btn btn-primary mr-2"> Submit </button>
          <button class="btn btn-light">
            <a href="{{ route('drivers.index') }}" class="text-dark">Cancel</a>
          </button>
        </form>
      </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
      $(() => {
        $("body").on("change","#ownerId",function(e){
          let vehicles  = JSON.parse(`{!! json_encode($vehicles) !!}`);
          let ownerId   = $(this).val();

          let vehicleByOwner = vehicles[ownerId];
          $("#vehicleId").html("");

          
          $.each(vehicleByOwner,(index,data) => {
            $("#vehicleId").append($("<option>",{value: data.id}).html(data.licensePlate));
          })
        })

        $("#ownerId").change();
      })
    </script>
  @endsection