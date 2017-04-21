@extends('backend.default')
@section('content')
    <div class="col-xs-6">
        <h2 class="sub-header">Month</h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="col-md-1">Month</th>
                        <th class="col-md-2">Year</th>
                        <th class="col-md-3">Total_Money</th>
                    </tr>
                </thead>

                    @foreach($moneyOfMonths as $moneyOfMonth)
                    <tbody>
                        <tr>
                            <td class="col-md-1">{{date('m',strtotime($moneyOfMonth->created_at))}}</td>
                            <td class="col-md-2">{{date('Y',strtotime($moneyOfMonth->created_at))}}</td>
                            <td class="col-md-3">{{number_format($moneyOfMonth->total_money,0,',','.')}}</td>
                        </tr>
                    </tbody>
                     @endforeach

            </table>
        </div>
    </div>
    <div class="col-xs-6">
        <h2 class="sub-header">Year</h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="col-md-1">Year</th>
                        <th class="col-md-2">Total_Money</th>
                    </tr>
                </thead>
                @foreach($moneyOfYears as $moneyOfYear)
                    <tbody>
                        <tr>
                            <td class="col-md-1">{{date('Y',strtotime($moneyOfYear->created_at))}}</td>
                            <td class="col-md-2">{{number_format($moneyOfYear->total_money,0,',','.')}}</td>
                        </tr>
                    </tbody>
                    @endforeach
            </table>
        </div>
        <div id="push"></div>
    </div>


    <script src="/plugins/bootstrap-select.min.js"></script>
    <script data-cfasync="false" src="/codemirror/jquery.codemirror.js"></script>
    <script data-cfasync="false" src="/beautifier.js"></script>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-40413119-1', 'bootply.com');
        ga('send', 'pageview');
    </script>
    <script>
        jQuery.fn.shake = function(intShakes, intDistance, intDuration, foreColor) {
            this.each(function() {
                if (foreColor && foreColor!="null") {
                    $(this).css("color",foreColor);
                }
                $(this).css("position","relative");
                for (var x=1; x<=intShakes; x++) {
                    $(this).animate({left:(intDistance*-1)}, (((intDuration/intShakes)/4)))
                            .animate({left:intDistance}, ((intDuration/intShakes)/2))
                            .animate({left:0}, (((intDuration/intShakes)/4)));
                    $(this).css("color","");
                }
            });
            return this;
        };
    </script>
    <script>
        $(document).ready(function() {

            $('.tw-btn').fadeIn(3000);

            $('#btnLogin').click(function(){
                $(this).text("...");
                $.ajax({
                    url: "/loginajax",
                    type: "post",
                    data: $('#formLogin').serialize(),
                    success: function (data) {
                        //console.log('data:'+data);
                        if (data.status==1&&data.user) { //logged in
                            $('#menuLogin').hide();
                            $('#lblUsername').text(data.user.username);
                            $('#menuUser').show();

                        }
                        else {
                            $('#btnLogin').text("Login");
                            prependAlert("#spacer",data.error);
                            $('#btnLogin').shake(4,6,700,'#CC2222');
                            $('#username').focus();
                        }
                    },
                    error: function (e) {
                        $('#btnLogin').text("Login");
                        console.log('error:'+JSON.stringify(e));
                    }
                });
            });
            $('#btnRegister').click(function(){
                $(this).text("Wait..");
                $.ajax({
                    url: "/signup?format=json",
                    type: "post",
                    data: $('#formRegister').serialize(),
                    success: function (data) {
                        console.log('data:'+JSON.stringify(data));
                        if (data.status==1) {
                            $('#btnRegister').attr("disabled","disabled");
                            $('#formRegister').text('Thanks. You can now login.');
                        }
                        else {
                            prependAlert("#spacer",data.error);
                            $('#btnRegister').shake(4,6,700,'#CC2222');
                            $('#btnRegister').text("Sign Up");
                            $('#inputEmail').focus();
                        }
                    },
                    error: function (e) {
                        $('#btnRegister').text("Sign Up");
                        console.log('error:'+e);
                    }
                });
            });

            $('.loginFirst').click(function(){
                $('#navLogin').trigger('click');
                return false;
            });

            $('#btnForgotPassword').on('click',function(){

                if ($('#inputEmailForgot').val()==="") {
                    prependAlert("#spacer","Specify the email address.");
                }
                else {
                    $.ajax({
                        url: "/resetPassword",
                        type: "post",
                        data: $('#formForgotPassword').serializeObject(),
                        success: function (data) {
                            if (data.status==1){
                                prependAlert("#spacer",data.msg);
                                return true;
                            }
                            else {
                                prependAlert("#spacer","Your password could not be reset.");
                                return false;
                            }
                        },
                        error: function (e) {
                            console.log('error:'+e);
                        }
                    });
                }

            });

            $('#btnContact').click(function(){

                $.ajax({
                    url: "/contact",
                    type: "post",
                    data: $('#formContact').serializeObject(),
                    success: function (data) {
                        if (data.status==1){
                            prependAlert("#spacer","Thanks. We got your message and will get back to you shortly.");
                            $('#contactModal').modal('hide');
                            return true;
                        }
                        else {
                            prependAlert("#spacer",data.error);
                            return false;
                        }
                    },
                    error: function (e) {
                        console.log('error:'+e);
                    }
                });
                return false;
            });






        });
        $.fn.serializeObject = function()
        {
            var o = {};
            var a = this.serializeArray();
            $.each(a, function() {
                if (o[this.name] !== undefined) {
                    if (!o[this.name].push) {
                        o[this.name] = [o[this.name]];
                    }
                    o[this.name].push(this.value || '');
                } else {
                    o[this.name] = this.value || '';
                }
            });
            return o;
        };
        var prependAlert = function(appendSelector,msg){
            $(appendSelector).after('<div class="alert alert-info alert-block affix" id="msgBox" style="z-index:1300;margin:14px!important;">'+msg+'</div>');
            $('.alert').delay(3500).fadeOut(1000);
        }
    </script>


    <script src="/plugins/bootstrap-pager.js"></script>

@endsection