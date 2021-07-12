<div class="form-group">
    {!! Form::label('name', 'Titulo:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el Titulo del Post']) !!}
    @error('name')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el Slug del Post', 'readonly']) !!}
    @error('slug')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('category_id', 'Categoria:') !!}
    {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
    @error('category_id')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group">
    <p class="font-weight-bold">Etiquetas</p>
    @foreach ($tags as $tag)
        <label class="mr-2">
            {!! Form::checkbox('tags[]', $tag->id, null) !!}
            {{ $tag->name }}
        </label>
    @endforeach
    @error('tags')
        <br>
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group">
    <p class="font-weight-bold">Estado</p>
    <label>
        {!! Form::radio('status', 1, true) !!}
        Borrador
    </label>
    <label>
        {!! Form::radio('status', 2) !!}
        Publicado
    </label>
    @error('status')
        <br>
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="row mb-3">
    <div class="col-md-6">
        <div class="image-wrapper">
            @if ($post->image->count() > 1)
                <div class="">
                    @foreach ($post->image as $image)
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
        </div>

    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('file', 'Imagen del Post') !!}
            {!! Form::file('file[]', ['class' => 'form-control-file', 'accept' => 'image/*', 'multiple']) !!}
        @error('file')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        </div>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad laboriosam debitis cumque, odio error repellendus ipsam eos. Tenetur modi molestiae voluptatibus iusto quisquam! Quidem blanditiis quae quasi molestias placeat quos?</p>
    </div>
</div>
<div class="form-group">
    {!! Form::label('iframe', 'Iframe') !!}
    {!! Form::textarea('iframe', null, ['class' => 'form-control', 'rows' => '2']) !!}
    @error('iframe')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('extract', 'Extracto') !!}
    {!! Form::textarea('extract', null, ['class' => 'form-control']) !!}
    @error('extract')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('body', 'Cuerpo del Post') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
    @error('body')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
