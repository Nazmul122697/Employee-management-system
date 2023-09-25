<div>
    <!-- Main content -->
    @push('styles')
    <link rel="stylesheet" href="{{asset('backend/plugins/summernote/summernote-bs4.min.css')}}">
    @endpush

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
                                        <th>Room ID</th>
                                        <th>Room Name</th>
                                        <th>Room Price (Per Month)</th>
                                        <th>Details</th>
                                        <th>Status</th>
                                        {{-- <th style="width: 22%">Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>

                                    @if (isset($rooms))
                                    @foreach($rooms as $room)
                                    {{-- <div wire:key="{{ $room->id }}"> --}}
                                        <tr>
                                            <td>{{$room->id}}</td>
                                            <td>{{$room->room_id}}</td>
                                            <td>{{$room->room_name}}</td>
                                            <td>{{$room->room_price}}</td>
                                            <td>{{$room->room_details}}</td>
                                            <td>
                                                @if ($room->status == 1)
                                                <span class="badge badge-success">Active</span>
                                                @else
                                                <span class="badge badge-danger">Inactive</span>
                                                @endif
                                            </td>
                                            {{-- <td>
                                                <button wire:click="delete({{ $room->id }})">Delete</button> 
                                  
                                            </td> --}}
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
                <!-- /.col -->
                <div class="col-md-4">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">
                                @if ($editMode == true)
                                Edit Room
                                @else
                                Add New Room
                                @endif
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        @if ($editMode)
                        <form wire:submit="updateRoom">
                            <input type="hidden" name="" wire:model='id'>
                            @else
                            <form wire:submit="saveRoom">
                                @endif
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="room_id">Room ID</label>
                                        {{-- <input type="text" class="form-control" id="room_id" wire:model='room_id'
                                            placeholder="Enter Room ID" value="{{$autoRoomId}}"> --}}
                                        <h2>{{$autoRoomId}}</h2>
                                        <div>
                                            @error('room_id') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    {{-- {{dd($autoRoomId)}} --}}
                                    <div class="form-group">
                                        <label for="room_name">Room Name</label>
                                        <input type="text" class="form-control" id="room_name" wire:model='room_name'
                                            placeholder="Enter Room Name">
                                        <div>
                                            @error('room_name') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="room_price">Room Price(Per Month)</label>
                                        <input type="text" class="form-control" id="room_price" wire:model='room_price'
                                            placeholder="Enter Room Price">
                                        <div>
                                            @error('room_price') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="room_details">Room Details</label>
                                        {{-- <textarea id="summernote" placeholder="Enput Room Details"
                                            wire:model="room_details_hdn">{{ $room_details_hdn }}
                                        </textarea> --}}



                                        {{-- <input type="hidden" class="form-control" wire:model='room_details_hdn'
                                            id="room_details_hdn"> --}}
                                        <textarea type="text" wire:model="room_details_hdn"
                                            class="form-control">{{ $room_details_hdn }}</textarea>
                                        <div>
                                            @error('room_details') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>


                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="status" value="1"
                                            wire:model='status' checked>
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
    <script src="{{asset('backend/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <script>
        // Your JS here.
    // $('body').addClass('sidebar-collapse')
        // Summernote
    $('#summernote').summernote();


    $('.note-editable').on('keyup',function(){
        const noteValue =  $('.note-editable').html();
        // $('.note-editable').attr('wire:model','room_details_hdn')
        $('#summernote').text(noteValue)
        // console.log(noteValue)
    })

    </script>

    @endpush
</div>