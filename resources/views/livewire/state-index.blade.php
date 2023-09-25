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
            @if (session()->has('state-message'))
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
                            <table id="example1" class="table table-bordered table-striped table-responsive"
                                wire:loading.remove>
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>State Name</th>
                                        <th>District</th>
                                        <th>Division</th>
                                        <th>Bangla</th>
                                        <th>Url</th>
                                        <th style="width: 22%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse ($states as $state)
                                    <tr>
                                        <td>{{$state->id}}</td>
                                        <td>{{$state->state_name}}</td>
                                        <td>{{$state->ship_districts->district_name}}</td>
                                        <td>{{$state->ship_districts->ship_divisions->division_name}}</td>
                                        <td>{{$state->bn_name}}</td>
                                        <td>{{$state->url}}</td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-success"
                                                wire:click='editState({{$state->id}})'>Edit</button>
                                            <button class="btn btn-sm btn-outline-danger"
                                                wire:click='deleteState({{$state->id}})'>Delete</button>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6">No Data Found</td>
                                    </tr>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">
                                @if ($editMode == true)
                                Edit State
                                @else
                                Add New State
                                @endif
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        @if ($editMode)
                        <form wire:submit="updateStates" >
                            <input type="hidden" name="" wire:model='id'>
                            @else
                            <form wire:submit="saveState" id="saveId">
                                @endif
                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="division">Division Name</label>
                                        <select name="" id="division" class="form-control" wire:model='division'>
                                            <option value="">Select Division Name</option>
                                            @if (!empty($divisions))
                                            @foreach ($divisions as $division)
                                            <option value="{{$division->id}}">{{$division->division_name}}</option>
                                            @endforeach
                                            @endif

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="district">District Name</label>
                                        <select name="" id="" class="form-control" wire:model='district'>
                                            <option value="">Select District Name</option>
                                            @if (!empty($districts))
                                            @foreach ($districts as $district)
                                            <option value="{{$district->id}}">{{$district->district_name}}</option>
                                            @endforeach
                                            @endif

                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="state_name">State Name</label>
                                        <input type="text" class="form-control" id="url" wire:model='state_name'
                                            placeholder="Enter State Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="bn_name">BN Name</label>
                                        <input type="text" class="form-control" id="bn_name" wire:model='bn_name'
                                            placeholder="Enter BN Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="url">URL</label>
                                        <input type="text" class="form-control" id="url" wire:model='url'
                                            placeholder="Enter URL">
                                    </div>

                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="status" checked>
                                        <label class="form-check-label" for="status">Status</label>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    @if ($editMode)
                                    {{-- <button type="submit" class="btn btn-primary">Update</button> --}}

                                    @else
                                    <button type="submit" class="btn btn-primary">Submit</button>

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


    @push('scripts')

    <script>
        // Your JS here.
       $('body').addClass('sidebar-collapse')

    </script>

    @endpush
</div>