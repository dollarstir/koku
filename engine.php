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
        '/glomotadmin',
        function ($context) {
            return Viewer::view('gadmin/glomot.php', $context);
        }
    ),

    new Route(
        '/newfaculty',
        function ($context) {
            return Viewer::view('gadmin/add_faculty.php', $context);
        }
    ),

    new Route(
        '/faculties',
        function ($context) {
            return Viewer::view('gadmin/list_faculties.php', $context);
        }
    ),

    new Route(
        '/newdepartment',
        function ($context) {
            return Viewer::view('gadmin/add_department.php', $context);
        }
    ),

    new Route(
        '/departments',
        function ($context) {
            return Viewer::view('gadmin/list_departments.php', $context);
        }
    ),

    new Route(
        '/newprogramme',
        function ($context) {
            return Viewer::view('gadmin/add_programme.php', $context);
        }
    ),

    new Route(
        '/programmes',
        function ($context) {
            return Viewer::view('gadmin/list_programmes.php', $context);
        }
    ),

    new Route(
        '/newcourse',
        function ($context) {
            return Viewer::view('gadmin/add_course.php', $context);
        }
    ),

    new Route(
        '/courses',
        function ($context) {
            return Viewer::view('gadmin/list_courses.php', $context);
        }
    ),

    new Route(
        '/newposition',
        function ($context) {
            return Viewer::view('gadmin/add_position.php', $context);
        }
    ),

    new Route(
        '/positions',
        function ($context) {
            return Viewer::view('gadmin/list_positions.php', $context);
        }
    ),
]);
$router->launch();
