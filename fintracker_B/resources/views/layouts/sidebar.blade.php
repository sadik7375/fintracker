

         <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                        <div class="pcoded-inner-navbar main-menu">
                           
            
                           
                            <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Layout</div>
                            <ul class="pcoded-item pcoded-left-item">
                            
                            <li class="active">
                                    <a href="{{ route('dashboard') }}">
                                        <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>

                             

                                @if ( Auth::user()->role == 'user')
                                <li class="active">
                                    <a href="{{ route('member-applications.create') }}">
                                        <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Application</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                @endif


                                @if ( Auth::user()->role == 'user')
                                <li class="active">
                                    <a href="{{ route('show.userdeposit') }}">
                                        <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">My Deposit</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                @endif

                            @if ( Auth::user()->role == 'admin')
                                  <li class="active">
                                    <a href="{{ route('members.index') }}">
                                        <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Member</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                 </li>

                                 <li class="pcoded-hasmenu">
                                    <a href="#">
                                        <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                        <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Deposit</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                    <li class="active">
                                    <a href="{{ route('deposits.index') }}">
                                        <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Add Deposit</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                             
                             

                            
                                 </ul>
                                </li>



                                <li class="active">
                                    <a href="{{ route('expenses.index') }}">
                                        <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Expense Track</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>

                                <li class="pcoded-hasmenu">
                                    <a href="#">
                                        <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                        <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Investment</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                    <li class="active">
                                    <a href="{{ route('investments.index') }}">
                                        <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Add Investment</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                               

                            
                                 </ul>
                                </li>
                                
                                <li class="pcoded-hasmenu">
                                    <a href="#">
                                        <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                        <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Fine And Report</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                    <li class="active">
                                    <a href="{{route('fine')}}">
                                        <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Fine</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li class="active">
                                    <a href="{{route('reports.fine_statistics')}}">
                                        <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Fine Report</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                             

                            
                                 </ul>
                                </li>
                                
                                <li class="active">
                                    <a href="{{ route('investment.status') }}">
                                        <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Profit Loss</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>


                                @if ( Auth::user()->role == 'admin')
                                <li class="active">
                                    <a href="{{ route('member-applications.index') }}">
                                        <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">View Application</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>

                                @endif
                             


 @endif




                              

                          

                            




                              





                            </ul>
                           






                    </nav>


