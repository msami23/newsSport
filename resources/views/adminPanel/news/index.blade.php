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
                    <li class="breadcrumb-item" aria-current="page">News</li>
                </ol>
            </nav>

        </div>
        @include('adminPanel.alerts.success')
        @include('adminPanel.alerts.errors')

        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>All News</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">title </th>
                                <th scope="col"> description</th>
                                <th scope="col">category_id </th>
                                <th scope="col">image</th>
                                <th scope="col">Procedure</th>
                            </tr>
                            </thead>
                            <tbody>
                            @isset($news)
                                @foreach($news as $new)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$new -> title}}</td>
                                        <td>{{$new -> description}}</td>
                                        <td>{{$new-> category -> name}}</td>

                                        <td> <img style="width: 150px; height: 100px;" src="{{$new-> image}}"></td>
                                        <td>
                                            <div class="btn-group" role="group"
                                                 aria-label="Basic example">
                                                <a href="{{route('front.news.edit',$new -> id)}}"
                                                   class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">update</a>


                                                <a href="{{route('front.news.delete',$new -> id)}}"
                                                   class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">delete</a>

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endisset

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

