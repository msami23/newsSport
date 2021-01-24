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
                    <li class="breadcrumb-item" aria-current="page">Languages</li>
                </ol>
            </nav>

        </div>
        @include('adminPanel.alerts.success')
        @include('adminPanel.alerts.errors')

        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>All Website Languages</h2>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">name</th>
                                <th scope="col">abbreviation</th>
                                <th scope="col">direction</th>
                                <th scope="col">procedure</th>
                            </tr>
                            </thead>
                            <tbody>
                            @isset($languages)
                                @foreach($languages as $language)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$language->name}}</td>
                                        <td>{{$language->abbr}}</td>
                                        <td>{{$language->direction}}</td>
                                        <td>{{$language -> getActive()}}</td>
                                        <td>
                                            <div class="btn-group" role="group"
                                                 aria-label="Basic example">
                                                <a href="{{route('admin.languages.edit',$language -> id)}}"
                                                   class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">تعديل</a>
                                                <a href="{{route('admin.languages.delete',$language -> id)}}"
                                                   class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">حذف</a>
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
