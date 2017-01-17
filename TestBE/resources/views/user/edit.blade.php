{!! Form::open(array('url' => '/update_user/', 'method' => 'POST'), array('role' => 'form')) !!}
    
    {!! Form::label('CREATE', ' USER CREATE ') !!}

    <br><br>

    {!! Form::label('id', 'ID') !!}
    {!! Form::text('id', '') !!}

    <br>

    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', '') !!}

    <br>

    {!! Form::label('gender', 'Gender') !!}
    {!! Form::select('gender', array('M' => 'MALE', 'F' => 'FEMALE')); !!}

    <br>

	{!! Form::label('company', 'Company') !!}
    {!! Form::text('company', '') !!}

    <br>

    {!! Form::label('email', 'Email') !!}
    {!! Form::text('email', '@.com') !!}

    <br>

    {!! Form::label('phone', 'Phone') !!}
    {!! Form::text('phone', '') !!}

    <br>    

    {!! Form::label('address', 'Address') !!}
    {!! Form::text('address', '') !!}

    <br>  


    {!! Form::submit('Create') !!}

{!! Form::close() !!}