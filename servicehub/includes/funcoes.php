<?php
function statusTexto($status)
{
    switch ($status) {
        case 1:
            return "Pendente";
            break;
        case 2:
            return "Em Andamento";
            break;
        case 3:
            return "Finalizada";
            break;
        case 4:
            return "Cancelada";
            break;
        case 5:
            return "Recusada";
            break;
        default:
            return "Desconhecido";
    }
}
