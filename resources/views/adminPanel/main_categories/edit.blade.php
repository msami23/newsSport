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
                        <h2>إضافة قسم رئيسي</h2>
                    </div>
                    <div class="card-body">
                        <form  action="{{route('admin.main_categories.update',$mainCategories -> id)}}"  method="POST"
                               enctype="multipart/form-data">
                            <div class="form-group">
                                @csrf
                                        <label for="exampleFormControlInput1">   اسم القسم
                                            - {{__('messages.'.$mainCategories -> translation_lang)}} </label>
                                        <input type="text" class="form-control" value="{{$mainCategories -> name}}"  id="name" placeholder="name" name="category[0][name]">
                                        @error("category.0.name")
                                        <span class="text-danger"> هذا الحقل مطلوب</span>
                                        @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlPassword"> أختصار
                                    اللغة {{__('messages.'.$mainCategories -> translation_lang)}} </label>
                                <input type="text" value="{{$mainCategories -> translation_lang}}" class="form-control" id="abbr" placeholder=""  name="category[0][abbr]">

                                @error("category.0.abbr")
                                <span class="text-danger"> هذا الحقل مطلوب</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="form-group mt-1">
                                    <input type="checkbox"  value="1" name="category[0][active]"
                                           id="switcheryColor4"
                                           class="switchery" data-color="success"
                                           @if($mainCategories -> active == 1)checked @endif/>
                                    <label for="switcheryColor4"
                                           class="card-title ml-1">الحالة {{__('messages.'.$mainCategories -> translation_lang)}} </label>
                                    @error("category.0.active")
                                    <span class="text-danger"> </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">image</label>
                                <input type="file" class="form-control-file" name="photo" id="exampleFormControlFile1">
                                @error('photo')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            @endforeach
                            @endif
                            <div class="form-footer pt-4 pt-5 mt-4 border-top">
                                <button type="submit" class="btn btn-primary btn-default">Submit</button>
                                <button type="submit" class="btn btn-secondary btn-default">Cancel</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
