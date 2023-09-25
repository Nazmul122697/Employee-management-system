<div>
    <!-- Main content -->

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
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
            @if (session()->has('room-message'))
            <div class="alert alert-success">
                {{session('room-message')}}
            </div>
            @endif
        </div>
        <div class="container-fluid">
            <div class="row">


                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <a class="float-right btn btn-outline-primary btn-md" href="{{route('housing-management.create-users')}}">Add New User</a>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table data-table table-bordered table-striped table-responsive"
                                wire:loading.remove>
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>User Name</th>
                                        <th>Nid</th>
                                        <th>Start Staying Date</th>
                                        <th>End Staying Date</th>
                                        <th>Phone Number</th>
                                        <th>Relation</th>
                                        <th>User Type</th>
                                        <th>District</th>
                                        {{-- <th style="width: 22%">Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>

                                    @if (isset($houseUsers))
                                    @foreach($houseUsers as $user)
                                    {{-- <div wire:key="{{ $room->id }}"> --}}
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->user_name}}</td>
                                            <td>{{$user->nid}}</td>
                                            <td>{{date('d/m/Y',strtotime($user->start_staying_date))}}</td>
                                            <td>{{date('d/m/Y',strtotime($user->end_staying_date))}}</td>
                                            <td>{{$user->phone_number}}</td>
                                            <td>{{$user->relation}}</td>
                                            <td>
                                                @if ($user->main_person_ind  == 1)
                                                    <span class="badge badge-primary">Main Member</span>
                                                @else
                                                <span class="badge badge-primary">Staying Member</span>
                                                @endif
                                            </td>
                                        </tr>
                                          {{-- </div> --}}
                                    @endforeach

                                    @endif

                                </tbody>
                            </table>

                            {{-- {{$Districts->links()}} --}}
                        </div>
                        {{-- {{ $Districts->links() }} --}}
                    </div>
                </div>
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