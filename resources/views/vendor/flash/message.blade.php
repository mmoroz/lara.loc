@foreach (session('flash_notification', collect())->toArray() as $message)
    @if ($message['overlay'])
        @include('flash::modal', [
            'modalClass' => 'flash-modal',
            'title'      => $message['title'],
            'body'       => $message['message']
        ])
    @else
        @if($message['level'] == 'danger')
            @php
                $colorText = 'text-red-800';
                $bgColor = 'bg-red-50';
                $bgHover = 'hover:bg-red-200';
                $btnBorderColor = 'focus:ring-red-400';
            @endphp
        @endif

        @if($message['level'] == 'info')
            @php
                $colorText = 'text-blue-800';
                $bgColor = 'bg-blue-50';
                $bgHover = 'hover:bg-blue-200';
                $btnBorderColor = 'focus:ring-blue-400';
            @endphp
        @endif

        @if($message['level'] == 'success')
            @php
                $colorText = 'text-green-800';
                $bgColor = 'bg-green-50';
                $bgHover = 'hover:bg-green-200';
                $btnBorderColor = 'focus:ring-green-400';
            @endphp
        @endif

        @if($message['level'] == 'warning')
            @php
                $colorText = 'text-yellow-800';
                $bgColor = 'bg-yellow-50';
                $bgHover = 'hover:bg-yellow-200';
                $btnBorderColor = 'focus:ring-yellow-400';
            @endphp
        @endif

        <div id="alert" class="flex p-4 m-4 {{ $colorText }}  rounded-lg {{ $bgColor }}" role="alert">
            <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <span class="sr-only">Info</span>
            <div class="ml-3 text-sm font-medium">
                {!! $message['message'] !!}
            </div>
            @if ($message['important'])
                <button type="button" class="close-btn ml-auto -mx-1.5 -my-1.5 {{ $bgColor }} {{ $colorText }} rounded-lg focus:ring-2  p-1.5 {{$bgHover}} {{$btnBorderColor}} inline-flex h-8 w-8make" data-dismiss-target="#alert" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            @endif
        </div>

    @endif
@endforeach

{{ session()->forget('flash_notification') }}
