<!DOCTYPE html >
<html lang="en" ng-app="adminApp">
<head>
    <meta charset="utf-8">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'GetCash') }}</title>
    <link rel="shortcut icon" href="{{ asset('img/gc/ico.jpeg') }}" type="image/x-icon"/>
    <link rel="stylesheet" href="{{ asset('lib/materialize/css/materialize.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/materialize/css/materialize.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/animate.css/animate.min.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('lib/angular-material/angular-material.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/sweetalert/dist/sweetalert.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">

    <link rel="stylesheet" href="{{ asset('lib/select2/dist/css/select2.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/select2-materialize.css') }}">


@yield('styles')
<!--    <link rel="stylesheet" href="lib/semantic/dist/semantic.min.css">     -->
</head>
<body ng-controller="uiElementController">

<div class="fixed navbar-fixed">
    <nav class="z-depth-0 akupay">
        <div class="row">
            <div class=" col s2"><a href="#!" class="brand-logo">
                </a></div>
            <div class="col s10">
                <div class="nav-wrapper">
                    <a href="#!" style="margin:10px;" class="" ng-controller="dateController" ng-cloak>@{{ now }}</a>
                    <ul class="right hide-on-med-and-down">
                        <li>{{ Auth::user()->name }} &nbsp&nbsp</li>
                        <li class="waves-effect waves-light akupay darken-1">
                            <a href="{{ url('/logout') }}"
                               onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out"></i>
                            </a>

                            <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                  style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>

<!-- Modal Structure -->
<div id="modalRoles" class="modal">
    <div class="modal-content">
        <h5>@{{ ui_element_text }}
            <hr>
        </h5>
        <h1></h1>
        <h6>Assigned Roles</h6>
        <div class="chip btn light-blue white-text" ng-repeat="role in ui_roles" ng-click="removeUiRole(role)"
             ng-if="role.name != 'admin_global'">
            @{{ role.display_name }}
            <span ng-show="!role.progress">&#10006</span>
            <i class="fa fa-spin fa-refresh" ng-show="role.progress"></i>
        </div>
        <h1></h1>
        <h6>Assign Roles</h6>
        <hr>
        <div class="chip btn akupay white-text" ng-repeat="x in all_roles" ng-click="addUiRole(x)"
             ng-if="x.name != 'admin_global'">
            @{{ x.display_name }}
            <span ng-show="!x.progress">+</span>
            <i class="fa fa-spin fa-refresh" ng-show="x.progress"></i>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Close</a>
    </div>
</div>


