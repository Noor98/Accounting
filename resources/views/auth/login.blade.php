<?php
    $isRTL = App::isLocale('ar');
    $isRTLCSS = $isRTL?"-rtl.":".";
    
?>

<!DOCTYPE html>
<html lang="en" dir="{{$isRTL?"rtl":"ltr"}}">

    <head>
        <meta charset="utf-8" />
        <title>@lang('labels.login')</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="/metronic-rtl/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="/metronic-rtl/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="/metronic-rtl/assets/global/plugins/bootstrap/css/bootstrap{{ $isRTLCSS }}min.css" rel="stylesheet" type="text/css" />
        <link href="/metronic-rtl/assets/global/plugins/bootstrap-switch/css/bootstrap-switch{{ $isRTLCSS }}min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="/metronic-rtl/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="/metronic-rtl/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="/metronic-rtl/assets/global/css/components-md{{ $isRTLCSS }}min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="/metronic-rtl/assets/global/css/plugins-md{{ $isRTLCSS }}min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="/metronic-rtl/assets/pages/css/login{{ $isRTLCSS }}min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class=" login">
        <!-- BEGIN LOGO -->
        <div class="logo">
            <a href="/">
                <img src="/metronic-rtl/assets/pages/img/logo-big.png" alt="" /> </a>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">
            <form class="login-form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                <h3 class="form-title font-green">@lang('labels.login')</h3>
                
                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">@lang('labels.email')</label>
                    
                    <input id="email" autofocus type="email" class="form-control form-control-solid placeholder-no-fix" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                    </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">@lang('labels.password')</label>
                    <input id="password" type="password" class="form-control form-control-solid placeholder-no-fix" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn green uppercase">@lang('labels.login')</button>
                    <label class="rememberme check mt-checkbox mt-checkbox-outline">
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>@lang('labels.rememberme')
                        <span></span>
                    </label>
                    <a href="{{ route('password.request') }}" class="forget-password">@lang('labels.forget')</a>
                </div>
            </form>            
        </div>
        
        <script src="/metronic-rtl/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="/metronic-rtl/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="/metronic-rtl/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="/metronic-rtl/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="/metronic-rtl/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="/metronic-rtl/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="/metronic-rtl/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="/metronic-rtl/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="/metronic-rtl/assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="/metronic-rtl/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="/metronic-rtl/assets/global/scripts/app.min.js" type="text/javascript"></script>
        
    </body>

</html>

