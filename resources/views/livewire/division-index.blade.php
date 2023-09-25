<div>
    <!-- Main content -->

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{$feature_name}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{$menu_name}}</a></li>
                        <li class="breadcrumb-item active">{{$feature_name}}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div>
            @if (session()->has('division-message'))
            <div class="alert alert-success">
                {{session('division-message')}}
            </div>
            @endif
        </div>
        <div class="container-fluid">
            <div class="row">
                

                <div class="col-md-8">
                    <div class="card">
                        {{-- <div class="card-header">
                            <form>
                                <div class="form-row align-items-center">
                                    <div class="col">
                                        <input type="search" wire:model.live="search" class="mb-2 form-control"
                                            id="inlineFormInput" placeholder="Enter Search Data">
                                    </div>
                                    <div class="col" wire:loading>
                                        <div class="spinner-border" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div> --}}
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped" wire:loading.remove>
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Name</th>
                                        <th>Bangla</th>
                                        <th>Url</th>
                                        <th style="width: 22%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse ($divisions as $division)
                                    <tr>
                                        <td>{{$division->id}}</td>
                                        <td>{{$division->division_name}}</td>
                                        <td>{{$division->bn_name}}</td>
                                        <td>{{$division->url}}</td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-success"
                                                wire:click='EditDivision({{$division->id}})'>Edit</button>
                                            <button class="btn btn-sm btn-outline-danger" wire:click='deleteDivision({{$division->id}})'>Delete</button>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5">No Data Found</td>
                                    </tr>
                                    @endforelse

                                </tbody>
                            </table>

                            {{-- {{$divisions->links()}} --}}
                        </div>
                        {{-- {{ $divisions->links() }} --}}
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">
                                @if ($editMode == true)
                                Edit Division
                                @else
                                Add New Division
                                @endif
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        @if ($editMode)
                        <form  wire:submit="update">
                            <input type="hidden" name="" wire:model='division_hdn_id'>
                        @else
                        <form  wire:submit="save">
                        @endif                        
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="div_name">Division Name</label>
                                    <input type="text" class="form-control" id="div_name" wire:model='div_name'
                                        placeholder="Enter Division Name">
                                        <div>
                                            @error('div_name') <span class="error">{{ $message }}</span> @enderror 
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label for="div_name_bn">Division Name BN</label>
                                    <input type="text" class="form-control" id="div_name_bn" wire:model='div_name_bn'
                                        placeholder="Enter Division BN">
                                </div>
                                <div class="form-group">
                                    <label for="url">URL</label>
                                    <input type="text" class="form-control" id="url" wire:model='url' placeholder="Enter Url">
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="status" checked>
                                    <label class="form-check-label" for="status">Status</label>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                @if ($editMode)
                                <button type="submit" class="btn btn-primary"
                                    >Update</button>

                                @else
                                <button type="submit" class="btn btn-primary"
                                   >Submit</button>

                                @endif
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>