<div class="row">
    <div class="col s2">
        <div id="sideNav" class="grey lighten-5 side-nav fixed z-depth-0 section "
             style=" position: fixed; overflow-y: auto; overflow-x: hidden; height: 100%; width: auto;">
            <div>
                <ul>
                    <li>
                        <div class="topbar" id="">
                            <img class="background" src="{{ asset('img/gc/logo.jpeg') }}" width="70px">
                        </div>
                    </li>
                    <li>
                        <div class="divider"></div>
                    </li>
                    <li>
                        <ul class="collapsible " data-collapsible="accordion">

                            <!--Overview-->
                            {{--Element 1--}}
                            @if(!Roles::hasElement(1))
                                {{--Dont show--}}
                            @else
                                <li>
                                    <div class="collapsible-header
                                                @if(Request::is('home'))
                                            active
                                        @endif
                                    @if(Auth::user()->hasRole('admin_global'))
                                            uiroles
                                        @endif"
                                         id="1">
                                        <i class="fa fa-dashboard" aria-hidden="true"></i>
                                        <a href="{{ url('/home') }}">DASHBOARD</a>
                                    </div>
                                    <div class="collapsible-body">

                                    </div>

                                </li>
                                <li>
                                    <div class="divider"></div>
                                </li>
                            @endif


                        <!--Clients-->
                            @if(! (Roles::hasElement(21) || Roles::hasElement(23)))
                                {{--show nothing--}}
                            @else
                                <li>

                                    <div class="collapsible-header
                                                @if(Request::is('client/*'))
                                            active
                                        @endif
                                            "
                                         id="2">
                                        <i class="fa fa-users" aria-hidden="true"></i>
                                        SUBSCRIBERS
                                    </div>
                                    <div class="collapsible-body">
                                        <ul class="fa-ul blue-text collapsible" data-collapsible="accordion">
                                            @if(Roles::hasElement(23))
                                                <li><a href="{{ url('/client/add') }}"
                                                       class="blue-text
                                                            @if(Request::is('client/add*'))
                                                               active
                                                           @endif
                                                       @if(Auth::user()->hasRole('admin_global'))
                                                               uiroles
                                                            @endif"
                                                       id="23">
                                                        Add Subscriber</a>
                                                </li>
                                                <li>
                                                    <div class="divider"></div>
                                                </li>
                                            @endif

                                            @if(Roles::hasElement(21))

                                                <li><a href="{{ url('/client/list') }}"
                                                       class="blue-text
                                                            @if(Request::is('client/list*'))
                                                               active
                                                            @endif
                                                       @if(Auth::user()->hasRole('admin_global'))
                                                               uiroles
                                                            @endif"
                                                       id="21">
                                                        View Subscriber</a>
                                                </li>
                                                <div class="divider"></div>

                                            @endif

                                            @if(Roles::hasElement(21))

                                            <li><a href="{{ url('/client/bulkadd') }}"
                                                   class="blue-text
                                                        @if(Request::is('client/bulkadd*'))
                                                           active
                                                        @endif
                                                   @if(Auth::user()->hasRole('admin_global'))
                                                           uiroles
                                                        @endif"
                                                   id="21">
                                                    Add Bulk Subscriber</a>
                                            </li>

                                            @endif

                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <div class="divider"></div>
                                </li>
                            @endif


                                                <!--Clients-->
                                                @if(! (Roles::hasElement(21) || Roles::hasElement(23)))
                                                {{--show nothing--}}
                                            @else
                                                <li>
                
                                                    <div class="collapsible-header
                                                                @if(Request::is('client/*'))
                                                            active
                                                        @endif
                                                            "
                                                         id="2">
                                                        <i class="fa fa-exchange" aria-hidden="true"></i>
                                                        DISBURSEMENTS
                                                    </div>
                                                    <div class="collapsible-body">
                                                        <ul class="fa-ul blue-text collapsible" data-collapsible="accordion">
                                                            @if(Roles::hasElement(21))
                
                                                            <li><a href="{{ url('/disbursements/bulkdisbursements') }}"
                                                                   class="blue-text
                                                                        @if(Request::is('disbursements/bulkdisbursements*'))
                                                                           active
                                                                        @endif
                                                                   @if(Auth::user()->hasRole('admin_global'))
                                                                           uiroles
                                                                        @endif"
                                                                   id="21">
                                                                    Add Bulk Disbursements</a>
                                                            </li>
                
                                                            @endif
                
                                                        </ul>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="divider"></div>
                                                </li>
                                            @endif        

                        <!--BUSINESS-->
                            @if( !(
                                    Roles::hasElement(31)
                                 || Roles::hasElement(32)
                                 || Roles::hasElement(33)
                                 || Roles::hasElement(34)
                                 || Roles::hasElement(35)
                                 || Roles::hasElement(36)
                                 )
                                )
                                {{--show nothing--}}
                            @else
                                <li>
                                    <div class="collapsible-header
                                                @if(Request::is('business/*'))
                                            active
                                        @endif
                                            "
                                         id="3"
                                    >
                                        <i class="fa fa-shopping-cart " aria-hidden="true"></i>
                                        BUSINESS
                                    </div>
                                    <div class="collapsible-body">
                                        <ul class="collapsible" data-collapsible="accordion">
                                            @if(Roles::hasElement(31))
                                                <li><a href="{{ url('/business/add') }}"
                                                       class="blue-text
                                                            @if(Request::is('business/add*'))
                                                               active
                                                            @endif
                                                       @if(Auth::user()->hasRole('admin_global'))
                                                               uiroles
                                                            @endif"
                                                       id="31"
                                                    >
                                                        Add Business</a></li>
                                                <li>
                                                    <div class="divider"></div>
                                                </li>
                                            @endif

                                            @if(Roles::hasElement(32))
                                                <li><a href="{{ url( '/business/view') }}"
                                                       class="blue-text
                                                            @if(Request::is('business/view*'))
                                                               active
                                                            @endif
                                                       @if(Auth::user()->hasRole('admin_global'))
                                                               uiroles
                                                            @endif"
                                                       id="32"
                                                    >
                                                        View Business(es)</a></li>
                                                <li>
                                                    <div class="divider"></div>
                                                </li>
                                            @endif
                                            @if(Roles::hasElement(33))
                                                <li><a href="{{ url( '/business/supervisor/add') }}"
                                                       class="blue-text
                                                            @if(Request::is('business/supervisor/add*'))
                                                               active
                                                            @endif
                                                       @if(Auth::user()->hasRole('admin_global'))
                                                               uiroles
                                                            @endif"
                                                       id="33"
                                                    >
                                                        Add Agent Supervisor</a></li>
                                                <li>
                                                    <div class="divider"></div>
                                                </li>
                                            @endif
                                            @if(Roles::hasElement(34))
                                                <li><a href="{{ url( '/business/supervisor/view') }}"
                                                       class="blue-text
                                                            @if(Request::is('business/supervisor/view*'))
                                                               active
                                                            @endif
                                                       @if(Auth::user()->hasRole('admin_global'))
                                                               uiroles
                                                            @endif"
                                                       id="34"
                                                    >
                                                        View Agent Supervisor(s)</a></li>
                                                <li>
                                                    <div class="divider"></div>
                                                </li>
                                            @endif
                                            @if(Roles::hasElement(35))
                                                <li><a href="{{ url( '/business/validation/pending') }}"
                                                       class="blue-text
                                                            @if(Request::is('business/validation/pending*'))
                                                               active
                                                            @endif
                                                       @if(Auth::user()->hasRole('admin_global'))
                                                               uiroles
                                                            @endif"
                                                       id="35"
                                                    >
                                                        Pending Validations</a></li>
                                                <li>
                                                    <div class="divider"></div>
                                                </li>
                                            @endif
                                            @if(Roles::hasElement(36))
                                                <li><a href="{{ url( '/business/validation/bank_transfer/pending') }}"
                                                       class="blue-text
                                                            @if(Request::is('business/validation/bank_transfer/pending*'))
                                                               active
                                                            @endif
                                                       @if(Auth::user()->hasRole('admin_global'))
                                                               uiroles
                                                            @endif"
                                                       id="36"
                                                    >
                                                        Pending Bank Transfers</a></li>

                                            @endif

                                        </ul>
                                    </div>
                                </li>

                                <li>
                                    <div class="divider"></div>
                                </li>

                            @endif


                        <!--BILLER-->
                            @if(! (Roles::hasElement(41)
                                || Roles::hasElement(42))
                                )
                                {{--show nothing--}}
                            @else
                                <li>
                                    <div class="collapsible-header
                                                @if(Request::is('billers/*'))
                                            active
                                        @endif
                                            "
                                         id="4"
                                    >
                                        <i class="fa fa-credit-card " aria-hidden="true"></i>
                                        BILLER
                                    </div>
                                    <div class="collapsible-body">
                                        <ul class="collapsible" data-collapsible="accordion">

                                            @if(Roles::hasElement(41))
                                                <li><a href="{{ url('/billers/add') }}"
                                                       class="blue-text
                                                            @if(Request::is('billers/add*'))
                                                               active
                                                            @endif
                                                       @if(Auth::user()->hasRole('admin_global'))
                                                               uiroles
                                                            @endif"
                                                       id="41"
                                                    >Add Biller</a>
                                                </li>

                                                <li>
                                                    <div class="divider"></div>
                                                </li>
                                            @endif

                                            @if(Roles::hasElement(42))
                                                <li><a href="{{ url('/billers/view') }}"
                                                       class="blue-text
                                                            @if(Request::is('billers/view*'))
                                                               active
                                                            @endif
                                                       @if(Auth::user()->hasRole('admin_global'))
                                                               uiroles
                                                            @endif"
                                                       id="42"
                                                    >View Biller(s)</a>
                                                </li>
                                            @endif

                                        </ul>
                                    </div>
                                </li>

                                <li>
                                    <div class="divider"></div>
                                </li>
                            @endif

                        <!--BANK-->
                            @if(! (Roles::hasElement(51)
                                || Roles::hasElement(52))
                                )
                                {{--show nothing--}}
                            @else
                                <li>
                                    <div class="collapsible-header
                                                @if(Request::is('bank/*'))
                                            active
                                        @endif
                                            "
                                         id="5"
                                    >
                                        <i class="fa fa-bank" aria-hidden="true"></i>
                                        BANK
                                    </div>
                                    <div class="collapsible-body">
                                        <ul class="collapsible" data-collapsible="accordion">

                                            @if(Roles::hasElement(51))
                                                <li><a href="{{ url('/bank/add') }}"
                                                       class="blue-text
                                                            @if(Request::is('bank/add*'))
                                                               active
                                                            @endif
                                                       @if(Auth::user()->hasRole('admin_global'))
                                                               uiroles
                                                            @endif"
                                                       id="51"
                                                    >Add Bank(s)</a>
                                                </li>
                                                <li>
                                                    <div class="divider"></div>
                                                </li>
                                            @endif

                                            @if(Roles::hasElement(52))
                                                <li><a href="{{url('/bank/view') }}"
                                                       class="blue-text
                                                            @if(Request::is('bank/view'))
                                                               active
                                                            @endif
                                                       @if(Auth::user()->hasRole('admin_global'))
                                                               uiroles
                                                            @endif"
                                                       id="52"
                                                    >View Bank</a>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                </li>

                                <li>
                                    <div class="divider"></div>
                                </li>
                            @endif

                        <!--ACCOUNTING-->
                            @if(! (Roles::hasElement(61)
                                || Roles::hasElement(62)
                                || Roles::hasElement(63)
                                || Roles::hasElement(64)
                                || Roles::hasElement(65)
                                || Roles::hasElement(66))
                                )
                                {{--show nothing--}}
                            @else
                                <li>
                                    <div class="collapsible-header
                                                @if(Request::is('accounting/*'))
                                            active
                                        @endif
                                            "
                                         id="60"
                                    >
                                        <i class="fa fa-money " aria-hidden="true"></i>
                                        ACCOUNTING
                                    </div>
                                    <div class="collapsible-body">
                                        <ul class="collapsible" data-collapsible="accordion">
                                            @if(Roles::hasElement(61))
                                                <li><a href="{{url('accounting/balance-summary')}}"
                                                       class="blue-text
                                                            @if(Request::is('accounting/balance-summary*'))
                                                               active
                                                            @endif
                                                       @if(Auth::user()->hasRole('admin_global'))
                                                               uiroles
                                                            @endif"
                                                       id="61"
                                                    >Summary Of Balances</a>
                                                </li>
                                                <li>
                                                    <div class="divider"></div>
                                                </li>
                                            @endif

                                            @if(Roles::hasElement(62))
                                                <li><a href="{{url('/accounting/statement-of-accounts')}}"
                                                       class="blue-text
                                                                @if(Request::is('accounting/statement-of-accounts*'))
                                                               active
                                                            @endif
                                                       @if(Auth::user()->hasRole('admin_global'))
                                                               uiroles
                                                           @endif"
                                                       id="62">Statement Of Accounts</a>
                                                </li>
                                                <li>
                                                    <div class="divider"></div>
                                                </li>
                                            @endif

                                            @if(Roles::hasElement(63))
                                                <li><a href="{{url('/accounting/adjustments')}}" class="blue-text
                                                            @if(Request::is('accounting/adjustments'))
                                                            active
                                                         @endif

                                                    @if(Auth::user()->hasRole('admin_global'))
                                                            uiroles
                                                         @endif"
                                                       id="63">Account Adjustments</a>
                                                </li>
                                                <li>
                                                    <div class="divider"></div>
                                                </li>
                                            @endif

                                            {{--@if(Entrust::ability(UiController::getRolesForElement(64), array()))
                                                <li><a href="#/business/settlement" class="blue-text
                                                              @if(Request::is('#account/business-settlement'))
                                                            active
                                                         @endif

                                                    @if(Auth::user()->hasRole('admin_global'))
                                                            uiroles
                                                         @endif"
                                                    id="64">Business
                                                    Settlement</a>
                                                </li>
                                                <li>
                                                    <div class="divider"></div>
                                                </li>
                                            @endif--}}
                                            @if(Roles::hasElement(65))
                                                <li><a href="{{url('/accounting/reversal')}}" class="blue-text
                                                                  @if(Request::is('accounting/reversal'))
                                                            active
                                                         @endif

                                                    @if(Auth::user()->hasRole('admin_global'))
                                                            uiroles
                                                         @endif"
                                                       id="65">
                                                        Reversals</a>
                                                </li>
                                                    <li>
                                                        <div class="divider"></div>
                                                    </li>
                                            @endif
                                                @if(Roles::hasElement(66))
                                                <li><a href="{{url('/accounting/closing-balance')}}" class="blue-text
                                                                  @if(Request::is('accounting/closing-balance'))
                                                            active
                                                         @endif

                                                    @if(Auth::user()->hasRole('admin_global'))
                                                            uiroles
                                                         @endif"
                                                       id="66">
                                                        Closing Balances</a>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                </li>

                                <li>
                                    <div class="divider"></div>
                                </li>
                            @endif

                        <!--REPORTS-->
                            @if(! (Roles::hasElement(71)
                                || Roles::hasElement(72)
                                || Roles::hasElement(73)
                                || Roles::hasElement(74)
                                || Roles::hasElement(75)
                                || Roles::hasElement(76)
                                || Roles::hasElement(77)
                                || Roles::hasElement(78))
                                )
                                {{--Show nothing--}}
                            @else
                                <li>
                                    <div class="collapsible-header
                                                @if(Request::is('reports/*'))
                                            active
                                        @endif
                                            "
                                         id="7"
                                    >
                                        <i class="fa fa-area-chart" aria-hidden="true"></i>
                                        REPORTS
                                    </div>
                                    <div class="collapsible-body">
                                        <ul class="collapsible" data-collapsible="accordion">
                                            @if(Roles::hasElement(71))
                                                <li><a href="{{ url('/reports/dashboard') }}"
                                                       class="blue-text
                                                            @if(Request::is('reports/dashboard*'))
                                                               active
                                                            @endif
                                                       @if(Auth::user()->hasRole('admin_global'))
                                                               uiroles
                                                            @endif"
                                                       id="71"
                                                    >Dashboard</a>
                                                </li>
                                                <li>
                                                    <div class="divider"></div>
                                                </li>
                                            @endif

                                            @if(Roles::hasElement(72))
                                                <li><a href="{{ url('/reports/transactions') }}"
                                                       class="blue-text
                                                            @if(Request::is('reports/transactions*'))
                                                               active
                                                            @endif
                                                       @if(Auth::user()->hasRole('admin_global'))
                                                               uiroles
                                                            @endif"
                                                       id="72"
                                                    >Transactions</a>
                                                </li>
                                                <li>
                                                    <div class="divider"></div>
                                                </li>
                                            @endif
                                                @if(Roles::hasElement(78))
                                                    <li><a href="{{ url('/reports/rankings') }}"
                                                           class="blue-text
                                                            @if(Request::is('reports/rankings*'))
                                                                   active
