@extends('layouts.app');

@section('content')
<div class="row ">
    <div class="col-lg-6 mx-auto">
        <div class="card-body bg-light">
            <div class="container">
                <form action="/kreteria/{{$kreteria->id}}" method="POST">
                    @csrf
                    @method('put')
                    <div class="controls">
                        <div class="form-group">
                            <label for="nama">Kreteria *</label>
                            <input id="nama" type="text" name="nama" class="form-control"
                                placeholder="Please enter Name Kreteria" value="{{$kreteria->nama}}" required="required"
                                >
                        </div>
                        <div class="form-group">
                            <label for="bobot">Bobot *</label>
                            <input id="bobot" type="text" name="bobot" value="{{$kreteria->bobot}}" class="form-control"
                                placeholder="Please enter Bobot Kreteria" required="required"
                                >
                        </div>
                        <div class="form-group">
                            <label for="lebel">Please specify your need *</label>
                            <select id="lebel" name="label" class="form-control" required="required"
                                data-error="Please specify your need.">
                                {{-- <option value=""  selected disabled>--Select Label--</option> --}}
                                <option value="min" @if($kreteria->label == "min") selected @endif>Min</option>
                                <option value="max" @if($kreteria->label == "max") selected @endif>Max</option>
                            </select>

                        </div>
                    </div>

                    <div class="col-md-12">

                        <button type="submit" class="btn btn-success btn-send  pt-2 btn-block" value="save" name="submit">
                            tambah data
                        </button>
                    </div>

            </div>
            </form>
            </div>
        </div>


    </div>
    <!-- /.8 -->


@endsection
