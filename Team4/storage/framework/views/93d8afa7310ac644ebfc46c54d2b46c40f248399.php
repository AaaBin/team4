<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <style>
        html{
            scroll-behavior: smooth;
        }
        * {
            font-family: 微軟正黑體;
        }
    </style>
    <?php echo $__env->yieldContent('css'); ?>

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="<?php echo e(url('/home')); ?>">
                    <?php echo e(config('app.name', 'Sping Mountain')); ?>

                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            <a id="FrontPageDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown">
                                頁面
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="FrontPageDropdown">
                                <a class="dropdown-item" href="/">image home</a>
                                <a class="dropdown-item" href="/home">home</a>
                                <a class="dropdown-item" href="/intro">intro</a>
                                <a class="dropdown-item" href="/flower">flower</a>
                                <a class="dropdown-item" href="/activity">activity</a>
                                <a class="dropdown-item" href="/booking">booking</a>
                                <a class="dropdown-item" href="/traffic">traffic</a>
                                <a class="dropdown-item" href="/firefly_season">firefly season</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/image_home">image home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/flower">flower</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">booking</a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="/admin/booking/camp">露營訂單管理</a>
                                <a class="dropdown-item" href="/admin/booking/restaurant">餐廳訂單管理</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="/admin/customer">customer</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="/admin/ig_img">IG img</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                        </li>
                        <?php if(Route::has('register')): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                        </li>
                        <?php endif; ?>
                        <?php else: ?>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <?php echo e(__('Logout')); ?>

                                </a>

                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST"
                                    style="display: none;">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </div>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>
    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <?php echo $__env->yieldContent('js'); ?>

</body>

</html>
<?php /**PATH C:\Users\user\Documents\GitHub\team4\Team4\resources\views/layouts/app.blade.php ENDPATH**/ ?>