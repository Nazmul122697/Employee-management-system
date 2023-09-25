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
            @if (session()->has('district-message'))
            <div class="alert alert-success">
                {{session('district-message')}}
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
                                        <th>District</th>
                                        <th>District</th>
                                        <th>Bangla</th>
                                        <th>Url</th>
                                        <th style="width: 22%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse ($districts as $district)
                                    <tr>
                                        <td>{{$district->id}}</td>
                                        <td>{{!empty($district->ship_divisions->division_name)?$district->ship_divisions->division_name:''}}
                                        </td>
                                        <td>{{$district->district_name}}</td>
                                        <td>{{$district->bn_name}}</td>
                                        <td>{{$district->url}}</td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-success"
                                            wire:click='EditDistrict({{$district->id}})'>Edit</button>
                                           <button class="btn btn-sm btn-outline-danger"
                                                wire:click='deleteDistrict({{$district->id}})'>Delete</button>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6">No Data Found</td>
                                    </tr>
                                    @endforelse

                                </tbody>
                            </table>

                            {{-- {{$Districts->links()}} --}}
                        </div>
                        {{-- {{ $Districts->links() }} --}}
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">
                                @if ($editMode == true)
                                Edit District
                                @else
                                Add New District
                                @endif
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        @if ($editMode)
                        <form wire:submit="updateDistrict">
                            <input type="hidden" name="" wire:model='id'>
                            @else
                            <form wire:submit="save">
                                @endif
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="district_name">District Name</label>
                                        <input type="text" class="form-control" id="district_name"
                                            wire:model='district_name' placeholder="Enter District Name">
                                        <div>
                                            @error('district_name') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="district_name_bn">District Name BN</label>
                                        <input type="text" class="form-control" id="district_name_bn"
                                            wire:model='district_name_bn' placeholder="Enter District BN">
                                    </div>

                                    <div class="form-group">
                                        <label for="divsion_name">Division Name</label>
                                        <select name="" id="" class="form-control" wire:model.defer='divsion_name'>
                                            <option value="">Select Division Name</option>
                                            @if (!empty($divisions))
                                            @foreach ($divisions as $division)
                                            <option value="{{$division->id}}">{{$division->division_name}}</option>
                                            @endforeach
                                            @endif

                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="url">URL</label>
                                        <input type="text" class="form-control" id="url" wire:model='url'
                                            placeholder="Enter Url">
                                    </div>

                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="status" checked>
                                        <label class="form-check-label" for="status">Status</label>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    @if ($editMode)
                                    <button type="submit" class="btn btn-primary">Update</button>

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