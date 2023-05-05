<nav @class([
        "nav-primary w-full bg-white lg:bg-transparent",
])>
  <ul @class([
        "flex flex-col lg:flex-row lg:max-h-auto",
])>
    @each('menus.main-menu-li', $do_menu, 'project')
  </ul>
</nav>