@endif
                                                           @if(Auth::user()->hasRole('admin_global'))
                                                                   uiroles
@endif"
                                                           id="78"
                                                        >Rankings</a>
                                                    </li>
                                                    <li>
                                                        <div class="divider"></div>
                                                    </li>
                                                @endif

                                            @if(Roles::hasElement(73))

                                                <li><a href="{{url('/reports/dormant-accounts')}}" class="blue-text
                                                            @if(Request::is('reports/dormant-accounts*'))
                                                            active
                                                         @endif
                                                    @if(Auth::user()->hasRole('admin_global'))
                                                            uiroles
                                                         @endif"
                                                       id="73">Dormant Accounts</a></li>
                                                <li>
                                                    <div class="divider"></div>
                                                </li>
                                            @endif

                                            @if(Roles::hasElement(74))
                                                <li><a href="#/report/emails" class="blue-text
                                                               @if(Request::is('#/report/emails'))
                                                            active
                                                         @endif
                                                    @if(Auth::user()->hasRole('admin_global'))
                                                            uiroles
                                                         @endif"
                                                       id="74">Emails</a></li>
                                                <li>
                                                    <div class="divider"></div>
                                                </li>
                                            @endif

                                            @if(Roles::hasElement(75))

                                                <li><a href="#/report/notifications" class="blue-text
                                                            @if(Request::is('#/report/notifications'))
                                                            active
                                                         @endif
                                                    @if(Auth::user()->hasRole('admin_global'))
                                                            uiroles
                                                         @endif"
                                                       id="75">Notifications </a>
                                                </li>
                                                    <li>
                                                        <div class="divider"></div>
                                                    </li>
                                            @endif

                                                @if(Roles::hasElement(77))

                                                    <li><a href="{{url('/reports/volumes')}}" class="blue-text
                                                            @if(Request::is('reports/volumes*'))
                                                                active
