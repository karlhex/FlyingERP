<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait WithSearch{
    protected $search_array = [];
    protected $search_resource = null;
    protected $search_model = null;

    public function initSearch( $model, $search_array, $resource ){
        $this->search_model = $model;
        $this->search_array = $search_array;
        $this->search_resource = $resource;
    }


    /**
     * 查找相关的用户
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $quest)
    {
        if ($this->search_model == null) return ;

        $searchstring = $quest->query('search','#NONE#');

        if ($searchstring === '#NONE#') {
            $result = $this->search_model::all();
        }else {
            $q = null;
            foreach ( $this->search_array as $item ) {
                if ($q == null)
                    $q = $this->search_model::where($item, 'LIKE', '%'.$searchstring.'%');
                else
                    $q = $q->orWhere($item, 'LIKE', '%'.$searchstring.'%');
            }

            $result = $q->get();
        }

        return $this->search_resource::collection($result);
    }
}
