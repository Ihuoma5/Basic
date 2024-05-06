@extends('admin.admin_master')
@section('admin')


 <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Report All</h4>



                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

    <a href="{{ route('report.add') }}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right;"><i class="fas fa-plus-circle"> Add Report </i> </a> <br>  <br>               

                    <h4 class="card-title">Report All Data </h4>


                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>report_no</th> 
                            <th>Date Faulty </th>
                            <th>State</th>
                            <th>Device </th> 
                            <th>Fault Report </th>
                            <th>Part Changed </th>
                            <th>Date Returned </th>
                            <th>Date Received </th>
                            <th>Repair Remark </th>
                            <th>Status</th>
                            <th>Action</th>

                        </thead>
                        <tbody>

                        	@foreach($allData as $key => $item)
            <tr>
                <td> {{ $key+1}} </td>
                <td> {{ $item->Report_no }} </td> 
                <td> {{ date_faulty('d-m-Y',strtotime($item->date_faulty))  }} </td> 
                 <td> {{ $item['state']['name'] }} </td> 
                 <td> {{ $item['device']['name'] }} </td> 
                 <td> 
                    @if($item->status == '0')
                    <span class="btn btn-warning">Pending</span>
                    @elseif($item->status == '1')
                    <span class="btn btn-success">Approved</span>
                    @endif
                     </td> 

                <td> 

                @if($item->status == '0')
                <a href="{{ route('report.delete',$item->id) }}" class="btn btn-danger sm" title="Delete Data" id="delete">  <i class="fas fa-trash-alt"></i> </a>
                @endif

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