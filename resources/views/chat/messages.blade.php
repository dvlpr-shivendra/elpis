@extends('layouts.app')

@section('content')

    <div class="mb-4">
        @if ($messages->first()->sender_id == auth()->user()->id)
            <h3>
                {{ App\user::find($messages->first()->reciever_id)->name }}
            </h3>
        @else
            <h3>
                {{ App\user::find($messages->first()->sender_id)->name }}
            </h3>
        @endif
        
    </div>

    <div id="messages">
    @foreach ($messages->reverse() as $message)

    @if (auth()->user()->id == $message->sender_id)
        <div class="card bg-info mb-3 float-right" style="width:90%">            
            <div class="card-body">
                    <h5 class="text-right text-white">
                        {{ $message->body }}
                        <br>
                        <small>{{ $message->created_at->diffForHumans() }}</small>
                    </h5>
            </div>
        </div>    
    @else
        @if (!$message->read)
            @php
                $message->update(["read" => true]);
            @endphp
        @endif
        <div class="card bg-success mb-3" style="width:90%">            
            <div class="card-body">
                    <h5 class="text-left text-white">
                        {{ $message->body }}
                        <br>
                        <small>{{ $message->created_at->diffForHumans() }}</small>
                    </h5>
            </div>
        </div>
    @endif
                
    @endforeach
    </div>


    <form action="/message" method="post">
        @csrf
        
        @php
            $data = $messages->first()
        @endphp

        <input type="hidden" name="chat_id" value="{{ $data->chat_id }}" >
        <input type="hidden" name="reciever_id" 
            value="{{ auth()->user()->id == $data->sender_id ? $data->reciever_id : $data->sender_id }}">

        <div class="form-group">                
            <label for="text">Write message</label>
            <textarea class="form-control" name="body" id="message" rows="3" style="border: 1px solid" autofocus required></textarea>
        </div>

        <input type="submit" class="btn btn-success btn-block text-center" value="send">
    </form>

    <p>{{ $messages->links() }}</p>

@endsection

@section('script')
    <script>
        const chatId = {{ $messages->first()->chat_id }};
        Echo.private('chat.' + chatId)
            .listen('MessageSent', function (event) {
                
                $("#messages").append(`
                    <div class="card bg-success mb-3" style="width:90%">            
                        <div class="card-body">
                            <h5 class="text-left text-white">
                                ${event.body}
                                <br>
                                <small>${event.created_at}</small>
                            </h5>
                        </div>
                    </div>
                `);

            })
    </script>
@endsection