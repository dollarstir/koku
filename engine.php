<?php

require_once 'loader/autoloader.php';
$router = new Router([
    /* Welcome to Yolk RouteEngine
     ***************************************************************
     * the ('/migration') route should be commented out  in production mode.
     * To avoid destruction of database
     *
     * use it in Development mode to build your database tables
     *************************************************************
     * NB :  ('/') - indicate the default page that loads
     * changet he this rounte destination to your default website homepage file after installation successful
     * eg : new Route(
        '/',
        function ($context) {
            return Viewer::view('mainfiles/index.php', $context);
        }
    ),
    ************************************************************************************
     */

    new Route(
        '/migration',
        function ($context) {
            return Viewer::view('storage/database.php', $context);
        }
    ),

    new Route(
        '/',
        function ($context) {
            return Viewer::view('gadmin/glomot.php', $context);
        }
    ),

    new Route(
        '/admin',
        function ($context) {
            return Viewer::view('gadmin/glomot.php', $context);
        }
    ),

    new Route(
        '/newtrip',
        function ($context) {
            return Viewer::view('gadmin/add_faculty.php', $context);
        }
    ),

    new Route(
        '/trips',
        function ($context) {
            return Viewer::view('gadmin/list_trips.php', $context);
        }
    ),

    new Route(
        '/pits',
        function ($context) {
            return Viewer::view('gadmin/list_pits.php', $context);
        }
    ),

    new Route(
        '/trucks',
        function ($context) {
            return Viewer::view('gadmin/list_trucks.php', $context);
        }
    ),

    new Route(
        '/admins',
        function ($context) {
            return Viewer::view('gadmin/list_admins.php', $context);
        }
    ),
]);
$router->launch();
