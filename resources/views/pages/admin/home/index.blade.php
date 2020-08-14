@extends('layouts.admin')

@section('title','Halaman Admin')

@section('content')
<div class="wrapper">
    
  
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Home</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
  
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
        <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
  
                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
  
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                      @if (session()->has('pesan'))
                          <div class="alert alert-success">
                              {{ session()->get('pesan') }}
                          </div>
                      @endif
                      <a href="{{ route('home.create') }}" class="btn btn-primary">Tambah Data</a>
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Banner</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($homes as $home)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $home->title }}</td>
                                <td>
                                    <img src="{{ Storage::url($home->banner) }}" alt="gambar" style="width: 50px">
                                </td>
                                <td>
                                  <a href="{{ route('home.edit', $home->id) }}" class="btn btn-info">Edit</a>

                                  <form action="{{ route('home.destroy', $home->id) }}" method="POST">
                                  @method('DELETE')
                                  @csrf
                                  <button type="submit" class="btn btn-danger">Hapus</button>
                                  </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
  
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
@endsection