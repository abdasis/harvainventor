<div class="left-side-menu">

                <div class="h-100" data-simplebar>

                    <!-- User box -->
                    <div class="user-box text-center">
                        <img src="{{ url('/') }}/assets/images/programmer-2.gif" alt="user-img" title="Mat Helme"
                            class="rounded-circle avatar-md">
                        <div class="dropdown">
                            <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block"
                                data-toggle="dropdown">@auth
                                    <b>{{ Auth::user()->name }}</b>
                                @endauth
                                @guest
                                    Guest
                                @endguest
                            </a>
                        </div>
                        <p class="text-muted">Admin Head</p>
                    </div>

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul id="side-menu">

                            <li class="menu-title">Navigation</li>

                            <li>
                                <a href="{{ url('admin/') }}">
                                    <i class="mdi mdi-view-dashboard-outline"></i>
                                    <span> Dashboards </span>
                                </a>
                            </li>

                            <li class="menu-title">Data Master</li>

                            <li>
                                <a href="#sidebarCrm" data-toggle="collapse">
                                    <i class="mdi mdi-account-group"></i>
                                    <span> Data Nasabah </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarCrm">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{ route('nasabah.create') }}">Tambah Nasabah</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('nasabah.index') }}">Data Nasabah</a>
                                        </li>
                                        <!-- <li>
                                            <a href="{{ route('pernyataan.create') }}">Surat Pernyataan</a>
                                        </li> -->
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <a href="#pengguna" data-toggle="collapse">
                                    <i class="mdi mdi-account-cog"></i>
                                    <span> Data Pengguna </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="pengguna">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{ route('user.create') }}">Tambah Pengguna</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('user.index') }}">Data Pengguna</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                        </ul>

                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
