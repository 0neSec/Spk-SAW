@extends('layouts.app')

@section('content')
    <div class="row ">
        <div class="col-lg-12 mx-auto">
            <div class="row">
                <div class="col-md-offset-2 col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col col-sm-3 col-xs-12">
                                    <h4 class="title">Data <span>List</span></h4>
                                </div>
                                <div class="col-sm-12 col-xs-12 text-right">
                                    <div class="btn_group">
                                        <button class="btn btn-default"><a href="/alternatif/tambah"> Tambah Data </a></button>
                                        <input type="text" class="form-control" placeholder="Search">
                                        <button class="btn btn-default" title="Reload"><i
                                                class="fa fa-sync-alt"></i></button>
                                        <button class="btn btn-default" title="Pdf"><i
                                                class="fa fa-file-pdf"></i></button>
                                        <button class="btn btn-default" title="Excel"><i
                                                class="fas fa-file-excel"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama alternatif</th>
                                        <th>Image</th>
                                        {{-- <th>deskripsi</th> --}}
                                        <th>harga</th>
                                        <th>kualita</th>
                                        <th>berat</th>
                                        <th>iso</th>
                                        <th>resolusi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($alternatif as  $name_column)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $name_column->nama }}</td>
                                        <td>{{ $name_column->image }}</td>
                                        {{-- <td>{{ $name_column->deskripsi }}</td> --}}
                                        <td>{{ $name_column->harga }}</td>
                                        <td>{{ $name_column->kualitas }}</td>
                                        <td>{{ $name_column->berat }}</td>
                                        <td>{{ $name_column->iso }}</td>
                                        <td>{{ $name_column->resolusi }}</td>

                                        <td>
                                            @csrf
                                            <ul class="action-list">
                                                <li><a href="/alternatif/{{$name_column->id}}/edit" data-tip="edit"><i class="fa fa-edit"></i></a></li>
                                                <form action="/alternatif/{{$name_column->id}}/delete" method="post">
                                                    @method('delete')
                                                <li><a href="/alternatif/{{$name_column->id}}/delete" data-tip="delete"><i class="fa fa-trash"></i></a></li>
                                            </form>
                                            </ul>
                                        </td>
                                        </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.8 -->
@endsection
