@extends('layouts.full-screen')

@section('content')
    <!-- Slideshow container -->
    <form method="POST" action="{{ route('user.update', Auth::user()) }}" class="slideshow-container">
        {{ csrf_field() }}
        {{ method_field('patch') }}
        {{ modelkey_field(Auth::user()) }}

        <input type="hidden" value="1" name="registration_complete">

        <!-- Full-width images with number and caption text -->
        <div class="mySlides">
            <div class="container">
                <div class="loginBox register-page">
                    <div class="left top-reg-nav">&nbsp;</div>

                    <h2>Tell Us a Little Bit About Your Family</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>

                    <div class="loginOptions register-form  register-child" action="" method="post">
                        <div id="childContainer">
                            <div id="child0" class="clone">
                                <i class="im im-x-mark iGone"></i>
                                <label class="wrap-label">Child's Name
                                    <input type="text" name="children[0][name]" data-will-require="children[0][age]">
                                </label>
                                <label class="phone">Child's Age</label>
                                <radiogroup class="cAge">
                                    <label data-name="age-child">
                                        <input type="radio" name="children[0][age]" value="infant">
                                        @include('dropins.svg.infant-icon')
                                        <p class="radiolabel">Infant</p>
                                    </label>

                                    <label data-name="age-child">
                                        <input type="radio" name="children[0][age]" value="toddler">
                                        @include('dropins.svg.toddler-icon')
                                        <p class="radiolabel">Toddler</p>
                                    </label>

                                    <label data-name="age-child">
                                        <input type="radio" name="children[0][age]" value="school_age">
                                        @include('dropins.svg.school-age-icon')
                                        <p class="radiolabel">School Age</p>
                                    </label>
                                </radiogroup>
                            </div>
                        </div>
                        <!--cAge-->


                    </div>
                    <!--loginoptions-->
                    <div class="btn-container">
                        <button type="button" class="btn-outline addchild">ADD ANOTHER CHILD</button>
                        <button type="button" class="btn next-slide verify-slide">NEXT</button>
                    </div>
                </div>
                <!--loginBox-->
            </div>
            <!--container-->
        </div>
        <!--slide-->

        <div class="mySlides">
            <div class="container">
                <div class="loginBox register-page">
                    <div class="left top-reg-nav prev-slide"><img src="{{ asset('images/thin-arrow.png') }}" alt="arrow pointing left"/> GO BACK
                    </div>

                    <h2>Tell Us a Little Bit About<br>Your Walk with Christ</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                    <div class="loginOptions register-form">
                        <textarea type="message" name="journey"
                                  value="{{ Auth::user()->journey }}"
                                  placeholder="You can enter a maximum of 1,200 characters here..."
                                  maxlength="1200"></textarea>
                    </div>
                    <!--loginoptions-->
                    <div class="btn-container">
                        <button type="submit" class="btn">GO TO DASHBOARD</button>
                    </div>
                </div>
                <!--loginBox-->
            </div>
            <!--container-->
        </div>
        <!--slide-->
    </form>
@endsection

@section('extra-scripts')
    <script type="text/javascript" src="{{ asset('js/hammer-slider.js') }}"></script>
    <script>
        $(".addchild").click(function () {
            var clone = null;
            var childClasses = "clone register-clone";
            var idNumber = parseInt($("#childContainer").data("record-index"));
            idNumber = isNaN(idNumber) ? 1 : idNumber + 1;

            clone = $('#child0').clone().attr({"id": "child" + idNumber, "class": childClasses});

            clone.find("input, textarea").each(function() {
                var $this = $(this);
                var type = false;
                var name = null;
                var willRequire = null;

                name = $this.attr("name");
                name = name.replace("[0]", "[" + idNumber + "]");
                $this.attr("name", name);

                willRequire = $this.data("will-require");
                if (typeof willRequire === "string") {
                    willRequire = willRequire.replace("[0]", "[" + idNumber + "]");
                    $this.data('will-require', willRequire);
                }

                type = $this.attr("type");
                console.log(typeof type);
                type = (typeof type === "string") ? type : false;

                if (type === "checkbox" || type === "radio") {
                    $this.prop("checked", false).removeProp("checked");
                } else {
                    $this.val('');
                }
            });

            clone.find(".im-x-mark").removeClass("iGone");

            clone.appendTo("#childContainer");
            $("#childContainer").data("record-index", idNumber);

            $(".im-x-mark").click(function(){
                $(this).closest(".clone").empty()
            });
        });

        $(document).on("change blur", "[data-will-require]", function() {
            var $parent = $(this);
            var willRequire = $(this).data("will-require");
            if (willRequire) {
                willRequire = willRequire.split("|");
                $(willRequire).each(function() {
                    var selector = "[name=\"" + this + "\"]";
                    var $selector = $(selector).eq(0);

                    if ($parent.val()) {
                        $selector.prop("required", true);
                    } else {
                        $selector.prop("required", false).removeProp("required");
                    }
                });
            }
        })
    </script>
@endsection
