<a href="{{ $project->url }}" @class([
        "block font-lato uppercase px-3 py-4 lg:p-3 hover:bg-oss_blue hover:text-white transition-colors text-black relative z-10 max-w-[80%] lg:max-w-none",
        (get_the_ID() == $project->object_id) ? "bg-oss_blue_light !text-white pointer-events-none" : "",
])>{!! $project->title !!}
  @if($has_children)
    <i class="dropdown-arrow fa-solid hidden lg:inline-block fa-chevron-down leading-none text-sm"></i>
  @endif
</a>
@if($has_children)
  <i class="dropdown-arrow lg:hidden fa-solid fa-chevron-down leading-none text-sm absolute right-0 top-0 z-50 p-4"></i>
@endif
