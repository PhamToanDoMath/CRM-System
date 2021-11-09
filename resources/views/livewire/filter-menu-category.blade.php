<div>
<div class="row">
    <div class="col-auto">
        <a class="btn btn-primary" type="button" href="{{route('admin.menu.create')}}">
            <svg class="icon me-1">
                <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-plus')}}"></use>
            </svg>New
        </a>
    </div>
    <div class="col-auto float-right">
        <div class="btn-group">
            <button class="btn btn-outline-primary dropdown-toggle" type="button"
                data-coreui-toggle="dropdown" aria-expanded="false">
                <svg class="icon me-1">
                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-filter')}}"></use>
                </svg>Filter by</button>
            <ul class="dropdown-menu">
                @foreach($menu_groups as $group)
                <li><a class="dropdown-item" href="#" wire:click.prevent="filterBy({{$group->id}})">{{$group->name}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
<div class="row justify-content-center mt-5">
    <div class="col-md-12">
        <div class="card">
            <table class="table table-responsive-sm table-hover">
                <thead>
                    <tr class="text-center">
                        <th scope="col">{{__('ID')}}</th>
                        <th scope="col">{{__('Name')}}</th>
                        <th scope="col">{{__('Category')}}</th>
                        <th scope="col">{{__('Price')}}</th>
                        <th scope="col">{{__('Quantity')}}</th>
                        <th scope="col">{{__('Availablity')}}</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @if (is_array($menuItems) || is_object($menuItems))
                        @foreach($menuItems as $menuItem)
                        <tr class="text-center">
                            <th scope="row">{{$menuItem->id}}</th>
                            <td>
                                <a href="{{route('admin.menu.edit',$menuItem)}}">
                                    {{$menuItem->name}}</a>
                            </td>
                            <td>{{$menu_groups->where('id',$menuItem->menu_group_id)->first()->name}}</td>
                            <td>{{$menuItem->price}}</td>
                            <td>{{$menuItem->quantity}}</td>
                            <td>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" style="margin-left:auto" type="checkbox"
                                        id="is_available" @if($menuItem->is_available) checked @endif 
                                        wire:click="toggle_available({{$menuItem->id}})">
                                </div>
                            </td>
                            <td>
                                <div class="col-auto">
                                    <form method="POST" action="{{route('admin.menu.destroy',$menuItem)}}">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-outline-danger btn-sm" type="submit"
                                            onclick="return confirm('Are you sure you want to delete this?');"><svg
                                                class="icon me-1">
                                                <use
                                                    xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-trash')}}">
                                                </use>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>