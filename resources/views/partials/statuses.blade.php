@foreach ($statuses as $status)        
    
<div class="card mb-4">
    <div class="card-body">
        <h5>
            <a href="/status/{{ $status->id }}" class="text-dark">
                {{ $status->body }}
            </a>                
        </h5> 

        @if ($status->image)
            <img src="/images/status/{{ $status->image }}" alt="status image" class="img-fluid my-1">
        @endif    
        
        <a href="/user/profile/{{ $status->owner->id }}" class="card-link ">
            {{ $status->owner->name }}
        </a>
        
        @include('partials.likes')

        @if ($status->owner_id == auth()->user()->id)
            @include('partials.deletestatus')
        @endif
        
    </div>
</div>
@endforeach