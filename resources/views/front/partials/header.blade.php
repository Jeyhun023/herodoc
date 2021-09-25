<nav class="navbar navbar-expand-lg navbar-light topbar static-top shadow-sm bg-white osahan-nav-top px-0">
    <div class="container">

        <a class="navbar-brand" href="{{route('index')}}"><img src="/front/images/logo.png" alt=""></a>

        <form class="d-none d-sm-inline-block form-inline mr-auto my-2 my-md-0 mw-100 navbar-search"  action="{{ route('search') }}">
            <div class="input-group">
                <input type="text" name="query" class="form-control bg-white small" placeholder="Xidmət axtar..."
                    aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-success" type="submit">
                        <i class="fa fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>

        <ul class="navbar-nav align-items-center ml-auto">
            <li class="nav-item dropdown no-arrow no-caret mr-3 dropdown-notifications d-sm-none">
                <a class="btn btn-icon btn-transparent-dark dropdown-toggle" href="#" id="searchDropdown"
                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-search fa-fw"></i>
                </a>

                <div class="dropdown-menu dropdown-menu-right p-3 shadow-sm animated--grow-in"
                    aria-labelledby="searchDropdown">
                    <form class="form-inline mr-auto w-100 navbar-search" action="{{ route('search') }}">
                        <div class="input-group">
                            <input type="text" name="query" class="form-control bg-light border-0 small"
                                placeholder="Xidmət axtar..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fa fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>
            @if(auth()->check())
                <li class="nav-item dropdown no-arrow no-caret mr-3 dropdown-notifications">
                    <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownMessages"
                        href="{{route('message.index')}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-mail">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                            </path>
                            <polyline points="22,6 12,13 2,6"></polyline>
                        </svg>
                    </a>
                    {{-- <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownMessages"
                        href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-mail">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                            </path>
                            <polyline points="22,6 12,13 2,6"></polyline>
                        </svg>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up"
                        aria-labelledby="navbarDropdownMessages">
                        <h6 class="dropdown-header dropdown-notifications-header">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-mail mr-2">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                </path>
                                <polyline points="22,6 12,13 2,6"></polyline>
                            </svg>
                            Message Center
                        </h6>
                        <a class="dropdown-item dropdown-notifications-item" href="#!">
                            <img class="dropdown-notifications-item-img" src="/front/images/user/s7.png">
                            <div class="dropdown-notifications-item-content">
                                <div class="dropdown-notifications-item-content-text">Lorem ipsum dolor sit amet,
                                    consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
                                    magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                                    nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                                    voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                                    cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                                    laborum.</div>
                                <div class="dropdown-notifications-item-content-details">Emily Fowler · 58m</div>
                            </div>
                        </a>
                        <a class="dropdown-item dropdown-notifications-footer" href="{{route("message.index")}}">Hamısını oxu</a>
                    </div> --}}
                </li>
                <li class="nav-item dropdown no-arrow no-caret dropdown-user">
                    <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage"
                        href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"><img class="img-fluid" src="{{auth()->user()->image}}"></a>
                    <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up"
                        aria-labelledby="navbarDropdownUserImage">
                        <h6 class="dropdown-header d-flex align-items-center">
                            <img class="dropdown-user-img" src="{{auth()->user()->image}}">
                            <div class="dropdown-user-details">
                                <div class="dropdown-user-details-name">{{auth()->user()->fullname}}</div>
                                <div class="dropdown-user-details-email">{{auth()->user()->email}}</div>
                            </div>
                        </h6>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{route('user.account')}}">
                            <div class="dropdown-item-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" style="color: black;" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-settings">
                                    <circle cx="12" cy="12" r="3"></circle>
                                    <path
                                        d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z">
                                    </path>
                                </svg>
                            </div>
                            Hesab
                        </a>
                        @if(auth()->user()->isFreelance == "yes")
                            <a class="dropdown-item" href="{{route('account.adverts')}}">
                                <div class="dropdown-item-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 375.869 375.869" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g>
                                        <g xmlns="http://www.w3.org/2000/svg">
                                            <path d="M205.017,24.705c-1.865-3.132-5.291-5.002-8.932-4.877c-3.644,0.124-6.931,2.221-8.58,5.473   c-0.357,0.704-36.174,70.225-125.284,149.636c-1.328,0.177-2.62,0.617-3.792,1.315l-45.11,26.867   c-4.745,2.826-6.3,8.964-3.475,13.709l1.577,2.648c-4.897,4.988-8.416,11.197-10.179,18.153   c-2.625,10.356-1.06,21.116,4.407,30.294c7.177,12.051,20.357,19.538,34.396,19.538c3.714,0,7.396-0.532,10.945-1.547l1.585,2.662   c1.871,3.141,5.193,4.884,8.601,4.884c1.741,0,3.503-0.455,5.107-1.41l19.772-11.775c16.222,14.505,17.804,39.709,19.327,64.151   c0.209,3.359,0.415,6.658,0.657,9.864c0.377,5.007,4.41,8.958,9.424,9.233l37.724,2.068c0.186,0.01,0.371,0.016,0.555,0.016   c5.057,0,9.359-3.802,9.93-8.884c4.62-41.144-4.521-87.921-9.044-107.528c81.041-24.193,137.208-25.617,149.145-25.617   c1.145,0,1.767,0.014,1.831,0.016c3.649,0.108,7.055-1.792,8.899-4.936c1.845-3.145,1.832-7.044-0.034-10.177L205.017,24.705z    M109.75,242.88l-12.688-21.304l-19.804-33.252c66.713-59.784,103.799-113.38,119.328-138.689l91.97,154.421   C258.813,205.702,193.704,212.847,109.75,242.88z" fill="#000000" data-original="#000000" style="" class=""></path>
                                            <path d="M363.02,55.086c-19.504-32.747-57.809-50.173-95.304-43.367c-5.434,0.987-9.04,6.191-8.053,11.625   c0.987,5.435,6.194,9.039,11.625,8.053c29.335-5.327,59.292,8.307,74.548,33.922c15.256,25.615,12.973,58.45-5.682,81.706   c-3.456,4.308-2.765,10.602,1.543,14.058c1.846,1.48,4.056,2.2,6.251,2.2c2.929,0,5.832-1.281,7.807-3.743   C379.604,129.81,382.523,87.833,363.02,55.086z" fill="#000000" data-original="#000000" style="" class=""></path>
                                            <path d="M261.877,57.864c-5.434,0.986-9.039,6.191-8.052,11.626c0.987,5.434,6.192,9.036,11.626,8.053   c13.353-2.426,26.989,3.781,33.935,15.444c6.944,11.66,5.905,26.606-2.587,37.192c-3.456,4.308-2.765,10.602,1.543,14.058   c1.846,1.481,4.056,2.2,6.25,2.2c2.929,0,5.832-1.281,7.807-3.743c13.686-17.061,15.362-41.149,4.169-59.941   C305.375,63.959,283.397,53.955,261.877,57.864z" fill="#000000" data-original="#000000" style="" class=""></path>
                                        </g>
                                    </svg>
                                </div>
                                Elanlarım
                            </a>
                        @endif
                        <a class="dropdown-item" href="{{route('order')}}">
                            <div class="dropdown-item-icon">
                               <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 511.999 511.999" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g>
                                    <g xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <path d="M476.919,141.304l-0.379-0.655c-0.525-1.089-1.131-2.132-1.807-3.123L403.504,14.38C398.373,5.51,388.821,0,378.574,0    H133.437c-10.263,0-19.823,5.523-24.952,14.417l-72.39,125.586c-0.652,1.132-1.122,2.316-1.454,3.519    c-1.019,2.751-1.579,5.724-1.579,8.826v324.365c0,19.456,15.829,35.285,35.285,35.285h375.304    c19.456,0,35.285-15.829,35.285-35.285V151.159c0-0.435-0.013-0.867-0.036-1.297C479.104,146.975,478.478,143.998,476.919,141.304    z M271.518,30.011h106.358l56.032,96.873h-162.39V30.011z M134.136,30.011h107.371v96.873H78.296L134.136,30.011z     M448.925,476.714c0,2.908-2.366,5.274-5.274,5.274H68.347c-2.908,0-5.274-2.366-5.274-5.274V156.895h385.852V476.714z" fill="#000000" data-original="#000000" style="" class=""></path>
                                        </g>
                                    </g>
                                    <g xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <path d="M324.115,270.026c-5.859-5.859-15.361-5.859-21.221,0l-67.002,67.002l-25.764-25.764c-5.859-5.859-15.361-5.859-21.221,0    c-5.86,5.859-5.86,15.361,0,21.221l36.376,36.374c2.93,2.93,6.771,4.396,10.61,4.396c3.839,0,7.681-1.466,10.61-4.396    l77.612-77.612C329.975,285.387,329.975,275.886,324.115,270.026z" fill="#000000" data-original="#000000" style="" class=""></path>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            Sifarişlər
                        </a>
                        <a class="dropdown-item" href="javascript:void" onclick="$('#logout-form').submit();">
                            <div class="dropdown-item-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" style="color: black;" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-log-out">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                    <polyline points="16 17 21 12 16 7"></polyline>
                                    <line x1="21" y1="12" x2="9" y2="12"></line>
                                </svg>
                            </div>
                            Çıxış
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @else 
            <li class="nav-item dropdown no-arrow no-caret dropdown-user">
                <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage"
                    href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false"><img class="img-fluid" src="/front/images/user/no_photo.png"></a>
                <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up"
                    aria-labelledby="navbarDropdownUserImage">

                    <a class="dropdown-item" href="{{route('login')}}" style="font-size:18px;color:#20c997;">
                        <i class="fa fa-user" aria-hidden="true"></i>&nbsp
                        Giriş
                    </a>

                    <a class="dropdown-item" href="{{route('register')}}" style="font-size:18px;color:#20c997;">
                        <i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp
                        Qeydiyyat
                    </a>
                </div>
            </li>
            @endif
        </ul>
    </div>
</nav>

<nav class="navbar navbar-expand-lg navbar-light bg-white osahan-nav-mid px-0 border-top shadow-sm">
    <div class="container">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav">
                @foreach($data['categories'] as $category)
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            {{$category->name}}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownPortfolio">
                            @foreach($category->subcat as $subcat)
                                <a class="dropdown-item" href="{{route('category', ['slug' => $subcat->slug])}}">{{$subcat->name}}</a>
                            @endforeach
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="btn btn-success btn-block btn-lg btn-gradient shadow-sm" href="@if(auth()->check()) {{route('become.freelancer')}} @else {{route('login')}}  @endif ">
                    <i class="fa fa-plus"></i>
                    <span>Elan ver</span></a>
            </li>
        </ul>
    </div>
</nav>