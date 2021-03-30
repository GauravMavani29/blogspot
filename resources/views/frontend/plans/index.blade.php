@extends('layouts.app')
@section('content')
    <div class="demo">
        <div class="container">
            <div class="row plans">
                @php
                    $count = 0;
                @endphp
                @foreach ($plans as $plan)
                    @if ($count == 0)
                        <div class="col-md-4 col-sm-6">
                            <div class="pricingTable">
                                <div class="pricing-content">
                                    <div class="pricingTable-header">
                                        <h3 class="title">{{ $plan->name }}</h3>
                                    </div>
                                    <ul class="content-list">
                                        <li>Ultimate Features</li>
                                        <li>Responsive Ready</li>
                                        <li>Daily Updates</li>
                                        <li class="disable">Full Support : No</li>
                                        <li class="disable">Storage : 10GB</li>
                                    </ul>
                                    <div class="price-value">
                                        <span class="amount">${{ number_format($plan->cost, 2) }}</span>
                                        <span class="duration">per month</span>
                                    </div>
                                    <div class="pricingTable-signup">
                                        <a href="{{ route('plans.show', $plan->slug) }}">Choose</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php
                            $count = 1;
                        @endphp
                    @else
                        <div class="col-md-4 col-sm-6">
                            <div class="pricingTable blue">
                                <div class="pricing-content">
                                    <div class="pricingTable-header">
                                        <h3 class="title">{{ $plan->name }}</h3>
                                    </div>
                                    <ul class="content-list">
                                        <li>Ultimate Features</li>
                                        <li>Responsive Ready</li>
                                        <li>Daily Updates</li>
                                        <li class="disable">Full Support : Yes</li>
                                        <li class="disable">Storage : 50GB</li>
                                    </ul>
                                    <div class="price-value">
                                        <span class="amount">${{ number_format($plan->cost, 2) }}</span>
                                        <span class="duration">per month</span>
                                    </div>
                                    <div class="pricingTable-signup">
                                        <a href="{{ route('plans.show', $plan->slug) }}">Choose</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php
                            $count = 0;
                        @endphp
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
