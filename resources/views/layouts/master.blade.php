<!DOCTYPE html>
<html lang="en">
    <head>                        
        @yield('title')           
        
        <!-- META SECTION -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <!-- END META SECTION -->
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" href="{{asset('build/css/styles.css')}}">
        <link rel="stylesheet" href="{{asset('css/font.monserat.css')}}">
        <link rel="stylesheet" href="{{asset('css/font.notosans.css')}}">
        <link rel="stylesheet" href="{{asset('css/font.roboto.css')}}">
        <!-- EOF CSS INCLUDE -->
    </head>
    <body>        
        
        <!-- APP WRAPPER -->
        <div class="app">           

            <!-- START APP CONTAINER -->
            <div class="app-container">
                <!-- START SIDEBAR -->
                
                    @include('includes.sidebar')
                   <div class="app-content app-sidebar-left">
                    @include('includes.navbar')

                    @yield('konten')
                   </div>
                   
                <!-- END APP CONTENT -->
                                
            </div>
            <!-- END APP CONTAINER -->
                        
            <!-- START APP FOOTER -->
            
            <!-- END APP FOOTER -->
            <!-- START APP SIDEPANEL -->
            @include('includes.sidepanel')
            <!-- END APP SIDEPANEL -->
            
            <!-- APP OVERLAY -->
            <div class="app-overlay"></div>
            <!-- END APP OVERLAY -->
            
        </div>  
        <div class="app-footer app-footer-default" id="footer">
            <div class="app-footer-line darken">                
                <div class="copyright wide text-right">&copy; 2018 P2M Departemen Mesin. Fakultas Teknik Universitas Indonesia</div>                
            </div>
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
        @include('includes.scripts')
    </body>
</html>
@include('includes.modal')
@yield('footscript')
<script>
    function pesanNoty(pesan,type)
    {
        noty({
                text: pesan,
                type: type,
                layout: 'topRight',
                timeout: 3000,
                animation: {
                    open: 'animated bounceIn',
                    close: 'animated fadeOut',                    
                    speed: 200
                }
            });
    }
</script>