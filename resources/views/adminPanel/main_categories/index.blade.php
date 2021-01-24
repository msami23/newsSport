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
                    <li class="breadcrumb-item" aria-current="page">الاقسام الرئيسية</li>
                </ol>
            </nav>

        </div>
        @include('adminPanel.alerts.success')
        @include('adminPanel.alerts.errors')

        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>جميع الاقسام الرئيسية </h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">القسم </th>
                                <th scope="col"> اللغة</th>
                                <th scope="col">الحالة</th>
                                <th scope="col">صوره القسم</th>
                                <th scope="col">الإجراءات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @isset($categories)
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$category -> name}}</td>
                                        <td>{{get_default_lang()}}</td>
                                        <td>{{$category -> getActive()}}</td>
                                        <td> <img style="width: 150px; height: 100px;" src="{{$category ->photo}}"></td>
                                        <td>
                                            <div class="btn-group" role="group"
                                                 aria-label="Basic example">
                                                <a href="{{route('admin.main_categories.edit',$category -> id)}}"
                                                   class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">تعديل</a>


                                                <a href=""
                                                   class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">حذف</a>


                                                <a href=""
                                                   class="btn btn-outline-success btn-min-width box-shadow-3 mr-1 mb-1">تفعيل</a>


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