@endif
                                                        @if(Auth::user()->hasRole('admin_global'))
                                                                uiroles
@endif"
                                                           id="77">Volumes & Values </a>
                                                    </li>
                                                    <li>
                                                        <div class="divider"></div>
                                                    </li>
                                                @endif
                                                @if(Roles::hasElement(76))

                                                    <li><a href="{{url('/reports/activity-logs')}}" class="blue-text
                                                            @if(Request::is('reports/activity-logs*'))
                                                                active
@endif
                                                        @if(Auth::user()->hasRole('admin_global'))
                                                                uiroles
@endif"
                                                           id="76">Activity Logs </a>
                                                    </li>
                                                    <li>
                                                        <div class="divider"></div>
                                                    </li>
                                                @endif
                                        </ul>
                                    </div>
                                </li>

                                <li>
                                    <div class="divider"></div>
                                </li>
                            @endif

                        <!--Products-->
                            @if(! (Roles::hasElement(81)
                                || Roles::hasElement(82))
                                )
                                {{--show nothing--}}
                            @else
                                <li>
                                    <div class="collapsible-header
                                                @if(Request::is('product/*'))
                                            active
                                        @endif
                                            "
                                         id="8"
                                    >
                                        <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                        PRODUCTS
                                    </div>
                                    <div class="collapsible-body">

                                        <ul class="collapsible" data-collapsible="accordion">
                                            @if(Roles::hasElement(81))
                                                <li><a href="{{ url('/product/add') }}"
                                                       class="blue-text
                                                            @if(Request::is('product/add*'))
                                                               active
                                                           @endif
                                                       @if(Auth::user()->hasRole('admin_global'))
                                                               uiroles
                                                            @endif"
                                                       id="81"
                                                    >Add Product</a>
                                                </li>
                                                <li>
                                                    <div class="divider"></div>
                                                </li>
                                            @endif

                                            @if(Roles::hasElement(82))
                                                <li><a href="{{ url('/product/view') }}"
                                                       class="blue-text
                                                            @if(Request::is('product/view*'))
                                                               active
                                                           @endif
                                                       @if(Auth::user()->hasRole('admin_global'))
                                                               uiroles
                                                            @endif"
                                                       id="82"
                                                    >View Product(s)</a>
                                                </li>
                                            @endif

                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <div class="divider"></div>
                                </li>
                            @endif

                            @if(! (Roles::hasElement(91)
                                || Roles::hasElement(92))
                                )
                                {{--show nothing--}}
                            @else
                                <li>
                                    <div class="collapsible-header
                                                @if(Request::is('devices/*'))
                                            active
                                        @endif
                                            "
                                         id="9"
                                    >
                                        <i class="fa fa-tablet" aria-hidden="true"></i>
                                        DEVICES
                                    </div>
                                    <div class="collapsible-body">
                                        <ul class="collapsible" data-collapsible="accordion">
                                            @if(Roles::hasElement(91))
                                                <li><a href="{{ url('/devices/add') }}"
                                                       class="blue-text
                                                            @if(Request::is('devices/add*'))
                                                               active
                                                            @endif
                                                       @if(Auth::user()->hasRole('admin_global'))
                                                               uiroles
                                                            @endif"
                                                       id="91"
                                                    >Add Device</a></li>
                                                <li>
                                                    <div class="divider"></div>
                                                </li>
                                            @endif

                                            @if(Roles::hasElement(92))
                                                <li><a href="{{ url('/devices/view') }}"
                                                       class="blue-text
                                                            @if(Request::is('devices/view*'))
                                                               active
                                                            @endif
                                                       @if(Auth::user()->hasRole('admin_global'))
                                                               uiroles
                                                            @endif"
                                                       id="92"
                                                    >View Devices</a></li>
                                            @endif

                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <div class="divider"></div>
                                </li>
                            @endif

                        <!--SETTINGS-->
                            @if(! (Roles::hasElement(101)
                                || Roles::hasElement(102)
                                || Roles::hasElement(103)
                                || Roles::hasElement(104)
                                || Roles::hasElement(105)
                                || Roles::hasElement(106)
                                || Roles::hasElement(107))
                                )
                                {{--Do show section--}}
                            @else
                                <li>
                                    <div class="collapsible-header
                                                @if(Request::is('settings/*'))
                                            active
                                        @endif
                                            "
                                         id="10"
                                    >
                                        <i class="fa fa-cogs" aria-hidden="true"></i>
                                        SETTINGS
                                    </div>
                                    <div class="collapsible-body">
                                        <ul class="collapsible" data-collapsible="accordion">
                                            @if(Roles::hasElement(101))
                                                <li><a href="{{ url('/settings/view_admin') }}"
                                                       class="blue-text
                                                            @if(Request::is('settings/view_admin'))
                                                               active
                                                            @endif
                                                       @if(Auth::user()->hasRole('admin_global'))
                                                               uiroles
                                                            @endif"
                                                       id="101"
                                                    >View Administrators</a></li>
                                            @endif

                                            @if(Roles::hasElement(106))
                                                <li>
                                                    <div class="divider"></div>
                                                </li>
                                                <li><a href="{{ url('/settings/view_admin/pending') }}"
                                                       class="blue-text
                                                        @if(Request::is('settings/view_admin/pending'))
                                                               active
                                                            @endif
                                                       @if(Auth::user()->hasRole('admin_global'))
                                                               uiroles
                                                            @endif"
                                                       id="106"
                                                    >View Pending Administrators</a></li>
                                            @endif


                                                @if(Roles::hasElement(109))
                                                    <li>
                                                        <div class="divider"></div>
                                                    </li>
                                                    <li><a href="{{ url('/settings/view_admin/terminated') }}"
                                                           class="blue-text
                                                        @if(Request::is('settings/view_admin/terminated'))
                                                                   active
