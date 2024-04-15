@if ($images->count() > 0)
    <div class="image-gallery">
        @foreach ($images as $image)
            <img src="{{ asset('storage/' . $image->file_name) }}" alt="Image">
        @endforeach
    </div>
@else
    <p>No images available.</p>
@endif
