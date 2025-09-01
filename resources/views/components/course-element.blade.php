<div class="course__item">
    <a href="#">
        @isset($course->images['Imagen destacada'][0])
            <img src="{{ $course->images['Imagen destacada'][0]->mediaModel->getUrl() }}" alt="{{ $course->title }}">
        @endisset
        <h3>{{ $course->title }}</h3>
    </a>
</div>
