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
            <a href="{{ route('aliases.create') }}" class="btn btn-success" style="float: right;">Создать</a>
        </header>    

        
            <div class="widget-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>№</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Body</th>
                            <th>Group</th>
                            <th>Action</th>
                            <th>Created_at</th>
                            {{--  <th>Updated_at</th>  --}}
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>

                    {{--  {{ dump($aliases) }}  --}}
                    @if (isset($aliases))
                        <tbody>
                            
                            @foreach ($aliases as $key => $alias)
                            {{-- {{ dd($alias->groups[0]->title) }} --}}
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ str_limit($alias->title, 20) }}</td>
                                    <td><img src="{{ asset(env('THEME')) }}/img/blog/{{ $alias->img }}" alt="{{ $alias->img }}" style="width: 65px; height: auto"></td>
                                    <td>{{ str_limit($alias->body, 30) }}</td>
                                    
                                    @foreach ($alias->groups as $group)
                                        <td style="text-transform: capitalize;">{{ $group->title }}</td>
                                    @endforeach
                                    
                                    <td style="{{ ($alias->action) ? 'color: #06BC5A;' : 'color: red;' }} text-align: center;">{{ $alias->action }}</td>
                                    <td>{{ $alias->created_at->format("j F, Y") }}</td>
                                    {{--  <td>{{ $alias->updated_at->format("j F, Y") }}</td>  --}}

                                    <td class="text-right">
                                        
                                        <button class="btn btn-transparent btn-transparent-soueccess btn-xs">
                                            <span class="fa fa-pencil"></span>
                                            <span class="hidden-xs hidden-sm hidden-md">
                            
                                            <a href="{{ route('aliases.edit', $alias->id) }}" style="color: #08ed72 !important;">Edit</a>
                                            </span>
                                        </button>
                                        
                                        <div class="btn btn-transparent btn-transparent-danger btn-xs">
                                            {!! Form::open(["url" => route("aliases.destroy", $alias->id), "method" => "POST"]) !!}
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
                {{-- {!! $aliases !!} --}}
                <div style="float: right;">{{ $aliases->links() }}</div>   
    </div>
</div>