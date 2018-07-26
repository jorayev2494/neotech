<div class="content-wrapper">
    <div class="container-fluid">

        @if (session()->has("success_store"))
            <div class="alert alert-success">
                <ul>
                    <li>{{ session()->pull("success_store") }}</li>
                </ul>
            </div>
        @endif 

        @if (session()->has("success_update"))
            <div class="alert alert-success">
                <ul>
                    <li>{{ session()->pull("success_update") }}</li>
                </ul>
            </div>
        @endif

        @if (session()->has("success_deleted"))
            <div class="alert alert-success">
                <ul>
                    <li>{{ session()->pull("success_deleted") }}</li>
                </ul>
            </div>
        @endif

        <header class="widget-header">
            {{ $title or "Userss!" }}
            <a href="{{ route('users.create') }}" class="btn btn-success" style="float: right;">Создать</a>
        </header>    

        
            <div class="widget-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Created_at</th>
                            <th>Updated_at</th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>

                    @if (isset($users))
                        <tbody>
                            
                            @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{{ $user->id }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>{{ $user->updated_at }}</td>

                                    <td class="text-right">
                                        
                                        <button class="btn btn-transparent btn-transparent-soueccess btn-xs">
                                            <span class="fa fa-pencil"></span>
                                            <span class="hidden-xs hidden-sm hidden-md">
                            
                                            <a href="{{ route('users.edit', $user->id) }}" style="color: #08ed72 !important;">Edit</a>
                                            </span>
                                        </button>
                                        
                                            
                                        <div class="btn btn-transparent btn-transparent-danger btn-xs">
                                            {!! Form::open(["url" => route("users.destroy", $user->id), "method" => "POST"]) !!}
                                                    {!! Form::hidden("_method", "DELETE") !!}

                                                    <span class="fa fa-trash-o"></span>
                                                    {!! Form::submit("Delete", ["style" => "border: none; background: none;"]) !!}
                                            {!! Form::close() !!}
                                        </div>
                                            
                                    </td>

                                </tr>
                            @endforeach

                        </tbody>
                    @endif

                </table>
            </div>
        
    </div>
</div>