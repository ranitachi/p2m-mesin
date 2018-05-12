<!DOCTYPE html>
<html lang="en">
    <head>                        
        <title>P2M Departemen Teknik Mesin FT-UI :: Login</title>            
        
        <!-- META SECTION -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <!-- END META SECTION -->
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" href="{{asset('build/css/styles.css')}}">
        <!-- EOF CSS INCLUDE -->
    </head>
    <body>        
        
        <!-- APP WRAPPER -->
        <div class="app">

            <!-- START APP CONTAINER -->
            <div class="app-container">
                
                <div class="app-login-box">                                        
                    <div class="app-login-box-user"><img src="{{asset('img/logo.jpeg')}}" alt="John Doe"></div>
                    <div class="app-login-box-title">
                        <div class="title">Silahkan Login Terlebih Dahulu</div>
                    </div>
                    <div class="app-login-box-container">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-12 control-label">E-Mail Address</label>

                            <div class="col-md-12">
                                <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-12 control-label">Password</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                               
                            </div>
                        </div>
                    </form>
               </div>
                    <div class="app-login-box-footer">
                        &copy; P2M - Departemen Teknik Mesin<br>
                        Fakultas Teknik Universitas Indonesia
                    </div>
                </div>
                                
            </div>
            <!-- END APP CONTAINER -->
           
        </div>        
        <!-- END APP WRAPPER -->                
        
        <!--
        <div class="modal fade" id="modal-thanks" tabindex="-1" role="dialog">                        
            <div class="modal-dialog modal-sm" role="document">                    
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="icon-cross"></span></button>
                <div class="modal-content">                    
                    <div class="modal-body">                
                        <p class="text-center margin-bottom-20">
                            <img src="assets/images/smile.png" alt="Thank you" style="width: 100px;">
                        </p>                
                        <h3 id="modal-thanks-heading" class="text-uppercase text-bold text-lg heading-line-below heading-line-below-short text-center"></h3>
                        <p class="text-muted text-center margin-bottom-10">Thank you so much for likes</p>
                        <p class="text-muted text-center">We will do our best to make<br> Boooya template perfect</p>                
                        <p class="text-center"><button class="btn btn-success btn-clean" data-dismiss="modal">Continue</button></p>
                    </div>                    
                </div>
            </div>            
        </div>-->
        
        <!-- IMPORTANT SCRIPTS -->
        <script type="text/javascript" src="{{asset('build/js/vendor/jquery/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('build/js/vendor/jquery/jquery-migrate.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('build/js/vendor/jquery/jquery-ui.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('build/js/vendor/bootstrap/bootstrap.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('build/js/vendor/moment/moment.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('build/js/vendor/customscrollbar/jquery.mCustomScrollbar.min.js')}}"></script>
        <!-- END IMPORTANT SCRIPTS -->
        <!-- APP SCRIPTS -->
        <script type="text/javascript" src="{{asset('build/js/app.js')}}"></script>
        <script type="text/javascript" src="{{asset('build/js/app_plugins.js')}}"></script>
        <script type="text/javascript" src="{{asset('build/js/app_demo.js')}}"></script>
        <!-- END APP SCRIPTS -->
    </body>
</html>