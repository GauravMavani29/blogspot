@php
$count = \App\Models\Profile::where('user_id', Auth::user()->id)->count();
@endphp
@if ($count == 1)
    @extends('layouts.app')
    @section('profile', 'active')
    @section('icons', '/profile.png')
    @section('content')

        <div class="container" id="main">
            <div class="main-body">
                <h4 class="text text-success">
                    @if (Session::has('success'))
                        {{ session('success') }}
                    @endif
                </h4>
                <div class="row gutters-sm">
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="{{ asset('frontend/img/profile/' . $collection[0]->profile) }}" alt="Admin"
                                        class="rounded-circle" width="150">
                                    <div class="mt-3">
                                        <h4>{{ $collection[0]->username }}</h4>
                                        <p class="text-muted font-size-sm">{{ $collection[0]->address }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-3">
                            <ul class="list-group list-group-flush">
                                <a href="https://github.com/{{ $collection[0]->github }}" target="_blank"
                                    style="color: black; text-decoration: none">
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-github mr-2 icon-inline">
                                                <path
                                                    d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22">
                                                </path>
                                            </svg>Github</h6>
                                        <span class="text-secondary">{{ $collection[0]->github }}</span>
                                    </li>
                                </a>
                                <a href="https://twitter.com/{{ $collection[0]->twitter }}" target="_blank"
                                    style="color: black; text-decoration: none">
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-twitter mr-2 icon-inline text-info">
                                                <path
                                                    d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z">
                                                </path>
                                            </svg>Twitter</h6>
                                        <span class="text-secondary"><span>@</span>{{ $collection[0]->twitter }}</span>
                                    </li>
                                </a>
                                <a href="https://instagram.com/{{ $collection[0]->instagram }}" target="_blank"
                                    style="color: black; text-decoration: none">
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-instagram mr-2 icon-inline text-danger">
                                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                            </svg>Instagram</h6>
                                        <span class="text-secondary">{{ $collection[0]->instagram }}</span>
                                    </li>
                                </a>
                                <a href="https://facebook.com/{{ $collection[0]->facebook }}" target="_blank"
                                    style="color: black; text-decoration: none">
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-facebook mr-2 icon-inline text-primary">
                                                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"
                                                    style="color: rgb(0, 110, 255)">
                                                </path>
                                            </svg>Facebook</h6>
                                        <span class="text-secondary">{{ $collection[0]->facebook }}</span>
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Full Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $collection[0]->fullname }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $collection[0]->email }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Phone</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $collection[0]->mno }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Address</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $collection[0]->address }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Birth Date</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $collection[0]->bdate }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Total Post</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $post }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Total Comments</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $comment }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3" style="display: flex; align-items: center">
                                        <h6 class="mb-0">Club Points</h6>
                                    </div>
                                    <div class="col-sm-1 text-secondary" style="margin-top: 7px; max-width:100%">
                                        {{ $points }}
                                    </div>
                                    <div class="col-sm-3" style="display: flex; align-items: center">
                                        <button class="btn btn-dark" style="color: white" id="contact"
                                            onclick="redeemCheck()">
                                            Redeem
                                        </button>
                                        <p style="margin: 0 0 0 4px; color: red">
                                            @if (session()->has('error'))
                                                {{ session('error') }}
                                            @endif
                                        </p>
                                        <p style="margin: 0 0 0 4px; color: green">
                                            @if (session()->has('msg'))
                                                {{ session('msg') }}
                                            @endif
                                        </p>
                                    </div>


                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3"
                                        style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
                                        <h6 class="mb-0">Membership Plan</h6>
                                    </div>
                                    @php
                                        $plan = App\Models\subscription::where('user_id', Auth::user()->id)->get();
                                    @endphp
                                    <div class="col-sm-9 text-secondary">
                                        <button class="btn btn-success">
                                            @php
                                                if (count($plan) > 0) {
                                                    # code...
                                                    $name = App\Models\plan::where('stripe_plan', $plan[0]->stripe_plan)->get();
                                                    $display = $name[0]->name;
                                                } else {
                                                    $display = 'None';
                                                }
                                            @endphp
                                            {{ $display }}
                                        </button>

                                        @if (count($plan) == 0)
                                            <a href="{{ url('/plans') }}" class="btn btn-secondary">Membership</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div id="contactForm">
            <h1>Payment Details!<a class="close">&times;</a></h1>
            <small>We'll get back to you as quickly as possible</small>

            <form action="{{ url('/redeem') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input placeholder="Email" type="email" required name="email" />
                <input placeholder="UpiId" type="text" required name="upiid" />
                <input placeholder="ClubPoints" type="number" min="2000" required name="points" />

                <input class="formBtn" type="submit" />
                <input class="formBtn" type="reset" />
            </form>
        </div>
        <script>
            // function redeemCheck() {
            //     alert("minimum 2000 points required for redeem");
            // }
            $(function() {

                // contact form animations
                $('#contact').click(function() {
                    $('#contactForm').fadeToggle();
                    document.getElementById("main").style.opacity = "0.5";
                    document.getElementById("contactForm").style.opacity = "1";


                })
                $(document).mouseup(function(e) {
                    var container = $("#contactForm");
                    if (!container.is(e.target) // if the target of the click isn't the container...
                        &&
                        container.has(e.target).length === 0) // ... nor a descendant of the container
                    {
                        document.getElementById("main").style.opacity = "1";
                        container.fadeOut();
                    }
                });
                let closeBtns = [...document.querySelectorAll(".close")];
                closeBtns.forEach(function(btn) {
                    btn.onclick = function() {
                        let modal = btn.closest('#contactForm');
                        modal.style.display = "none";
                        document.getElementById("main").style.opacity = "1";
                    }
                });

            });
        </script>
    @endsection
@else
    <script>
        window.location = "create/profile";
    </script>
@endif
