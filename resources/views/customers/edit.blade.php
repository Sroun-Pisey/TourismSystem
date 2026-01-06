@extends('layouts.app')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <div class="content-wrapper"style="margin-top: 40px;">
        <div class="container" style="margin-left: 30px;">
            <!-- Content Header (Page header) -->
            <section class="content">
                <!-- Basic Forms -->
                <div class="box">
                    <h3 style="margin-left: -30px">Update Customer</h3>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form action="{{ route('customers.update',$customer->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row"><!-- 1st Row Start -->
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Full Name</label>
                                                    <input type="text" name="name" value="{{ $customer->name }}" class="form-control" required value="{{ old('name') }}">
                                                </div>
                                            </div><!-- End Col-md-6 -->


                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Email Address</label>
                                                    <input type="email" name="email" value="{{ $customer->email }}" class="form-control" required value="{{ old('email') }}">
                                                </div>
                                            </div><!-- End Col-md-6 -->

                                            <div class="col-md-6">
                                            <div class="mb-3">
                                                    <label for="phone" class="form-label">Phone (optional)</label>
                                                    <input type="text" name="phone" value="{{ $customer->phone }}" class="form-control" value="{{ old('phone') }}">
                                                </div>
                                            </div><!-- End Col-md-6 -->

                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="profile_image" class="form-label">Profile Image (optional)</label>
                                                    <input type="file" name="profile_image" class="form-control" id="image">
                                                </div>
                                            </div><!-- End Col-md-4 -->


                                            <div class="col-md-2" style="margin-top: 15px">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <img id="showImage" src="{{ !empty($customer->profile_image) ? asset('storage/' . $customer->profile_image) : asset('img/no_image.jpg') }}" style="width: 60px; width: 60px; border: 1px solid #000000; ">
                                                    </div>
                                                </div>
                                            </div><!-- End Col-md-2 -->


                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="address" class="form-label">Address (optional)</label>
                                                    <textarea name="address" class="form-control">{{ old('address',$customer->address) }}</textarea>
                                                </div>
                                            </div><!-- End Col-md-6 -->


                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="bio" class="form-label">Bio (optional)</label>
                                                    <textarea name="bio" class="form-control">{{ old('bio',$customer->bio) }}</textarea>
                                                </div>
                                            </div><!-- End Col-md-6 -->


                                            <div class="col-md-6">
                                                    <div class="mb-3" style="margin-top: 10px">
                                                        <label for="status" class="form-label">Status</label>
                                                        <select name="status" class="form-select" required>
                                                            <option value="pending" {{ old('status',$customer->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                                                            <option value="active" {{ old('status',$customer->status) == 'active' ? 'selected' : '' }}>Active</option>
                                                            <option value="banned" {{ old('status',$customer->status) == 'banned' ? 'selected' : '' }}>Banned</option>
                                                        </select>
                                                    </div>
                                            </div><!-- End Col-md-6 -->
                                        </div><!-- End 1 Row -->


                                        <button type="submit" class="btn btn-primary">Update Customer</button>
                                        <a href="{{ route('customers.index') }}" class="btn btn-secondary">Cancel</a>
                                    </div>
                                </form>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </section>
        </div>
    </div>


    <script type="text/javascript">
        $(document).ready(function(){
            $('#image').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showImage').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>


@endsection





