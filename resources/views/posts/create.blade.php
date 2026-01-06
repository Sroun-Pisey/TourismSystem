@extends('layouts.app')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="content-wrapper"style="margin-top: 40px;">
    <div class="container" style="margin-left: 30px;">
        <!-- Content Header (Page header) -->
        <section class="content">
            <!-- Basic Forms -->
            <div class="box">
                <h3 style="margin-left: -30px">Create New Post</h3>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="row"><!-- 2st Row Start -->
                                        <div class="col-md-12">
                                            <!-- Customer -->
                                            <div class="mb-3">
                                                <label for="customer_id" class="form-label">Customer</label>
                                                <select name="customer_id" id="customer_id" class="form-select" required>
                                                    <option value="">-- Select Customer --</option>
                                                    @foreach($customers as $customer)
                                                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div><!-- End Col-md-4 -->


                                        <div class="col-md-12">
                                            <!-- Category -->
                                            <div class="mb-3">
                                                <label for="category_id" class="form-label">Category</label>
                                                <select name="category_id" id="category_id" class="form-select" required>
                                                    <option value="">-- Select Category --</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div><!-- End Col-md-4 -->

                                        <div class="col-md-12">
                                           <!-- Title -->
                                            <div class="mb-3">
                                                <label for="title" class="form-label">Post Title</label>
                                                <input type="text" name="title" class="form-control" id="title" required>
                                            </div>
                                        </div><!-- End Col-md-4 -->

                                        <div class="col-md-12">
                                           <!-- Content -->
                                            <div class="mb-3">
                                                <label for="content" class="form-label">Post Content</label>
                                                <textarea name="content" id="content" class="form-control" rows="5" required></textarea>
                                            </div>
                                        </div><!-- End Col-md-4 -->


                                        <div class="col-md-12">
                                             <!-- Feather Image -->
                                            <div class="mb-3">
                                                <label for="feather_image" class="form-label">Feather Image</label>
                                                <input type="file" name="feather_image" class="form-control" id="image">
                                            </div>
                                        </div><!-- End Col-md-4 -->


                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <img id="showImage" src="{{ url('img/no_image.jpg') }}" style="width: 100px; width: 100px; border: 1px solid #000000;">
                                                </div>
                                            </div>
                                        </div><!-- End Col-md-4 -->

                                    </div><!-- End 1 Row -->


                                    <!-- Status -->
                                    <div class="mb-3 form-check">
                                        <input type="checkbox" name="status" class="form-check-input" id="status" checked>
                                        <label class="form-check-label" for="status">Published</label>
                                    </div>

                                    <!-- Submit -->
                                    <button type="submit" class="btn btn-primary">Create Post</button>
                                    <a href="{{ route('posts.index') }}" class="btn btn-secondary">Cancel</a>

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
