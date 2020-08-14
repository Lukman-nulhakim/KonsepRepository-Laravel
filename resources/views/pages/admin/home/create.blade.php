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
                  <form action="{{ route('home.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                      <div class="form-group">
                          <label for="title">Title</label>
                          <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title">
                      </div>
                      @error('title')
                          <div class="text-danger">{{ $message }}</div>
                      @enderror
                      <div class="form-group">
                          <label for="banner">banner</label>
                          <input type="file" class="form-control @error('banner') is-invalid @enderror" name="banner" id="banner">
                      </div>
                      @error('title')
                          <div class="text-danger">{{ $message }}</div>
                      @enderror
                      <button type="submit" class="btn btn-primary">Simpan</button>
                  </form>
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