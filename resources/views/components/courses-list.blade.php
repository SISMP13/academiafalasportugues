<div class="courses__wrapper">
    <h2 class="title__custom">{{ $title }}</h2>
    <div class="courses__items">
        @foreach($courses as $course)
            <x-course-element :course="$course"/>
        @endforeach
    </div>
</div>
