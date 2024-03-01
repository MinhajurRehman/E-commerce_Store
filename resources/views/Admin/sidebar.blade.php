<!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>App Store Website Template | Smarteyeapps.com</title>
        <link rel="shortcut icon" href="{{ url('assets/images/fav.png') }}" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
        <link rel="shortcut icon" href="{{ url('assets/images/fav.jpg') }}">
        <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
        <link rel="stylesheet" type="text/css" href="{{ url('assets/css/style.css') }}" />
    </head>
        <header class="head">
            <div class="logo border-bottom">
                <strong> STORE ADMIN PANEL </strong>
                <a class="navbar-toggler d-block d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="bi bi-list"></i>
                </a>
            </div>
            <div id="navbarNav" class="navcol pt-0 d-none d-lg-block">
                <ul>
                    <li class="border-bottom"><a href="{{ url('/Admin/Dashboard') }}"><i class="bi  bi-people fs-6 me-2"></i> Accounts List</a></li>
                    <li class="border-bottom"><a href="{{ url('/Admin/categories') }}"><i class="bi fs-6 me-2 bi-boxes"></i> <i class="bi fs-6  bi-google-play"></i>
                        categories</a></li>
                    <li class="border-bottom"><a href="{{ url('/Admin/products') }}"><i class="bi me-2 fs-6  bi-bag"></i> Products</a></li>
                    <li class="border-bottom"><a href="{{ url('/Admin/sales') }}"><i class="bi me-2 fs-6  bi-gift"></i> sale(offer)</a></li>
                    <li class="border-bottom"><a href="{{ url('/Admin/New-Order') }}"><i class="bi me-2 fs-6  bi-basket"></i> New order</a></li>
                    <li class="border-bottom"><a href="{{ url('/Admin/categories') }}"><i class="bi fs-6 me-2 bi-coin"></i> Payment detail</a></li>
                    <li class="border-bottom"><a href="{{ url('/Admin/Coupon') }}"><i class="bi me-2 fs-6  bi-percent"></i> coupons generate</a></li>
                    <li class="border-bottom"><a href="{{ url('/Admin/categories') }}"><i class="bi me-2 fs-6 bi-mailbox2"></i> complain / exchange applications</a></li>
                    <li class="border-bottom"><a href="{{ url('/Admin/categories') }}"><i class="bi me-2 bi-chat-text-fill"></i> Customers Feedback</a></li>
                </ul>
            </div>
        </header>
        <div  class="main-content">
           <div class="nav-bar sticky-top-xl bg-white shadow-sm w-100 p-3">
               <div class="row">
                   <div class="col-md-5">
                       <div class="input-group mb-0">
                          <input type="text" class="form-control border-end-0 mb-0" placeholder="Search Apps" aria-label="Recipient's username" aria-describedby="basic-addon2">
                          <span class="input-group-text sit border-start-0" id="basic-addon2"><i class="bi bi-search"></i></span>
                        </div>
                   </div>
                   <div class="col-md-3"></div>
                   <div class="col-md-4 text-end">
                       <div class="dropdown pt-2">
                          <a class="cp pt-4 fw-bolder fs-8 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Vinoth Basker
                          </a>
                          <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Dashboard</a></li>
                            <li><a class="dropdown-item" href="#">My Downloads</a></li>
                            <li><a class="dropdown-item" href="{{ route("admin.logout") }}">Logout</a></li>
                          </ul>
                        </div>
                   </div>
               </div>
           </div>
