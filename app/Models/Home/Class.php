<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Class extends Model
{
    //use HasFactory;
	//定义模型关联的数据表，一个模型只操作一个表，如果不定义默认关联数据表classs表
	protected $table ='class_info';
	//定义主键（可选）
	protected $primaryKey ='id';
	//定义禁止操作时间(可选)
	pubic $timestamps =false;
	//设置允许写入的数据字段（可选），使用creat()插入必须进行定义
	protected $fillable =['id','name','age','class'];
}
