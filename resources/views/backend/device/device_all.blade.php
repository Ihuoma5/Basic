@extends('admin.admin_master')
@section('admin')


 <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Device All</h4>



                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

    <a href="{{ route('device.add') }}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right;"><i class="fas fa-plus-circle"> Add Device </i> </a> <br>  <br>               

                    <h4 class="card-title">Device All Data </h4>


                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            
                            <th>Site Name</th> 
                            <th>Trueprep ID</th>
                            <th>Truelab ID</th>
                            <th>State</th>
                            <th>Date</th>
                            <th>Action</th>

                        </thead>


                        <tbody>

                        	@foreach($device as $key => $item)
                        <tr>
                        <td> {{ $item->name }} </td>
                        <td> {{ $item->trueprep }} </td>
                        <td> {{ $item->truelab }} </td>
                        <td> {{ $item['state']['name'] ?? 'N/A' }} </td>
                        <td> {{ $item->date ?? 'N/A' }} </td>

                            <td>
   <a href="{{ route('device.edit',$item->id) }}" class="btn btn-info sm" title="Edit Data">  <i class="fas fa-edit"></i> </a>

     <a href="{{ route('device.delete',$item->id) }}" class="btn btn-danger sm" title="Delete Data" id="delete">  <i class="fas fa-trash-alt"></i> </a>

                            </td>

                        </tr>
                        @endforeach

                        </tbody>
                    </table>

                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->



                    </div> <!-- container-fluid -->
                </div>


@endsection