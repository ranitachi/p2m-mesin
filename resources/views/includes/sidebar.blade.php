@php
    $path=Request::path();
@endphp
             <div class="app-sidebar app-navigation app-navigation-fixed scroll app-navigation-style-default app-navigation-open-hover dir-left" data-type="close-other" data-minimized="">
                    <a href="index.html" style="padding-left:0px;font-family:Montserrat;">
                        <div class="app-navigation-logo"><span class="mobile-hidden"></span>
                            <button class="app-navigation-logo-button mobile-hidden" data-sidepanel-toggle=".app-sidepanel"><span class="icon-alarm"></span> 
                                {{-- <span class="app-navigation-logo-button-alert">7</span> --}}
                            </button>
                        </div>
                    </a>       
                    <nav>
                        <ul>
                            <li class="title">MAIN</li>
                            <li><a href="{{url('/utama')}}"><span class="nav-icon-hexa">Br</span> Beranda</a></li>
                         @if (Auth::check())
                            @php
                                $mn=Auth::user()->hakakses;
                                $menu=explode(',',$mn);
                            @endphp      

                            @if (in_array(1,$menu) || (in_array(0,$menu)))
                            <li>
                                <a href="#"><span class="nav-icon-hexa">Mp</span> Manajemen Pelatihan</a>
                                <ul>                                
                                    <li><a href="{{url('kategori-pelatihan')}}"><span class="nav-icon-hexa">Kp</span> Kategori Pelatihan</a></li>
                                    <li><a href="{{url('pelatihan')}}"><span class="nav-icon-hexa">Jp</span> Jenis Pelatihan</a></li>
                                    <li><a href="{{url('materi')}}"><span class="nav-icon-hexa">Mp</span> Materi Pelatihan</a></li>
                                </ul>
                            </li>
                            @endif
                            @if (in_array(2,$menu) || (in_array(0,$menu)))
                            <li><a href="#"><span class="nav-icon-hexa">Mj</span> Manajemen Jadwal</a>
                                <ul>                                
                                    <li><a href="{{url('jadwal-pelatihan')}}"><span class="nav-icon-hexa">Bp</span> Batch Pelatihan</a></li>
                                    {{-- <li><a href="{{url('pelatihan')}}"><span class="nav-icon-hexa">Jp</span> Peserta Pelatihan</a></li> --}}
                                </ul>
                            </li>
                            @endif
                            @if (in_array(3,$menu) || (in_array(0,$menu)))
                            <li><a href="{{url('peserta')}}"><span class="nav-icon-hexa">Mp</span> Manajemen Peserta</a></li>
                            @endif
                            @if (in_array(4,$menu) || (in_array(0,$menu)))
                            <li><a href="{{url('user')}}"><span class="nav-icon-hexa">Mu</span> Manajemen User</a></li>
                            @endif
                            @if (in_array(5,$menu) || (in_array(0,$menu)))
                            <li>
                                <a href="#"><span class="nav-icon-hexa">Md</span> Master Data</a>
                                <ul>                                
                                    <li><a href="{{url('karyawan')}}"><span class="nav-icon-hexa">Dk</span> Data Karyawan</a></li>
                                    <li><a href="{{url('instruktur')}}"><span class="nav-icon-hexa">Di</span> Data Instruktur</a></li>                
                                    <li><a href="{{url('perusahaan')}}"><span class="nav-icon-hexa">Dp</span> Data Perusahaan </a></li>
                                    <li><a href="{{url('quisioner')}}"><span class="nav-icon-hexa">Dq</span> Data Quisioner</a></li>
                                    <li><a href="{{url('direktur')}}"><span class="nav-icon-hexa">Dr</span> Data Direktur</a></li>
                                    
                                </ul>
                            </li> 
                            @endif
                            @if (in_array(6,$menu) || (in_array(0,$menu)))
                            <li class="title">PENGATURAN</li>                
                            <li><a href="#"><span class="nav-icon-hexa">Ps</span> Pengaturan Sistem</a>
                                <ul>                                
                                    <li><a href="{{url('provinsi')}}"><span class="nav-icon-hexa">Pr</span> Data Provinsi</a></li>
                                    <li><a href="{{url('kabupatenkota')}}"><span class="nav-icon-hexa">Kb</span> Data Kabupaten/Kota</a></li>
                                    <li><a href="{{url('kecamatan')}}"><span class="nav-icon-hexa">Kc</span> Data Kecamatan</a></li>
                                    <li><a href="{{url('kelurahan')}}"><span class="nav-icon-hexa">Kl</span> Data Kelurahan</a></li>
                                </ul>
                            </li>
                           @endif
                        @endif
                        </ul>
                    </nav>
                </div>
                <!-- END SIDEBAR -->
                
                <!-- START APP CONTENT -->
                
                    <!-- END PAGE CONTAINER -->
