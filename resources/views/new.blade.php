@foreach ($alldata as $item)
    <img src="{{ asset('uploads') . '/' . $item->image_path }}" alt="image">
@endforeach

<div class="diagonal-button">
    <span>Click Me</span>
</div>
