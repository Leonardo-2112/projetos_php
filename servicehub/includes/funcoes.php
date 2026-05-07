<?php
function statusTexto($status)
{
    switch ($status) {
        case 1:
            return "Pendente";
        case 2:
            return "Em Andamento";
        case 3:
            return "Finalizada";
        case 4:
            return "Cancelada";
        case 5:
            return "Recusada";
        default:
            return "Desconhecido";
    }
}

function statusCor($status)
{
    switch ($status) {
        case 1:
            return "text-warning";
        case 2:
            return "Em Andamento";
        case 3:
            return "text-danger";
        case 4:
            return "text-danger";
        case 5:
            return "text-danger";
        default:
            return "Desconhecido";
    }
}
