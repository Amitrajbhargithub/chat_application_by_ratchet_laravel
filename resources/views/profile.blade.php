@extends('main')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@section('content')
    <style>
        .container{
            height: 100%;
            align-content: center;
        }
        .image_outer_container{
            margin-top: auto;
            margin-bottom: auto;
            border-radius: 50%;
            position: relative;
        }
        .image_inner_container img{
            height: 200px;
            width: 200px;
            border-radius: 50%;
            border: 5px solid white;
        }
    </style>
    <div class="row">
        <div class="container">
            <section class="our_missions">
                <div class="container mission_row">
                    <div class="row box">
                        <div class="card card_menu miss">
                            <div class="card-body name_image">
                                <div class="container">
                                    @if(Session('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{ Session('success') }}<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif
                                    <div class="d-flex justify-content-center h-100">
                                        <div class="image_outer_container">
                                            <div class="image_inner_container">
                                                <img id="file-preview" @if(!empty(Auth::user()->user_image))  src="{{ asset('images/'.Auth::user()->user_image) }}" @else src="https://i.pinimg.com/originals/43/96/61/439661dcc0d410d476d6d421b1812540.jpg" @endif>
                                            </div>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
                                                        <div class="panel panel-info">
                                                            <div class="panel-heading">
                                                                <h3 class="panel-title">Sheena Shrestha</h3>
                                                            </div>
                                                            <div class="panel-body">
                                                                <div class="row">
                                                                    <div class="col-md-12 col-lg-12"> 
                                                                        <form action="{{ route('update-profile') }}" method="post" enctype="multipart/form-data">@csrf
                                                                            <div class="row">
                                                                                <div class="col-6">
                                                                                    <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control w-100" placeholder="Name">
                                                                                </div>
                                                                                <div class="col-6">
                                                                                    <input type="email" name="email" value="{{ Auth::user()->email }}" class="form-control w-100" placeholder="Email">
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mt-2">
                                                                                <div class="col-6">
                                                                                    <input type="password" name="password" class="form-control w-100" placeholder="password">
                                                                                </div>
                                                                                <div class="col-6">
                                                                                    <input type="file" name="user_image" value="{{ Auth::user()->email }}" onchange="loadFile(event)" class="form-control" />
                                                                                </div>
                                                                            </div><br>
                                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>    
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>   
                            </div>
                        </div>
                    </div>
                </div>              
            </section>
        </div>
    </div>
    @include('footer')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        var loadFile = function(event) {
          var output = document.getElementById('file-preview');
          output.src = URL.createObjectURL(event.target.files[0]);
          output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
          }
        };
    </script>
    <script>
        $(document).ready(function(){
            $('.alert').alert();
        });
    </script>
@endsection