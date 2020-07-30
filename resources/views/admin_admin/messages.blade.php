@if(count($errors) > 0)
    <div class="alert alert-danger">
        <ul style="text-align: right;direction: rtl">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

@endif



@if(session()->has('success_message'))
    <div class="alert @if(session()->has('type_message')) {{ session()->get('type_message') }} @else alert-success  @endif">
        {{ session()->get('success_message') }}
    </div>
@endif


