<?php

namespace PHPMaker2023\appmessage;

use Slim\App;
use Slim\Routing\RouteCollectorProxy;
use Slim\Exception\HttpNotFoundException;

// Handle Routes
return function (App $app) {
    // message_tbl
    $app->map(["GET","POST","OPTIONS"], '/MessageTblList[/{id_message}]', MessageTblController::class . ':list')->add(PermissionMiddleware::class)->setName('MessageTblList-message_tbl-list'); // list
    $app->group(
        '/message_tbl',
        function (RouteCollectorProxy $group) {
            $group->map(["GET","POST","OPTIONS"], '/' . Config('LIST_ACTION') . '[/{id_message}]', MessageTblController::class . ':list')->add(PermissionMiddleware::class)->setName('message_tbl/list-message_tbl-list-2'); // list
        }
    );

    // sent_tbl
    $app->map(["GET","POST","OPTIONS"], '/SentTblList[/{id_sent}]', SentTblController::class . ':list')->add(PermissionMiddleware::class)->setName('SentTblList-sent_tbl-list'); // list
    $app->map(["GET","POST","OPTIONS"], '/SentTblAdd[/{id_sent}]', SentTblController::class . ':add')->add(PermissionMiddleware::class)->setName('SentTblAdd-sent_tbl-add'); // add
    $app->map(["GET","POST","OPTIONS"], '/SentTblView[/{id_sent}]', SentTblController::class . ':view')->add(PermissionMiddleware::class)->setName('SentTblView-sent_tbl-view'); // view
    $app->map(["GET","POST","OPTIONS"], '/SentTblEdit[/{id_sent}]', SentTblController::class . ':edit')->add(PermissionMiddleware::class)->setName('SentTblEdit-sent_tbl-edit'); // edit
    $app->map(["GET","POST","OPTIONS"], '/SentTblDelete[/{id_sent}]', SentTblController::class . ':delete')->add(PermissionMiddleware::class)->setName('SentTblDelete-sent_tbl-delete'); // delete
    $app->group(
        '/sent_tbl',
        function (RouteCollectorProxy $group) {
            $group->map(["GET","POST","OPTIONS"], '/' . Config('LIST_ACTION') . '[/{id_sent}]', SentTblController::class . ':list')->add(PermissionMiddleware::class)->setName('sent_tbl/list-sent_tbl-list-2'); // list
            $group->map(["GET","POST","OPTIONS"], '/' . Config('ADD_ACTION') . '[/{id_sent}]', SentTblController::class . ':add')->add(PermissionMiddleware::class)->setName('sent_tbl/add-sent_tbl-add-2'); // add
            $group->map(["GET","POST","OPTIONS"], '/' . Config('VIEW_ACTION') . '[/{id_sent}]', SentTblController::class . ':view')->add(PermissionMiddleware::class)->setName('sent_tbl/view-sent_tbl-view-2'); // view
            $group->map(["GET","POST","OPTIONS"], '/' . Config('EDIT_ACTION') . '[/{id_sent}]', SentTblController::class . ':edit')->add(PermissionMiddleware::class)->setName('sent_tbl/edit-sent_tbl-edit-2'); // edit
            $group->map(["GET","POST","OPTIONS"], '/' . Config('DELETE_ACTION') . '[/{id_sent}]', SentTblController::class . ':delete')->add(PermissionMiddleware::class)->setName('sent_tbl/delete-sent_tbl-delete-2'); // delete
        }
    );

    // Swagger
    $app->get('/' . Config("SWAGGER_ACTION"), OthersController::class . ':swagger')->setName(Config("SWAGGER_ACTION")); // Swagger

    // Index
    $app->get('/[index]', OthersController::class . ':index')->add(PermissionMiddleware::class)->setName('index');

    // Route Action event
    if (function_exists(PROJECT_NAMESPACE . "Route_Action")) {
        if (Route_Action($app) === false) {
            return;
        }
    }

    /**
     * Catch-all route to serve a 404 Not Found page if none of the routes match
     * NOTE: Make sure this route is defined last.
     */
    $app->map(
        ['GET', 'POST', 'PUT', 'DELETE', 'PATCH'],
        '/{routes:.+}',
        function ($request, $response, $params) {
            throw new HttpNotFoundException($request, str_replace("%p", $params["routes"], Container("language")->phrase("PageNotFound")));
        }
    );
};
