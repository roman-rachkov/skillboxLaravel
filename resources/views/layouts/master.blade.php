<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
{{--    <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">--}}

    <title>@yield('title', 'Laravel Blog')</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/blog/">

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">
</head>

<body>

@yield('page')

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
<script src="/js/holder.min.js"></script>
<script src="/js/maxlength.min.js"></script>
<script src="/js/jquery.liTranslit.js"></script>
<script src="/js/app.js"></script>
@yield('scripts')
<script>
    Holder.addTheme('thumb', {
        bg: '#55595c',
        fg: '#eceeef',
        text: 'Thumbnail'
    });
</script>
</body>
</html>
