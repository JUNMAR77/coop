@extends('adminlte::page')

@section('title','Members')

@section('content_header')
    <h1>List of all members</h1>
@stop
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
   <!-- Start Page Content -->
   <!-- ============================================================== -->
<div class="row">
      <div class="col-12">
         <div class="card">
            <div class="card-body">
               <div class="row">
                  <div class="col-6 text-left">
                     {{-- <a href="{{ url('/add-member') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus-circle"></i> Add New</a> --}}
                     <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus-circle"></i> Add New</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- /.container-fluid -->
{{-- BEGIN MODAL --}}
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header bg-primary text-white">
            <h3 class="modal-title" id="exampleModalLabel">New Member</h3>
            <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="{{ route('add_member') }}" method="post" enctype="multipart/form-data">
            <div class="modal-body">
               @csrf
               <div class="row">
                  <div class="col-12">
                     <div class="alert d-none"></div>
                     <div id='img_contain' class="text-center mb-3">
                        <img class="rounded card card-body m-auto" id="blah" align='middle' src="{{ url('public/img/upload_def.png') }}" alt="upload image" style="width:200px; cursor:pointer" />
                        <h6 class="text-uppercase">Profile Photo</h6>
                     </div>
                     <div class="input-group d-none">
                        <div class="custom-file">
                           <input name="photo_path" type="file" id="inputGroupFile01" class="imgInp custom-file-input" aria-describedby="inputGroupFileAddon01" accept="image/*">
                           <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                     </div>
                  </div>
                  <div class="col-6 text-uppercase">
                     <div class="form-group">
                        <label>Last Name <span class="text-danger">*</span>
                        </label>
                        <input name="last_name" type="text" class="form-control text-uppercase" value="{{ old('last_name') }}" placeholder="Last Name" required>
                     </div>
                  </div>
                  <div class="col-6 text-uppercase">
                     <div class="form-group">
                        <label>First Name <span class="text-danger">*</span>
                        </label>
                        <input name="first_name" type="text" class="form-control text-uppercase" value="{{ old('first_name') }}" placeholder="First Name" required>
                     </div>
                  </div>
                  <div class="col-6 text-uppercase">
                     <div class="form-group">
                        <label>Middle Name <span class="text-danger">*</span>
                        </label>
                        <input name="middle_name" type="text" class="form-control text-uppercase" value="{{ old('middle_name') }}" placeholder="Middle Name" required>
                     </div>
                  </div>
                  <div class="col-6">
                     <div class="form-group">
                        <label>Email Address <span class="text-danger">*</span>
                        </label>
                        <input name="email" type="email" class="form-control" value="{{ old('email') }}" placeholder="Email Address" required>
                     </div>
                  </div>
                  <div class="col-6 text-uppercase">
                     <div class="form-group">
                        <label>
                        Member Type <span class="text-danger">*</span>
                        <span class="help"></span>
                        </label>
                        <select name="member_type_id" class="form-control" required>
                           @foreach($member_type as $row)
                              @if($row->id == 2 || strtoupper( $row->member_types ) != 'ADMIN')
                              <option value="{{ $row->id.md5( $row->id ) }}">{{ $row->member_type }}</option>
                              @endif
                           @endforeach 
                        </select>
                     </div>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <div class="form-actions m-auto">
                  <button type="button" class="btn btn-sm btn-danger mr-2" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                  <button type="submit" class="btn btn-sm btn-primary ml-1"> <i class="fas fa-user-plus"></i> Add</button>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>
{{-- END MODAL --}}
@endsection
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop