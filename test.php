<?php
if (version_compare(PHP_VERSION, '5.6.0', '<')) {
    exit('Sorry, this script does not run on a PHP version smaller than 5.6.0 !');
}

// Base config param
require_once "includes/config.php";

// Select language, layout, etc
include "common.php";

// Include application config
require_once "includes/main.php";

try {

    if (isset($_GET['help'])) {
        render('help_start', array(
            'title' => $defaultTitle
        ));
    } else if (isset($_GET['game'])) {
        $c = new GameController("");
    } else if (isset($_GET['games'])) {
        $c = new GamesController("");
    } else if (isset($_GET['latestgames'])) {
        $c = new GamesController("");
    } else if (isset($_GET['unplayedgames'])) {
        $c = new GamesController("");
    } else if (isset($_GET['bookedgames'])) {
        $c = new GamesController("");
    } else if (isset($_GET['teams'])) {
        $c = new TeamsController("");
    } else if (isset($_GET['teamstat'])) {
        $c = new TeamStatController("");
    } else if (isset($_GET['playerstat'])) {
        $c = new PlayerStatController("");
    } else if (isset($_GET['team'])) {
        $c = new TeamController("");
    } else if (isset($_GET['arenas'])) {
        $c = new ArenasController("");
    } else if (isset($_GET['rules'])) {
        $c = new RulesController("");
    } else if (isset($_GET['mapoverview'])) {
        $c = new MapOverviewController("");
    } else if (isset($_GET['history'])) {
        $c = new HistoryController("");
    } else if (isset($_GET['referees'])) {
        $c = new RefereesController("");
    } else if (isset($_GET['refereeschedule'])) {
        $c = new RefereeScheduleController("");
    } else if (isset($_GET['info'])) {
        $c = new InfoController("");
    } else if (isset($_GET['refereeregistration'])) {
        $c = new RefereeRegistrationController("");
    } else if (isset($_GET['registration'])) {
        $c = new RegistrationController("");
    } else if (isset($_GET['news'])) {
        $c = new NewsController("");
    } else if (isset($_GET['fairplay'])) {
        $c = new FairplayController("");
    } else if (isset($_GET['userpage'])) {
        $c = new UserPageController("");
    } else if (isset($_GET['overview'])) {
        $c = new OverviewController("");
    } else if (isset($_GET['overviewclass'])) {
        $c = new OverviewClassController("");
    } else if (isset($_GET['overviewgroup'])) {
        $c = new OverviewGroupController("");
    } else if (isset($_GET['overviewplayoff'])) {
        $c = new OverviewPlayoffController("");
        // } else if (isset ( $_GET ['cup'] )) {
        // $c = new HomeCupController ( $_GET ['id'] );
    } else if (isset($_GET['home'])) {
        $c = new HomeController("");
    } else {
        $c = new CupdirController("");
    }
    // else throw new Exception('Wrong page!');

    $c->handleRequest();
} catch (Exception $e) {
    // Display the error page using the "render()" helper function:
    render('error', array(
        'message' => $e->getMessage()
    ));
}
