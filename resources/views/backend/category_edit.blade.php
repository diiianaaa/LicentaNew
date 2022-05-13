@extends('admin.admin_master')
@section('admin')


<!-- Contect Wrapper -->

<div class="container-full">

    <!-- //Content Header (Page Header) -->


    <!-- Main Content -->
    <section class="content">
        <div class="row">

     


            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Category </h3>
                    </div>
                    <div class="box-body">

                    <div class="table-responsive">

                    </div>
                </div>
            </div>

            <form method="post" action="{{ route('category.update',$category->id) }}" >
           

            @csrf

            <input type="hidden" name="id" value="{{ $category->id }}">

            <div class="form-group">
                <h5>Category  English  <span class="text-danger">*</span>  </h5>
                <div class="controls">
                    <input type="text" name="category_name_en" class="form-control" value="{{ $category->category_name_en }}">
                    @error('category_name_en')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>



            <div class="form-group">
                <h5>Category  German <span class="text-danger">*</span>  </h5>
                <div class="controls">
                    <input type="text" name="category_name_ger" class="form-control" value="{{ $category->category_name_ger }}">
                    @error('category_name_ger')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>



           

            <div class="text-xs-right">
                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">

            </div>

            </form>
    </section>


@endsection

