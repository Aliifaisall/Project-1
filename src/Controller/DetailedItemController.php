<?php

namespace App\Controller;
/**
 *
 * this class is to controller the image inserting, image description of the art work
 *
 */
class DetailedItemController extends AppController
{
    public function index()
    {
        $Details = $this->paginate($this->Details);

        $this->set(compact('Details'));
    }

    public function join(){

    }

}
