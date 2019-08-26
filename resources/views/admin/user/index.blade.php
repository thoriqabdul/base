@extends('admin.layouts.backend')

@section('content')
     <!-- Hero -->
     <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Users
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="">User</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <!-- Dynamic Table Full -->
        <div class="block">
            <div class="block-header">
                <h3 class="block-title">Data Users </h3>
                <div class="pull-r">
                    <a href="{{route('users.create')}}" id="modal-show" title="create" class="btn  btn-primary btn-flat btn-sm" ><i class="fa fa-plus"></i></a>
                </div>
            </div>
            <div class="block-content block-content-full">
                @if (session('message'))
                    <div class="alert alert-primary alert-dismissable" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <p class="mb-0"> {{ session('message') }}</p>
                    </div>
                @endif

               <div class="table-responsive">
                   <table class="table table-bordered table-striped table-vcenter js-dataTable-full" id="roles-table">
                       <thead>
                       <tr>
                           <th>Name</th>
                           <th>Email</th>
                           <th>Action</th>
                       </tr>
                       </thead>
                   </table>
               </div>
            </div>
        </div>
        <!-- END Dynamic Table Full -->
    </div>
    <!-- END Page Content -->
    
@endsection
@section('js_after')
    <script>
        $(function () {
            $('#roles-table').DataTable({
                serverSide: true,
                processing: true,
                searchDelay: 1000,
                ajax: '{{ route('users.data') }}',
                columns: [
                    {data: 'name'},
                    {data: 'email'},
                    {data: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>
@endsection