@extends('layouts.dashboard', ['bodyClass' => 'sticky'])

@section('search-bar')
    <div class="search sitter-dash">
        <div class="container">
            <h2>My Profile</h2>
            <div class="space"></div>
        </div><!--container-->
    </div><!--search-->
@endsection

@section('content')
    <div class="content">
        <div class="container sitter-search pprofile">
            <div class="content-block profile-info">
                <div class="profile-tabs tab">
                    <h3 class="activebig bigper">
                        <button> </button>
                        <span data-href="#PersonalInfo" class="tablinks underline pinfotab active">Personal Information</span>
                        <button data-href="#PayInfo" class="push-right">&#187;</button>
                    </h3>

                    <h3 class="inactivebig bigpay">
                        <button data-href="#PersonalInfo" class="push-left">&#171;</button>
                        <span data-href="#PayInfo" class="inactive tablinks underline payinfotab">Payment Information</span>
                        <button data-href="#AccInfo" class="push-right">&#187;</button>
                    </h3>

                    <h3 class="inactivebig bigacc" >
                        <button data-href="#PayInfo" class="push-left">&#171;</button>
                        <span data-href="#AccInfo" class="inactive tablinks underline accinfotab">Account Information</span>
                        <button data-href="#BackInfo" class="push-right">&#187;</button>
                    </h3>

                    <h3 class="inactivebig bigback" >
                        <button data-href="#AccInfo" class="push-left">&#171;</button>
                        <span data-href="#BackInfo" class="inactive tablinks underline backinfotab">Background Status</span>
                        <button></button>
                    </h3>

                    <div class="o-block"></div>
                </div>
                <hr>

                <div id="PersonalInfo" class="tabcontent" style="display: block;">
                    <form action="{{ route('user.update', $profile) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('patch') }}
                        {{ modelkey_field(Auth::user()) }}
                        <div class="pinfo left">
                            <div class="btn-con">
                                <button class="newphoto">
                                    <img src="{{ asset('images/camera.svg') }}" alt="camera icon"/>
                                    <span>Add Photo</span>
                                </button>
                            </div>
                            <div class="img-wrapper">
                                <img class="parent-profile" src="{{ asset('images/parentprofile-pic.png') }}" alt="profile picture"/>
                            </div>
                            <div class="btn-con">
                                <button class="delphoto">
                                    <img src="{{ asset('images/trash.svg') }}" alt="trash can icon"/>
                                    <span>Remove Photo</span>
                                </button>
                            </div>
                        </div>

                        <div class="pinfo right">
                            <div class="profile-infoleft">
                                <label for="edit_first_name">First Name</label>
                                <input type="text" id="edit-first_name" name="first_name" value="{{ $profile->first_name }}">
                            </div>
                            <div class="profile-inforight">
                                <label for="lname">Last Name</label>
                                <input type="text" id="edit_last_name" name="last_name" value="{{ $profile->last_name }}">
                            </div>


                            <div class="left citystate1">
                                <label for="edit_city">City</label>
                                <input type="text" id="edit_city" name="city" class="inline" value="{{ $profile->city }}">
                            </div><!-- citystate1 -->
                            <div class="right citystate2">
                                <label for="parent state">State</label>
                                <div class="select-wrapper">
                                    @include('dropins/form/stateSelect', ['stateValue' => $profile->region])
                                </div>
                            </div><!--citystate2-->
                        </div><!-- pinfo.right -->

                        <div class="pinfo full">
                            <div class="profile-infoleft">
                                <h2>About</h2>

                                <label for="journey">Journey with Christ</label>
                                <textarea name="journey">{{ $profile->journey }}</textarea>

                                <label for="video_resume">Video Resume URL (YouTube or Vimeo)</label>
                                <input type="text" id="video_resume" name="video_resume" class="inline" value="{{ $profile->video_resume }}">

                                <label for="standard_hourly_rate">Standard Hourly Rate</label>
                                <div class="money-wrapper">
                                    <input type="number" id="standard_hourly_rate" name="standard_hourly_rate" class="inline money" min="0.00" step="0.01" value="{{ $profile->standard_hourly_rate }}" placeholder="0.00">
                                </div>
                            </div>

                            <div class="profile-inforight">
                                <h2>Experience</h2>
                                <div class="loginOptions register-form  register-child">
                                    <div id="childContainer">
                                        <div id="child_1">
                                            <i class="im im-x-mark iGone"></i>
                                            <label for="childName" class="phone">Years of Experience & Relevant Experience</label>
                                            <textarea required name="experience_description">{{ $profile->experience_description }}</textarea>

                                            <label>Age Groups You Have The Most Experience With</label>
                                            <div class="cAge" id="sitter-cAge">
                                                <input type="hidden" name="experience_infant" value="0">
                                                <label for="sitterInfant1" id="sitterInfantlabel1">
                                                    <input type="checkbox" class="imagetoggle" name="experience_infant"
                                                           id="sitterInfant1" value="1" @if($profile->experience_infant) checked @endif >
                                                    @include('dropins.svg.infant-icon')
                                                    <p class="radiolabel">Infant</p>
                                                </label>

                                                <input type="hidden" name="experience_toddler" value="0">
                                                <label for="sitterToddler1" id="sitterToddlerlabel1">
                                                    <input type="checkbox" class="imagetoggle" name="experience_toddler"
                                                           id="sitterToddler1" value="1" @if($profile->experience_toddler) checked @endif >
                                                    @include('dropins.svg.toddler-icon')
                                                    <p class="radiolabel">Toddler</p>
                                                </label>

                                                <input type="hidden" name="experience_school_age" value="0">
                                                <label for="sitterSchoolAge1" id="sitterSchoolAgelabel1">
                                                    <input type="checkbox" class="imagetoggle" name="experience_school_age"
                                                           id="sitterSchoolAge1" value="1" @if($profile->experience_school_age) checked @endif >
                                                    @include('dropins.svg.school-age-icon')
                                                    <p class="radiolabel">School Age</p>
                                                </label>
                                            </div><!-- cAge -->
                                        </div><!-- child_1 -->
                                    </div><!-- childContainer -->
                                </div><!-- register-child -->
                            </div>

                            <h2>Special Eperience</h2>
                            <fieldgroup class="checky-group columns">
                                <input type="hidden" name="experience_add_adhd" value="0">
                                <label for="experience_add_adhd" class="checky">
                                    <input type="checkbox" name="experience_add_adhd"
                                           id="experience_add_adhd" value="1" @if($profile->experience_add_adhd) checked @endif >
                                    <span>ADD / ADHD</span>
                                </label>

                                <input type="hidden" name="experience_asd" value="0">
                                <label for="experience_asd" class="checky">
                                    <input type="checkbox" name="experience_asd"
                                           id="experience_asd" value="1" @if($profile->experience_asd) checked @endif >
                                    <span>Autism</span>
                                </label>

                                <input type="hidden" name="experience_visually_impaired" value="0">
                                <label for="experience_visually_impaired" class="checky">
                                    <input type="checkbox" name="experience_visually_impaired"
                                           id="experience_visually_impaired" value="1" @if($profile->experience_visually_impaired) checked @endif >
                                    <span>Blind / Visually Impaired</span>
                                </label>

                                <input type="hidden" name="experience_hearing_impaired" value="0">
                                <label for="experience_hearing_impaired" class="checky">
                                    <input type="checkbox" name="experience_hearing_impaired"
                                           id="experience_hearing_impaired" value="1" @if($profile->experience_hearing_impaired) checked @endif >
                                    <span>Deaf / Hearing Impaired</span>
                                </label>

                                <input type="hidden" name="experience_developmental" value="0">
                                <label for="experience_developmental" class="checky">
                                    <input type="checkbox" name="experience_developmental"
                                           id="experience_developmental" value="1" @if($profile->experience_developmental) checked @endif >
                                    <span>Developmental Disabilities</span>
                                </label>

                                <input type="hidden" name="experience_behavioral" value="0">
                                <label for="experience_behavioral" class="checky">
                                    <input type="checkbox" name="experience_behavioral"
                                           id="experience_behavioral" value="1" @if($profile->experience_behavioral) checked @endif >
                                    <span>Behavioral / Emotional Disorders</span>
                                </label>

                                <input type="hidden" name="experience_down_syndrome" value="0">
                                <label for="experience_down_syndrome" class="checky">
                                    <input type="checkbox" name="experience_down_syndrome"
                                           id="experience_down_syndrome" value="1" @if($profile->experience_down_syndrome) checked @endif >
                                    <span>Down Syndrome</span>
                                </label>

                                <input type="hidden" name="experience_seizures" value="0">
                                <label for="experience_seizures" class="checky">
                                    <input type="checkbox" name="experience_seizures"
                                           id="experience_seizures" value="1" @if($profile->experience_seizures) checked @endif >
                                    <span>Epilepsy / Seizure Disorder</span>
                                </label>
                            </fieldgroup>

                            <div class="btn-container" id="personal-btns">
                                <button class="btn-outline">Cancel</button>
                                <button type="submit" class="btn" id="save-personal">Save</button>
                            </div>
                        </div>

                        <div class="space"></div>
                    </form>
                </div><!--PersonalInfo-->

                <div id="PayInfo" class="tabcontent">
                    <div class="creditinfo">
                        <div class="left card">
                            <img src="images/mastercard.png" alt="credit card picture"/>
                            <div class="cardinfo">
                                <h6>Samantha Ashley</h6>
                                XXXX XXXX XXXX 9901 <br>
                                exp. 10/2078
                            </div>
                        </div>
                        <div class="right">
                            <p>Samantha Ashley<br>1234 Street Ave <br>
                                Allentown, PA 19012</p>
                        </div>

                        <div class="btn-container">
                            <button class="btn-outline del">Delete</button>
                            <button type="submit" class="btn">Edit</button>
                        </div>
                        <div class="space"></div>
                    </div><!--creditinfo-->


                    <div class="creditinfo creditinfo2">
                        <div class="left card">
                            <img src="images/mastercard.png" alt="credit card picture"/>
                            <div class="cardinfo">
                                <h6>Samantha Ashley</h6>
                                XXXX XXXX XXXX 9901 <br>
                                exp. 10/2078
                            </div>
                        </div>
                        <div class="right">
                            <p>Samantha Ashley<br>1234 Street Ave <br>
                                Allentown, PA 19012</p>
                        </div>

                        <div class="btn-container">
                            <button class="btn-outline del">Delete</button>
                            <button type="submit" class="btn">Edit</button>
                        </div>
                        <div class="space"></div>
                    </div><!--creditinfo-->


                    <div class="pay-add">
                        <button class="addApay">
                            <div class="circlebtn">+</div>
                            Add Payment Method

                        </button>
                    </div><!--family-addChild-->

                    <div class="btn-container">
                        <button class="btn-outline">Cancel</button>
                        <button type="submit" class="btn">Save</button>
                    </div>
                    <div class="space"></div>
                </div><!-- PayInfo -->

                <div id="AccInfo" class="tabcontent">
                    <div class="pinfo right">
                        <form>
                            <div class="profile-infoleft">
                                <label for="fname">First Name</label>
                                <input type="text" name="fname" value="Samantha"></div>
                            <div class="profile-inforight">
                                <label for="lname">Last Name</label>
                                <input type="text" name="lname" value="Ashley"></div>

                            <div class="date-wrapper clear">
                                <label for="bdate">Birthdate</label>
                                <input type="text" name="bdate" class="datepicker" value="04/14/1988"></div>

                            <div class="left citystate1">
                                <label for="parent city">City</label>
                                <input type="text" name="parent city" class="inline" value="Allentown">
                            </div>
                            <div class="right citystate2">
                                <label for="parent state">State</label>
                                <div class="select-wrapper">
                                    <select name="parent state" class="inline" size=1 onmousedown="if(this.options.length>6){this.size=6;}"  onchange='this.size=1;' onblur="this.size=1;" value="PA">
                                        <option value="AL">AL</option>
                                        <option value="AK">AK</option>
                                        <option value="AR">AR</option>
                                        <option value="AZ">AZ</option>
                                        <option value="CA">CA</option>
                                        <option value="CO">CO</option>
                                        <option value="CT">CT</option>
                                        <option value="DC">DC</option>
                                        <option value="DE">DE</option>
                                        <option value="FL">FL</option>
                                        <option value="GA">GA</option>
                                        <option value="HI">HI</option>
                                        <option value="IA">IA</option>
                                        <option value="ID">ID</option>
                                        <option value="IL">IL</option>
                                        <option value="IN">IN</option>
                                        <option value="KS">KS</option>
                                        <option value="KY">KY</option>
                                        <option value="LA">LA</option>
                                        <option value="MA">MA</option>
                                        <option value="MD">MD</option>
                                        <option value="ME">ME</option>
                                        <option value="MI">MI</option>
                                        <option value="MN">MN</option>
                                        <option value="MO">MO</option>
                                        <option value="MS">MS</option>
                                        <option value="MT">MT</option>
                                        <option value="NC">NC</option>
                                        <option value="NE">NE</option>
                                        <option value="NH">NH</option>
                                        <option value="NJ">NJ</option>
                                        <option value="NM">NM</option>
                                        <option value="NV">NV</option>
                                        <option value="NY">NY</option>
                                        <option value="ND">ND</option>
                                        <option value="OH">OH</option>
                                        <option value="OK">OK</option>
                                        <option value="OR">OR</option>
                                        <option value="PA">PA</option>
                                        <option value="RI">RI</option>
                                        <option value="SC">SC</option>
                                        <option value="SD">SD</option>
                                        <option value="TN">TN</option>
                                        <option value="TX">TX</option>
                                        <option value="UT">UT</option>
                                        <option value="VT">VT</option>
                                        <option value="VA">VA</option>
                                        <option value="WA">WA</option>
                                        <option value="WI">WI</option>
                                        <option value="WV">WV</option>
                                        <option value="WY">WY</option>
                                    </select>
                                </div>
                                <!--select-wrapper-->
                            </div>
                            <!--city-state-->

                            <label for="email" class="clear">Email Address</label>
                            <input type="email" name="email" value="Sasmash88@gmail.com">

                            <label for="phone">Phone</label>
                            <input type="text" name="phone" value="6103170952">
                        </form>

                        <div class="btn-container">
                            <button class="btn-outline">Cancel</button>
                            <button type="submit" class="btn">Save</button>
                        </div>
                        <div class="space"></div>
                    </div><!--pinforight-->
                </div><!--accinfo-->


                <div id="BackInfo" class="tabcontent">


                    <div class="back-passed">
                        <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24.49 24"><defs><style>.cls-1{fill:#bcb0c4;}.cls-2{fill:#1f1844;fill-rule:evenodd;}</style></defs><title>pay-check</title><circle class="cls-1" cx="13.48" cy="12.99" r="11.01"/><path class="cls-2" d="M12,0A12,12,0,1,1,0,12,12,12,0,0,1,12,0Zm0,1A11,11,0,1,1,1,12,11,11,0,0,1,12,1Zm7,7.46L10,18,5,12.16l.76-.65,4.27,5,8.24-8.75.73.69Z"/></svg>

                        <h4>Passed</h4>
                        <p>Congratulations! Your background check has been completed and you passed!</p>
                        <a href="#" class="btn">View Report</a>
                    </div><!--back-passed-->

                    <div class="back-notstarted">
                        <h4>You Have Not Started<br>a Background Check</h4>

                        <div class="btn-container">
                            <a href="#" class="btn go-prem">Go Premium</a>
                            <a href="premium.html" class="btn-outline">Learn More</a>
                        </div><!--btn-container-->
                    </div><!--back-notstarted-->
                </div><!--payinfo-->

            </div><!--contentblock-->
        </div><!--container-->
    </div><!--content-->
@endsection
