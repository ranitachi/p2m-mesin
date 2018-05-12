<div class="app-header app-header-design-default">
                        <ul class="app-header-buttons">
                            <li class="visible-mobile"><a href="#" class="btn btn-link btn-icon" data-sidebar-toggle=".app-sidebar.dir-left"><span class="icon-menu"></span></a></li>
                            <li class="hidden-mobile"><a href="#" class="btn btn-link btn-icon" data-sidebar-minimize=".app-sidebar.dir-left"><span class="icon-menu"></span></a></li>
                        </ul>
                        <form class="app-header-search" action="" method="post">        
                            <input type="text" name="keyword" placeholder="Search">
                        </form>    
                        @php
                        if(Auth::check())
                        {
                            $id=Auth::user()->id;
                            if(Auth::user()->pegawai_id!=0)
                            {
                                $peg=\App\Model\Masterpegawai::find(Auth::user()->pegawai_id);
                                $nama=$peg->nama;
                            }
                            elseif(Auth::user()->instruktur_id!=0)
                            {
                                $ins=\App\Model\Masterinstruktur::find(Auth::user()->instruktur_id);
                                $nama=$ins->nama;
                            }
                            elseif(Auth::user()->direktur_id!=0)
                            {
                                $dir=\App\Model\Direktur::find(Auth::user()->direktur_id);
                                $nama=$dir->nama;
                            }
                            else
                                $nama=Auth::user()->name;
                        }
                        else
                        {
                            $id=-1;
                            $nama='';
                        }
                        @endphp
                        <ul class="app-header-buttons pull-right">
                            <li>
                                <div class="contact contact-rounded contact-bordered contact-lg contact-ps-controls">
                                    <img src="{{asset('build/assets/images/users/user_1.jpg')}}" alt="John Doe">
                                    <div class="contact-container">
                                        <a href="#">Selamat Datang</a>
                                        <span>{{$nama}}</span>
                                    </div>
                                    <div class="contact-controls">
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-default btn-icon" data-toggle="dropdown"><span class="icon-cog"></span></button>                        
                                            <ul class="dropdown-menu dropdown-left">
                                                {{-- <li><a href="{{url('user/'.Auth::user()->id)}}"><span class="icon-user"></span> Update Profil</a></li>  --}}
                                                <li><a href="{{url('edit-profil/'.$id)}}"><span class="icon-user"></span> Update Profil</a></li> 
                                                <li class="divider"></li>
                                                <li><a href="{{url('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span class="icon-exit"></span> Log Out</a></li> 
                                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>
                                            </ul>
                                        </div>                    
                                    </div>
                                </div>
                            </li>        
                        </ul>
                    </div>