@endif
                                                           @if(Auth::user()->hasRole('admin_global'))
                                                                   uiroles
@endif"
                                                           id="109"
                                                        >Terminated Employees</a></li>
                                                @endif

                                            @if(Roles::hasElement(102))
                                                <li>
                                                    <div class="divider"></div>
                                                </li>
                                                <li><a href="{{ url('/settings/view_roles') }}"
                                                       class="blue-text
                                                            @if(Request::is('settings/view_roles*'))
                                                               active
                                                            @endif
                                                       @if(Auth::user()->hasRole('admin_global'))
                                                               uiroles
                                                            @endif"
                                                       id="102"
                                                    >View Roles</a></li>
                                            @endif

                                            @if(Roles::hasElement(103))
                                                <li>
                                                    <div class="divider"></div>
                                                </li>
                                                <li><a href="{{ url('/settings/admin/roles/create') }}"
                                                       class="blue-text
                                                            @if(Request::is('settings/admin/roles/create*'))
                                                               active
                                                            @endif
                                                       @if(Auth::user()->hasRole('admin_global'))
                                                               uiroles
                                                            @endif"
                                                       id="103"
                                                    >Add Role</a>
                                                </li>
                                            @endif

                                            @if(Roles::hasElement(104))
                                                <li>
                                                    <div class="divider"></div>
                                                </li>
                                                <li><a href="{{ url('/settings/classofservice/add') }}"
                                                       class="blue-text
                                                            @if(Request::is('settings/classofservice/add*'))
                                                               active
                                                            @endif
                                                       @if(Auth::user()->hasRole('admin_global'))
                                                               uiroles
                                                            @endif"
                                                       id="104"
                                                    >Class of Service</a>
                                                </li>
                                            @endif

                                            @if(Roles::hasElement(105))
                                                <li>
                                                    <div class="divider"></div>
                                                </li>
                                                <li><a href="{{ url('/settings/admin/roles/configuration') }}"
                                                       class="blue-text
                                                        @if(Request::is('settings/admin/roles/configuration'))
                                                               active
                                                            @endif
                                                       @if(Auth::user()->hasRole('admin_global'))
                                                               uiroles
                                                            @endif"
                                                       id="105"
                                                    >View Current Configuration</a>
                                                </li>
                                            @endif

                                            @if(Roles::hasElement(107))
                                                <li>
                                                    <div class="divider"></div>
                                                </li>
                                                <li><a href="{{ url('/settings/fees-and-commissions/add') }}"
                                                       class=" blue-text
                                                        @if(Request::is('settings/fees-and-commissions/add*'))
                                                               active
                                                            @endif
                                                       @if(Auth::user()->hasRole('admin_global'))
                                                               uiroles
                                                            @endif"
                                                       id="107"
                                                    >Fees and Commissions</a>
                                                </li>
                                            @endif

                                            {{-- @if(Entrust::ability(UiController::getRolesForElement(108), array()))
                                                 <li>
                                                     <div class="divider"></div>
                                                 </li>
                                                 <li><a href="{{ url('/settings/transactional-limits/add') }}"
                                                        class=" blue-text
                                                     @if(Request::is('settings/transactional-limits/add'))
                                                                active
                                                             @endif
                                                        @if(Auth::user()->hasRole('admin_global'))
                                                                uiroles
                                                             @endif"
                                                        id="108"
                                                     >Add Transaction Limits</a>
                                                 </li>
                                             @endif--}}

                                        </ul>
                                    </div>
                                </li>


                            @endif
                            <li>
                                <div class="divider"></div>
                            </li>
                        </ul>

                    </li>

                </ul>
            </div>
        </div>
    </div>
    <div class="col s10">
        <div>
            @yield('content')
        </div>
    </div>

