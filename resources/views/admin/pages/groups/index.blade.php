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
            <a href="{{ route('groups.create') }}" class="btn btn-success" style="float: right;">Создать</a>
        </header>    

        
            <div class="widget-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>№</th>
                            <th>Title</th>
                            <th>Count</th>
                            <th>On</th>                            
                            <th>Off</th>
                            <th>Action</th>
                            <th>Created_at</th>
                            <th>Updated_at</th>
                            {{--  <th>Updated_at</th>  --}}
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>

                    {{--  {{ dump($aliases) }}  --}}
                    @if (isset($groups))
                        <tbody>
                            @foreach ($groups as $key => $group)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td style="text-transform: capitalize;">{{ $group->title }}</td>
                                    <td>{{ count($group->aliases) }}</td>

                                    <?php $on = 0 ?>
                                    @foreach ($group->aliases as $alias)
                                        @if ($alias->action == 1 )                                            
                                            <?php $on++; ?>    
                                        @endif
                                    @endforeach
                                    <td style="color: #06BC5A;">{{ $on }}</td>

                                    <?php $off = 0 ?>
                                    @foreach ($group->aliases as $alias)
                                        @if ($alias->action == 0 )                                            
                                            <?php $off++; ?>
                                        @endif
                                    @endforeach
                                    <td style="color: red;">{{ $off }}</td>
                                    
                                    <td style="{{ ($group->action) ? 'color: #06BC5A;' : 'color: red;'}}">{{ $group->action }}</td>
                                    <td>{{ $group->created_at->format("j F, Y") }}</td> 
                                    <td>{{ $group->updated_at->format("j F, Y") }}</td> 

                                    <td class="text-right">
                                        
                                        <button class="btn btn-transparent btn-transparent-soueccess btn-xs">
                                            <span class="fa fa-pencil"></span>
                                            <span class="hidden-xs hidden-sm hidden-md">
                            
                                            <a href="{{ route('groups.edit', $group->id) }}" style="color: #08ed72 !important;">Edit</a>
                                            </span>
                                        </button>
                                        
                                        <div class="btn btn-transparent btn-transparent-danger btn-xs">
                                            {!! Form::open(["url" => route("groups.destroy", $group->id), "method" => "POST"]) !!}
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
            {{-- <div style="float: right;">{{ $group->links() }}</div>   --}}
    </div>
</div>