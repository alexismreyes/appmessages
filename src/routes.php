<?php

namespace PHPMaker2023\appmessage;

use Slim\App;
use Slim\Routing\RouteCollectorProxy;
use Slim\Exception\HttpNotFoundException;

// Handle Routes
return function (App $app) {
    // message_tbl
    $app->map(["GET","POST","OPTIONS"], '/MessageTblList[/{id_message}]', MessageTblController::class . ':list')->add(PermissionMiddleware::class)->setName('MessageTblList-message_tbl-list'); // list
    $app->map(["GET","POST","OPTIONS"], '/MessageTblAdd[/{id_message}]', MessageTblController::class . ':add')->add(PermissionMiddleware::class)->setName('MessageTblAdd-message_tbl-add'); // add
    $app->map(["GET","POST","OPTIONS"], '/MessageTblDelete[/{id_message}]', MessageTblController::class . ':delete')->add(PermissionMiddleware::class)->setName('MessageTblDelete-message_tbl-delete'); // delete
    $app->group(
        '/message_tbl',
        function (RouteCollectorProxy $group) {
            $group->map(["GET","POST","OPTIONS"], '/' . Config('LIST_ACTION') . '[/{id_message}]', MessageTblController::class . ':list')->add(PermissionMiddleware::class)->setName('message_tbl/list-message_tbl-list-2'); // list
            $group->map(["GET","POST","OPTIONS"], '/' . Config('ADD_ACTION') . '[/{id_message}]', MessageTblController::class . ':add')->add(PermissionMiddleware::class)->setName('message_tbl/add-message_tbl-add-2'); // add
            $group->map(["GET","POST","OPTIONS"], '/' . Config('DELETE_ACTION') . '[/{id_message}]', MessageTblController::class . ':delete')->add(PermissionMiddleware::class)->setName('message_tbl/delete-message_tbl-delete-2'); // delete
        }
    );

    // sent_tbl
    $app->map(["GET","POST","OPTIONS"], '/SentTblList[/{id_sent}]', SentTblController::class . ':list')->add(PermissionMiddleware::class)->setName('SentTblList-sent_tbl-list'); // list
    $app->map(["GET","POST","OPTIONS"], '/SentTblView[/{id_sent}]', SentTblController::class . ':view')->add(PermissionMiddleware::class)->setName('SentTblView-sent_tbl-view'); // view
    $app->map(["GET","POST","OPTIONS"], '/SentTblDelete[/{id_sent}]', SentTblController::class . ':delete')->add(PermissionMiddleware::class)->setName('SentTblDelete-sent_tbl-delete'); // delete
    $app->group(
        '/sent_tbl',
        function (RouteCollectorProxy $group) {
            $group->map(["GET","POST","OPTIONS"], '/' . Config('LIST_ACTION') . '[/{id_sent}]', SentTblController::class . ':list')->add(PermissionMiddleware::class)->setName('sent_tbl/list-sent_tbl-list-2'); // list
            $group->map(["GET","POST","OPTIONS"], '/' . Config('VIEW_ACTION') . '[/{id_sent}]', SentTblController::class . ':view')->add(PermissionMiddleware::class)->setName('sent_tbl/view-sent_tbl-view-2'); // view
            $group->map(["GET","POST","OPTIONS"], '/' . Config('DELETE_ACTION') . '[/{id_sent}]', SentTblController::class . ':delete')->add(PermissionMiddleware::class)->setName('sent_tbl/delete-sent_tbl-delete-2'); // delete
        }
    );

    // contact_tbl
    $app->map(["GET","POST","OPTIONS"], '/ContactTblList[/{id_contact}]', ContactTblController::class . ':list')->add(PermissionMiddleware::class)->setName('ContactTblList-contact_tbl-list'); // list
    $app->map(["GET","POST","OPTIONS"], '/ContactTblAdd[/{id_contact}]', ContactTblController::class . ':add')->add(PermissionMiddleware::class)->setName('ContactTblAdd-contact_tbl-add'); // add
    $app->map(["GET","POST","OPTIONS"], '/ContactTblAddopt', ContactTblController::class . ':addopt')->add(PermissionMiddleware::class)->setName('ContactTblAddopt-contact_tbl-addopt'); // addopt
    $app->map(["GET","POST","OPTIONS"], '/ContactTblEdit[/{id_contact}]', ContactTblController::class . ':edit')->add(PermissionMiddleware::class)->setName('ContactTblEdit-contact_tbl-edit'); // edit
    $app->map(["GET","POST","OPTIONS"], '/ContactTblDelete[/{id_contact}]', ContactTblController::class . ':delete')->add(PermissionMiddleware::class)->setName('ContactTblDelete-contact_tbl-delete'); // delete
    $app->group(
        '/contact_tbl',
        function (RouteCollectorProxy $group) {
            $group->map(["GET","POST","OPTIONS"], '/' . Config('LIST_ACTION') . '[/{id_contact}]', ContactTblController::class . ':list')->add(PermissionMiddleware::class)->setName('contact_tbl/list-contact_tbl-list-2'); // list
            $group->map(["GET","POST","OPTIONS"], '/' . Config('ADD_ACTION') . '[/{id_contact}]', ContactTblController::class . ':add')->add(PermissionMiddleware::class)->setName('contact_tbl/add-contact_tbl-add-2'); // add
            $group->map(["GET","POST","OPTIONS"], '/' . Config('ADDOPT_ACTION') . '', ContactTblController::class . ':addopt')->add(PermissionMiddleware::class)->setName('contact_tbl/addopt-contact_tbl-addopt-2'); // addopt
            $group->map(["GET","POST","OPTIONS"], '/' . Config('EDIT_ACTION') . '[/{id_contact}]', ContactTblController::class . ':edit')->add(PermissionMiddleware::class)->setName('contact_tbl/edit-contact_tbl-edit-2'); // edit
            $group->map(["GET","POST","OPTIONS"], '/' . Config('DELETE_ACTION') . '[/{id_contact}]', ContactTblController::class . ':delete')->add(PermissionMiddleware::class)->setName('contact_tbl/delete-contact_tbl-delete-2'); // delete
        }
    );

    // send
    $app->map(["GET", "POST", "OPTIONS"], '/Send[/{params:.*}]', SendController::class . ':custom')->add(PermissionMiddleware::class)->setName('Send-send-custom'); // custom

    // twilio_tbl
    $app->map(["GET","POST","OPTIONS"], '/TwilioTblList', TwilioTblController::class . ':list')->add(PermissionMiddleware::class)->setName('TwilioTblList-twilio_tbl-list'); // list
    $app->group(
        '/twilio_tbl',
        function (RouteCollectorProxy $group) {
            $group->map(["GET","POST","OPTIONS"], '/' . Config('LIST_ACTION') . '', TwilioTblController::class . ':list')->add(PermissionMiddleware::class)->setName('twilio_tbl/list-twilio_tbl-list-2'); // list
        }
    );

    // twresponse_tbl
    $app->map(["GET","POST","OPTIONS"], '/TwresponseTblList[/{id_twresponse}]', TwresponseTblController::class . ':list')->add(PermissionMiddleware::class)->setName('TwresponseTblList-twresponse_tbl-list'); // list
    $app->map(["GET","POST","OPTIONS"], '/TwresponseTblView[/{id_twresponse}]', TwresponseTblController::class . ':view')->add(PermissionMiddleware::class)->setName('TwresponseTblView-twresponse_tbl-view'); // view
    $app->group(
        '/twresponse_tbl',
        function (RouteCollectorProxy $group) {
            $group->map(["GET","POST","OPTIONS"], '/' . Config('LIST_ACTION') . '[/{id_twresponse}]', TwresponseTblController::class . ':list')->add(PermissionMiddleware::class)->setName('twresponse_tbl/list-twresponse_tbl-list-2'); // list
            $group->map(["GET","POST","OPTIONS"], '/' . Config('VIEW_ACTION') . '[/{id_twresponse}]', TwresponseTblController::class . ':view')->add(PermissionMiddleware::class)->setName('twresponse_tbl/view-twresponse_tbl-view-2'); // view
        }
    );

    // captcha
    $app->map(["GET","OPTIONS"], '/captcha[/{page}]', OthersController::class . ':captcha')->add(PermissionMiddleware::class)->setName('captcha');

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
