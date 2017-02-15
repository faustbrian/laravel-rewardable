<?php
/**
 * Created by PhpStorm.
 * User: mischaking
 * Date: 13/2/17
 * Time: 1:32 PM
 */

namespace BrianFaust\Rewardable;


use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    public function __construct(array $attributes = [])
    {
        $this->table = config('rewardable.database.table_prefix') . $this->table;
        parent::__construct($attributes);
    }
}