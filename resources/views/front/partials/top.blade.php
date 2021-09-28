<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{$title}}</title>
    <meta name='title' content='{{$title}}'>
    <meta name='description' content='{{$description}}'>
    <meta name="keywords" content="tehsil,tehsil platformasi,freelance platformasi,azerbaycan freelance,xaricde tehsil,tehsil sirketi,tehsil konsaltinq,avropada tehsil,amerikada tehsil,herodoc,herodocaz">
    <link rel="canonical" href="{{ app()->getLocale() }}">
    <link rel="shortcut icon" href="{{asset('/front/images/favicon.png')}}">
    <meta name='abstract' content='Sizi ekspertlərlə birləşdirən ideal təhsil platforması'>
    <meta name='language' content='az'>
    <meta name='robots' content='index,follow'>
    <meta name='revised' content='24/09/2021'>
    <meta name='author' content='herodoc.az'>
    <meta name='copyright' content='Müəllif hüquqları qorunur'>
    <meta name='url' content='herodoc.az'>
    <meta name='rating' content='General'>
    <meta name='distribution' content='Global'>
    <meta name='revisit-after' content='3 days'>
    <meta name='subtitle' content='HeroDoc'>
    <meta property="og:title" content="{{$title}}" />
    <meta property="og:description" content="{{$description}}">
    <meta property="og:locale" content="{{ app()->getLocale() }}">
    <meta property="og:image" content="{{ asset(isset($image) ? $image : 'front/images/logo.png')}}">
    <meta property="og:image:secure_url" content="{{ asset(isset($image) ? $image : 'front/images/logo.png')}}">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="128">
    <meta property="og:image:height" content="56">
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="Herodoc"/>
    <meta property="og:url" content="{{request()->fullUrl()}}">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="{{$title}}">
    <meta name="twitter:description" content="{{$description}}">
    <meta name="twitter:site" content="Herodoc">
    <meta name="twitter:image" content="{{ asset(isset($image) ? $image : 'front/images/logo.png')}}">
    <meta name='og:region' content='Baku'>
    <meta name='og:country-name' content='Azerbaijan'>
    <meta name='og:type' content='store'>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-PJ76F8F0XT"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-PJ76F8F0XT');
    </script>
    <link rel="icon" type="image/png" href="/front/images/favicon.png">
    <link href="/front/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/front/vendor/fontawesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="/front/vendor/icons/css/materialdesignicons.min.css" media="all" rel="stylesheet" type="text/css">
    <link href="/front/css/style.css?v=1.1" rel="stylesheet">
    @stack('css')
</head>