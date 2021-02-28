@extends('layouts.backend.app')

@section('content')
    <div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-menu icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>
                    @isset($menuItem)
                        Edit Menu Item
                    @else
                        Add New Menu Item to (<code>{{ $menu->name }}</code>)
                    @endisset
                </div>
            </div>
            <div class="page-title-actions">
                <a href="{{route('app.menus.builder', $menu->id)}}" class="btn-shadow mr-3 btn btn-danger">
                    <i class="fa fa-arrow-alt-circle-left mr-1"></i>
                    <span>Back to list</span>
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <form method="POST" action="{{ isset($menuItem) ? route('app.menus.item.update',['id'=>$menu->id,'itemId'=>$menuItem->id]) : route('app.menus.item.store',$menu->id) }}">
                @csrf
                @isset($menuItem)
                    @method('PUT')
                @endisset
                <div class="row">
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Manage Menu Item</h5>


                            <div class="form-group">
                                <label for="type">Type</label>
                                <select class="custom-select" id="type" name="type" onchange="setItemType()">
                                    <option value="item" @isset($menuItem) {{ $menuItem == 'item' ? 'selected' : '' }} @endisset>Menu Item</option>
                                    <option value="divider" @isset($menuItem) {{ $menuItem == 'divider' ? 'selected' : '' }} @endisset>Divider</option>
                                </select>
                            </div>



                            <div id="divider_fields">
                                <div class="form-group">
                                    <label for="divider_title">Title of the Divider</label>
                                    <input type="text" class="form-control @error('divider_title') is-invalid @enderror" id="divider_title"
                                           name="divider_title"
                                           placeholder="Divider Title" value="{{ isset($menuItem) ? $menuItem->divider_title : old('divider_title') }}">
                                    @error('divider_title')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                            </div>

                            <div id="item_fields">
                                <div class="form-group">
                                    <label for="title">Title of the Menu Item</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                                           name="title"
                                           placeholder="Title" value="{{ isset($menuItem) ? $menuItem->title : old('title') }}"
                                           >
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="url">URL for the Menu Item</label>
                                    <input type="text" class="form-control @error('url') is-invalid @enderror" id="url"
                                           name="url"
                                           placeholder="URL" value="{{ isset($menuItem) ? $menuItem->url : old('url') }}">
                                    @error('url')
                                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="target">Open In</label>
                                    <select name="target" id="target"
                                            class="form-control @error('target') is-invalid @enderror">
                                        <option
                                            value="_self" @isset($menuItem) {{ $menuItem->target == '_self' ? 'selected' : '' }} @endisset>
                                            Same Tab/Window
                                        </option>
                                        <option
                                            value="_blank" @isset($menuItem) {{ $menuItem->target == '_blank' ? 'selected' : '' }} @endisset>
                                            New Tab/Window
                                        </option>
                                    </select>
                                    @error('target')
                                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="icon_class">Font Icon class for the Menu Item <a target="_blank"
                                                                                                 href="https://fontawesome.com/">(Use
                                            a Fontawesome Font Class)</a> </label>
                                    <input type="text" class="form-control @error('icon_class') is-invalid @enderror"
                                           id="icon_class" name="icon_class"
                                           placeholder="Icon Class (optional)"
                                           value="{{ isset($menuItem) ? $menuItem->icon_class : old('icon_class') }}"
                                           autofocus>
                                    @error('icon_class')
                                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">
                                @isset($menuItem)
                                    <i class="fas fa-arrow-circle-up mr-1"></i>
                                    <span>Update</span>
                                @else
                                    <i class="fas fa-plus-circle mr-1"></i>
                                    <span>Create</span>
                                @endisset
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection

@push('js')
    <script type="text/javascript">
        function setItemType(){
            if($('select[name="type"]').val() == 'divider'){
                $('#divider_fields').removeClass('d-none');
                $('#item_fields').addClass('d-none');
            }else{
                $('#divider_fields').addClass('d-none');
                $('#item_fields').removeClass('d-none');
            }
        };

        setItemType();
        // $('input[name="type"]').change(setItemType);
    </script>
@endpush

