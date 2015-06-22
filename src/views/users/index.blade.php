@extends('CMS::master')

@section('content')
    <section class="content-header">
        <h1>
            <i class="fa fa-users"></i> Users
        </h1>
    </section>
    <section class="content">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"></h3>
                <div class="box-tools pull-right">
                    <a href="{{ route('CMS::admin.users.create') }}" class="btn bg-navy"><i class="fa fa-plus-circle"></i> Create new</a>
                </div>
            </div>
            <div class="box-body">
                {!! Alert::render() !!}
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>E-mail</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->present()->typeTitle }}</td>
                                <td>
                                    @if($user->blocked_at == null)
                                        <span class="label label-success">Active</span>
                                    @else
                                        <span class="label label-danger">Blocked</span>
                                    @endif
                                </td>
                                <td><a href="{{ route('CMS::admin.users.edit', $user->id) }}" class="btn bg-orange btn-sm">Details <i class="fa fa-arrow-circle-right"></i></a></td>
                            </tr>
                        @empty
                            <tr class="active">
                                <td colspan="5">- Empty -</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="box-footer clearfix">
                {{ $users->render() }}
            </div>
        </div>
    </section>
@endsection