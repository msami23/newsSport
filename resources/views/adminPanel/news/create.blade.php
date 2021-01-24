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
                        <a href="{{route('front.news')}}">
                            الاقسام الرئيسية
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
                        <h2>Basic Form Controls</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{route('front.news.store')}}" method="POST"  enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Title</label>
                                <input type="text" class="form-control" name="title" id="name" placeholder="title">
                                @error('title')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlPassword">description</label>
                                <input type="text"  name="description" class="form-control" id="text" placeholder="description">

                                @error('description')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlPassword">topic</label>
                                <input type="text"  name="topic" class="form-control" id="text" placeholder="topic">

                                @error('topic')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlFile1">image</label>
                                <input type="file" name="image" class="form-control-file" id="file">

                                @error('image')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Category_id</label>
                                <select type="text" name="category_id" class="form-control-file" id="category_id">
                                    <optgroup label="">
                                            @foreach($categories as $category)

                                        <option  value="{{$category -> id}}">{{$category -> name}}</option>
                                            @endforeach
                                    </optgroup>

                                </select>
                                @error('category_id')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-footer pt-4 pt-5 mt-4 border-top">
                                <button type="submit" class="btn btn-primary btn-default">Submit</button>
                                <button type="submit" class="btn btn-secondary btn-default">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
@stop
