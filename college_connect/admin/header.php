
<?php

    $query = "SELECT * FROM `admin` WHERE `id` = '".mysqli_real_escape_string($link, $_SESSION['admin'])."' LIMIT 1";

    $result = mysqli_query($link, $query);

    $admin = mysqli_fetch_assoc($result);

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Admin - College-Connect</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    
    <link href="./main.css" rel="stylesheet"></head>
    <!--Title Logo-->
    <link rel="shortcut icon" type="image/png" href="http://localhost/college_connect/images/logo_cc.png"/>

<body>
    

    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <!-- Top Header -->
        <div class="app-header header-shadow">
            <div class="app-header__logo">
                <div class="logo-src"></div>
                <!-- <div class=""><h4 style="font-weight: bold; color: #60CCFF;">College-Connect</h4></div> -->
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>    
            <div class="app-header__content">
                <div class="app-header-right">
                <ul>
                    <div class="text-center"><a href="?function=logout_admin" class="btn btn-danger" style="margin-top:10px; margin-right: 7px; width: 100px; font-size: 18px; padding: 2px 2px; background-color: red;">Logout</a></div>
                </ul>     
                </div>
            </div>
        </div>
        <!-- Side Bar -->
        <div class="app-main">
            <div class="app-sidebar sidebar-shadow">
                <div class="app-header__logo">
                    <div class="logo-src"></div>
                    <div class="header__pane ml-auto">
                        <div>
                            <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="app-header__mobile-menu">
                    <div>
                        <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="app-header__menu">
                    <span>
                        <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                            <span class="btn-icon-wrapper">
                                <i class="fa fa-ellipsis-v fa-w-6"></i>
                            </span>
                        </button>
                    </span>
                </div>    <div class="scrollbar-sidebar">
                    <div class="app-sidebar__inner">
                        <ul class="vertical-nav-menu">
                            <li class="app-sidebar__heading">Dashboards</li>
                            <li>
                                <a href="?p=dash" class="mm-active">
                                    <i class="metismenu-icon fas fa-chart-line"></i>
                                    Dashboard
                                </a>
                            </li>
                            
                            <li class="app-sidebar__heading">NAVIGATION</li>
                            <li>
                                <a href="?p=gen_id">
                                    <i class="fa fa-fw metismenu-icon" aria-hidden="true"></i>
                                    Generate New ID
                                </a>
                                <a href="?p=alot_roll">
                                    <i class="metismenu-icon fa fa-fw" aria-hidden="true"></i>
                                    Allot Roll Number 
                                </a>
                                <a href="?p=user_detail">
                                    <i class="metismenu-icon fa fa-fw" aria-hidden="true"></i>
                                    Users Details 
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>  
            <!-- page content -->
        <div class="app-main__outer">
            <div class="app-main__inner">