<!DOCTYPE html>
<html>
<body>
@if (count($errors)>0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="" method="post">
姓名:<br>
<input type="text" name="name" value="">
<br>
年龄:<br>
<input type="text" name="age" value="">
<br>
班级:<br>
<input type="text" name="class" value="">
{{csrf_field()}}
<br>
<input type="submit"  value="提交">
</form>
</body>
</html>























