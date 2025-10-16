<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');

// =========================
// PUBLIC BLOG ROUTES
// =========================
$routes->get('admin/dashboard', 'Admin\Dashboard::index');
$routes->get('/', 'Blog::index');
$routes->get('post/(:segment)', 'Blog::view/$1');

// =========================
// ADMIN AUTH ROUTES
// =========================
$routes->get('admin/login', 'Admin\Auth::login');
$routes->post('admin/login', 'Admin\Auth::login');
$routes->get('admin/logout', 'Admin\Auth::logout');

// =========================
// ADMIN POST CRUD ROUTES
// =========================
$routes->get('admin/posts', 'Admin\Posts::index');
$routes->get('admin/posts/create', 'Admin\Posts::create');
$routes->post('admin/posts/store', 'Admin\Posts::store');
$routes->get('admin/posts/edit/(:num)', 'Admin\Posts::edit/$1');
$routes->post('admin/posts/update/(:num)', 'Admin\Posts::update/$1');
$routes->get('admin/posts/delete/(:num)', 'Admin\Posts::delete/$1');
$routes->post('admin/posts/upload', 'Admin\Posts::uploadImage');

// =========================
// API ROUTE (BONUS)
// =========================
// API resource for posts (only index and show)
$routes->resource('api/posts', ['controller' => 'Api\PostsController', 'only' => ['index', 'show']]);

