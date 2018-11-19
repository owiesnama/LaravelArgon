@extends('layouts.app')

@section('content')
    <profile-view :initial-user-info="{{$user}}" inline-template>
        <div>
            @include('partials.header')

            <div class="main-content">

                <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center"
                     style="min-height: 600px; background-image: url({{$user->header}}); background-size: cover; background-position: center top;">
                    <!-- Mask -->
                    <span class="mask bg-gradient-primary opacity-8"></span>
                    <!-- Header container -->
                    <div class="container-fluid d-flex align-items-center">
                        <div class="row">
                            <div class="col-lg-7 col-md-10">
                                <h1 class="display-2 text-white">Hello {{$user->name}}</h1>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Page content -->
                <div class="container-fluid mt--7">
                    <div class="row">
                        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                            <div class="card card-profile shadow">
                                <div class="row justify-content-center">
                                    <div class="col-lg-3 order-lg-2">
                                        <div class="card-profile-image">
                                            <a href="#">
                                                    {{--<croppa class="position-relative d-flex justify-content-center align-items-center"--}}
                                                    {{--v-model="avatar"--}}
                                                    {{--:width="220"--}}
                                                    {{--:height="220"--}}
                                                    {{--initial-size="cover"--}}
                                                    {{--prevent-white-space--}}
                                                    {{--:show-remove-button="avatarEdit"--}}
                                                    {{--@click="toggleAvatarEdit"--}}
                                                    {{--initial-image="{{$user->profile->avatar}}">--}}
                                                    {{--<img    src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRaz8TR-QMmFtVKPImeFRoSHy1pZwHIvdBQ7gu5cHpWeS8H8lla'--}}
                                                    {{--slot="placeholder" alt="" class="rounded-circle">--}}
                                                    {{--</croppa>--}}

                                                    <img src="{{$user->profile->avatar}}" class="rounded-circle">

                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                                    <div class="d-flex justify-content-between">
                                        <a href="#" class="btn btn-sm btn-info mr-4">Connect</a>
                                        <a href="#" class="btn btn-sm btn-default float-right">{{__('Message')}}</a>
                                    </div>
                                </div>
                                <div class="card-body pt-0 pt-md-4">
                                    <div class="row">
                                        <div class="col">
                                            <div class="card-profile-stats d-flex flex-column align-items-center mt-md-5">
                                                <h3>
                                                    {{$user->name}}<span
                                                            class="font-weight-light">{{$user->profile->age}}</span>
                                                </h3>
                                                <p class="text-muted mt-0 mb-5">{{$user->profile->bio}}</p>
                                                <span class="text-muted">
                                                        <i class="ni location_pin mr-2"></i>
                                                    {{$user->profile->country}},{{$user->profile->city}}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <div class="h5 mt-4">
                                            <i class="ni business_briefcase-24 mr-2"></i>{{$user->profile->job}}
                                        </div>
                                        <div>
                                            <i class="ni education_hat mr-2"></i>{{$user->profile->institute}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8 order-xl-1">
                            <div class="card bg-secondary shadow">
                                <div class="card-header bg-white border-0">
                                    <div class="row align-items-center">

                                        <div class="col-8">
                                            <h3 class="mb-0">{{__('My account')}}</h3>
                                        </div>

                                        <div class="col-4 text-right">
                                            <button type="submit"
                                                    role="button"
                                                    @click="update()"
                                                    :disabled="profileForm.errors.any()"
                                                    class="btn btn-sm btn-primary">{{__('Update profile')}}</button>
                                        </div>

                                    </div>
                                </div>
                                <div class="card-body">

                                    <form role="form"
                                          method="POST"
                                          @submit.prevent="update"
                                          @keydown="profileForm.errors.clear($event.target.name)"
                                          ref="form">
                                        {{method_field('patch')}}
                                        @csrf
                                        <h6 class="heading-small text-muted mb-4">{{__('User info')}}</h6>
                                        <div class="pl-lg-4">
                                            <div class="row">
                                                <div class="col-lg-6">

                                                    <div class="form-group">
                                                        <label class="form-control-label"
                                                               for="input-username">{{__('Username')}}</label>

                                                        <input
                                                                type="text"
                                                                id="input-username"
                                                                class="form-control form-control-alternative"
                                                                placeholder="Username"
                                                                readonly
                                                                v-model="user.name">
                                                    </div>

                                                </div>
                                                <div class="col-lg-6">

                                                    <div class="form-group">
                                                        <label class="form-control-label"
                                                               for="input-email">{{__('Email')}}</label>


                                                        <input
                                                                type="email"
                                                                id="input-email"
                                                                v-model="user.email"
                                                                readonly
                                                                class="form-control form-control-alternative"
                                                                placeholder="jesse@example.com">
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <hr class="my-4"/>
                                        <!-- Address -->
                                        <h6 class="heading-small text-muted mb-4">{{__('Contact info')}}</h6>
                                        <div class="pl-lg-4">

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-control-label"
                                                               for="input-address">{{__('Address')}}</label>

                                                        <input
                                                                id="input-address"
                                                                class="form-control form-control-alternative"
                                                                name="address"
                                                                placeholder="Home Address"
                                                                v-model="profileForm.address"
                                                                type="text">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label class="form-control-label"
                                                               for="input-city">{{__('City')}}</label>

                                                        <input
                                                                type="text"
                                                                id="input-city"
                                                                class="form-control form-control-alternative"
                                                                name="city"
                                                                v-model="profileForm.city"
                                                                placeholder="{{$user->profile->city}}">
                                                    </div>
                                                </div>

                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label class="form-control-label"
                                                               for="input-country">{{__('Country')}}</label>

                                                        <input
                                                                type="text"
                                                                id="input-country"
                                                                name="country"
                                                                class="form-control form-control-alternative"
                                                                placeholder="{{$user->profile->country}}"
                                                                v-model="profileForm.country">
                                                    </div>
                                                </div>

                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label class="form-control-label"
                                                               for="input-phone">{{__('Phone')}}</label>

                                                        <cleave class="form-control-alternative"
                                                                ref="cleave"
                                                                v-model="profileForm.phone"
                                                                placeholder="{{__('Please enter your phone number')}}"
                                                                name="phone"
                                                                :options="cleaveOptions">

                                                        </cleave>


                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <hr class="my-4"/>
                                        <!-- Description -->
                                        <h6 class="heading-small text-muted mb-4">{{__('About')}}</h6>

                                        <div class="pl-lg-4">
                                            <div class="form-group">
                                                <label>{{__('Bio')}}</label>
                                                <textarea rows="4"
                                                          name="bio"
                                                          v-model="profileForm.bio"
                                                          class="form-control form-control-alternative"
                                                          placeholder="A few words about you ...">@{{profileForm.bio}}
                                            </textarea>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </profile-view>
@endsection