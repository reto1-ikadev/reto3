@extends('layouts.auth')

@section('content')
    <div id="main-wrapper" class="container ">
        <div class="row justify-content-center ">
            <div class="col-xl-10">
                <div class="card border-0">
                    <div class="card-body p-0">
                        <div class="row no-gutters">
                              <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="mb-5">
                                        <h3 class="h4 font-weight-bold text-theme">Login</h3>
                                    </div>
                                    <form>
                                        <div class="form-group"><label for="exampleInputEmail1">Correo</label><input id="exampleInputEmail1" class="form-control" type="email" required /></div>
                                        <div class="form-group mb-5"><label for="exampleInputPassword1">Contraseña</label><input id="exampleInputPassword1" class="form-control" type="password" required/></div><button class="btn btn-theme" type="submit">Acceder</button> &nbsp;<a class="forgot-link float-right text-primary" href="#l">Olvidaste la Contraseña?</a>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-6  d-lg-inline-block ">
                                <div class="account-block rounded-right d-flex align-items-center justify-content-center" style="border-top-right-radius: 0.36rem; border-bottom-right-radius:0.36rem; " >
                                    <div class="account-testimonial d-none d-lg-block ">
                                        <img src="{{asset('images/logo.svg')}}" alt="" class="w-75 h-50">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               </div>
        </div>
    </div>
@endsection
