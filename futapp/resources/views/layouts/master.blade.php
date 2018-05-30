
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Fifa ultimate card trader</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Clean responsive bootstrap website template">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script>window.Laravel = {csrfToken:'{{csrf_token()}}'}</script>
  <!-- styles -->
   <!-- <link href="/css/font-awesome.css" rel="stylesheet">-->
  <link href="/css/bootstrap.css" rel="stylesheet">
  <link href="/css/bootstrap-responsive.css" rel="stylesheet">
 <link href="/css/headerfix.css" rel="stylesheet">
 <link href="/css/overwrite.css" rel="stylesheet">
 <link href="/css/cards.css" rel="stylesheet">
<link rel="manifest" href="/manifest.json">
  <link href="/css/style.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>


     <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/vue"></script>
  <!-- fav and touch icons -->
  <link rel="icon" type="image/png" sizes="16x16" href="/images/icons/icon-72x72.png">
  

  
</head>

<body>
    @include('layouts.nav')

   
      @yield('content')
    

    @include('layouts.footer')
     
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <script src="/js/script.js" type="text/javascript"></script>
     
     
</body>
</html>