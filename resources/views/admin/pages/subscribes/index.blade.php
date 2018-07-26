<div class="content-wrapper">
    <div class="container-fluid">

        @if (session()->has("success_store"))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <ul>
                    <li>{{ session()->pull("success_store") }}</li>
                </ul>
            </div>
        @endif 

        @if (session()->has("success_update"))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <ul>
                    <li>{{ session()->pull("success_update") }}</li>
                </ul>
            </div>
        @endif

        @if (session()->has("success_deleted"))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <ul>
                    <li>{{ session()->pull("success_deleted") }}</li>
                </ul>
            </div>
        @endif

        @if (session()->has("success_update_active"))
            <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <ul>
                    <li>{{ session()->pull("success_update_active") }}</li>
                </ul>
            </div>
        @endif

        <header class="widget-header">
            {{ $title or "aliasess!" }}
            <a href="{{ route('subscribes.create') }}" class="btn btn-success" style="float: right;">Создать</a>
        </header>    

        
            <div class="widget-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>№</th>
                            <th>Email</th>
                            <th>Action</th>
                            <th>Created_at</th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>

                    {{--  {{ dump($aliases) }}  --}}
                    @if (isset($subscribes))
                        <tbody>
                            
                            @foreach ($subscribes as $key => $subscribe)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td><a href="mailto:{{ $subscribe->email }}">{{ $subscribe->email }}</a></td>

                                    <td style="{{ ($subscribe->action) ? 'color: #06BC5A;' : 'color: red;' }}">{{ $subscribe->action }}</td>
                                    <td>{{ $subscribe->created_at->format("j F, Y") }}</td>

                                    <td class="text-right">
                                        
                                        <button class="btn btn-transparent btn-transparent-soueccess btn-xs">
                                            <span class="fa fa-pencil"></span>
                                            <span class="hidden-xs hidden-sm hidden-md">
                            
                                            <a href="{{ route('subscribes.edit', $subscribe->id) }}" style="color: #08ed72 !important;">Edit</a>
                                            </span>
                                        </button>
                                        
                                        <div class="btn btn-transparent btn-transparent-danger btn-xs">
                                            {!! Form::open(["url" => route("subscribes.destroy", $subscribe->id), "method" => "POST"]) !!}
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
            {{--  <div style="float: right;">{{ $subscribes->links() }}</div>    --}}
    </div>
</div>