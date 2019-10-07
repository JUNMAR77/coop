@extends('layouts.admin')
{{-- BEGIN PAGE LEVEL CSS--}}
@section('page_level_css')
<link href="{{ asset('uidesign/vendor/elite/datatables/media/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">
@endsection
{{-- END PAGE LEVEL CSS --}}
@section('title','Members')
{{-- BEGIN CONTENT --}}
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

@if ($errors->any())
	@foreach ($errors->all() as $error)
		<div class="alert alert-danger" role="alert">
			{{$error}}
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	            <span aria-hidden="true">&times;</span>
	        </button>
		</div>
	@endforeach
@endif

@if(session('success_message'))
	<div class="alert alert-success" role="alert">
	{{ session('success_message') }}
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
	</div>
@endif

<div class="row">
      <div class="col-12">
         <div class="card">
            <div class="card-body">
               <div class="row">
                  <div class="col-6">
                     <h4 class="card-title">List of all members</h4>
                  </div>
                  <div class="col-6 text-right">
                     <a href="{{ url('/add-member') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus-circle"></i> Add New</a>
                  </div>
               </div>
               <div class="table-responsive m-t-40">
                  <table id="example23" class="display nowrap table table-sm table-hover table-striped table-bordered" cellspacing="0" width="100%">
                     <thead>
                        <tr>
                           <th class="">Member ID</th>
                           <th class="">Name</th>
                           <th class="">Contact No</th>
                           <th class="">Address</th>
                           <th class="">School</th>
                           <th class="">Position</th>
                           <th class="">Status</th>
                           <th class="text-center">Action</th>
                        </tr>
                        <tfoot>
                           <th class="">Member ID</th>
                           <th class="">Name</th>
                           <th class="">Contact No</th>
                           <th class="">Address</th>
                           <th class="">School</th>
                           <th class="">Position</th>
                           <th class="">Status</th>
                           <th class="text-center">Action</th>
                        </tfoot>
                     </thead>
                     <tbody id="list_body" name="list">
                       @foreach($members as $row)
                           <tr>
                              <td>{{ $row->UserID_Member }}</td>
                              <td>
                                 <a href="{{ url('member?id='.$row->name_member.md5( $row->name_member) ) }}" class="text-info" title="View Information">
                                    {{ ucwords(strtolower($row->name_member)) }}
                                 </a>
                              </td>
                              <td>{{ $row->contact_no }}</td>
                              <td>{{ $row->address_member }}</td>
                              <td>{{ $row->school_member }}</td>
                              <td>{{ $row->position_member }}</td>
                              <td>{{ $row->status_member }}</td>
                              <td class="text-center">
                              <a href="{{ url('update-member?id='.$row->name_member.md5( $row->name_member) ) }}" class="text-danger">
                              <span class="far fa-edit"></span>Edit
                              </a>
                           </td>
                           </tr>
                       @endforeach
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<!-- /.container-fluid -->
@endsection
{{-- END CONTENT --}}
{{-- BEGIN PAGE LEVEL PLUGIN --}}
@section('page_level_plugin')
<script src="{{ asset('uidesign/vendor/elite/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('uidesign/vendor/elite/buttons/1.5.1/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('uidesign/vendor/elite/buttons/1.5.1/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('uidesign/vendor/elite/ajax/libs/jszip/3.1.3/jszip.min.js') }}"></script>
<script src="{{ asset('uidesign/vendor/elite/ajax/libs/pdfmake/0.1.32/pdfmake.min.js') }}"></script>
<script src="{{ asset('uidesign/vendor/elite/ajax/libs/pdfmake/0.1.32/vfs_fonts.js') }}"></script>
<script src="{{ asset('uidesign/vendor/elite/buttons/1.5.1/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('uidesign/vendor/elite/buttons/1.5.1/js/buttons.print.min.js') }}"></script>
@endsection
{{-- END PAGE LEVEL PLUGIN --}}
{{-- BEGIN PAGE LEVEL SCRIPT --}}
@section('page_level_script')
<script src="{{ asset('uidesign/js/custom/members_list.js') }}"></script>
@endsection
{{-- END PAGE LEVEL SCRIPT --}}