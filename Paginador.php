<?php

class Paginador {

    private $_conn;
    private $_limite;
    private $_pagina;
    private $_consulta;
    private $_total;

    public function __construct($_conn, $_consulta) {

        $this->_conn = $_conn;
        $this->_consulta = $_consulta;

        $respuesta = $this->_conn->$_consulta($this->_consuta);
        $this->_total = $respuesta->num_rows;
    }

    public function getData($limit = 10, $page = 1) {

        $this->_limite = $limit;
        $this->_pagina = $page;

        if ($this->_limite == 'all') {
            $query = $this->_consulta;
        } else {
            $query = $this->_consulta . " LIMIT " . ( ( $this->_pagina - 1 ) * $this->_limite ) . ", $this->_limite";
        }
        $rs = $this->_conn->query($query);

        while ($row = $rs->fetch_assoc()) {
            $results[] = $row;
        }

        $result = new stdClass();
        $result->page = $this->_page;
        $result->limit = $this->_limit;
        $result->total = $this->_total;
        $result->data = $results;

        return $result;
    }

    public function createLinks($links, $list_class) {
        if ($this->_limite == 'all') {
            return '';
        }

        $last = ceil($this->_total / $this->_limite);

        $start = ( ( $this->_pagina - $links ) > 0 ) ? $this->_pagina - $links : 1;
        $end = ( ( $this->_pagina + $links ) < $last ) ? $this->_pagina + $links : $last;

        $html = '<ul class="' . $list_class . '">';

        $class = ( $this->_pagina == 1 ) ? "disabled" : "";
        $html .= '<li class="' . $class . '"><a href="?limit=' . $this->_limite . '&page=' . ( $this->_pagina - 1 ) . '">&laquo;</a></li>';

        if ($start > 1) {
            $html .= '<li><a href="?limit=' . $this->_limite . '&page=1">1</a></li>';
            $html .= '<li class="disabled"><span>...</span></li>';
        }

        for ($i = $start; $i <= $end; $i++) {
            $class = ( $this->_pagina == $i ) ? "active" : "";
            $html .= '<li class="' . $class . '"><a href="?limit=' . $this->_limite . '&page=' . $i . '">' . $i . '</a></li>';
        }

        if ($end < $last) {
            $html .= '<li class="disabled"><span>...</span></li>';
            $html .= '<li><a href="?limit=' . $this->_limite . '&page=' . $last . '">' . $last . '</a></li>';
        }

        $class = ( $this->_pagina == $last ) ? "disabled" : "";
        $html .= '<li class="' . $class . '"><a href="?limit=' . $this->_limite . '&page=' . ( $this->_pagina + 1 ) . '">&raquo;</a></li>';

        $html .= '</ul>';

        return $html;
    }

}
