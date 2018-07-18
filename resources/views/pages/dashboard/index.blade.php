
                    <div class="app-heading-container app-heading-bordered bottom">
                        <ul class="breadcrumb">
                            <li class="active"><a href="#">Dashboard</a></li>                                                     
                          
                        </ul>
                    </div>
                    <!-- END PAGE HEADING -->
                    
                    <!-- START PAGE CONTAINER -->
                    <div class="container">
                                                
                        <div class="row">
                            <div class="col-md-3">
                                
                                <ul class="app-feature-gallery app-feature-gallery-noshadow margin-bottom-0">
                                    <li>
                                        <!-- START WIDGET -->
                                        <div class="app-widget-tile">
                                            <div class="line">
                                                <div class="title">Jumlah Perusahaan</div>
                                                <div class="title pull-right">
                                            </div>                                        
                                            <div class="intval">{{count($perusahaan)}}</div>                                        
                                            <div class="line">
                                                <div class="subtitle pull-right text-success"> Total Data Perusahaan</div>
                                            </div>
                                        </div>                                                                        
                                        <!-- END WIDGET -->
                                    </li>

                                    
                                </ul>
                                
                            </div>
                            <div class="col-md-3">
                                
                                <ul class="app-feature-gallery app-feature-gallery-noshadow margin-bottom-0">
                                    <li>
                                        <!-- START WIDGET -->
                                        <div class="app-widget-tile">
                                            <div class="line">
                                                <div class="title">Jumlah Peserta</div>
                                            </div>
                                            <div class="intval">{{count($peserta)}}</div>
                                            <div class="line">
                                                <div class="subtitle pull-right text-success">Total Data Peserta</div>
                                            </div>
                                        </div>
                                        <!-- END WIDGET -->
                                    </li>
                                   
                                </ul>
                                                                
                            </div>
                            <div class="col-md-3">
                                
                                <ul class="app-feature-gallery app-feature-gallery-noshadow margin-bottom-0">
                                    <li>                                        
                                        <!-- START WIDGET -->
                                        <div class="app-widget-tile">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="icon icon-lg">
                                                        <span class="icon-calendar-full"></span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="line">
                                                        <div class="title">Jumlah Pelatihan</div>
                                        
                                                    </div>
                                                    <div class="intval text-left">{{count($pelatihan)}}</div>
                                                    <div class="line">
                                                        <div class="subtitle text-info">Total Data Pelatihan</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- END WIDGET -->                                        
                                    </li>
                                    
                                </ul>
                                
                            </div>
                            <div class="col-md-3">
                                
                                <ul class="app-feature-gallery app-feature-gallery-noshadow margin-bottom-0">
                                    <li>                                        
                                        <!-- START WIDGET -->
                                        <div class="app-widget-tile">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="icon icon-lg">
                                                        <span class="icon-users"></span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="line">
                                                        <div class="title">Jumlah User</div>
                                                        
                                                    </div>
                                                    <div class="intval text-left">{{count($user)}}</div>
                                                    <div class="line">
                                                        <div class="subtitle text-info">Total Data User</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END WIDGET -->                                        
                                    </li>
                                    
                                </ul>
                                
                            </div>
                        </div>
                            
                        <div class="row">
                            <div class="col-md-6">
                                
                                <!-- START PRODUCT SALES HISTORY -->
                                <div class="block block-condensed">
                                    <div class="app-heading">                                        
                                        <div class="title">
                                            <h2>Jumlah Pelaksanaan Pelatihan</h2>
                                           
                                        </div>              
                                        <div class="heading-elements">                                            
                                            <button type="button" class="btn btn-default btn-icon-fixed dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="icon-calendar-full"></span> June 13, 2016 - July 14, 2016
                                            </button>
                                            <ul class="dropdown-menu dropdown-form dropdown-left">
                                                <li>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            
                                                            <div class="form-group margin-bottom-10">
                                                                <label>From:</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-addon"><span class="icon-calendar-full"></span></div>
                                                                    <input type="text" class="form-control bs-datepicker" value="13/06/2016">
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="col-md-6">
                                                            
                                                            <div class="form-group">                                                        
                                                                <label>To:</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-addon"><span class="icon-calendar-full"></span></div>
                                                                    <input type="text" class="form-control bs-datepicker" value="13/07/2016">
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-default btn-block">Confirm</button>
                                                </li>                                                
                                            </ul>
                                        </div>
                                    </div>
                                    
                                    <div class="block-content">
                                        <div class="app-chart-wrapper app-chart-with-axis">
                                            <div id="yaxis" class="app-chart-yaxis"></div>
                                            <div class="app-chart-holder" id="dashboard-chart-line" style="height: 325px;"></div>
                                            <div id="xaxis" class="app-chart-xaxis"></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END PRODUCT SALES HISTORY -->
                                
                            </div>
                            <div class="col-md-6">
                                
                                <!-- START LATEST TRANSACTIONS -->
                                <div class="block block-condensed">
                                    <div class="app-heading">                                        
                                        <div class="title">
                                            <h2>Jadwal Pelatihan Terdekat</h2>
                                            <!-- <p>Quick information</p> -->
                                        </div>              
                                        <div class="heading-elements">
                                            
                                        </div>
                                    </div>
                                    <div class="block-content">
                                        <div class="table-responsive">
                                            <table class="table table-clean-paddings margin-bottom-0">
                                                <thead>
                                                    <tr>
                                                        <th>Waktu</th>
                                                        <th width="250">Nama Pelatihan</th>                                                    
                                                        <th width="100">Lokasi</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @php
                                                    $jadwal=\App\Model\Batchpelatihan::where('flag',1)->with('pelatihan')->orderBy('start_date','asc')->get();
                                                    // dd($jadwal);
                                                    $x=1;
                                                @endphp  
                                                @foreach ($jadwal as $k => $v)  
                                                    @php
                                                    $bln=date('n',strtotime($v->start_date));    
                                                    @endphp                             

                                                    @if ($bln>=date('n'))
                                                    
                                                    <tr>
                                                        <td>
                                                            <div class="">
                                                                <div class="contact-container">
                                                                    <a href="{{url('batch-detail/'.$v->id.'/index')}}">{{gabungtgl($v->start_date,$v->end_date)}}</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>{{$v->pelatihan->nama}}</td>
                                                        <td><span class="label label-success label-bordered">{{$v->lokasi}}</span></td>
                                                        @php
                                                        if($x==6)
                                                            break;
                                                        
                                                        $x++;
                                                        @endphp
                                                    </tr>
                                                    @endif
                                                 @endforeach                                            
                                                                                 
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- END LATEST TRANSACTIONS -->
                                
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                
                                <!-- START PURCHASE STATISTICS -->
                                <div class="block block-condensed">
                                    <div class="app-heading">                                        
                                        <div class="title">
                                            <h2>Statistik Peserta Pelatihan</h2>
                                            
                                        </div>              
                                        
                                    </div>
                                    
                                    <div class="block-content">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">                                            
                                                    <label>Usia 20-25</label><span class="pull-right text-bold">37%</span>
                                                    <div class="progress progress-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="37%">
                                                        <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="37" aria-valuemin="0" aria-valuemax="100" style="width: 37%"></div>
                                                    </div>                                            
                                                </div>
                                                <div class="form-group">                                            
                                                    <label>Usia 26-30</label><span class="pull-right text-bold">33%</span>
                                                    <div class="progress progress-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="33%">
                                                        <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100" style="width: 33%"></div>
                                                    </div>                                            
                                                </div>
                                                <div class="form-group">                                            
                                                    <label>Usia 31-40</label><span class="pull-right text-bold">25%</span>
                                                    <div class="progress progress-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="25%">
                                                        <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%"></div>
                                                    </div>                                            
                                                </div>
                                                <div class="form-group">                                            
                                                    <label>Usia 41-50</label><span class="pull-right text-bold">12%</span>
                                                    <div class="progress progress-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="15%">
                                                        <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100" style="width: 15%"></div>
                                                    </div>                                            
                                                </div>
                                                <div class="form-group">                                            
                                                    <label>Usia 51+</label><span class="pull-right text-bold">3%</span>
                                                    <div class="progress progress-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="3%">
                                                        <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="100" style="width: 3%"></div>
                                                    </div>                                            
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">                                            
                                                    <label>Pria</label><span class="pull-right text-bold">75%</span>
                                                    <div class="progress progress-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="75%">
                                                        <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                                                    </div>                                            
                                                </div>
                                                <div class="form-group">                                            
                                                    <label>Wanita</label><span class="pull-right text-bold">25%</span>
                                                    <div class="progress progress-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="25%">
                                                        <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%"></div>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END PURCHASE STATISTICS -->
                                
                            </div>
                           
                            <div class="col-md-6">
                                
                                <!-- START TOP STORES -->
                                <div class="block block-condensed">
                                    <div class="app-heading">                                        
                                        <div class="title">
                                            <h2>Jenis Pelatihan Terfavorit</h2>
                                        </div>              
                                        <div class="heading-elements">
                                        </div>
                                    </div>
                                    <div class="block-content">
                                        
                                        <div class="form-group">                                            
                                            <label>1. Shopnumone</label><span class="pull-right text-bold">135</span>
                                            <div class="progress progress-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="75%">
                                                <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                                            </div>                                            
                                        </div>
                                        <div class="form-group">                                            
                                            <label>2. Best Shoptwo</label><span class="pull-right text-bold">121</span>
                                            <div class="progress progress-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="70%">
                                                <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%"></div>
                                            </div>                                            
                                        </div>
                                        <div class="form-group">                                            
                                            <label>3. Third Awesome</label><span class="pull-right text-bold">107</span>
                                            <div class="progress progress-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="65%">
                                                <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100" style="width: 65%"></div>
                                            </div>                                            
                                        </div>
                                        <div class="form-group">                                            
                                            <label>4. Alltranding</label><span class="pull-right text-bold">83</span>
                                            <div class="progress progress-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="51%">
                                                <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="51" aria-valuemin="0" aria-valuemax="100" style="width: 51%"></div>
                                            </div>                                            
                                        </div>
                                        <div class="form-group">                                            
                                            <label>5. Shop Name</label><span class="pull-right text-bold">77</span>
                                            <div class="progress progress-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="42%">
                                                <div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar" aria-valuenow="42" aria-valuemin="0" aria-valuemax="100" style="width: 42%"></div>
                                            </div>                                            
                                        </div>
                                        
                                    </div>
                                </div>
                                <!-- END TOP STORES -->
                                
                            </div>                            
                        </div>
                        
                    </div>