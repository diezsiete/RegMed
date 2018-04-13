<?php

class Paginacion
{
    public $limit = 50;
    private $page = 1;
    private $pageSetted = false;
    private $total;

    protected function getPage()
    {
        if(!$this->pageSetted) {
            if (isset($_GET['page']))
                $this->page = $_GET['page'];
            if ($this->page < 0)
                $this->page = 0;
        }
        return $this->page;
    }

    public function __construct($total = 0, $limit = null)
    {
        $this->total = $total;
        if($limit)
            $this->limit = $limit;
    }

    public function getLimit()
    {
        $page = $this->getPage();
        $limit0 = ( $page - 1 ) * $this->limit;
        if($limit0 < 0)
            $limit0 = 0;
        $limit1 = $this->limit;
        return [$limit0, $limit1];
    }
    
    public function paginacion($load, $links = 3)
    {
        $last  = ceil( $this->total / $this->limit );
        $start = ( ( $this->getPage() - $links ) > 0 ) ? $this->getPage() - $links : 1;
        $end   = ( ( $this->getPage() + $links ) < $last ) ? $this->getPage() + $links : $last;

        return $load->view('paginacion/paginacion', [
            'page' => $this->getPage(),
            'start' => $start,
            'end' => $end,
            'limit' => $this->limit,
            'last' => $last
        ], true );
    }
    
    public function paginacionLinks($links = 10)
    {
        $last  = ceil( $this->total / $this->limit );
        $start = ( ( $this->getPage() - $links ) > 0 ) ? $this->getPage() - $links : 1;
        $end   = ( ( $this->getPage() + $links ) < $last ) ? $this->getPage() + $links : $last;
        $page  = $this->getPage(); 
        
        $links = [];

        $links[] = ['liclass' => $page == 1 ? 'disabled' : '', 'href' => $page == 1 ? '' : $page-1, 'tag' => 'a', 'text' => '&laquo;'];

        if($start > 1){
            $links[] = ['liclass' => '', 'href' => 1, 'text' => 1, 'tag' => 'a'];
            $links[] = ['liclass' => 'disabled', 'tag' => 'span', 'text' => '...'];
        }

        for ( $i = $start ; $i <= $end; $i++ ) {
            $links[] = ['liclass' => $page == $i ? 'active' : '', 'tag' => 'a', 'href' => $i, 'text' => $i];    
        }
        
        if($end < $last){
            $links[] = ['liclass' => 'disabled', 'tag' => 'span', 'text' => '...'];
            $links[] = ['liclass' => '', 'tag' => 'a', 'href' => $last, 'text' => $last];
        }

        $links[] = ['liclass' => $page == $last ? 'disabled' : '', 'href' => $page == $last ? '' : $page+1, 'tag' => 'a', 'text' => '&raquo;'];
        
        return $links;
    }
    
    public function setPage($page)
    {
        $this->page = $page;
        $this->pageSetted = true;
    } 
    
    public function json($cols = [], $rows = [])
    {
        return [
            'cols' => $cols,
            'rows' => $rows,
            'paginacion' => $this->paginacionLinks()
        ];
    }
    
    public function getTotal()
    {
        return $this->total;
    }
    
    public function setTotal($total)
    {
        $this->total = $total;
    }

}