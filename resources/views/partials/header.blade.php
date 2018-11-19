<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
    <div class="container-fluid">
        <!-- Form -->
        <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
            <div class="form-group mb-0">
                <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                    </div>

                    <instant-search placeholder="{{__('Search')}}"
                                    no-result-placeholder="{{__('Ops, we tried our best but we did not found what are you looking for')}}"></instant-search>
                    {{--<input class="form-control" placeholder="ابحث" type="text">--}}

                </div>
            </div>
        </form>
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
            <li class="nav-item dropdown">
                <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false">
                    <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="{{__('User profile image')}}"
                       src="{{auth()->user()->profile->avatar ?? 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRaz8TR-QMmFtVKPImeFRoSHy1pZwHIvdBQ7gu5cHpWeS8H8lla'}}">
                </span>
                        <div class="media-body ml-2 d-none d-lg-block">
                            <span class="mb-0 text-sm  font-weight-bold">{{ucwords(auth()->user()->name)}}</span>
                        </div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">مرحبا!</h6>
                    </div>
                    <a href="{{url('profile')}}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>الحساب الشخصي</span>
                    </a>
                    <a href="./examples/profile.html" class="dropdown-item">
                        <i class="ni ni-settings-gear-65"></i>
                        <span>الأعدادات</span>
                    </a>
                    <a href="./examples/profile.html" class="dropdown-item">
                        <i class="ni ni-calendar-grid-58"></i>
                        <span>اخر الاخبار</span>
                    </a>
                    <a href="./examples/profile.html" class="dropdown-item">
                        <i class="ni ni-support-16"></i>
                        <span>مساعده</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item"
                       onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>تسجيل خروج</span>
                    </a>
                    <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                </div>
            </li>
        </ul>
    </div>
</nav>