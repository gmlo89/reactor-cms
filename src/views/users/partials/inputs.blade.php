{!! Field::text('name') !!}
{!! Field::email('email') !!}
{!! Field::select('type', $user_types) !!}
@if(!isset($user) or $user->avatar == null)
    {!! Field::file('avatar') !!}
@else
    <div class="row">
        <div class="col-md-2">
            <img src="{{ asset($user->avatar) }}" class="img-responsive" alt="avatar">
        </div>
        <div class="col-md-10">
            {!! Field::file('avatar') !!}
        </div>
    </div>
@endif