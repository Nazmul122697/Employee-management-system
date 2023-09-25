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
                <!-- /.col -->
                <div class="col-md-12">
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
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="room_id">Room Name</label>
                                                <select wire:model="room_id" id="room_id" class="form-control">
                                                    <option value="" selected>Select Room Name</option>
                                                    @foreach ($rooms as $room)
                                                    <option value="{{$room->room_id}}"
                                                        wire:click='roomPrice({{$room->room_id}})'>{{$room->room_name}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="room_price">Room Price(Per Month)</label>
                                                <input type="text" class="form-control" id="room_price"
                                                    wire:model='room_price' placeholder="Enter Room Price" readonly>
                                                <div>
                                                    @error('room_price') <span class="error">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                Bharatiya Information
                                            </h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="main_person">Main Person</label>
                                                        <input type="text" class="form-control" id="main_person"
                                                            wire:model='main_person' placeholder="Enter Person Name">
                                                        <div>
                                                            @error('main_person') <span class="error">{{ $message
                                                                }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="main_person_mob">Mobile Number</label>
                                                        <input type="text" class="form-control" id="main_person_mob"
                                                            wire:model='main_person_mob' placeholder="Enter Mobile Number">
                                                        <div>
                                                            @error('main_person_mob ') <span class="error">{{ $message
                                                                }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
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


</div>