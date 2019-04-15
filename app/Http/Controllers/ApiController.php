<?php
/**
 * Created by PhpStorm.
 * User: donyino
 * Date: 2019-04-14
 * Time: 18:37
 */

namespace App\Http\Controllers;


use App\API\ChildSponsorDetailsTransformer;
use App\API\ChildTransformer;
use App\API\SponsorTransformer;
use App\Child;
use App\ChildSponsorDetail;
use App\Sponsor;
use League\Fractal\Resource\Collection;

class ApiController extends ApiControlController
{
    public function getChildrenData()
    {
        $children =  new Child();

        $filtered = $this->filter($children);

        return $this->makeSortableFilterablePaginated($filtered, new  ChildTransformer());
    }

    public function getSponsorsData()
    {
        $sponsors =  new Sponsor();

        $filtered = $this->filter($sponsors);

        return $this->makeSortableFilterablePaginated($filtered, new  SponsorTransformer());
    }

    public function getChildSponsorsData()
    {
        $child_sponsor_details =  new ChildSponsorDetail();

        $filtered = $this->filter($child_sponsor_details);

        return $this->makeSortableFilterablePaginated($filtered, new  ChildSponsorDetailsTransformer());
    }

    public function getUpdatedChildrenData()
    {
        return $this->getChildrenData();
    }

    public function getUpdatedSponsorData()
    {
        return $this->getSponsorsData();
    }

    public function makeSortableFilterablePaginated($filtered, $transformer)
    {
        $paginated = $this->sortAndPaginate($filtered);

        $resource = new Collection($paginated['model'], $transformer);

        $this->addPaginationToResource($paginated, $resource);

        return $this->fractal->createData($resource)->toJson();
    }
}