<?php

namespace Controller;

use Model\PositionChange;
use Src\View;

class PositionChanges
{
    public function showPositionChanges(): string
    {  
        $positionChanges = PositionChange::all();
        // var_dump(new View())->render('table.employees', ['employees' => $employees]);
        return (new View())->render('site.positionChanges', ['positionChanges' => $positionChanges]);
    }
}