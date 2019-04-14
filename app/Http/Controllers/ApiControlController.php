<?php
/**
 * Created by PhpStorm.
 * User: donyino
 * Date: 2019-04-15
 * Time: 00:28
 */

namespace App\Http\Controllers;

use App\API\DataTables\SortFilterPaginateInterface;
use App\API\DataTables\SortFilterPaginateTrait;
use League\Fractal\Manager;

abstract class ApiControlController extends Controller implements SortFilterPaginateInterface
{
    use SortFilterPaginateTrait;

    protected $fractal;

    private $statusCode = 200;

    public function __construct()
    {
        $this->fractal = new Manager();
    }

    public function getStatusCode()
    {
        return $this->statusCode;
    }

    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    public function respond($data, $headers = [])
    {
        return \response()->json($data, $this->getStatusCode(), $headers);
    }

    public function respondWithError($message = 'Not Found')
    {
        return $this->respond(
            [
                'error'=>[
                    'message'=>$message,
                    'status_code'=>$this->getStatusCode()
                ]
            ]
        );
    }

    public function respondNotFound($message = 'Not Found')
    {
        return $this->setStatusCode(404)->respondWithError($message);
    }

    public function respondInternalError($message = 'Internal Error')
    {
        return $this->setStatusCode(500)->respondWithError($message);
    }
}
