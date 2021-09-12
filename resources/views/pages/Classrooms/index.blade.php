@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('main_trans.classrooms') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('main_trans.classrooms') }} </h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.home') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('main_trans.classrooms') }}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                    {{ trans('classrooms.add_class') }}
                </button>
                <button type="button" class="button x-small" id="btn_delete_all">
                    {{ trans('classrooms.delete_selected') }}
                </button>
                <br><br>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">
                        <thead>
                            <tr>
                                <th><input type="checkbox" name="selectAll" onclick="CheckAll('box1',this)"></th>
                                <th>#</th>
                                <th>{{ trans('classrooms.name_class') }}</th>
                                <th>{{ trans('classrooms.name_grade') }}</th>
                                <th>{{ trans('classrooms.processes') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($classrooms as $classroom)
                                <tr>
                                    <th><input type="checkbox" value="{{ $classroom->id }}" class="box1"></th>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $classroom->Name }}</td>
                                    <td>{{ $classroom->Grades->Name }}</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#edit{{ $classroom->id }}"
                                            title="{{ trans('classrooms.edit_class') }}">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete{{ $classroom->id }}"
                                            title="{{ trans('classrooms.delete_class') }}">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                    <!-- edit_modal_Classroom -->
                                    <div class="modal fade" id="edit{{ $classroom->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                        id="exampleModalLabel">
                                                        {{ trans('classrooms.edit_class') }}
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- add_form -->
                                                    <form action="{{ route('classroom.update', 'test') }}"
                                                        method="post">
                                                        {{ method_field('patch') }}
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col">
                                                                <label for="Name"
                                                                    class="mr-sm-2">{{ trans('classrooms.name_class') }}
                                                                    :</label>
                                                                <input id="Name" type="text" name="Name"
                                                                    class="form-control"
                                                                    value="{{ $classroom->getTranslation('Name', 'ar') }}"
                                                                    required>
                                                                <input id="id" type="hidden" name="id"
                                                                    class="form-control"
                                                                    value="{{ $classroom->id }}">
                                                            </div>
                                                            <div class="col">
                                                                <label for="Name_en"
                                                                    class="mr-sm-2">{{ trans('classrooms.name_class_en') }}
                                                                    :</label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ $classroom->getTranslation('Name', 'en') }}"
                                                                    name="Name_en" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label
                                                                for="exampleFormControlTextarea1">{{ trans('classrooms.name_grade') }}
                                                                :</label>
                                                            <select class="form-control form-control-lg"
                                                                name="Grade_id">
                                                                <option value="{{ $classroom->Grades->id }}">
                                                                    {{ $classroom->Grades->Name }}
                                                                </option>
                                                                @foreach ($grades as $grade)
                                                                    <option value="{{ $grade->id }}">
                                                                        {{ $grade->Name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <br><br>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">{{ trans('classrooms.close') }}</button>
                                                            <button type="submit"
                                                                class="btn btn-success">{{ trans('classrooms.save') }}</button>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- delete_modal_Classroom -->
                                    <div class="modal fade" id="delete{{ $classroom->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                        id="exampleModalLabel">
                                                        {{ trans('classrooms.delete_grade') }}
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('classroom.destroy', 'test') }}"
                                                        method="post">
                                                        {{ method_field('Delete') }}
                                                        @csrf
                                                        {{ trans('classrooms.warning_grade') }}
                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                            value="{{ $classroom->id }}">
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">{{ trans('classrooms.close') }}</button>
                                                            <button type="submit"
                                                                class="btn btn-danger">{{ trans('classrooms.delete') }}</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- add_modal_Grade -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                        {{ trans('classrooms.add_class') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- add_form -->
                    <form action="{{ route('classroom.store') }}" method="POST">

                        @csrf
                        <div class="card-body">
                            <div class="repeater">
                                <div data-repeater-list="List_Classrooms">
                                    <div data-repeater-item>
                                        <div class="row">
                                            <div class="form-group col">
                                                <label for="Name"
                                                    class="mr-sm-2">{{ trans('classrooms.name_class') }}
                                                    :</label>
                                                <input type="text" name="Name" class="form-control">
                                            </div>
                                            <div class="form-group col">
                                                <label for="Name_en"
                                                    class="mr-sm-2">{{ trans('classrooms.name_class_en') }}
                                                    :</label>
                                                <input type="text" class="form-control" name="Name_en">
                                            </div>
                                            <div class="form-group col">
                                                <label
                                                    for="exampleFormControlTextarea1">{{ trans('classrooms.name_grade') }}
                                                    :</label>
                                                <div class="box">
                                                    <select name="Grade_id" class="fancyselect">
                                                        @foreach ($grades as $grade)
                                                            <option value="{{ $grade->id }}">{{ $grade->Name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group col-3">
                                                <label for="processes"
                                                    class="mr-sm-2">{{ trans('classrooms.processes') }}
                                                    :</label>
                                                <input class="btn btn-danger btn-block" data-repeater-delete
                                                    type="button" value="{{ trans('classrooms.delete_row') }}"
                                                    style="height: 50px" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-20">
                                    <div class="col-12">
                                        <input class="button" data-repeater-create type="button"
                                            value="{{ trans('classrooms.add_row') }}" />
                                    </div>

                                </div>
                                <br>
                                <br>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">{{ trans('classrooms.close') }}</button>
                                    <button type="submit"
                                        class="btn btn-success">{{ trans('classrooms.submit') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="delete_all" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                        {{ trans('classrooms.delete_class') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ route('delete_all') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        {{ trans('classrooms.warning_grade') }}
                        <input class="text" type="text" id="delete_all_id" name="delete_all_id" value=''>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ trans('classrooms.close') }}</button>
                        <button type="submit" class="btn btn-danger">{{ trans('classrooms.submit') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render
<script>
    function CheckAll(ClassName, elem) {
        var elements = document.getElementsByClassName(ClassName);
        var l = elements.length;

        if (elem.checked) {
            for (let index = 0; index < l; index++) {
                elements[index].checked = true;

            }
        } else {
            for (let index = 0; index < l; index++) {
                elements[index].checked = false;

            }
        }
    }
    $(function() {
        $("#btn_delete_all").click(function() {
            var selected = new Array();
            $("#datatable input[type=checkbox]:checked").each(function() {
                selected.push(this.value);
            });

            if (selected.length > 0) {
                $("#delete_all").modal('show');
                $("input[id='delete_all_id']").val(selected);
            }
        });
    });
</script>
@endsection
