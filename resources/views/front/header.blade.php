
@extends('layouts.app')
@section('menu')
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container px-5">
                    <a class="navbar-brand" href="index.html">CONNECT PEN</a>
                    
                                <div class="navbar-brand input-group mb-2 md-2">
                                    <input class="form-control" type="text" placeholder="Type to search" aria-label="Type to search" aria-describedby="button-newsletter" />
                                    <button class="btn btn-outline-light" id="button-newsletter" type="button">Search</button>
                                </div>
                                <a class="navbar-brand bi-chat-fill text-white" href="/msg">Messages</a>
                                <a class="navbar-brand bi-bell-fill text-white" href="/notifications">Notifications</a>
                                <a class="navbar-brand bi-people-fill text-white" href="/friends">Friends</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            
                            <li class="nav-item"><a class="nav-link" href="pricing.html">Earning</a></li>
                            
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownBlog" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Account</a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownBlog">
                                    <li><a class="dropdown-item" href="blog-home.html">View profile</a></li>
                                    <li><a class="dropdown-item" href="blog-post.html">Log out</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownPortfolio" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Settings</a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownPortfolio">
                                    <li><a class="dropdown-item" href="portfolio-overview.html">ads</a></li>
                                    <li><a class="dropdown-item" href="portfolio-overview.html">Privacy</a></li>
                                    <li><a class="dropdown-item" href="portfolio-overview.html">Feedback</a></li>
                                    
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
    @endsection