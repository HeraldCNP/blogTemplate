<x-app-layout>
    <div class="container py-8 ">
        <h1 class="text-4xl font-bold text-gray-600">{{ $post->name }}</h1>
        <div class="text-lg text-gray-500 mb-2">
            {!! $post->extract !!}
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2">
                {{-- Contenido Principal --}}

                @isset($post->image)
                    @if ($post->image->count() > 1)
                        <div class="">
                            @foreach ($post->image as $image)
                            {{-- {{ dd(Storage::url($image->url)) }} --}}
                                <a href="{{ Storage::url($image->url) }}" data-toggle="lightbox" data-gallery="example-gallery">
                                    <img src="{{ Storage::url($image->url) }}" class="img-fluid">
                                </a>
                            @endforeach
                        </div>
                    @else
                        <a href="{{ Storage::url($post->image[0]->url) }}" data-toggle="lightbox">
                            <img src="{{ Storage::url($post->image[0]->url) }}" class="img-fluid">
                        </a>
                    @endif
                @endisset
                {{-- @if ($post->image)
                <figure>
                    <img class="w-full h-80 object-cover object-center" src="{{ Storage::url($post->image->url) }}" alt="">
                </figure>
                @else
                <figure>
                    <img class="w-full h-80 object-cover object-center" src="https://cdn.pixabay.com/photo/2020/01/03/11/44/freedom-4737919_960_720.jpg" alt="">
                </figure>
                @endif --}}
                <div class="text-base text-gray-500 mt-4">
                    {!! $post->body !!}
                </div>
            </div>
            <aside>
                {{-- Contenido relacionado --}}
                <h1 class="text-2xl font-bold text-gray-600 mb-4">Mas en {{ $post->category->name }}</h1>
                <ul>
                    @foreach ($similares as $similar)
                        <li class="mb-4">
                            <a class="flex" href="{{ route('posts.show', $similar) }}">
                                @if ($post->image)
                                    <img class="w-32 object-cover object-center" src="{{ Storage::url($similar->image[0]->url) }}" alt="">
                                @else
                                <img class="w-32 object-cover object-center" src="https://cdn.pixabay.com/photo/2020/01/03/11/44/freedom-4737919_960_720.jpg" alt="">
                                @endif
                                <span class="ml-2">{{ $similar->name }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </aside>
        </div>
    </div>
</x-app-layout>

@section('scripts')
    <script>
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });
    </script>
@endsection