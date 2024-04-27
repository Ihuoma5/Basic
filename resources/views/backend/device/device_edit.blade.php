@extends('admin.admin_master')
@section('admin')
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">Edit Device Page </h4><br><br>



 <form method="post" action="{{ route('device.update') }}" id="myForm" >
                @csrf

                <input type="hidden" name="id" value="{{ $device->id }}">

                <div class="row mb-3">
    <label for="example-text-input" class="col-sm-2 col-form-label">Site Name</label>
    <div class="form-group col-sm-10">
        <input name="name" value="{{ $device->name }}" class="form-control" type="text">
    </div>
</div>

<div class="row mb-3">
    <label for="example-text-input" class="col-sm-2 col-form-label">Trueprep ID</label>
    <div class="form-group col-sm-10">
        <input name="trueprep" value="{{ $device->trueprep }}" class="form-control" type="text">
    </div>
</div>

<div class="row mb-3">
    <label for="example-text-input" class="col-sm-2 col-form-label">Truelab ID</label>
    <div class="form-group col-sm-10">
        <input name="truelab" value="{{ $device->truelab }}" class="form-control" type="text">
    </div>
</div>

            <div class="row mb-3">
    <label for="example-text-input" class="col-sm-2 col-form-label">Installation Date</label>
    <div class="form-group col-sm-10">
        <input name="date" class="form-control" type="date" value="{{ $device->date }}">
    </div>
</div>

            <div class="row mb-3">
        <label class="col-sm-2 col-form-label">State  </label>
        <div class="col-sm-10">
            <select name="state_id" class="form-select" aria-label="Default select example">
                <option selected="">Open this select menu</option>
                @foreach($state as $sta)
                <option value="{{ $sta->id }}" {{ $sta->id == $device->state_id ? 'selected' : '' }}   >{{ $sta->name }}</option>
               @endforeach
                </select>
        </div>
    </div>
  <!-- end row -->




<input type="submit" class="btn btn-info waves-effect waves-light" value="Update Device">
            </form>



        </div>
    </div>
</div> <!-- end col -->
</div>



</div>
</div>

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                name: {
                    required : true,
                }, 
                 state_id: {
                    required : true,
                },
                 trueprep: {
                    required : true,
                },
                 truelab: {
                    required : true,
                },
            },
            messages :{
                name: {
                    required : 'Please Enter Your Device Name',
                },
                supplier_id: {
                    required : 'Please Select One State',
                },
                trueprep: {
                    required : 'Please Enter Your Trueprep ID',
                },
                name: {
                    required : 'Please Enter Your Truelab ID',
                },
            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
    
</script>



@endsection 