</div>


<script src="{{ asset('lib/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('lib/angular/angular.min.js') }}"></script>
<script src="{{ asset('lib/angular-route/angular-route.min.js') }}"></script>
<script src="{{ asset('lib/angular-animate/angular-animate.min.js') }}"></script>
<script src="{{ asset('lib/angular-material/angular-material.min.js') }}"></script>
<script src="{{ asset('lib/angular-sanitize/angular-sanitize.min.js') }}"></script>
<script src="{{ asset('lib/angular-messages/angular-messages.js') }}"></script>
<script src="{{ asset('lib/sweetalert/dist/sweetalert.min.js') }}"></script>
<script src="{{ asset('lib/angular-aria/angular-aria.min.js') }}"></script>
<script src="{{ asset('lib/materialize/js/materialize.min.js') }}"></script>
<script src="{{ asset('lib/moment/min/moment-with-locales.min.js') }}"></script>
<script src="{{ asset('js/controllers/generalControllers.js') }}"></script>
<script src="{{ asset('lib/angularUtils-pagination/dirPagination.js') }}"></script>
<script src="{{ asset('lib/ng-csv/build/ng-csv.min.js') }}"></script>
<script src="{{ asset('lib/pdfmake/build/pdfmake.min.js') }}"></script>
<script src="{{ asset('lib/pdfmake/build/vfs_fonts.js') }}"></script>


<script src={{ asset('lib/chart.js/dist/Chart.min.js') }}></script>
<script src={{ asset('lib/angular-chart.js/dist/angular-chart.min.js') }}></script>

<script src={{ asset('lib/justgage-toorshia/raphael-2.1.4.min.js') }}></script>
<script src={{ asset('lib/justgage-toorshia/justgage.js') }}></script>
<script src="{{asset('lib/angular-gage/dist/angular-gage.min.js')}}"></script>

<script src="{{asset('lib/select2/dist/js/select2.min.js')}}"></script>


<script src="{{ asset('js/router.js') }}"></script>
<script src="{{ asset('js/index.js') }}"></script>


@yield('scripts')
</body>
</html>
