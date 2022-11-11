<?php

namespace App\Db;

class Pagination{
    
    public $limit;
    public $results;
    public $pages;
    public $currentPage;

    public function __construct($results, $currentPage = 1, $limit = 10){
        $this->results = $results;
        $this->limit = $limit;
        $this->currentPage = (is_numeric($currentPage) and $currentPage > 0) ? $currentPage : 1;
        $this->calculate();
    }

    private function calculate(){
        $this->pages = $this->results > 0 ? ceil($this->results/$this->limit) : 1;
        $this->currentPage = $this->currentPage <= $this->pages ? $this->currentPage : $this->pages;
    }

    public function getLimit(){
        $offSet = ($this->limit * ($this->currentPage -1));
        return $offSet.', '.$this->limit;
    }

    public function getPages(){
        if($this->pages == 1) return [];
        $paginas = [];
        for($i=1; $i<=$this->pages; $i++){
            $paginas[] = [
                'pagina' => $i,
                'atual' => $i == $this->currentPage
            ];
        }
        return $paginas; 
    }
}
