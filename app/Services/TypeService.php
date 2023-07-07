<?php
namespace App\Services;

use App\Http\Requests\TypeRequest;
use App\Models\Type;
use App\Services\Service;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class TypeService extends Service{

    public function getListTypes(){
        $data = Type::all();
        return $data;
    }
    public function create(TypeRequest $request){
        $data = $request->all();
        Type::create(['name' => $data['name']]);
    }
}
