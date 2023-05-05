@if (!$project->wpse_children)
  <li @class(["rounded-sm grid items-center border-t lg:border-0"])>
    @include('menus.menu-anchor', ['has_children' => false])
  </li>
@endif

@if ($project->wpse_children)
  <li @class(["rounded-sm relative border-t lg:border-0"])>
    @include('menus.menu-anchor', ['has_children' => true])
    {{--<div class="drop-down absolute left-full top-0 lg:hidden">
      <i class="fa-solid fa-chevron-down leading-none p-3 inline-block text-orange-600"></i>
    </div>--}}
    <ul @class(["sub-menu text-base z-10 bg-white rounded-sm top-0 right-full min-w-[200px] pl-2 hidden lg:shadow-lg lg:shadow-slate-700 lg:absolute lg:pl-0 lg:block"])>
      @foreach($project->wpse_children as $project)
        @include('menus.main-menu-li', (array)$project)
      @endforeach
    </ul>
  </li>
@endif
