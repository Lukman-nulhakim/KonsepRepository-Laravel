@extends('layouts.admin')

@section('title','Halaman Admin')

<style>
    ul li{
        list-style: none;
        margin: 10px 0px 10px 10px;
        /border-bottom: 1px solid black;/
    }
    #submit-submit{
        display: none;
    }
</style>
@section('content')
    <div class="wrapper">
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-12 col-md-12">
                            <h1>contact Detail</h1>
                        </div>
                        <div class="col-sm-12 col-md-12">
                        </div>
                    </div>
                </div>
            </section>
            <section class="content">
                <div class="container-fluid">
                    <div class="container-fluid">
                        @if(session()->has('error'))
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                <strong>Failed! </strong> {{ session()->get('error') }}
                            </div>
                        @elseif(session()->has('success'))
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                <strong>Success! </strong> {{ session()->get('success') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-12 col-md-10">
                                <div  class="card card-body">
                                    <div class="card-title">
                                        contact Detail
                                    </div>
                                        <form action="{{ route('contact.update', $contact->id) }}" method="POST">
                                            @method('PUT')
                                            @csrf
                                            <div class="input-group my-3">
                                                <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon3">
                                                <span class="fa fa-user"></span>
                                                    &nbsp;
                                                    NAME
                                                </span>
                                                </div>
                                                <input type="text" class="form-control input-disable" name="full_name" value="{{ $contact->full_name }}" id="contact-name" aria-describedby="basic-addon3" required disabled>
                                            </div>
                                            <div class="input-group my-3">
                                                <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon3">
                                                <span class="fa fa-phone"></span>
                                                    &nbsp;
                                                    PHONE
                                                </span>
                                                </div>
                                                <input type="text" class="form-control input-disable" name="phone" value="{{ $contact->phone }}" id="contact-phone" aria-describedby="basic-addon3" required disabled>
                                            </div>
                                                <div class="input-group my-3">
                                                <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon3">
                                                <span class="fa fa-envelope"></span>
                                                    &nbsp;
                                                    EMAIL
                                                </span>
                                                </div>
                                                <input type="email" class="form-control input-disable" name="email" value="{{ $contact->email }}" id="contact-email" aria-describedby="basic-addon3" required disabled>
                                            </div>
                                            <button type="submit" class="btn btn-success mt-3" id="submit-submit">
                                                UPDATE
                                            </button>
                                        </form>
                                </div>
                            </div>
                            <div class="col-12 col-md-2">
                                <div class="card card-body">
                                    <button  id="edit-button" type="button" class="btn btn-primary">
                                        <span class="fa fa-pencil"></span>
                                        &nbsp;
                                        Edit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>

    <script>
        $('#edit-button').click(function(){
            $('.input-disable').prop('disabled',false);
            $('#submit-submit').css('display', 'block');
        });
    </script>
@endsection