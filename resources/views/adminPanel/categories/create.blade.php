@extends('adminPanel.index')
@section('content')
    <div class="content">
        <div class="breadcrumb-wrapper">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0">
                    <li class="breadcrumb-item">
                        <span class="mdi mdi-home"></span>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{route('admin.dashboard')}}">
                            Dashboard
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{route('admin.languages')}}">
                            Categories
                        </a>
                    </li>
                </ol>
            </nav>

        </div>
        @include('adminPanel.alerts.success')
        @include('adminPanel.alerts.errors')
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Categories data</h2>
                    </div>
                    <div class="card-body">
                        <form method ="post" action="{{route('front.categories.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Categories</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="add name">
                                @error('name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1"> Description</label>
                                <input type="text" name="description" class="form-control" id="name" placeholder="add Abbreviation Language">
                                @error('description')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="form-group mt-1">
                                    <input type="checkbox"  value="1" name="active"
                                           id="switcheryColor4"
                                           class="switchery" data-color="success"
                                           checked/>
                                    <label for="switcheryColor4"
                                           class="card-title ml-1">Status </label>
                                    @error('active')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-footer pt-4 pt-5 mt-4 border-top">
                                <button type="submit" class="btn btn-primary btn-default">Save</button>
                                <button type="submit" class="btn btn-secondary btn-default">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

@stop
