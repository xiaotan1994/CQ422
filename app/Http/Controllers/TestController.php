<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Home\Member;
//use Input;
//use Illuminate\Support\Facades\Input;

use DB;

class TestController extends Controller
{
    public function test1(){
		phpinfo();
	}
	//在控制器里面对数据库进行增删改查
	public function add(){
		//对数据库中某个表增加数据主要有两个函数可以实现，分别为insert()和insertGetId()
		//insert() 可以同时添加一条或者多条，返回值是布尔类型
		//insertGetId()只能添加一条数据，返回自增的id
		$db = DB::table('class_info')->insert([
				[
						'name'=>'xiao1',
						'age'=>'21',
						'class'=>'3'
				],
				[
						'name'=>'xiao2',
						'age'=>'22',
						'class'=>'4'
				]
			
		]);
		dd($db);
		
	}
	public function del(){
		echo "method del";
		//增加
		
	}
	public function update(){
		//更新
		$db = DB::table('class_info')->where('id','1')->update(
					//需要修改字段值
					['name'=>'张三丰']
		);
		dd($db);
		
		
	}
	public function select(){
		//查询数据
		//$db = DB::table('class_info')->where('id','<','3')->where('name','张三丰')->get();
		//foreach($db as $key=>$value){
		//		echo $value->id;
		//}
		//$db = DB::table('class_info')->where('id','1')->value('name');
		$db = DB::table('class_info')->where('id','>','1')->select('name','id')->orderBy('id','desc')->get();
		dd($db);
		
	}
	//模型增删改查
	public function Madd(){
		//实例化模型，将表和类映射起来
		$model = new Member();
		$model->name ='woshi';
		$model->age ='11';
		$model->class = '2213213';
		$model->save();
			//增加
	}
	public function Mdel(){
			//删除
	}
	public function Mupdate(){
			//使用or模型修改操作
			//$data = Member::find(7);
			//$data->name='你好';
			//$data->age = '23';
			//$result = $data->save();
			$result = Member::where('id','5')->update([
						'age'=>83,
			]);
			dd($result);
	}
	public function Mselect(){
		//查询指定主键的记录
		//$info = Member::find(4)->toArray();//结果转化为数组
		//查询符合条件的第一条记录
		//$data = Member::where('id','<','3')->first()->toArray();
		//获取多行并且指定字段,与get方法的区别，all不支持连接其他的辅助查询方法,可以在括号内填写需要的查询字段
		//$data = Member::all('name','age');
		$data = Member::where('id','3')->get();
		dd($data);
			//查找
	}
	//对表单提交自动进行认证
	public function yanzheng(Request $request){
		if($request->getMethod() == 'POST'){
			//对提交表单进行自动验证
			$this->validate($request,[
						'name'=>'required|min:2|max:5',
						'age'=>'required|integer|min:1',
						'class'=>'required',
			]);


		}else{
			return view('home.vilidate');
		}
		
	}
	public function luyou(){
		//return [1,2,3];
		return response([1,2,3]);
	}
	public function table_name(){
		//多个where条件
		//$info = DB::table('class_info')->where('name','like','%三%')->get();
		//条件为等于情况
		//$info =DB::table('class_info')->where([
			//	'age'=>21,
				//'class'=>3
		//])->get();
		//条件为非等于
		//$info =DB::table('class_info')->where([
			//	['age','=',21],
				//['class','=',3]
		//])->get();
//		$info =DB::table('class_info') ->where('name','xiao2')
//									   ->orWhere(function($query){
//										   $query->where('age',22);
//									   })->get();
       // $info = DB::table('class_info')->whereIn('age',[21,22,50])->get();
        //集合
        $info = collect(['张三','lsi','wangwu',null]);
        return $info->reject(function ($value,$key){
                return $value ===null;
        });
		dd($info);
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
