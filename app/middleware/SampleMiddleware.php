<?php
namespace webfiori\examples;

use webfiori\framework\middleware\AbstractMiddleware;
use webfiori\http\Request;
use webfiori\http\Response;
/**
 * A sample middleware implementation.
 *
 * @author Ibrahim
 */
class SampleMiddleware extends AbstractMiddleware {
    public function __construct() {
        //Each middleware must have a unique name.
        parent::__construct('sample-middleware');

        //Set the priority to higher number to reach it first.
        $this->setPriority(0);

        //Add the middleware to the global middleware group
        $this->addToGroup('global');
    }
    public function after(Request $request, Response $response) {
        // A routine to execute after sending the response and before terminating 
        // The application.
    }

    public function afterSend(Request $request, Response $response) {
        // A routine to execute after terminating The application
    }

    public function before(Request $request, Response $response) {
        // A routine to execute before entering the application
        //Response::write('Terminate before reach app.');
        //Response::send();
    }
}
