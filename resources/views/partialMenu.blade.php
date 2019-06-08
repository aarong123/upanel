@if(Auth::user()->role_id == 1)

    @include('partialsMenus.adminMenu')

@elseif(Auth::user()->role_id == 2)

    @include('partialsMenus.sellerManu')

@elseif(Auth::user()->role_id == 3)

    @include('partialsMenus.grocerMenu')

@endif
