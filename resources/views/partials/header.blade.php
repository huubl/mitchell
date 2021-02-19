<nav id="nav" x-data="{open: false, drop: false, search: false, resource: false, events: false, about: false}" class="absolute top-0 left-0 right-0 z-50 w-full bg-transparent" :class="{'bg-transparent': !open, 'bg-white': search || drop || resource || events || about}">
  <div class="container z-40 px-6 py-2 mx-auto lg:px-8">
    <div class="flex items-center justify-between">

      <div class="relative z-30 lg:flex-shrink-0">
        <div class="flex items-center flex-shrink-0 md:justify-center">
          <a href="{!! home_url('/') !!}" class="hover:opacity-50">
            <img id="logo-main" class="w-auto h-16 md:h-20" src="{!! $logo['url'] !!}" alt="{{ $siteName }}" />
          </a>
        </div>
      </div>

      <div class="items-center hidden nav-container md:flex md:space-x-6 lg:space-x-8">
        @foreach ($navigation as $item)
          @if($item->classes === 'nav-issues')

              <div class="group bg-c-blue-100 px-4 pr-2 py-1 transition duration-150 ease-in-out z-30 hover:bg-c-blue-200 {{ $item->classes ?? '' }} {{ $item->active ? 'active' : '' }}">
                <button class="flex items-center focus:outline-none" @click="drop = !drop, open = true">
                  <div class="text-sm text-white nav-text group-hover:font-bold font-whyte lg:text-base">{{ $item->label }}</div>
                  <svg class="w-6 h-6 ml-2 text-white transform fill-current" :class="{'rotate-180': drop }" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                  </svg>
                </button>
              </div>

          @elseif($item->classes === 'nav-about')
            <button class="focus:outline-none" @click="about = !about, open = true">
              <div class="text-sm tracking-widest text-white nav-text group-hover:font-bold font-whyte lg:text-base hover:text-c-blue-100" :class="{'text-black': search || drop || resource || events || about, 'text-white': !open, 'text-white' : !drop && !search && !resource && !events && !about }">{{ $item->label }}</div>
            </button>
          @elseif($item->classes === 'nav-events')
            <button class="focus:outline-none" @click="events = !events, open = true">
              <div class="text-sm tracking-widest text-white nav-text group-hover:font-bold font-whyte lg:text-base hover:text-c-blue-100" :class="{'text-black': search || drop || resource || events || about, 'text-white': !open, 'text-white' : !drop && !search && !resource && !events && !about }">{{ $item->label }}</div>
            </button>
          @elseif($item->classes === 'nav-resources')
            <button class="focus:outline-none" @click="resource = !resource, open = true">
              <div class="text-sm tracking-widest text-white nav-text group-hover:font-bold font-whyte lg:text-base hover:text-c-blue-100" :class="{'text-black': search || drop || resource || events || about, 'text-white': !open, 'text-white' : !drop && !search && !resource && !events && !about }">{{ $item->label }}</div>
            </button>
          @else
            <a class="nav-link text-sm tracking-widest focus:outline-none font-whyte group relative z-30 transition duration-150 ease-in-out border-transparent border-b-3 hover:border-white lg:text-base {{ $item->classes ?? '' }} {{ $item->active ? 'active' : '' }}" href="{{ $item->url }}" target="{!! $item->target !!}">
              <div :class="{'text-black': search || drop || resource || events || about, 'text-white': !open, 'text-white' : !drop && !search && !resource && !events && !about }" class="nav-text group-hover:font-bold hover:text-c-blue-100">{{ $item->label }}</div>
            </a>
          @endif
        @endforeach
        @if(!is_search())
        <button class="z-30 focus:outline-none" @click="search = !search, open = true">
          <svg class="w-5 h-5 fill-current hover:text-c-blue-100" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" :class="{'text-black': search || drop || resource || events || about, 'text-white': !open, 'text-white' : !drop && !search && !resource && !events && !about }">
            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
          </svg>
        </button>
        @endif
      </div>
      
      <div class="flex items-center md:hidden">
        <!-- Mobile menu button -->
        <button @click="open = !open" class="inline-flex items-center justify-center p-1 mr-auto text-white transition duration-150 ease-in-out rounded-md bg-c-blue-100 focus:outline-none hover:text-c-red-100" aria-label="Main menu" aria-expanded="false">
          <!-- Icon when menu is closed. -->
          <svg :class="{'hidden': open, 'block': !open }" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
          </svg>
          <!-- Icon when menu is open. -->
          <svg :class="{'block': open, 'hidden': !open }" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" x-cloak>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
          </svg>
        </button>
      </div>

    </div>
  </div>

  {{-- <div class="absolute top-0 left-0 right-0 z-10 w-full h-24 bg-white" :class="{'block': open, 'hidden': !open}" x-cloak></div> --}}

    {{-- ABOUT DROPDOWN --}}
    <div :class="{'block': about, 'hidden': !about }" class="absolute top-0 left-0 right-0 z-20 w-full mt-24 bg-white border-t border-b border-gray-200" x-cloak>
      <div class="container px-6 mx-auto lg:px-8">
        <div @click.away="about = false" class="relative grid grid-cols-2 gap-6 px-10 py-8 xl:px-16 xl:py-12">
          <button class="absolute top-0 right-0 mt-4 -mr-1 text-black focus:outline-none xl:-mr-2 hover:text-c-blue-200" @click="about = false, open = false">
            <svg class="w-8 h-8 xl:w-10 xl:h-10" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
 
          <div class="aspect-h-9 aspect-w-16">
            <img class="object-cover object-center w-full h-full" src="{!! $about_img['url'] !!}" alt="">
          </div>
          <div class="flex items-center justify-center">
            <div class="flex flex-col space-y-1 lg:space-y-1.5 xl:space-y-2 xl:space-y-3">
              @foreach ($navigation as $item)
                @if($item->classes === 'nav-about')
                  <a class="nav-link text-xl tracking-widest font-medium focus:outline-none font-whyte group relative z-30 transition duration-150 text-black hover:text-c-blue-200 lg:text-2xl xl:text-3xl {{ $item->classes ?? '' }} {{ $item->active ? 'active' : '' }}" href="{{ $item->url }}" target="{!! $item->target !!}">
                    <div class="nav-text group-hover:font-bold">{{ $item->label }}</div>
                  </a>
                  @if($item->children)
                    @foreach($item->children as $child)
                      <a class="nav-link text-lg tracking-widest focus:outline-none font-whyte group relative z-30 transition duration-150 text-gray-600 hover:underline lg:text-xl xl:text-2xl {{ $child->classes ?? '' }} {{ $child->active ? 'active' : '' }}" href="{{ $child->url }}" target="{!! $child->target !!}">
                        <div class="nav-text group-hover:font-bold">{{ $child->label }}</div>
                      </a>
                    @endforeach
                  @endif
                @endif
              @endforeach
            </div>
          </div>

        </div>
      </div>
    </div>

    {{--EVENTS DROPDOWN --}}
    <div :class="{'block': events, 'hidden': !events }" class="absolute top-0 left-0 right-0 z-20 w-full mt-24 bg-white border-t border-b border-gray-200" x-cloak>
      <div class="container px-6 mx-auto lg:px-8">
        <div @click.away="events = false" class="relative grid grid-cols-2 gap-6 px-10 py-8 xl:px-16 xl:py-12">
          <button class="absolute top-0 right-0 mt-4 -mr-1 text-black focus:outline-none xl:-mr-2 hover:text-c-blue-200" @click="events = false, open = false">
            <svg class="w-8 h-8 xl:w-10 xl:h-10" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
  
          <div class="aspect-h-9 aspect-w-16">
            <img class="object-cover object-center w-full h-full" src="{!! $event_img['url'] !!}" alt="">
          </div>
          <div class="flex items-center justify-center">
            <div class="flex flex-col space-y-1 lg:space-y-1.5 xl:space-y-2 xl:space-y-3">
              @foreach ($navigation as $item)
                @if($item->classes === 'nav-events')
                  <a class="nav-link text-xl tracking-widest font-medium focus:outline-none font-whyte group relative z-30 transition duration-150 text-black hover:text-c-blue-200 lg:text-2xl xl:text-3xl {{ $item->classes ?? '' }} {{ $item->active ? 'active' : '' }}" href="{{ $item->url }}" target="{!! $item->target !!}">
                    <div class="nav-text group-hover:font-bold">{{ $item->label }}</div>
                  </a>
                  @if($item->children)
                    @foreach($item->children as $child)
                      <a class="nav-link text-lg tracking-widest focus:outline-none font-whyte group relative z-30 transition duration-150 text-gray-600 hover:underline lg:text-xl xl:text-2xl {{ $child->classes ?? '' }} {{ $child->active ? 'active' : '' }}" href="{{ $child->url }}" target="{!! $child->target !!}">
                        <div class="nav-text group-hover:font-bold">{{ $child->label }}</div>
                      </a>
                    @endforeach
                  @endif
                @endif
              @endforeach
            </div>
          </div>

        </div>
      </div>
    </div>

  {{-- RESOURCE DROPDOWN --}}
  <div :class="{'block': resource, 'hidden': !resource }" class="absolute top-0 left-0 right-0 z-20 w-full mt-24 bg-white border-t border-b border-gray-200" x-cloak>
    <div class="container px-6 mx-auto lg:px-8">
      <div @click.away="resource = false" class="relative grid grid-cols-2 gap-8 px-10 py-8 xl:px-32 xl:py-12 2xl:px-56">
        <button class="absolute top-0 right-0 mt-4 -mr-1 text-black focus:outline-none xl:-mr-2 hover:text-c-blue-200" @click="resource = false, open = false">
          <svg class="w-8 h-8 xl:w-10 xl:h-10" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
          @foreach($resources as $issue)
            <a href="/category/{!! $issue['slug'] !!}" class="flex flex-col border border-gray-300 hover:shadow-issue" style="background-color: {!! $issue['color'] !!};">
              <div class="p-6 py-4 lg:p-8 xl:p-10" style="background-color: {!! $issue['color'] !!}; color: {!! $issue['font'] !!};">
                <h4 class="mb-0 text-xl text-center lg:text-left lg:mb-2 xl:text-2xl">{!! $issue['name'] !!}</h4>
                <p class="hidden text-sm leading-tight lg:block lg:line-clamp-3 xl:text-base">{!! $issue['desc'] !!}</p>
              </div>
            </a>
          @endforeach
      </div>
    </div>
  </div>

  {{-- ISSUES DROPDOWN --}}
  <div :class="{'block': drop, 'hidden': !drop }" class="absolute top-0 left-0 right-0 z-20 w-full mt-24 bg-white border-t border-b border-gray-200" x-cloak>
    <div class="container px-6 mx-auto lg:px-8">
      <ul @click.away="drop = false" class="relative grid grid-cols-3 gap-8 px-10 py-8 xl:px-16 xl:py-12">
        <button class="absolute top-0 right-0 mt-4 -mr-1 text-black focus:outline-none xl:-mr-2 hover:text-c-blue-200" @click="drop = false, open = false">
          <svg class="w-8 h-8 xl:w-10 xl:h-10" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
        @foreach($issues as $issue)
          <a href="/issue/{!! $issue['slug'] !!}" class="flex flex-col border border-gray-300 hover:shadow-issue" style="background-color: {!! $issue['color'] !!};">
            <div class="p-6 py-4 lg:p-8 xl:p-10" style="background-color: {!! $issue['color'] !!}; color: {!! $issue['font'] !!};">
              <h4 class="mb-0 text-xl text-center lg:text-left lg:mb-2 xl:text-2xl">{!! $issue['name'] !!}</h4>
              <p class="hidden text-sm leading-tight lg:block lg:line-clamp-3 xl:text-base">{!! $issue['desc'] !!}</p>
            </div>
          </a>
        @endforeach
      </ul>
    </div>
  </div>

  {{-- SEARCH DROPDOWN --}}
  <div :class="{'block': search, 'hidden': !search }" class="absolute top-0 left-0 right-0 w-full mt-24 bg-c-black-100" x-cloak>
    <div class="container px-6 mx-auto lg:px-8">

      <div @click.away="search = false, open = false" class="relative flex items-center justify-center py-16">

        <button class="absolute top-0 right-0 mt-4 -mr-1 text-white focus:outline-none xl:-mr-2 hover:text-c-blue-200" @click="search = false, open = false">
          <svg class="w-8 h-8 xl:w-10 xl:h-10" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>

        <div id="search-container" class="flex items-center w-full max-w-lg lg:max-w-xl xl:max-w-2xl">
          <div class="mr-4 text-2xl font-bold text-white font-whyte xl:text-3xl">Search:</div>
          <form action="{!! home_url(); !!}" role="search" method="post" id="searchform" class="relative flex-grow">
            <input type="text" id="s" name="s" value="" autocomplete="off" class="w-full py-2 pl-4 pr-6 focus:outline-none font-whyte" placeholder="Search Keyword">
            {{-- <input type="hidden" name="post_type" value="sfwd-courses"> --}}
            <button class="absolute bottom-0 right-0 mb-3 mr-4" type="submit" id="searchsubmit">
              <svg class="w-4 h-4 text-black fill-current hover:text-c-blue-200" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"/></svg>
            </button>
          </form>
        </div>
      </div>

    </div>
  </div>

  <!--
    Mobile menu, toggle classes based on menu state.

    Menu open: "block", Menu closed: "hidden"
  -->
  <div :class="{'block': open, 'hidden': !open }" class="shadow-md bg-c-black-100 md:hidden" x-cloak>
    <div @click.away="open = false" class="py-8 md:px-2">
      <ul class="flex flex-col space-y-6">
        @foreach ($navigation as $item)
          @if($item->classes === 'nav-issues')
            <li class="group relative px-6 transition duration-150 ease-in-out flex items-center flex-wrap {{ $item->classes ?? '' }} {{ $item->active ? 'active' : '' }}" x-data="{drop: false}">
              <a @click="open = false" class="inline-block text-lg font-medium tracking-wider text-white transition duration-300 ease-in-out border-transparent font-whyte border-b-3 hover:font-bold hover:border-white focus:outline-none md:text-base" href="{{ $item->url }}">
                {{ $item->label }}
              </a>
              <button class="ml-6 focus:outline-none" @click="drop = !drop">
                <svg class="w-6 h-6 text-white transform fill-current" :class="{'rotate-180': drop }" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
              </button>
              <div :class="{'block': drop, 'hidden': !drop }" class="w-full" x-cloak>
                <ul class="flex flex-col pt-3 pl-4 space-y-3">
                  @foreach($issues as $item)
                    <a class="text-lg text-white font-whyte" href="/issue/{!! $item['slug'] !!}">{!! $item['name'] !!}</a>
                  @endforeach
                </ul>
              </div>
            </li>
          @else
            <li class="group relative px-6 transition duration-150 ease-in-out {{ $item->classes ?? '' }} {{ $item->active ? 'active' : '' }}">
              <a @click="open = false" class="inline-block text-lg font-medium tracking-wider text-white transition duration-300 ease-in-out border-transparent font-whyte border-b-3 hover:font-bold hover:border-white focus:outline-none md:text-base" href="{{ $item->url }}">
                {{ $item->label }}
              </a>
            </li>
          @endif
        @endforeach
        <li class="relative px-6 transition duration-150 ease-in-out group">
          <a @click="open = false" class="items-center inline-block text-lg font-medium tracking-wider text-white transition duration-300 ease-in-out border-transparent font-whyte border-b-3 hover:font-bold hover:border-white focus:outline-none md:text-base" href="/search">
            Search
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>

{{-- @dump($issues) --}}