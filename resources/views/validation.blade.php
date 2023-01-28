<h1>Laravel Validation</h1>
<ul>
    @foreach($errors->all() as $message)
        <li>{{$message}}</li>
    @endforeach
</ul>
<form action="{{url('validation')}}" method="post">
    @csrf
    <input type="text" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Password">
    <button type="submit">submit</button>
</form>