<?php

namespace app\model;

use think\db\exception\DataNotFoundException;
use think\db\exception\DbException;
use think\db\exception\ModelNotFoundException;

class AdminModel extends BaseModel
{
    protected $table = "litemall_admin";
}
