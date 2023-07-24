<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Http\Requests\ItemRequest;
use App\Services\ItemService;
use App\Models\Item;
class ItemController extends BaseController
{
    protected string $folder = 'items';
    protected string $model  = 'App\\Models\\Item';
    protected string $message = 'المنتج';

    
}
