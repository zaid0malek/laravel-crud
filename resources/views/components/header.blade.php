<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   @stack("title")
   <link rel="stylesheet" href="{{url('/')}}/css/bootstrap.min.css">
</head>
<body>
   <header>
      <nav>
         <!-- Nav tabs -->
         <ul class="nav nav-tabs" id="navId" role="tablist">
            <li class="nav-item">
               <a href="{{url('/')}}/crud/create" class="nav-link @if($active=='home') {{'active'}} @endif" data-bs-toggle="tab" aria-current="page">Home</a>
            </li>
            <li class="nav-item" role="presentation">
               <a href="{{url('/')}}/crud" class="nav-link @if($active=='show') {{'active'}} @endif" data-bs-toggle="tab" aria-current="page">Show Data</a>
            </li>
         </ul>
      </nav>
   </header>
</body>
</html>
